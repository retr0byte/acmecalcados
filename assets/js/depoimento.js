
$(function(){ // equivalente do window.onload
    $('#form_new_depoimento').submit(function(e){
        e.preventDefault();

        let nm_depoimento = $('#nm_depoimento').val()
        let ds_depoimento = $('#ds_depoimento').val()
        
        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);

        enviarInfoDepoimento({ nm_depoimento, ds_depoimento, formData })
    })
})

const enviarInfoDepoimento = obj => {
    $.ajax({
        method: "POST",
         processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=criadepoimento&n=${btoa(obj.nm_depoimento)}&v=${btoa(obj.ds_depoimento)}`,
        data: obj.formData
    }).done(function(response) {

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelDepoimentos.php`)
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