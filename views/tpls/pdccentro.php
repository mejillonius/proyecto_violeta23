<?php
if ($_COOKIE['cookierol'] != 'centro'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdccentro</h1>

<h2>crud alumno</h2>

<button id="crearAlumno">crear alumno</button>
<form id="pdcCentroCrearAlumno"method="POST" action="<?= url_controller ?>pdcCentroCrearAlumno.php">
    <label for="pdcCentroCrearAlumnoNombre">nombre</label>
    <input type="text" name="pdcCentroCrearAlumnoNombre" id="pdcCentroCrearAlumnoNombre">
    <label for="pdcCentroCrearAlumnoApellido">apellido</label>
    <input type="text" name="pdcCentroCrearAlumnoApellido" id="pdcCentroCrearAlumnoApellido">
    <label for="pdcCentroCrearAlumnoEmail">Email</label>
    <input type="text" name="pdcCentroCrearAlumnoEmail" id="pdcCentroCrearAlumnoEmail">
    <input type="hidden" name="pdcCentroCrearAlumnoIdCentro" id="pdcCentroCrearAlumnoIdCentro">
    <input type="submit" value="Submit">
</form>
<button id="modificarAlumno">modificar alumno</button>
<form id="pdcCentroModificarAlumno"method="POST" action="<?= url_controller ?>pdcCentroModificarAlumno.php">
    <label for="pdcCentroModificarAlumnoNombre">nombre</label>
    <input type="text" name="pdcCentroModificarAlumnoNombre" id="pdcCentroModificarAlumnoNombre">
    <label for="pdcCentroModificarAlumnoApellido">apellido</label>
    <input type="text" name="pdcCentroModificarAlumnoApellido" id="pdcCentroModificarAlumnoApellido">
    <label for="pdcCentroModificarAlumnoEmail">Email</label>
    <input type="text" name="pdcCentroModificarAlumnoEmail" id="pdcCentroModificarAlumnoEmail">
    <input type="hidden" name="pdcCentroModificarAlumnoIdCentro" id="pdcCentroModificarAlumnoIdCentro">
    <input type="submit" value="Submit">
</form>
<button id="eliminarAlumno">eliminar alumno</button>
<form id="pdcCentroEliminarAlumno" method="POST" action="<?= url_controller ?>pdcCentroEliminaAlumno.php">
    <label for="pdcCentroModificarAlumnoEmail">Email</label>
    <input type="text" name="pdcCentroModificarAlumnoEmail" id="pdcCentroModificarAlumnoEmail">
    <input type="submit" value="Submit">
</form>

<h2>CRUD profesor</h2>

<button id="crearProfesor">crear Profesor</button>
<form id="pdcCentroCrearProfesor"method="POST" action="<?= url_controller ?>pdcCentroCrearProfesor.php">
    <label for="pdcCentroCrearProfesorNombre">nombre</label>
    <input type="text" name="pdcCentroCrearProfesorNombre" id="pdcCentroCrearProfesorNombre">
    <label for="pdcCentroCrearProfesorApellido">apellido</label>
    <input type="text" name="pdcCentroCrearProfesorApellido" id="pdcCentroCrearProfesorApellido">
    <label for="pdcCentroCrearProfesorEmail">Email</label>
    <input type="text" name="pdcCentroCrearProfesorEmail" id="pdcCentroCrearProfesorEmail">
    <input type="hidden" name="pdcCentroCrearProfesorIdCentro" id="pdcCentroCrearProfesorIdCentro">
    <input type="submit" value="Submit">
</form>
<button id="modificarProfesor">modificar Profesor</button>
<form id="pdcCentroModificarProfesor"method="POST" action="<?= url_controller ?>pdcCentroModificarProfesor.php">
    <label for="pdcCentroModificarProfesorNombre">nombre</label>
    <input type="text" name="pdcCentroModificarProfesorNombre" id="pdcCentroModificarProfesorNombre">
    <label for="pdcCentroModificarProfesorApellido">apellido</label>
    <input type="text" name="pdcCentroModificarProfesorApellido" id="pdcCentroModificarProfesorApellido">
    <label for="pdcCentroModificarProfesorEmail">Email</label>
    <input type="text" name="pdcCentroModificarProfesorEmail" id="pdcCentroModificarProfesorEmail">
    <input type="hidden" name="pdcCentroModificarProfesorIdCentro" id="pdcCentroModificarProfesorIdCentro">
    <input type="submit" value="Submit">
</form>
<button id="eliminarProfesor">eliminar Profesor</button>
<form id="pdcCentroEliminarProfesor" method="POST" action="<?= url_controller ?>pdcCentroEliminaProfesor.php">
    <label for="pdcCentroModificarProfesorEmail">Email</label>
    <input type="text" name="pdcCentroModificarProfesorEmail" id="pdcCentroModificarProfesorEmail">
    <input type="submit" value="Submit">
</form>