
$(function(){ // equivalente do window.onload
    $('#form_new_parceiro').submit(function(e){
        e.preventDefault();

        const fileInput = document.querySelector("#ds_PathImg");
        
        let nm_parceiro = $('#nm_parceiro').val()
        let formData = new FormData();
        let files = $('ds_PathImg')
        formData.append("file", files)

        fileInput.addEventListener("change", event => {
            const files = event.target.files[0];
        });
        enviarInfoParceiro({ nm_parceiro, files})

        // enviarInfoParceiro({ nm_parceiro, formData })
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