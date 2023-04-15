-- Active: 1681321158373@@127.0.0.1@3306@proyecto
DROP DATABASE IF EXISTS `proyecto`;
CREATE DATABASE  `proyecto`
    DEFAULT CHARACTER SET = `utf8mb4`;
USE `proyecto`;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
    `id`VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    `password`VARCHAR(50) NOT NULL,
    `nombre` VARCHAR (80),
    `recovery_token` VARCHAR(50) NULL,
    PRIMARY KEY (`id`)

);


DROP TABLE IF EXISTS `centro`;
CREATE TABLE `centro` (
    `id`VARCHAR(40) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    `password`VARCHAR(50) NOT NULL,
    `nombre` VARCHAR (80),
    `recovery_token` VARCHAR(50) NULL,
    PRIMARY KEY (`id`)

);

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
    `email` VARCHAR(40) NOT NULL , 
    `password`VARCHAR(50) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL , 
    `apellido` VARCHAR(80) NOT NULL , 
    `recovery_token` VARCHAR(50) NULL ,
    `id_centro` VARCHAR(40) NOT NULL,
    PRIMARY KEY (`email`),
    FOREIGN KEY (`id_centro`) REFERENCES `centro`(`id`) ON DELETE CASCADE
) ENGINE = InnoDB;


DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor`(
    `email`VARCHAR(40) NOT NULL,
    `password`VARCHAR(50) NOT NULL,
    `nombre` VARCHAR(40) NOT NULL , 
    `apellido` VARCHAR(80) NOT NULL , 
    `recovery_token` VARCHAR(50) NULL ,
    `id_centro`VARCHAR(40),
    PRIMARY KEY (`email`),
    Foreign Key (`id_centro`) REFERENCES `centro`(`id`) ON DELETE CASCADE
);


DROP TABLE IF EXISTS `practica`;
CREATE TABLE `practica`(
    `id` VARCHAR (20) NOT NULL,
    `titulo` VARCHAR (100) NOT NULL,
    `downloads` INT DEFAULT 0,
    `rating` FLOAT (3,1),
    `guion` JSON,
    `autor` VARCHAR(40),
    PRIMARY KEY (`id`),
    Foreign Key (`autor`) REFERENCES `profesor`(`email`) ON DELETE SET NULL

);

DROP TABLE IF EXISTS `instancia`;
CREATE TABLE `instancia` (
    `id` VARCHAR (20) NOT NULL,
    `id_profesor` VARCHAR(40),
    `id_practica` VARCHAR (20) NOT NULL,
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
    `id_instancia` VARCHAR(20) NOT NULL,
    `visto` BOOLEAN,
    `completado` BOOLEAN,
    `feedback` TEXT,
    PRIMARY KEY (`id_alumno`,`id_instancia`),
    Foreign Key (`id_instancia`) REFERENCES `instancia`(`id`),
    Foreign Key (`id_alumno`) REFERENCES `alumno`(`email`)
);

INSERT INTO `admin` (`id`, `email`, `password`, `nombre`, `recovery_token`)
VALUES ('uno', 'liaburns@hotmail.com', 'admin', 'admninistrador', 'r1111');

INSERT INTO `centro` (`id`, `email`, `password`, `nombre`, `recovery_token`) 
VALUES  ('uno', 'centrouno@centro.edu', 'uno', 'centro uno', 'c1111'), 
        ('dos', 'centrodos@centro.edu', 'dos', 'centro dos', 'c2222'),
        ('tres', 'centrotres@centro.edu', 'tres', 'centro tres', 'c3333'),
        ('cuatro', 'centrocuatro@centro.edu', 'cuatro', 'centro cuatro', 'c4444'),
        ('cinco', 'centrocinco@centro.edu', 'cinco', 'centro cinco', 'c5555');


INSERT INTO `alumno` (`email`, `password`, `nombre`, `apellido`, `recovery_token`, `id_centro`)
VALUES  ('alumnounouno@alumno.com', '1111', 'nombre uno', 'apellido uno', 'a1111', 'uno'),
        ('alumnounodos@alumno.com', '2222', 'nombre dos', 'apellido uno', 'a2222', 'uno'),
        ('alumnodosuno@alumno.com', '1111', 'nombre dos', 'apellido uno', 'a3333', 'dos'),
        ('alumnotresuno@alumno.com', '1111', 'nombre tres', 'apellido uno', 'a4444', 'tres'),
        ('alumnotresdos@alumno.com', '2222', 'nombre tres', 'apellido dos', 'a5555', 'tres'),
        ('alumnocuatrouno@alumno.com', '1111', 'nombre cuatro', 'apellido uno', 'a6666', 'cuatro'),
        ('alumnocincouno@alumno.com', '1111', 'nombre cinco', 'apellido uno', 'a7777', 'cinco');

INSERT INTO `profesor` (`email`,`password`,`nombre` , `apellido`, `recovery_token`,`id_centro`)
VALUES  ('profesoruno@profesor.com', '1111', 'nombre uno', 'apellido', 'p1111', 'uno'),
        ('profesordos@profesor.com', '2222', 'nombre dos', 'apellido', 'p2222', 'dos'),
        ('profesortres@profesor.com', '3333', 'nombre tres', 'apellido', 'p3333', 'tres'),
        ('profesorcuatro@profesor.com', '4444', 'nombre cuatro', 'apellido', 'p4444', 'cuatro'),
        ('profesorcinco@profesor.com', '5555', 'nombre cinco', 'apellido', 'p5555', 'cinco');

INSERT INTO `practica`(`id`,`titulo`,`downloads`,`rating`,`guion`,`autor`)
VALUES ('1','evaporacion',0,2.5,'{"guion":"guion"}','profesoruno@profesor.com')




