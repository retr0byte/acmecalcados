
$(function(){ // equivalente do window.onload
    $('.btn-exclui-promocao').click(function(e){
        let d = $(this).attr('deleteid')
        enviarExcluirPromocao({ d })
    })
})

const enviarExcluirPromocao = obj => {
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=excluipromocao`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelPromocoes.php`)
        }
        else {
            alert('erro')
        }

    }).fail(function(error) {
        alert('Não foi')
        throw new Error(error)
    })
}