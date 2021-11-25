
$(function(){ // equivalente do window.onload
    $('#form_new_promocao').submit(function(e){
        e.preventDefault();

        let nm_promocao = $('#nm_promocao').val()
        let vl_promocao = $('#vl_promocao').val()

        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);

        enviarInfoPromocao({ nm_promocao, vl_promocao, formData })
    })
})

const enviarInfoPromocao = obj => {

    $.ajax({
        method: "POST",
        processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=criapromocao&n=${btoa(obj.nm_promocao)}&v=${btoa(obj.vl_promocao)}`,
        data: obj.formData
    }).done(function(response) {

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelPromocoes.php`)
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