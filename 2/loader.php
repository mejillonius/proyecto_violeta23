<?php

function incluirClases($nomClase)
{
    require_once(__DIR__."/conf/debug.php"); 
    require_once(__DIR__ . "/conf/conf.php");
        if (file_exists(__DIR__."/model/".$nomClase.".php")=== true) {
            require_once(__DIR__."/model/".$nomClase.".php");
        } else if (file_exists(__DIR__ . "/controller/" . $nomClase . ".php") === true) 
        {
            require_once(__DIR__ . "/controller/" . $nomClase . ".php");
        } else {
            require_once(__DIR__ . "/views/" . $nomClase . ".php");
        }
}

spl_autoload_register("incluirClases");

$bd = new BaseMysql();
$tpl = new MontaTpls();
$tpl->montaTpls();
echo(User::userExists($bd,"centrocinco@centro.edu")?"existe":"no existe");
var_dump(User::getProfesor($bd,"profesorcinco@profesor.com"));