
$(function(){ // equivalente do window.onload
    $('#form_edit_senha').submit(function(e){
        e.preventDefault();
        let nm_senha = $('#nm_senha').val()
        let nm_senha_nova = $('#nm_senha_nova').val()
        let nm_senha_confirma = $('#nm_senha_confirma').val()
        let u = $('#btn_cd').attr('editcd')
     
        if(nm_senha_nova === nm_senha) {
            $('#new_promocao_status').html("a senha nova deve ser diferente da atual")
            $('#new_promocao_status').css('display','block')
        } 
        else if(nm_senha_nova == nm_senha_confirma) {
            enviarEditarSenha({ nm_senha, nm_senha_nova, nm_senha_confirma, u})
        }
        else {
            $('#new_promocao_status').html("confirme sua senha")
            $('#new_promocao_status').css('display','block')
        }
    })
})

const enviarEditarSenha = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=editasenha`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelUpdateSenha.php`)
        }
        else {
            $('#new_promocao_status').html(response.message)
            $('#new_promocao_status').css('display','block')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}