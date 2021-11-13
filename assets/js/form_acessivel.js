/**
 * ETAPA 1
 * Modificar as funções abaixo caso seja adicionado algum campo novo: 
*       - acessarCampos() -> criar uma variavel cujo nome seja igual ao id do campo
*           - atribuir a ela a chamada do elemento
*           - adicionar a variavel no objeto retornado pela funcao
* 
*       - configVerificacoes() -> dentre as chaves disponiveis, adicionar TODAS, o valor deverá ser:
*           - 'true' para aquelas que for utilizar a validação
*           - 'false' para as que não for utilizar
*           - 'custumizado', para uma validacao que necessite de UM parametro adicional
*               - neste caso, o valor passado já deverá ser o do parametro adicional
*                   - como é o caso da minSize
 * 
 * ETAPA 2
 * Procedimento para adicionar uma nova verificacao:
 *      - acessar o arquivo form_acessivel_validacoes.js
 *          - adicionar nova função de validação
 * 
 *      - alterar a constante 'validacoes' dentro da função 'validarCampos()'
 *          - adicionando a chave desejada e a função 
 * 
 *      - Feito isso é necessário alterar as funções abaixo:
 *          - configVerificacoes() -> adicionar a nova chave em todas as opcoes, o valor deverá ser:
 *              - 'true' para aquelas que forem utilizar a nova validação
 *              - 'false' para as que não forem utilizar
 *              - 'custumizado', para uma validacao que necessite de UM parametro adicional
 *                  - neste caso, o valor passado já deverá ser o do parametro adicional
 *                      - como é o caso da minSize
 * 
 *          - exibirMensagem() -> adicionar a nova chave e sua respectiva mensagem de erro, na constante mensagens
 *
 * ETAPA 3 - Google ReCAPTCHA
 * As validações abaixo funcionam através de integração com o Google Recaptcha v2 Invisible, e portanto, necessitam
 * de alguns cuidados a mais. Para que a integração funcione corretamente é necessário que seja feito um cadastro na
 * no site do recaptcha, onde será possível obter sua SITE KEY e sua SECRET KEY.
 *
 * Em posse de ambas é necessário adicionar a div abaixo dentro do form que está associado a estas validações:
 *
     <div id='recaptcha' class="g-recaptcha"
         data-sitekey="sua_site_key_aqui"
         data-callback="captchaOnSubmit"
         data-size="invisible">
     </div>
 *
 * Feito isso será necessário adicionar as linhas abaixo como primeiras importações de JS da página:
 *
    <script src="<?php echo PATH_LINKS ?>/assets/js/captchaChecks.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=captchaIsLoaded" async defer></script>
 *
 * A partir daí já deve funcionar mas, é recomendado verificar os paths de importação dos arquivos para
 * que tudo funcione como o esperado.
 *
 *
 * EXPLICAÇÃO DA PARTE DO CAPTCHA:
 * Quando o usuário preenche os campos de acordo com as validações, é feita uma verificação na linha 142 deste arquivo para
 * saber se os arquivos do captcha foram carregados corretamente, em caso positivo, a verificação captcha é iniciada.
 * Ao rodar o comando { grecaptcha.execute(); } é retornado um token com validade de 2mins na função definida no atributo
 * { data-callback } mencionado na div acima. Este token é então recebido no arquivo { captchaChecks.js } na função
 * { captchaOnSubmit } que foi a passada no parâmetro da div mencionada anteriormente. Esta função chama outra função, a
 * { captchaSend } passando como parametro o token recebido, esta função fara uma requisição HTTP enviando o token por POST para o router do projeto,
 * que por sua vez "levará" o token até a classe ReCAPTCHA, que possui o método { check }, o qual irá, utilizando a
 * secret_key e o token, enviar uma requisição para a api do recaptcha, que fará a validação e retornará um JSON como resposta.
 * Este JSON será retornado até que chegue como resposta da requisição feita pela { captchaSend }, em caso de sucesso
 * o email é enviado e as informações do usuario e da mensagem salvas no BD. Em caso de falha, é exibido um alerta, avisando
 * que a verificação do captcha não foi aceita.
 *
 * MAIS INFOS (DOCS): https://developers.google.com/recaptcha/intro
 */

$(function () {
    aplicarMascaras()
    assistirForm()
})

const acessarCampos = () => {
    let nome = $("#nome")
    let sobrenome = $("#sobrenome")
    let email = $("#email")
    let telefone = $("#telefone")
    let mensagem = $("#mensagem")
    let assunto = $("#assunto")

    return { nome, sobrenome, telefone, email, assunto, mensagem }
}

