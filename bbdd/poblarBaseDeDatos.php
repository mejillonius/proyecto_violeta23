<?php

require_once("./../conf/debug.php");
require_once("./../conf/conf.php");
require_once("./../model/BaseMysql.php");
require_once("./../model/Consultas.php");
require_once("./../controller/Admin.php");
require_once("./../controller/Alumno.php");
require_once("./../controller/Aula.php");
require_once("./../controller/Centro.php");
require_once("./../controller/Instancia.php");
require_once("./../controller/Practica.php");
require_once("./../controller/Profesor.php");

$bd = new BaseMysql();
/* $jsonURL = 'https://randomuser.me/api/';
$json = json_decode(file_get_contents($jsonURL),true);

//  printvar($json['results'][0]); 


//printvar($json['results'][0]['email'],$json['results'][0]['login']['password'],$json['results'][0]['name']['first'],$json['results'][0]['name']['last'],'uno');
$alumno = new Alumno($json['results'][0]['email'],$json['results'][0]['login']['password'],$json['results'][0]['name']['first'],$json['results'][0]['name']['last'],'uno');
printvar(Consultas::createAlumno($bd,$alumno)); */

$numeroDeAdmins = 5;
$numeroDeCentros = 25;
$numeroDeProfesores = 10;
$numeroDeAlumnos = 300;

echo("<h1>se va a poblar la base de datos, este proceso tarda un rato y requiere conexion a internet</h1>");
sleep(5);


/* CREANDO ADMINS */
printvar("admins");
$passwordadmin = "admin";
$adminobj = new Admin(null,'admin@admin.com',$passwordadmin,'administrador');
if(Consultas::userExists($bd,'admin@admin.com') == false){
    printvar("insert:", Consultas::createAdmin($bd,$adminobj));
} else {
    printvar("el usuario ya existe");
}
 $jsonadmin = json_decode(file_get_contents('https://randomuser.me/api/?results='.$numeroDeAdmins),true);

foreach ($jsonadmin['results'] as $admin) {
    $adminobj = new Admin(null,$admin['email'],$admin['login']['password'],$admin['name']['first']);
    if(Consultas::userExists($bd,$admin['email']) == false){
        printvar("insert:", Consultas::createAdmin($bd,$adminobj));
    } else {
        printvar("el usuario ya existe");
    }
}

/* CREANDO CENTROS */
printvar("centros");
$centroobj = new Centro(null,'centro@centro.com','centro','centro de ejemplo');
if(Consultas::userExists($bd,'centro@centro.com') == false){
    printvar("insert:", Consultas::createCentro($bd,$centroobj));
} else {
    printvar("el centro ya existe");
}

$jsoncentro = json_decode(file_get_contents('https://randomuser.me/api/?results='.$numeroDeCentros),true);
printvar(gettype($jsoncentro));
foreach ($jsoncentro['results'] as $centro) {
    $centroobj = new Admin(null,$centro['email'],$centro['login']['password'],'nuestra señora de'.$centro['name']['first']);
    if(Consultas::userExists($bd,$centro['email']) == false){
        printvar("insert:", Consultas::createcentro($bd,$centroobj));
    } else {
        printvar("el centro ya existe");
    }
} 

/* CREANDO PROFESORES */
 printvar("profesores");
$profesorobj = new Profesor('profesor@profesor.com','profesor', 'profe', 'sor', 1);
if(Consultas::userExists($bd,'profesor@profesor.com') == false){
    printvar("insert:", Consultas::createProfesor($bd,$profesorobj));
} else {
    printvar("el profesor ya existe");
}
$jsonprofesor = json_decode(file_get_contents('https://randomuser.me/api/?results='.$numeroDeProfesores*$numeroDeCentros),true);
printvar(gettype($jsonprofesor));
$i = 1;
foreach ($jsonprofesor['results'] as $profesor) {
    $profesorobj = new Profesor($profesor['email'],$profesor['login']['password'],$profesor['name']['first'],$profesor['name']['last'],$i);
    if(Consultas::userExists($bd,$profesor['email']) == false){
        printvar("insert:", Consultas::createProfesor($bd,$profesorobj));
    } else {
        printvar("el profesor ya existe");
    }
    if ($i > $numeroDeCentros){
        $i = 1;
    } else {
        $i++;
    }
}


/* CREANDO ALUMNOS */
printvar("alumnos");
$alumnoobj = new Alumno('alumno@alumno.com','alumno', 'alumno', 'ejemplo', 1);
if(Consultas::userExists($bd,'alumno@alumno.com') == false){
    printvar("insert:", Consultas::createAlumno($bd,$alumnoobj));
} else {
    printvar("el alumno ya existe");
}
$jsonalumno = json_decode(file_get_contents('https://randomuser.me/api/?results=5000'),true); 
printvar(gettype($jsonalumno));
$i=1; 
foreach ($jsonalumno['results'] as $alumno) {
    $alumnoobj = new Alumno($alumno['email'],$alumno['login']['password'],$alumno['name']['first'],$alumno['name']['last'],$i);
    if(Consultas::userExists($bd,$alumno['email']) == false){
        printvar("insert:", Consultas::createAlumno($bd,$alumnoobj));
    } else {
        printvar("el alumno ya existe");
    }
    if ($i > $numeroDeCentros){
        $i = 1;
    } else {
        $i++;
    }
}
