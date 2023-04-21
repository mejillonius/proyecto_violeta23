<?php

function incluirClases($nomClase)
{
    require_once(__DIR__."/conf/debug.php"); 
    require_once(__DIR__ . "/conf/conf.php");
    

    if (file_exists(__DIR__."/model/".$nomClase.".php")=== true) {
       require_once(__DIR__."/model/".$nomClase.".php");
    } else if (file_exists(__DIR__ . "/controller/" . $nomClase . ".php") === true) {
              require_once(__DIR__ . "/controller/" . $nomClase . ".php");
    } else {
        require_once(__DIR__ . "/views/" . $nomClase . ".php");
    }

    require_once(__DIR__."/testing/Maintest.php");

}

/* if(!isset($_SESSION)){
    session_start();
    } */

spl_autoload_register("incluirClases");

$bd = new BaseMysql();
$tpl = new MontaTpls();
$tpl->montaTpls();

if (TESTDEBUG == true){
    mainTest();
}

/* printvar("sesion", $_SESSION);
printvar("cookie", $_COOKIE); */