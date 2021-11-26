$(function(){ // equivalente do window.onload
    $('#form_newsletter').submit(function(e){
        e.preventDefault();

        let nm_email = $('#nm_email').val()
        
        enviarInfoLead({ nm_email })
    })
})

const enviarInfoLead = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=crialead`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            location.replace(`${location.origin}/index.php`)
        }

    }).fail(function(error) {
        alert('NÃ£o foi')
        throw new Error(error)
    })
}