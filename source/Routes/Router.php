<?php

namespace Source\Routes;

use Source\Class\Email;
use Source\Class\EnviarEmail;
use Source\Class\ReCAPTCHA;
use Source\Class\Login;
use Source\Class\Promocoes;
use Source\Class\Depoimentos;
use Source\Class\Parceiros;
use Source\Class\Lojas;
use Source\Class\Usuarios;
use Source\Class\UploadArquivos;
use Source\Class\Lead;

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

    public function validaUsuario($dataPkg): array
    {
        $login = new Login();
        $login->set_nm_usuario($dataPkg['nm_usuario']);
        $login->set_nm_senha($dataPkg['nm_senha']);
        return $login->validaLogin();
    }

    public function sair(): array
    {
        $login = new Login();
        return $login->sair();
    }

    public function criaPromocao($dataPkg): array
    {
        $promocao = new Promocoes();
        $promocao->set_nm_promocao($dataPkg['nm_promocao']);
        $promocao->set_vl_promocao($dataPkg['vl_promocao']);
        $promocao->set_ds_imagem_promocao($dataPkg['ds_PathImg']);
        // $upload = new UploadArquivos($dataPkg['ds_PathImg']);
        // $upload->upload();
        return $promocao->criarPromocao();
    }

    public function excluiPromocao($dataPkg): array
    {
        $promocao = new Promocoes();
        return $promocao->excluirPromocao($dataPkg['d']);  
    }

    public function editaPromocao($dataPkg): array
    {
        $promocao = new Promocoes();
        $promocao->set_nm_promocao($dataPkg['nm_promocao']);
        $promocao->set_vl_promocao($dataPkg['vl_promocao']);
        $promocao->set_ds_imagem_promocao($dataPkg['ds_PathImg']);
        return $promocao->editarPromocao($dataPkg['u']);
    }

    public function criaDepoimento($dataPkg): array
    {
        $depoimento = new Depoimentos();
        $depoimento->set_nm_depoimento($dataPkg['nm_depoimento']);
        $depoimento->set_ds_depoimento($dataPkg['ds_depoimento']);
        $depoimento->set_ds_imagem_depoimento($dataPkg['ds_PathImg']);
        // $upload = new UploadArquivos($dataPkg['ds_PathImg']);
        // $upload->upload();
        return $depoimento->criarDepoimento();
    }

    public function excluiDepoimento($dataPkg): array
    {
        $depoimento = new Depoimentos();
        return $depoimento->excluirDepoimento($dataPkg['d']);
    }

    public function editaDepoimento($dataPkg): array
    {
        $depoimento = new Depoimentos();
        $depoimento->set_nm_depoimento($dataPkg['nm_depoimento']);
        $depoimento->set_ds_depoimento($dataPkg['ds_depoimento']);
        $depoimento->set_ds_imagem_depoimento($dataPkg['ds_PathImg']);
        return $depoimento->editarDepoimento($dataPkg['u']);
    }

    public function criaParceiro($dataPkg): array
    {
        $parceiro = new Parceiros();
        $parceiro->set_nm_parceiro($dataPkg['nm_parceiro']);
        $parceiro->set_ds_imagem_parceiro($dataPkg['ds_PathImg']);
        $upload = new UploadArquivos($dataPkg['ds_PathImg']);
        $upload->upload();
        return $parceiro->criarParceiro();
    }

    public function excluiParceiro($dataPkg): array
    {
       $parceiro = new Parceiros();
       return $parceiro->excluirParceiro($dataPkg['d']);
    }

    public function editaParceiro($dataPkg): array
    {
        $parceiro = new Parceiros();
        $parceiro->set_nm_parceiro($dataPkg['nm_parceiro']);
        $parceiro->set_ds_imagem_parceiro($dataPkg['ds_PathImg']);
        return $parceiro->editarParceiro($dataPkg['u']);
    }

    public function criaLoja($dataPkg): array
    {
        $loja = new Lojas();
        $loja->set_nm_loja($dataPkg['nm_loja']);
        $loja->set_ds_endereco($dataPkg['ds_endereco']);
        $loja->set_cd_telefone($dataPkg['cd_telefone']);
        $loja->set_cd_celular($dataPkg['cd_celular']);
        // $upload = new UploadArquivos($dataPkg['ds_PathImg']);
        // $upload->upload();
        return $loja->criarLoja();
    }

    public function excluiLoja($dataPkg): array
    {
        $loja = new Lojas();
        return $loja->excluirLoja($dataPkg['d']);
    }

    public function editaLoja($dataPkg): array
    {
        $loja = new lojas();
        $loja->set_nm_loja($dataPkg['nm_loja']);
        $loja->set_ds_endereco($dataPkg['ds_endereco']);
        $loja->set_cd_telefone($dataPkg['cd_telefone']);
        $loja->set_cd_celular($dataPkg['cd_celular']);
        return $loja->editarLoja($dataPkg['u']);
    }

    public function editaUsuario($dataPkg): array
    {
        $usuario = new Usuarios();
        $usuario->set_nm_usuario($dataPkg['nm_usuario']);
        $usuario->set_nm_acesso($dataPkg['nm_acesso']);
        $usuario->set_ds_imagem_usuario($dataPkg['ds_PathImg']);
        return $usuario->editarUsuario($dataPkg['u']);
    }

     public function editaSenha($dataPkg): array
    {
        $usuario = new Usuarios();
        $usuario->set_ds_senha($dataPkg['nm_senha_nova']);
        return $usuario->editarSenha($dataPkg['u']);

    }
    
    public function enviarLead($dataPkg): array{
        $lead = new Lead();
        $lead->set_ds_email($dataPkg['nm_email']);
        return $lead->enviarEmail();
    }

}