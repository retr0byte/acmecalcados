localStorage.setItem('captchaLoaded',false)

function captchaOnSubmit (token) {
    captchaSend(token)
}

function captchaIsLoaded () {
    localStorage.setItem('captchaLoaded',true)
}

function captchaSend(token){
    $.ajax({
        method: "POST",
        url: `${location.origin}/source/Routes/routes.php?action=checkcaptcha`,
        data: { token }
    }).done(function(response) {
        response = JSON.parse(response)

        if(response.success){
            enviarDados()
        }else{
            alert('verificação captcha não foi aceita')
        }

    }).fail(function(error) {
        console.error('não foi possível executar a verificação do captcha')
        throw new Error(error)
    })
}