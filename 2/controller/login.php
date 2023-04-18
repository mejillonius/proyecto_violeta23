<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");
require_once('../model/BaseMysql.php');
require_once('../model/Consultas.php');

$bd = new BaseMysql();

printvar("post", $_POST);

if(!isset($_SESSION)){
    session_start();
    }

if (Consultas::userExists($bd,$_POST['email'])){
    printvar("el usuario existe");
    $rol = Consultas::typeOfUser($bd,$_POST['email']);
    printvar("respuesta de login su rol es:",$rol);
    $_SESSION['sesionrol'] = $rol;
    setcookie("cookierol", $rol, time()+36,"/");  
    /* expira en 1 hora */
    echo json_encode($rol);
} else {
    $_SESSION['sesionrol'] = null;
    printvar("respuesta de login: el usuario no existe");
    echo json_encode("error");
}
$bd = null;

header("Refresh:0; url=".url_base);

