<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Alumno.php");



var_dump($_POST);
$bd= new BaseMysql();
$alumno= new Alumno($_POST['pdcCentroModificarAlumnoEmail'],
                    $_POST['pdcCentroModificarAlumnoPassword'],
                    $_POST['pdcCentroModificarAlumnoNombre'],
                    $_POST['pdcCentroModificarAlumnoApellido'],
                    $_POST['pdcCentroModificarAlumnoCentro']);
Consultas::updateAlumno($bd,$alumno);
header("Refresh:0; url=".url_base."/pdccentro");