<?php

namespace Source\Routes;

use Source\Class\Email;
use Source\Class\EnviarEmail;

class Router
{
    public function sendMail($dataPkg): array
    {
        $email = new Email($dataPkg['nome'],$dataPkg['sobrenome'],$dataPkg['telefone'],$dataPkg['email'],$dataPkg['assunto'],$dataPkg['mensagem']);
        $enviar = new EnviarEmail($email);

        return $enviar->get_responseMessage();
    }

}