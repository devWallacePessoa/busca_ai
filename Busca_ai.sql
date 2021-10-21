create database Busca_ai;


use Busca_ai;

create table Usuario(
id int auto_increment primary key,
Nome varchar(50) not null,
Data_nasc date,
Email varchar(50) null,
Senha varchar(20) not null,
Telefone varchar(12)
);

create table Loja(
id int auto_increment primary key,
Nome varchar(50) not null,
cnpj varchar(14) not null,
id_usuario_FK unique,
foreign key (id_usuario_FK) references Usuario(id)
);

create table Endereco(
id int auto_increment primary key,
CEP char(8) not null,
Rua varchar(50) not null,
Bairro varchar(50) not null,
UF char(2),
Numero varchar(5),
id_loja_FK int,
foreign key (id_loja_FK) references Loja(id)
);

create table Produto( 
id int auto_increment primary key,
Titulo varchar(50) not null,
Categoria varchar(20) not null,
Descricao varchar(500) not null, 
hora time not null,
dataP date not null
);





create table Comentario(
id int auto_increment primary key,
comentario text not null,
id_usuario_comentario_FK int,
id_produto_FK int,
foreign key (id_usuario_comentario_FK) references Usuario(id), 
foreign key (id_produto_fk) references Produto(id)
);