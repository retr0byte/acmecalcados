<?php

namespace Source\Class;

use PDO;
use Source\Class\MysqlCRUD;

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
        $mysql = new MysqlCRUD();
        $userId = 0;
        
        $verificaCliente = $mysql->selectFromDB(['cd_Cliente','ds_Email'], 'clientes', 'WHERE ds_Email = ?', [$this->email]);
        $dadosUsuario = $verificaCliente->fetchAll(PDO::FETCH_ASSOC);

        if(count($dadosUsuario) === 0){
            $obterUserId = $mysql->selectFromDB(['AUTO_INCREMENT'],'information_schema.tables','WHERE table_name = ? AND table_schema = ?', ['clientes', 'acme_calcados']);
            $userId = $obterUserId->fetchAll(PDO::FETCH_ASSOC)[0]['AUTO_INCREMENT'];

            $mysql->insertOnDB('clientes',['nm_Cliente','nm_SobrenomeCliente','cd_Telefone','ds_Email'],[$this->nome, $this->sobrenome, $this->telefone, $this->email]);
        }else{
            $userId = intval($dadosUsuario[0]['cd_Cliente']);
            $mysql->updateOnDB('clientes','nm_Cliente = ?, nm_SobrenomeCliente = ?, cd_Telefone = ?', 'cd_Cliente = ?', [$this->nome, $this->sobrenome, $this->telefone, $userId]);
        }

        $mysql->insertOnDB('mensagens', ['cd_Cliente','ds_Assunto','ds_Mensagem'], [$userId, $this->assunto,$this->mensagem]);
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
