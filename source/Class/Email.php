<?php

namespace Source\Class;

use PDO;
use Source\Class\PostgreSqlCRUD;

class Email
{
    private string $nome;
    private string $sobrenome;
    private string $telefone;
    private string $email;
    private string $assunto;
    private string $mensagem;

    public function __construct(string $nome, string $sobrenome, string $telefone, string $email, string $assunto, string $mensagem)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;

        $this->salvarEmail();
    }

    private function salvarEmail(): void{
        $pgsql = new PostgreSqlCRUD();
        $userId = 0;
        
        $verificaCliente = $pgsql->selectFromDB(['cd_cliente','ds_email'], 'clientes', 'WHERE ds_email = ?', [$this->email]);
        $dadosUsuario = $verificaCliente->fetchAll(PDO::FETCH_ASSOC);

        if(count($dadosUsuario) === 0){
            $pgsql->insertOnDB('clientes',['nm_cliente','nm_sobrenomecliente','cd_telefone','ds_email'],[$this->nome, $this->sobrenome, $this->telefone, $this->email]);

            $obterUserId = $pgsql->selectFromDB(['cd_cliente'], 'clientes', 'WHERE ds_email = ?', [$this->email]);
            $userId = $obterUserId->fetchAll(PDO::FETCH_ASSOC)[0]['cd_cliente'];
        }else{
            $userId = intval($dadosUsuario[0]['cd_cliente']);
            $pgsql->updateOnDB('clientes','nm_cliente = ?, nm_sobrenomecliente = ?, cd_telefone = ?', 'cd_cliente = ?', [$this->nome, $this->sobrenome, $this->telefone, $userId]);
        }

        $pgsql->insertOnDB('mensagens', ['cd_cliente','ds_assunto','ds_mensagem'], [$userId, $this->assunto,$this->mensagem]);
    }

    public function acessarInfoEmail(): array{
        return [
          "userInfo"=>[
              "nome"=>$this->nome,
              "sobrenome"=>$this->sobrenome,
              "telefone"=>$this->telefone,
              "email"=>$this->email,
          ],
          "assunto"=>$this->assunto,
          "mensagem"=>$this->mensagem,
        ];
    }


}
