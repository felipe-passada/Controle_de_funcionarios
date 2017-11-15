create database controle_acesso;
use controle_acesso;

create table `cargo`
(
	id_cargo int primary key auto_increment,
    descricao varchar(100)    
);

create table `funcionario` 
(
	id_func int primary key auto_increment,
	nome varchar (80) NOT NULL,
    email varchar (80) NOT NULL,
    senha varchar (50) NOT NULL,
    id_cargo int,
    FOREIGN KEY(id_cargo) references cargo (id_cargo)
);

create table `tarefa`
(
	id_tarefa int PRIMARY KEY AUTO_INCREMENT,
    id_func int,
    descricao text(500),
    FOREIGN KEY (id_func) references funcionario (id_func)
);
