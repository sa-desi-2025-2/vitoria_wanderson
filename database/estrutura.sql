CREATE DATABASE dashboards;

USE dashboards;

CREATE TABLE fabrica (
    id_fab INT AUTO_INCREMENT PRIMARY KEY,
    nome_fabrica VARCHAR(5)
);

CREATE TABLE setor (
    id_set INT AUTO_INCREMENT PRIMARY KEY,
    nome_setor VARCHAR(20),
    id_fabrica INT,
    FOREIGN KEY (id_fabrica) REFERENCES fabrica(id_fab)
);

CREATE TABLE funcionario (
    id_fun INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcionario VARCHAR(30),
    re_funcionario INT(8),
    id_setor INT,
    FOREIGN KEY (id_setor) REFERENCES setor(id_set)
);

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(20),
    email VARCHAR(20),
    senha VARCHAR(20),
    id_funcionario INT,
    admin BIT,
    FOREIGN KEY (id_funcionario) REFERENCES funcionario(id_fun)
);

CREATE TABLE grafico (
    id_grafico INT AUTO_INCREMENT PRIMARY KEY,
    nome_grafico VARCHAR(20),
    tipo_grafico VARCHAR(20),
    data_de_criacao DATE,
    ultima_alteracao DATE,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_usuario)
);

CREATE TABLE dashboard (
    id_dashboard INT PRIMARY KEY AUTO_INCREMENT,
    titulo_dash VARCHAR(30),
    data_criacao DATE,
    data_alteracao DATE
);

CREATE TABLE grafico_dashboard (
    id_grafico_dashboard INT PRIMARY KEY AUTO_INCREMENT,
    id_dash INT,
    id_graf INT,
    FOREIGN KEY (id_dash) REFERENCES dashboard(id_dashboard),
    FOREIGN KEY (id_graf) REFERENCES grafico(id_grafico)
);