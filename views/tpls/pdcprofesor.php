<?php
if ($_COOKIE['cookierol'] != 'profesor'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdcprofesor</h1>

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

<h2>crud instancias</h2>
<button>crear instancias</button>
<button>modificar instancias</button>
<button>eliminar instancias</button>
<button>revision instancias</button>


<h2> crud practicas</h2>
