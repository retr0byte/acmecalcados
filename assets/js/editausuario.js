
$(function(){ // equivalente do window.onload
    $('#form_edit_usuario').submit(function(e){
        e.preventDefault();
        let nm_usuario = $('#nm_usuario').val()
        let nm_acesso = $('#nm_acesso').val()
        let u = $('#btn_cd').attr('editcd')
     
        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);

        enviarEditarUsuario({ nm_usuario, nm_acesso, formData, u})
    })
})

const enviarEditarUsuario = obj => {
    $.ajax({
        method: "POST",
        processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=editausuario&n=${btoa(obj.nm_usuario)}&v=${btoa(obj.nm_acesso)}&u=${btoa(obj.u)}`,
        data: obj.formData
    }).done(function(response) {
    
        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelUpdateUsuarios.php`)
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