const configVerificacoes = () => {
    return {
        nome: { empty: true, minSize: 3, onlyLetters: true },
        sobrenome: { empty: true, minSize: 3, onlyLetters: true },
        email: { empty: true, minSize: 10, onlyLetters: false },
        telefone: { empty: true, minSize: 14, onlyLetters: false },
        mensagem: { empty: true, minSize: false, onlyLetters: false },
        assunto: { empty: true, minSize: 5, onlyLetters: false },
    }
}

const aplicarMascaras = () => {
    let campos = acessarCampos()
    campos.telefone.mask('(00) 0000-0000')
}

const validarCampos = () => {

    const validacoes = {
        empty: camposVazios,
        minSize: tamanhoMinimo,
        onlyLetters: apenasLetras
    }

    const verificacoesCampos = configVerificacoes()

    let arrErros = []
    let campos = acessarCampos()

    for (const chave in campos) {
        let valorCampo = campos[chave].val()
        let verificacoes = verificacoesCampos[chave]

        for (const tipoVerificacao in verificacoes) {
            let testarCampo = validacoes[tipoVerificacao]
            let paramVerificacao = verificacoes[tipoVerificacao]

            if (paramVerificacao == true) {
                if (testarCampo(valorCampo)) {
                    arrErros.push({ chave, status: `${tipoVerificacao}` })
                    break
                }
            } else if (paramVerificacao != false) {
                if (testarCampo(valorCampo, paramVerificacao)) {
                    arrErros.push({ chave, status: `${tipoVerificacao}` })
                    break
                }
            }
        }
    }

    if (arrErros.length <= 0) {
        let { captchaLoaded } = localStorage

        if(captchaLoaded) {
            grecaptcha.execute();
        }else
            console.warn('arquivos do captcha não foram carregados...')
    } else {
        console.warn('problema com o preenchimento dos campos, exibindo erros ...')
        exibirMensagem(arrErros)
    }
}

const exibirMensagem = erros => {
    let msgsErro = ''

    const verificacoesCampos = configVerificacoes()

    for (let i = 0; i < erros.length; i++) {
        const erro = erros[i];
        const status = erro.status

        const mensagens = {
            empty: "o campo não pode estar em branco!",
            minSize: `minímo de ${verificacoesCampos[erro.chave]['minSize']} caracteres!`,
            onlyLetters: "somente é permitida a entrada de letras!"
        }

        const nomeCampo = $(`label[for="${erro.chave}"]`).text()
        const msg = mensagens[status]

        msgsErro += `<p> ${i + 1} - ${nomeCampo}, <a href="#${erro.chave}">${msg}</a> </p>`
    }

    marcarCampos(erros)

    $("#erros").html(msgsErro)
    $("#mensagensErro").fadeIn()
}

const marcarCampos = errArr => {
    let campos = acessarCampos()

    for (const chave in campos) {
        $(`#${chave}`).css('border', '1px solid black')
    }

    for (let i = 0; i < errArr.length; i++) {
        $(`#${errArr[i].chave}`).css('border', '1px solid #A80000')
    }
}

const assistirForm = () => {
    $("#formAcessivel").submit(function (e) {
        e.preventDefault()
        validarCampos()
    })
}

const enviarDados = () => {
    // função onde seriam enviados os dados via ajax

    $('#mensagensErro').css('display','none')
    $('#formAcessivel').css('display','none')
    $('#loading').css('display','flex')

    const campos = acessarCampos()

    const nome = campos.nome.val()
    const sobrenome = campos.sobrenome.val()
    const telefone = campos.telefone.val()
    const email = campos.email.val()
    const assunto = campos.assunto.val()
    const mensagem = campos.mensagem.val()

    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=sendmail`,
        data: { dataPkg: { nome, sobrenome, telefone, email, assunto, mensagem } }
    }).done(function(response) {
        response = JSON.parse(response)

        $('#loading').css('display','none')

        if(response.status === 200){
            $('#sucesso').html(response.message)
            $('#mensagensSucesso').css('display','flex')
        }else{
            $("#erros").html(response.message)
            $("#mensagensErro h2").css('display','none')
            $("#mensagensErro").css('display','flex')
        }

        setTimeout(function(){
            location.reload(true)
        },3000)

    }).fail(function(error) {
        alert('Não foi enviar o email')
        throw new Error(error)
    })
}



