
$(function(){ // equivalente do window.onload
    $('#btn-sair').click(function(e){
    // e.preventDefault();
    acaoSair();
    })
})

const acaoSair = obj => {
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=acaosair`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelLogin.php`)
        }
        else {
            alert(response.message);
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}