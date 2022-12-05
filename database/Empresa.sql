DROP DATABASE IF EXISTS empresa;
CREATE DATABASE empresa;
USE empresa;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
     codigo int(10) auto_increment not null,
     nombre varchar(100) not null,
     clave varchar(50) not null,
     rol int(20) not null,
     CONSTRAINT pk_usuarios PRIMARY KEY(codigo),
     CONSTRAINT UC_nombre UNIQUE (nombre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO usuarios VALUES(null,'Maria','maria123',1);
INSERT INTO usuarios VALUES(null,'Pablo','pablo123',1);
INSERT INTO usuarios VALUES(null,'Jacinto','jacinto123',2);
INSERT INTO usuarios VALUES(null,'Luna','luna123',2);
