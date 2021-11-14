
$(function(){ // equivalente do window.onload
    $('#form_new_depoimento').submit(function(e){
        e.preventDefault();

        let nm_depoimento = $('#nm_depoimento').val()
        let ds_depoimento = $('#ds_depoimento').val()
        let ds_PathImg = $('input[type=file]')[0].files[0];
        ds_PathImg = ds_PathImg.name 

        enviarInfoDepoimento({ nm_depoimento, ds_depoimento, ds_PathImg })
        console.log(ds_PathImg);
    })
})

const enviarInfoDepoimento = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=criadepoimento`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

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