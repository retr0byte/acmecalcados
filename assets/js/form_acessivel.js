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
        enviarDados()
    } else {
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



