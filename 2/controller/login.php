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
    switch ($rol) {
        case 'admin':
            $user = Consultas::getAdmin($bd,$_POST['email']);
            
            # code...
            break;
        case 'alumno':
            $user = Consultas::getAlumno($bd,$_POST['email']);
            #code...
            break;
        case 'profesor':
            $user = Consultas::getProfesor($bd,$_POST['email']);
            #code...
            break;
        case 'centro';
            $user = Consultas::getCentro($bd,$_POST['email']);
            #code...
            break;
    }
    if ($user->checkPassword($_POST['password'])){
        printvar("contraseña correcta");
        $_SESSION['sesionrol'] = $rol;
        setcookie("cookierol", $rol, time()+36,"/");  
        /* expira en 1 hora */
    } else {
        $_SESSION['sesionrol'] = null;
        printvar("la contraseña no es correcta");
        echo json_encode("error");       
    }
    

    echo json_encode($rol);
} else {
    $_SESSION['sesionrol'] = null;
    printvar("respuesta de login: el usuario no existe");
    echo json_encode("error");
}
$bd = null;

header("Refresh:0; url=".url_base);

