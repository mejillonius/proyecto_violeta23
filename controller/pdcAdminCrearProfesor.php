<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Profesor.php");



var_dump($_POST);
$bd= new BaseMysql();
$Profesor= new Profesor($_POST['pdcAdminCrearProfesorEmail'],
                    $_POST['pdcAdminCrearProfesorPassword'],
                    $_POST['pdcAdminCrearProfesorNombre'],
                    $_POST['pdcAdminCrearProfesorApellido'],
                    $_POST['pdcAdminCrearProfesorCentro']);
Consultas::createProfesor($bd,$Profesor);
header("Refresh:0; url=".url_base."/pdcadmin");