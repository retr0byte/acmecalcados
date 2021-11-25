--
-- Estrutura da tabela: Promoções
--

CREATE TABLE IF NOT EXISTS Promocoes (
     cd_promocao serial PRIMARY KEY ,
     nm_promocao varchar(255) NOT NULL,
     vl_promocao decimal(10,2) NOT NULL,	
     ds_pathimgabsoluto text NOT NULL,
     ds_pathimg text NOT NULL
);


--
-- Estrutura da tabela: Lojas
--

CREATE TABLE IF NOT EXISTS Lojas (
     cd_loja serial PRIMARY KEY ,
     nm_loja varchar(255) NOT NULL,
     ds_endereco varchar(255) NOT NULL,
     cd_telefone varchar(15) NOT NULL UNIQUE,
     cd_celular varchar(15) NOT NULL UNIQUE
);

--
-- Estrutura da tabela: Parceiros
--

CREATE TABLE IF NOT EXISTS Parceiros (
     cd_parceiro serial PRIMARY KEY ,
     nm_parceiro varchar(255) NOT NULL,
     ds_pathimgabsoluto text NOT NULL,
     ds_pathimg text NOT NULL
);

--
-- Estrutura da tabela: Depoimentos
--

CREATE TABLE IF NOT EXISTS Depoimentos (
   cd_depoimento serial PRIMARY KEY ,
   nm_depoimento varchar(255) NOT NULL,
   ds_depoimento text NOT NULL,
   ds_pathimgabsoluto text NOT NULL,
   ds_pathimg text NOT NULL
);

--
-- Estrutura da tabela: Leads
--

CREATE TABLE IF NOT EXISTS Leads (
     cd_lead serial PRIMARY KEY,
     ds_email varchar(255) NOT NULL
);

--
-- Estrutura da tabela: Usuarios
--

CREATE TABLE IF NOT EXISTS Usuarios (
    cd_usuario serial PRIMARY KEY ,
    nm_usuario varchar(255) NOT NULL,
    nm_acesso varchar(10) NOT NULL,
    ds_senha varchar(20) NOT NULL,
    ds_pathimgabsoluto text NOT NULL,
    ds_pathimg text NOT NULL
);

--
-- Estrutura da tabela: Clientes
--

CREATE TABLE IF NOT EXISTS Clientes (
    cd_cliente serial PRIMARY KEY ,
    nm_cliente varchar(50) NOT NULL,
    nm_sobrenomecliente varchar(50) NOT NULL,
    cd_telefone varchar(15) NOT NULL,
    ds_email varchar(255) NOT NULL UNIQUE
);

--
-- Estrutura da tabela: Mensagens
--

CREATE TABLE IF NOT EXISTS Mensagens (
    cd_mensagem serial PRIMARY KEY ,
    cd_cliente int NOT NULL,
    ds_assunto varchar(255) NOT NULL,
    ds_mensagem text NOT NULL,
    CONSTRAINT FK_Clientes
    FOREIGN KEY (cd_cliente)
    REFERENCES Clientes (cd_cliente)
);

insert into usuarios (nm_usuario, nm_acesso, ds_senha, ds_pathimgabsoluto, ds_pathimg) values ('admin','admin','Admin@2021','','');