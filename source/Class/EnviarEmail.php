<?php

namespace Source\Class;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class EnviarEmail
{
    private array $emailInfo;
    private string $fromEmail = FROM_EMAIL;
    private string $fromName = FROM_NAME;
    private string $smtpHost = SMTP_HOST;
    private string $smtpPort = SMTP_PORT;
    private string $smtpUsername = SMTP_USERNAME;
    private string $smtpUserpasswd = SMTP_PASSWORD;
    private string | array $responseMessage;

    public function __construct(Email $email)
    {
        $this->emailInfo = $email->acessarInfoEmail();

        $this->enviar(
            $this->fromEmail,
            $this->fromName,
            $this->emailInfo['assunto'],
            $this->emailInfo['mensagem'],
            [ $this->emailInfo['userInfo']['email'] ],
        );
    }

    public function enviar($from_email, $from_name, $subject, $message_body, $to, $attach=[], $cc=[], $bcc=[], $messageID='', $references=''): void{
        try {
            $email = new PHPMailer(true);

            // SERVER SETTINGS - apenas para o local (comentar quando subir para a produção)
             $email->Host = $this->smtpHost; // SMTP server
             $email->Port = $this->smtpPort;
             $email->SMTPAuth = true;
             $email->isSMTP();
             $email->SMTPSecure = "ssl";
             $email->Username = $this->smtpUsername; // user do seu email - precisa habilitar o acesso a apps menos seguros na conta do google
             $email->Password = $this->smtpUserpasswd; // senha do seu email
             //$email->SMTPDebug = 3; //Verificar log de erros detalhados caso haja algum
            // END - SERVER SETTINGS

            // CONTENT
            $email->isHTML();
            $email->setLanguage("br");
            $email->CharSet = "utf-8";

            $email->setFrom($from_email, $from_name, false);
            $email->Subject   = $subject;
            $email->Body      = $message_body;

            for ($i=0; $i < count($to); $i++) {
                if($to[$i] != '')
                    $email->AddAddress( $to[$i] );
            }

            for ($i=0; $i < count($cc); $i++) {
                if($cc[$i] != '')
                    $email->addCC( $cc[$i] ); // com copia
            }

            for ($i=0; $i < count($bcc); $i++) {
                if($bcc[$i] != '')
                    $email->addBCC( $bcc[$i] ); // com copia oculta é igual ao Cco
            }

            if(!empty($messageID)){
                $email->addCustomHeader('In-Reply-To', $messageID);
                $email->addCustomHeader('References', $references.' '.$messageID);
            }

            for ($i=0; $i < count($attach); $i++) {
                if($attach[$i] !== '' && count($attach[$i]) === 3){
                    $filePath = $attach[$i][0];
                    $fileName = $attach[$i][1];
                    $fileType = $attach[$i][2];

                    if($fileName === '' || $fileType === '')
                        $this->responseMessage = [
                            'status'=> 415,
                            'message'=>'Alguns anexos estão sem nome e/ou extensão'
                        ];

                    $email->AddAttachment( $filePath , $fileName.$fileType );
                }
            }

            if($email->Send())
                $this->responseMessage = [
                    'status'=> 200,
                    'message'=>"Email enviado com sucesso!"
                ];

        } catch (Exception $th) {
            $this->responseMessage = [
                'status'=> 500,
                "message"=>"Message could not be sent. Mailer Error: {$email->ErrorInfo}"
            ];
        }
    }

    public function get_responseMessage(): string | array {
        return $this->responseMessage;
    }



}