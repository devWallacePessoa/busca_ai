create database banco_buscaai;


use banco_buscaai;

create table usuario(
id int auto_increment primary key,
nome varchar(50) not null,
cpf char(11) unique,
data_nasc date not null,
email varchar(50) null unique,
senha varchar(20) not null,
telefone char(13) not null
);

create table loja(
id int auto_increment primary key,
nome varchar(50) not null,
cnpj varchar(14) not null unique,
id_usuario_fk int,
foreign key (id_usuario_fk) references usuario(id)
);

create table endereco(
id int auto_increment primary key,
cep char(8) not null,
rua varchar(50) not null,
bairro varchar(50) not null,
uf char(2) not null,
numero varchar(5) not null,
id_loja_fk int,
foreign key (id_loja_fk) references loja(id)
);

create table produto( 
id int auto_increment primary key,
titulo varchar(50) not null,
categoria varchar(20) not null,
descricao varchar(500) not null, 
hora time not null,
datap date not null
);


create table comentario(
id int auto_increment primary key,
comentario text not null,
id_usuario_comentario_fk int,
id_produto_fk int,
foreign key (id_usuario_comentario_fk) references usuario(id), 
foreign key (id_produto_fk) references produto(id)
);

create table interesse(
id int auto_increment primary key,
id_usuario_interesse_fk int,
id_produto_interesse_fk int,
id_loja_interesse_fk int,
foreign key (id_usuario_interesse_fk) references usuario(id),
foreign key (id_produto_interesse_fk) references produto(id),
foreign key (id_loja_interesse_fk) references loja(id)
);



