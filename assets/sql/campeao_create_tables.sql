

CREATE TABLE usuario(
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL,
    status TINYINT(1) NOT NULL
);

CREATE TABLE aula(
    idaula INT PRIMARY KEY AUTO_INCREMENT,
    id_materia INT NOT NULL,
    id_usuario INT NOT NULL,
    assunto VARCHAR(50) NOT NULL,
    data DATETIME NOT NULL,
    status TINYINT(1) NOT  NULL

);

CREATE TABLE materia(
    idmateria INT PRIMARY KEY AUTO_INCREMENT,
    nome_materia VARCHAR(50) NOT NULL UNIQUE,
    id_usuario INT NOT NULL
);

ALTER TABLE aula
ADD CONSTRAINT fk_usuario_aula
FOREIGN KEY (id_usuario) 
REFERENCES usuario(idusuario);

ALTER TABLE aula
ADD CONSTRAINT fk_materia_aula
FOREIGN KEY (id_materia) 
REFERENCES materia(idmateria);

ALTER TABLE materia
ADD CONSTRAINT fk_usuario_materia
FOREIGN KEY (id_usuario) 
REFERENCES usuario(idusuario);