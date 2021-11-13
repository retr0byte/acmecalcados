<?php

namespace Source\Routes;

use Source\Class\Email;
use Source\Class\EnviarEmail;
use Source\Class\ReCAPTCHA;

class Router
{
    public function sendMail($dataPkg): array
    {
        $email = new Email($dataPkg['nome'],$dataPkg['sobrenome'],$dataPkg['telefone'],$dataPkg['email'],$dataPkg['assunto'],$dataPkg['mensagem']);
        $enviar = new EnviarEmail($email);

        return $enviar->get_responseMessage();
    }

    public function checkcaptcha($captchaUserToken): string{
        $recaptcha = new ReCAPTCHA($captchaUserToken);
        return $recaptcha->check();
    }

}