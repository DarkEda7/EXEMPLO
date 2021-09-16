create database biblioteca;
use biblioteca;
create table generos(
    id int auto_increment primary key,
    nome varchar(225) not null
);
create table livros (
    id int auto_increment primary key,
    titulo varchar(225) not null,
    id_genero int not null,
    foreign key (id_genero) references generos(id) 
);