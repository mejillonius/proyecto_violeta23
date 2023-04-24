<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Profesor.php");



var_dump($_POST);
$bd= new BaseMysql();
$Profesor= new Profesor($_POST['pdcCentroCrearProfesorEmail'],
                    $_POST['pdcCentroCrearProfesorPassword'],
                    $_POST['pdcCentroCrearProfesorNombre'],
                    $_POST['pdcCentroCrearProfesorApellido'],
                    $_POST['pdcCentroCrearProfesorIdCentro']);
printvar($Profesor);
Consultas::createProfesor($bd,$Profesor);
header("Refresh:0; url=".url_base."/pdccentro");

