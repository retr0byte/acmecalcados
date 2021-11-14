
$(function(){ // equivalente do window.onload
    $('#form_new_promocao').submit(function(e){
        e.preventDefault();

        let nm_promocao = $('#nm_promocao').val()
        let vl_promocao = $('#vl_promocao').val()
        let ds_PathImg = $('input[type=file]').val().split('\\').pop();
        
        enviarInfoPromocao({ nm_promocao, vl_promocao, ds_PathImg })
        console.log(ds_PathImg);
    })
})

const enviarInfoPromocao = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=criapromocao`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

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