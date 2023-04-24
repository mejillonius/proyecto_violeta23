<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Centro.php");



var_dump($_POST);
$bd= new BaseMysql();
$Centro= new Centro(null,
                    $_POST['pdcAdminCrearCentroEmail'],
                    $_POST['pdcAdminCrearCentroPassword'],
                    $_POST['pdcAdminCrearCentroNombre']);
Consultas::createProfesor($bd,$Centro);
header("Refresh:0; url=".url_base."/pdcadmin");