
$(function(){ // equivalente do window.onload
    $('#form_edit_usuario').submit(function(e){
        e.preventDefault();
        let nm_promocao = $('#nm_usuario').val()
        let nm_acesso = $('#nm_acesso').val()
        let ds_PathImg = $('input[type=file]')[0].files[0];
        ds_PathImg = ds_PathImg.name 
        let parameter = new URLSearchParams(window.location.search);

        enviarEditarUsuaeio({ nm_usuario, nm_acesso, ds_PathImg})
    })
})

const enviarEditarUsuario = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=editausuario`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelUpdateUsuario.php`)
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