-- Active: 1681321158373@@127.0.0.1@3306@proyecto
DROP DATABASE IF EXISTS `proyecto`;
CREATE DATABASE  `proyecto`
    DEFAULT CHARACTER SET = `utf8mb4`;
USE `proyecto`;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
    `id`INT(6) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(40) NOT NULL,
    `password`VARCHAR(60) NOT NULL,
    `nombre` VARCHAR (80),
    `recovery_token` VARCHAR(50) NULL,
    PRIMARY KEY (`id`)

);


DROP TABLE IF EXISTS `centro`;
CREATE TABLE `centro` (
    `id`INT(6) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(40) NOT NULL,
    `password`VARCHAR(60) NOT NULL,
    `nombre` VARCHAR (80),
    `recovery_token` VARCHAR(50) NULL,
    PRIMARY KEY (`id`)

);

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
    `email` VARCHAR(40) NOT NULL , 
    `password`VARCHAR(60) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL , 
    `apellido` VARCHAR(80) NOT NULL , 
    `recovery_token` VARCHAR(50) NULL ,
    `id_centro` INT(6) NOT NULL,
    PRIMARY KEY (`email`),
    FOREIGN KEY (`id_centro`) REFERENCES `centro`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB;


DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor`(
    `email`VARCHAR(40) NOT NULL,
    `password`VARCHAR(60) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL , 
    `apellido` VARCHAR(80) NOT NULL , 
    `recovery_token` VARCHAR(50) NULL ,
    `id_centro`INT(6),
    PRIMARY KEY (`email`),
    Foreign Key (`id_centro`) REFERENCES `centro`(`id`) ON DELETE CASCADE
);


DROP TABLE IF EXISTS `practica`;
CREATE TABLE `practica`(
    `id` INT (6) NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR (100) NOT NULL,
    `downloads` INT DEFAULT 0,
    `rating` FLOAT (3,1),
    `guion` LONGTEXT,
    `autor` VARCHAR(40),
    PRIMARY KEY (`id`),
    Foreign Key (`autor`) REFERENCES `profesor`(`email`) ON DELETE SET NULL

);

DROP TABLE IF EXISTS `instancia`;
CREATE TABLE `instancia` (
    `id` INT (6) NOT NULL AUTO_INCREMENT,
    `id_profesor` VARCHAR(40),
    `id_practica` int (6) NOT NULL,
    `creacion` DATE,
    `fecha_limite` DATE,
    `estado` BOOLEAN,
    `url` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    Foreign Key (`id_profesor`) REFERENCES `profesor`(`email`),
    Foreign Key (`id_practica`) REFERENCES `practica`(`id`)
);

DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula`(
    `id_alumno` VARCHAR(40),
    `id_instancia` int(6) NOT NULL,
    `visto` BOOLEAN,
    `completado` BOOLEAN,
    `feedback` TEXT,
    PRIMARY KEY (`id_alumno`,`id_instancia`),
    Foreign Key (`id_instancia`) REFERENCES `instancia`(`id`),
    Foreign Key (`id_alumno`) REFERENCES `alumno`(`email`)
);





