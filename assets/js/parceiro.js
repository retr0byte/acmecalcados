
$(function(){ // equivalente do window.onload
    $('#form_new_parceiro').submit(function(e){
        e.preventDefault();
        
        let nm_parceiro = $('#nm_parceiro').val()
        
        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);

        enviarInfoParceiro({ nm_parceiro, formData})
    })
})

const enviarInfoParceiro = obj => {
    $.ajax({
        method: "POST",
        processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=criaparceiro&n=${btoa(obj.nm_parceiro)}}`,
        data: obj.formData
    }).done(function(response) {

        if(response.status === 200) {
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