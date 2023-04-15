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
/*     
    $adminTestValido = new Admin("idtest", "admin@test.com", "test", "test");
    $alumnoTestValido = new Alumno("alumno@test.com","test","alumno","test","uno");
    $aulaTestValido = new Aula("alumno@test.com","idtest", true, true, "feedback test");
    $centroTestvalido = new Centro("idtest", "centro@test.com", "test", "test");
    $instanciaTestValido = new Instancia("idtest", "profesor@test.com", "idtest", "01/01/2019", "01/01/2019", 4, "testURL");
    $practicaTestValido = new Practica("idtest", "titulo test", 5, 5, "guiontest", "profesor@test.com");
    $profesorTestValido = new Profesor("profesor@test.com","test","alumno","test","uno"); 
*/
     

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

    function mainTest() {
        $bd = new BaseMysql();
        $adminTestValido = new Admin("idtest", "admin@test.com", "test", "test");
        $alumnoTestValido = new Alumno("alumno@test.com","test","alumno","test","uno");
        $aulaTestValido = new Aula("alumno@test.com","idtest", true, true, "feedback test");
        $centroTestvalido = new Centro("idtest", "centro@test.com", "test", "test");
        $instanciaTestValido = new Instancia("idtest", "profesor@test.com", "idtest", "01/01/2019", "01/01/2019", 4, "testURL");
        $practicaTestValido = new Practica("idtest", "titulo test", 5, 5, "{guiontest: 'guion'}", "profesor@test.com");
        $profesorTestValido = new Profesor("profesor@test.com","test","alumno","test","uno"); 


        /* bloque de creacion */
        printvar(Consultas::createAdmin($bd,$adminTestValido));
        printvar(Consultas::createCentro($bd,$centroTestvalido));
        printvar(Consultas::createAlumno($bd,$alumnoTestValido));
        printvar(Consultas::createProfesor($bd,$profesorTestValido));
        printvar(Consultas::createPractica($bd,$practicaTestValido));
        printvar(Consultas::createInstancia($bd,$instanciaTestValido));
        printvar(Consultas::createAula($bd,$aulaTestValido));
        /* bloque de gets */
        printvar("bloque de gets");
        printvar(Consultas::getAdmin($bd, "admin@test.com"));
        printvar(Consultas::getAlumno($bd, "alumno@test.com"));
        printvar(Consultas::getAula($bd, "alumno@test.com","idtest"));
        printvar(Consultas::getCentro($bd, "centro@test.com"));
        printvar(Consultas::getInstancia($bd, "idtest"));
        printvar(Consultas::getPractica($bd, "idtest"));
        printvar(Consultas::getProfesor($bd, "profesor@test.com"));
        /* bloque de update */

        printvar("bloque de updates");
        printvar("update de admin");
        $copiaDeAdmin = $adminTestValido;
        $copiaDeAdmin->setNombre("update");
        printvar(Consultas::updateAdmin($bd,$copiaDeAdmin));
        printvar(Consultas::getAdmin($bd, "admin@test.com"));

        printvar("update de alumno");
        $copiaDeAlumno = $alumnoTestValido;
        $copiaDeAlumno->setNombre("update");
        printvar(Consultas::updateAlumno($bd,$copiaDeAlumno));
        printvar(Consultas::getAlumno($bd, "alumno@test.com"));

        printvar("update de aula");
        $copiaDeaula = $aulaTestValido;
        $copiaDeaula->setFeedback("update");
        printvar(Consultas::updateAula($bd,$copiaDeaula));

        printvar("update de centro");
        $copiaDeCentro = $centroTestvalido;
        $copiaDeCentro->setNombre("update");
        printvar(Consultas::updateCentro($bd,$copiaDeCentro));
        printvar(Consultas::getCentro($bd, "centro@test.com"));

        printvar("update de instancia");
        $copiaDeInstancia = $instanciaTestValido;
        $copiaDeInstancia->setEstado(false);
        printvar(Consultas::updateInstancia($bd,$copiaDeInstancia));
        printvar(Consultas::getInstancia($bd, "idtest"));

        printvar("update de practica");
        $copiaDePractica = $practicaTestValido;
        $practicaTestValido->setDownloads(4567);
        printvar(Consultas::updatePractica($bd,$copiaDePractica));
        printvar(Consultas::getPractica($bd, "idtest"));

        printvar("update de profesor");
        $copiaDeProfesor = $profesorTestValido;
        $copiaDeProfesor->setNombre("update");
        printvar(Consultas::updateProfesor($bd,$copiaDeProfesor));
        printvar(Consultas::getProfesor($bd, "profesor@test.com"));

        printvar("bloque de deletes");
        printvar(Consultas::deleteAula($bd,"alumno@test.com","idtest"));
        printvar(Consultas::deleteInstancia($bd, "idtest"));
        printvar(Consultas::deletePractica($bd, "idtest"));
        printvar(Consultas::deleteAdmin($bd,"admin@test.com"));
        printvar(Consultas::deleteAlumno($bd,"alumno@test.com"));
        printvar(Consultas::deleteProfesor($bd, "profesor@test.com"));
        printvar(Consultas::deleteCentro($bd,"centro@test.com"));
        printvar("comprobacion del borrado");
        printvar(Consultas::getAdmin($bd, "admin@test.com"));
        printvar(Consultas::getAlumno($bd, "alumno@test.com"));
        printvar(Consultas::getAula($bd, "alumno@test.com","idtest"));
        printvar(Consultas::getCentro($bd, "centro@test.com"));
        printvar(Consultas::getInstancia($bd, "idtest"));
        printvar(Consultas::getPractica($bd, "idtest"));
        printvar(Consultas::getProfesor($bd, "profesor@test.com"));


    }

