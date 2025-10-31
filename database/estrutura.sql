create database dashboards;

use dashboards;


CREATE TABLE fabricas (

     id_fab INT AUTO_INCREMENT PRIMARY KEY,
    nome_fabrica VARCHAR(5)
);

CREATE TABLE setores (

     id_set INT AUTO_INCREMENT PRIMARY KEY,
    nome_setor VARCHAR(20),
    id_fabrica INT,
    FOREIGN KEY (id_fabrica) REFERENCES fabricas(id_fab)
);


CREATE TABLE usuarios (

	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(20),
    email VARCHAR(20),
    RE INT(8),
    senha VARCHAR(20),
    admin BIT,
    id_setor INT,
    FOREIGN KEY (id_setor) REFERENCES setores(id_set)
);


CREATE TABLE graficos (

	id_grafico INT AUTO_INCREMENT PRIMARY KEY,
    nome_grafico VARCHAR(20),
    tipo_grafico VARCHAR(20),
    data_de_criacao DATE,
    ultima_alteracao DATE,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES usuarios(id_usuario)
);


CREATE TABLE dashboards (

	id_dashboard  INT PRIMARY KEY AUTO_INCREMENT,
    titulo_dash VARCHAR(30),
    data_criacao DATE,
    data_alteracao DATE
    
);


CREATE TABLE grafico_dashboard (

	id_dash INT,
    id_graf INT,
    id_grafico_dashboard INT PRIMARY KEY AUTO_INCREMENT,
    FOREIGN KEY (id_dash) REFERENCES Dashboards(id_dashboard),
	FOREIGN KEY (id_graf) REFERENCES Graficos(id_grafico)
    
);
