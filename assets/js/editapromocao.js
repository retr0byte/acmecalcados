
$(function(){ // equivalente do window.onload
    $('#form_edit_promocao').submit(function(e){
        e.preventDefault();
        let nm_promocao = $('#nm_promocao').val()
        let vl_promocao = $('#vl_promocao').val()
        let ds_PathImg = $('input[type=file]')[0].files[0];
        ds_PathImg = ds_PathImg.name 
        let parameter = new URLSearchParams(window.location.search);
        const u = parameter.get("u")

        enviarEditarPromocao({ nm_promocao, vl_promocao, ds_PathImg, u })
    })
})

const enviarEditarPromocao = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=editapromocao`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
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