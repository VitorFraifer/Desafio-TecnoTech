CREATE DATABASE "TecnoTech"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LOCALE_PROVIDER = 'libc'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


CREATE SCHEMA "TecnoTech"
AUTHORIZATION postgres;

-- CRIANDO TABLEA DE ASSOCIADOS
CREATE TABLE "TecnoTech".associados
(
    nome name,
    email name,
    cpf numeric,
    "data-filiacao" date
);

ALTER TABLE IF EXISTS "TecnoTech".associados
    OWNER to postgres;

-- CRIANDO TABELA DE ANUIDADES
CREATE TABLE "TecnoTech".anuidades
(
    ano numeric,
    valor numeric
);

ALTER TABLE IF EXISTS "TecnoTech".anuidades
    OWNER to postgres;

-- Coluna ID para tabela Associados
ALTER TABLE "TecnoTech".associados ADD id serial NOT NULL;
ALTER TABLE "TecnoTech".associados ADD CONSTRAINT associados_pk PRIMARY KEY (id);

-- Coluna ID para tabela Anuidades
ALTER TABLE "TecnoTech".anuidades ADD id serial NOT NULL;
ALTER TABLE "TecnoTech".anuidades ADD CONSTRAINT associados_pk PRIMARY KEY (id);
