
$(function(){ // equivalente do window.onload
    $('#form_edit_depoimento').submit(function(e){
        e.preventDefault();
        let nm_depoimento = $('#nm_depoimento').val()
        let ds_depoimento = $('#ds_depoimento').val() 
        let parameter = new URLSearchParams(window.location.search);
        const u = parameter.get("u")

        let photo = document.getElementById("ds_pathimg").files[0];
        let formData = new FormData();

        formData.append("photo", photo);
        enviarEditarDepoimento({ nm_depoimento, ds_depoimento, formData, u })
    })
})

const enviarEditarDepoimento = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        processData: false,
        contentType: false,
        dataType: 'json',
        url: `${location.origin}/source/Routes/routes.php?action=editadepoimento&n=${btoa(obj.nm_depoimento)}&v=${btoa(obj.ds_depoimento)}&u=${btoa(obj.u)}`,
        data: obj.formData
    }).done(function(response) {

        if(response.status === 200) {
            console.log("foi")
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