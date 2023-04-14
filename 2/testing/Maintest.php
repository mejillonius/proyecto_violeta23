<?php
echo(LOADDEBUG?"Debug loader Maintest <br> ":"");
/* TODO: 
    test de existencia de usuario
    test de tipo de usuario
    test de admin
    test de alumno CRUD
    test de Aula
    test de centro
    test de Instancia
    test de Practica
    test de Profesor

     */
    $adminTestValido = new Admin("idtest", "admin@test.com", "test", "test");
    $alumnoTestValido = new Alumno("alumno@test.com","test","alumno","test","uno");
    $aulaTestValido = new Aula("alumno@test.com","idtest", true, true, "feedback test");
    $centroTestvalido = new Centro("idtest", "centro@test.com", "test", "test");
    $instanciaTestValido = new Instancia("idtest", "profesor@test.com", "idtest", "01/01/2019", "01/01/2019", 4, "testURL");
    $practicaTestValido = new Practica("idtest", "titulo test", 5, 5, "guiontest", "profesor@test.com");
    $profesorTestValido = new Profesor("profesor@test.com","test","alumno","test","uno");
     

    function testAlumno(){
        $bd = new BaseMysql();
        $alumnoTestValido = new Alumno("alumno@test.com","test","alumno","test","uno");

        printvar("test create alumno");
        printvar($alumnoTestValido);
        printvar(Alumno::createAlumno($bd,$alumnoTestValido));
        printvar(Alumno::getAlumno($bd,"alumno@test.com"));

        printvar("test get alumno");
        $alumno = Alumno::getAlumno($bd,"alumno@test.com");
        printvar($alumno);

        printvar("test update alumno");
        $alumnoUpdate = $alumnoTestValido->setNombre("update");
        $alumnoUpdate = $alumnoTestValido->setApellido("update");
        printvar(Alumno::updateAlumno($bd,$alumnoUpdate));
        printvar(Alumno::getAlumno($bd,"alumno@test.com"));  
        
        printvar("test delete alumno");
        printvar(Alumno::deleteAlumno($bd,"alumno@test.com"));
        printvar(Alumno::getAlumno($bd,"alumno@test.com"));       
  
    }

    function testAula(){
        $bd = new BaseMysql();

    }