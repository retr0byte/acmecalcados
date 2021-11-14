
$(function(){ // equivalente do window.onload
    $('#form_login').submit(function(e){
        e.preventDefault();
    
        let nm_usuario = $('#nm_usuario').val()
        let nm_senha = $('#nm_senha').val()

        enviarInfoLogin({ nm_usuario, nm_senha })
    })
})

const enviarInfoLogin = obj => {
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=validausuario`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelInterno.php`)
        }
        else {
            $('#login_status').html(response.message)
            $('#login_status').css('display','block')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}