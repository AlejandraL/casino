CREATE DATABASE casino;
USE casino;

CREATE TABLE player(
id          int(255) auto_increment not null,   
username      varchar(100) not null,
balance    decimal(65) not null,
CONSTRAINT pk_player PRIMARY KEY(id),
)ENGINE=InnoDb;
