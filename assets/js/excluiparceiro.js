
$(function(){ // equivalente do window.onload
    $('.btn-exclui-parceiro').click(function(e){
        // e.preventDefault();
        

        let d = $(this).attr('deleteid')
        console.log(d)
        
        enviarExcluirParceiro({ d })
        
    })
})

const enviarExcluirParceiro = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=excluiparceiro`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelParceiros.php`)
        }
        else {
            alert('erro')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}