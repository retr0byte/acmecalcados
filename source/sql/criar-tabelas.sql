
--
-- Cria o BD caso não exista
--

CREATE DATABASE IF NOT EXISTS acme_calcados
    DEFAULT CHARSET=utf8mb4;

--
-- Define qual BD vamos utilizar:
--

use acme_calcados;

--
-- Estrutura da tabela: Promoções
--

CREATE TABLE IF NOT EXISTS Promocoes (
     cd_Promocao int(11) AUTO_INCREMENT NOT NULL,
     nm_Promocao varchar(255) NOT NULL,
     ds_PathImg text NOT NULL,
     PRIMARY KEY (cd_Promocao)
);


--
-- Estrutura da tabela: Lojas
--

CREATE TABLE IF NOT EXISTS Lojas (
     cd_Loja int(11) AUTO_INCREMENT NOT NULL,
     nm_Loja varchar(255) NOT NULL,
     ds_Endereco varchar(255) NOT NULL,
     cd_Telefone int(11) NOT NULL UNIQUE,
     cd_Celular int(11) NOT NULL UNIQUE,
     PRIMARY KEY (cd_Loja)
);

--
-- Estrutura da tabela: Parceiros
--

CREATE TABLE IF NOT EXISTS Parceiros (
     cd_Parceiro int(11) AUTO_INCREMENT NOT NULL,
     nm_Parceiro varchar(255) NOT NULL,
     ds_PathImg text NOT NULL,
     PRIMARY KEY (cd_Parceiro)
);

--
-- Estrutura da tabela: Depoimentos
--

CREATE TABLE IF NOT EXISTS Depoimentos (
   cd_Depoimento int(11) AUTO_INCREMENT NOT NULL,
   nm_Depoimento varchar(255) NOT NULL,
   ds_Depoimento text NOT NULL,
   ds_PathImg text NOT NULL,
   PRIMARY KEY (cd_Depoimento)
);

--
-- Estrutura da tabela: Leads
--

CREATE TABLE IF NOT EXISTS Leads (
     cd_Lead int(11) AUTO_INCREMENT NOT NULL,
     ds_Email varchar(255) NOT NULL,
     PRIMARY KEY (cd_Lead)
);

--
-- Estrutura da tabela: Usuarios
--

CREATE TABLE IF NOT EXISTS Usuarios (
    cd_Usuario int(11) AUTO_INCREMENT NOT NULL,
    nm_Usuario varchar(255) NOT NULL,
    nm_Acesso varchar(10) NOT NULL,
    ds_Senha varchar(20) NOT NULL,
    ds_PathImg text NOT NULL,
    PRIMARY KEY (cd_Usuario)
);

--
-- Estrutura da tabela: Clientes
--

CREATE TABLE IF NOT EXISTS Clientes (
    cd_Cliente int(11) AUTO_INCREMENT NOT NULL,
    nm_Cliente varchar(50) NOT NULL,
    nm_SobrenomeCliente varchar(50) NOT NULL,
    cd_Telefone varchar(15) NOT NULL,
    ds_Email varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY (cd_Cliente)
);

--
-- Estrutura da tabela: Mensagens
--

CREATE TABLE IF NOT EXISTS Mensagens (
    cd_Mensagem int(11) AUTO_INCREMENT NOT NULL,
    cd_Cliente int(11) NOT NULL,
    ds_Assunto varchar(255) NOT NULL,
    ds_Mensagem text NOT NULL,
    PRIMARY KEY (cd_Mensagem),
    CONSTRAINT FK_Clientes
    FOREIGN KEY (cd_Cliente)
    REFERENCES Clientes (cd_Cliente)
);