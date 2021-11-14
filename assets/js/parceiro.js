
$(function(){ // equivalente do window.onload
    $('#form_new_parceiro').submit(function(e){
        e.preventDefault();

        let nm_parceiro = $('#nm_parceiro').val()
        let ds_PathImg = $('input[type=file]')[0].files[0];
        ds_PathImg = ds_PathImg.name 

        enviarInfoParceiro({ nm_parceiro, ds_PathImg })
        console.log(ds_PathImg);
    })
})

const enviarInfoParceiro = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=criaparceiro`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

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