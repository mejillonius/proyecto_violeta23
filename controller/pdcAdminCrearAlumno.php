<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Alumno.php");



var_dump($_POST);
$bd= new BaseMysql();
$alumno= new Alumno($_POST['pdcAdminCrearAlumnoEmail'],
                    $_POST['pdcAdminCrearAlumnoPassword'],
                    $_POST['pdcAdminCrearAlumnoNombre'],
                    $_POST['pdcAdminCrearAlumnoApellido'],
                    $_POST['pdcAdminCrearAlumnoCentro']);
Consultas::createAlumno($bd,$alumno);
header("Refresh:5; url=".url_base."/pdcadmin");