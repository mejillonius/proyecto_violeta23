<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Alumno.php");



var_dump($_POST);
$bd= new BaseMysql();


Consultas::deleteAlumno($bd,$_POST['pdcProfesorModificarAlumnoEmail']);
header("Refresh:0; url=".url_base."/pdcprofesor");