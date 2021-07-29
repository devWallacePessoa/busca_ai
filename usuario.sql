create database buscaai;

use buscaai;

create table usuario(
id_usuario int AUTO_INCREMENT PRIMARY KEY,
nome varchar(250),
email varchar(250),
telefone char(11),
senha varchar(50),
cpf char(14),
datadenasc date,
cep char(8),
estado varchar(50),
cidade varchar(50),
bairro varchar(50),
rua varchar(50),
numero varchar(10)
);
