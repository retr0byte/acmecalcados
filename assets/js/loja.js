
$(function(){ // equivalente do window.onload
    $('#form_new_loja').submit(function(e){
        e.preventDefault();

        let nm_loja = $('#nm_loja').val()
        let ds_endereco = $('#ds_endereco').val()
        let cd_telefone = $('#cd_telefone').val()
        let cd_celular = $('#cd_celular').val()

        enviarInfoLoja({ nm_loja, ds_endereco, cd_telefone, cd_celular })
        
    })
})

const enviarInfoLoja = obj => {
    console.log(obj)
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=crialoja`,
        data: { dataPkg: obj }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.status === 200) {
            location.replace(`${location.origin}/view/pages/painelLojas.php`)
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