
$(function(){ // equivalente do window.onload
    $('.btn-exclui-loja').click(function(e){
        // e.preventDefault();
        let d = $(this).attr('deleteid')
        // console.log(d)
        
        enviarExcluirLoja({ d })
    })
})

const enviarExcluirLoja = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=excluiloja`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            console.log("foi")
            location.replace(`${location.origin}/view/pages/painelLojas.php`)
        }
        else {
            alert('erro')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}