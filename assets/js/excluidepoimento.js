
$(function(){ // equivalente do window.onload
    $('.btn-exclui-depoimento').click(function(e){
        // e.preventDefault();
        

        let d = $(this).attr('deleteid')
        console.log(d)
        
        enviarExcluirDepoimento({ d })
        
    })
})

const enviarExcluirDepoimento = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=excluidepoimento`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelDepoimentos.php`)
        }
        else {
            alert('erro')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}