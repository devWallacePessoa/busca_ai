create database Busca_ai;


use Busca_ai;

create table usuario(
id int auto_increment primary key,
nome varchar(50) not null,
data_nasc date not null,
email varchar(50) not null,
senha varchar(20) not null,
telefone varchar(12) not null
);

create table loja(
id int auto_increment primary key,
nome varchar(50) not null,
cnpj varchar(14) not null unique,
id_usuario_FK int not null,
foreign key (id_usuario_FK) references Usuario(id)
);

create table endereco(
id int auto_increment primary key,
cep char(8) not null,
rua varchar(50) not null,
bairro varchar(50) not null,
uf char(2) not null,
numero varchar(5) not null,
id_loja_FK int not null,
foreign key (id_loja_FK) references Loja(id)
);

create table produto( 
id int auto_increment primary key,
titulo varchar(50) not null,
categoria varchar(20) not null,
descricao varchar(500) not null, 
id_loja_prod_FK int not null,
hora time not null,
dataP date not null,
foreign key (id_loja_prod_FK) references Loja(id)
);





create table comentario(
id int auto_increment primary key,
comentario text not null,
id_usuario_comentario_FK int not null,
id_produto_FK int not null,
foreign key (id_usuario_comentario_FK) references Usuario(id), 
foreign key (id_produto_fk) references Produto(id)
);
