<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Alumno.php");



var_dump($_POST);
$bd= new BaseMysql();
$alumno= new Alumno($_POST['pdcCentroCrearAlumnoEmail'],
                    $_POST['pdcCentroCrearAlumnoPassword'],
                    $_POST['pdcCentroCrearAlumnoNombre'],
                    $_POST['pdcCentroCrearAlumnoApellido'],
                    $_POST['pdcCentroCrearAlumnoCentro']);
Consultas::createAlumno($bd,$alumno);
header("Refresh:5; url=".url_base."/pdccentro");