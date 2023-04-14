<?php
echo(LOADDEBUG?"Debug loader Maintest <br> ":"");
/* TODO: 
    test de existencia de usuario
    test de tipo de usuario
    test de admin
    test de alumno
    test de Aula
    test de centro
    test de Instancia
    test de Practica
    test de Profesor

     */

     

    function testAlumno(){
        $bd = new BaseMysql();
        $alumno = Alumno::getAlumno($bd,"alumnotresdos@alumno.com");
        printvar($alumno);
        
    }