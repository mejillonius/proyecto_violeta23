<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once("../model/BaseMysql.php");
require_once("../model/Consultas.php");
require_once("../controller/Practica.php");

$str_json = file_get_contents('php://input');
$str_json = json_decode($str_json,true);
$practica = New Practica(null,$str_json[1],0,0,json_encode($str_json[2]),$str_json[0]);

if(Consultas::createPractica(New BaseMysql(),$practica)== 1){
    echo "Grabado con exito";
} else {
    echo "ha habido un problema";
}
