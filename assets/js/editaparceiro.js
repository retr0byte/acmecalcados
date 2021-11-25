
$(function(){ // equivalente do window.onload
    $('#form_edit_parceiro').submit(function(e){
        e.preventDefault();
        let nm_parceiro = $('#nm_parceiro').val()
        let parameter = new URLSearchParams(window.location.search);
        const u = parameter.get("u")

        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);

        enviarEditarParceiro({ nm_parceiro, formData, u })
    })
})

const enviarEditarParceiro = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=editaparceiro&n=${btoa(obj.nm_parceiro)}&u=${btoa(obj.u)}`,
        data: obj.formData
    }).done(function(response) {

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelParceiros.php`)
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