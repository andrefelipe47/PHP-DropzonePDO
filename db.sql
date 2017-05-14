CREATE DATABASE dropzone;
USE dropzone;

CREATE TABLE arquivos (
    codigo int unsigned not null auto_increment,
    nome_original varchar(255) not null,
    nome_unico char(40) not null,
    extensao varchar(4) not null,
    size_kb int(7) not null,
    data_upload datetime not null,
    primary key(codigo)
);