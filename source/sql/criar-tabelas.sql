
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
     cd_Promocao int(11) NOT NULL,
     nm_Promocao varchar(255) NOT NULL,
     ds_PathImg text NOT NULL
);

ALTER TABLE Promocoes
    ADD CONSTRAINT PK_Promocoes
        PRIMARY KEY (cd_Promocao);

--
-- Estrutura da tabela: Lojas
--

CREATE TABLE IF NOT EXISTS Lojas (
     cd_Loja int(11) NOT NULL,
     nm_Loja varchar(255) NOT NULL,
     ds_Endereco varchar(255) NOT NULL,
     cd_Telefone int(11) NOT NULL UNIQUE,
     cd_Celular int(11) NOT NULL UNIQUE
);

ALTER TABLE Lojas
    ADD CONSTRAINT PK_Lojas
        PRIMARY KEY (cd_Loja);

--
-- Estrutura da tabela: Parceiros
--

CREATE TABLE IF NOT EXISTS Parceiros (
     cd_Parceiro int(11) NOT NULL,
     nm_Parceiro varchar(255) NOT NULL,
     ds_PathImg text NOT NULL
);

ALTER TABLE Parceiros
    ADD CONSTRAINT PK_Parceiros
        PRIMARY KEY (cd_Parceiro);

--
-- Estrutura da tabela: Depoimentos
--

CREATE TABLE IF NOT EXISTS Depoimentos (
   cd_Depoimento int(11) NOT NULL,
   nm_Depoimento varchar(255) NOT NULL,
   ds_Depoimento text NOT NULL,
   ds_PathImg text NOT NULL
);

ALTER TABLE Depoimentos
    ADD CONSTRAINT PK_Depoimentos
        PRIMARY KEY (cd_Depoimento);

--
-- Estrutura da tabela: Leads
--

CREATE TABLE IF NOT EXISTS Leads (
     cd_Lead int(11) NOT NULL,
     ds_Email varchar(255) NOT NULL
);

ALTER TABLE Leads
    ADD CONSTRAINT PK_Leads
        PRIMARY KEY (cd_Lead);

--
-- Estrutura da tabela: Usuarios
--

CREATE TABLE IF NOT EXISTS Usuarios (
    cd_Usuario int(11) NOT NULL,
    nm_Usuario varchar(255) NOT NULL,
    nm_Acesso varchar(10) NOT NULL,
    ds_Senha varchar(20) NOT NULL,
    ds_PathImg text NOT NULL
);

ALTER TABLE Usuarios
    ADD CONSTRAINT PK_Usuarios
        PRIMARY KEY (cd_Usuario);