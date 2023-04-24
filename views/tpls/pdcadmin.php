<?php
if ($_COOKIE['cookierol'] != 'admin'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdcadmin</h1>

<h2>crud alumno</h2>

<button id="crearAlumno">crear alumno</button>
<form id="pdcAdminCrearAlumno"method="POST" action="controller/pdcAdminCrearAlumno.php">
    <label for="pdcAdminCrearAlumnoNombre">nombre</label>
    <input type="text" name="pdcAdminCrearAlumnoNombre" id="pdcAdminCrearAlumnoNombre">
    <label for="pdcAdminCrearAlumnoApellido">apellido</label>
    <input type="text" name="pdcAdminCrearAlumnoApellido" id="pdcAdminCrearAlumnoApellido">
    <label for="pdcAdminCrearAlumnoEmail">Email</label>
    <input type="text" name="pdcAdminCrearAlumnoEmail" id="pdcAdminCrearAlumnoEmail">
    <label for="pdcAdminCrearAlumnoPassword">Password</label>
    <input type="text" name="pdcAdminCrearAlumnoPassword" id="pdcAdminCrearAlumnopassword">
    <label for="pdcAdminCrearAlumnoCentro">centro</label>
    <input type="text" name="pdcAdminCrearAlumnoCentro" id="pdcAdminCrearAlumnoCentro">
    <input type="submit" value="Submit">
</form>
<button id="modificarAlumno">modificar alumno</button>
<form id="pdcAdminModificarAlumno"method="POST" action="controller/pdcAdminModificarAlumno.php">
    <label for="pdcAdminModificarAlumnoNombre">nombre</label>
    <input type="text" name="pdcAdminModificarAlumnoNombre" id="pdcAdminModificarAlumnoNombre">
    <label for="pdcAdminModificarAlumnoApellido">apellido</label>
    <input type="text" name="pdcAdminModificarAlumnoApellido" id="pdcAdminModificarAlumnoApellido">
    <label for="pdcAdminModificarAlumnoEmail">Email</label>
    <input type="text" name="pdcAdminModificarAlumnoEmail" id="pdcAdminModificarAlumnoEmail">
    <label for="pdcAdminModificarrAlumnoPassword">Password</label>
    <input type="text" name="pdcAdminModificarAlumnoPassword" id="pdcAdminModificarAlumnoPassword">
    <label for="pdcAdminModificarAlumnoCentro">centro</label>
    <input type="text" name="pdcAdminModificarAlumnoCentro" id="pdcAdminModificarAlumnoCentro">
    <input type="submit" value="Submit">
</form>
<button id="eliminarAlumno">eliminar alumno</button>
<form id="pdcAdminEliminarAlumno" method="POST" action="controller/pdcAdminEliminaAlumno.php">
    <label for="pdcAdminModificarAlumnoEmail">Email</label>
    <input type="text" name="pdcAdminModificarAlumnoEmail" id="pdcAdminModificarAlumnoEmail">
    <input type="submit" value="Submit">
</form>

<h2>CRUD profesor</h2>

<button id="crearProfesor">crear Profesor</button>
<form id="pdcAdminCrearProfesor"method="POST" action="controller/pdcAdminCrearProfesor.php">
    <label for="pdcAdminCrearProfesorNombre">nombre</label>
    <input type="text" name="pdcAdminCrearProfesorNombre" id="pdcAdminCrearProfesorNombre">
    <label for="pdcAdminCrearProfesorApellido">apellido</label>
    <input type="text" name="pdcAdminCrearProfesorApellido" id="pdcAdminCrearProfesorApellido">
    <label for="pdcAdminCrearProfesorEmail">Email</label>
    <input type="text" name="pdcAdminCrearProfesorEmail" id="pdcAdminCrearProfesorEmail">
    <label for="pdcAdminCrearProfesorPassword">Password</label>
    <input type="text" name="pdcAdminCrearProfesorPassword" id="pdcAdminCrearProfesorPassword">
    <label for="pdcAdminCrearProfesorCentro">centro</label>
    <input type="text" name="pdcAdminCrearProfesorCentro" id="pdcAdminCrearProfesorCentro">
    <input type="submit" value="Submit">
</form>
<button id="modificarProfesor">modificar Profesor</button>
<form id="pdcAdminModificarProfesor"method="POST" action="controller/pdcAdminModificarProfesor.php">
    <label for="pdcAdminModificarProfesorNombre">nombre</label>
    <input type="text" name="pdcAdminModificarProfesorNombre" id="pdcAdminModificarProfesorNombre">
    <label for="pdcAdminModificarProfesorApellido">apellido</label>
    <input type="text" name="pdcAdminModificarProfesorApellido" id="pdcAdminModificarProfesorApellido">
    <label for="pdcAdminModificarProfesorEmail">Email</label>
    <input type="text" name="pdcAdminModificarProfesorEmail" id="pdcAdminModificarProfesorEmail">
    <label for="pdcAdminCrearProfesorPassword">Password</label>
    <input type="text" name="pdcAdminCrearProfesorPassword" id="pdcAdminCrearProfesorPassword">
    <label for="pdcAdminModificarProfesorCentro">centro</label>
    <input type="text" name="pdcAdminModificarProfealumnosorCentro" id="pdcAdminModificarProfesorCentro">
    <input type="submit" value="Submit">
</form>
<button id="eliminarProfesor">eliminar Profesor</button>
<form id="pdcAdminEliminarProfesor" method="POST" action="controller/pdcAdminEliminaProfesor.php">
    <label for="pdcAdminModificarProfesorEmail">Email</label>
    <input type="text" name="pdcAdminModificarProfesorEmail" id="pdcAdminModificarProfesorEmail">
    <input type="submit" value="Submit">
</form>


<h2>crud centros</h2>

<button id="crearCentro">crear centro</button>
<form id="pdcAdminCrearCentro" method="POST" action="controller/pdcAdminCrearCentro.php">
    <label for="pdcAdminCrearCentroNombre">Nombre</label>
    <input type="text" name="pdcAdminCrearCentroNombre" id="pdcAdminCrearCentroNombre">
    <label for="pdcAdminCrearCentroEmail">Email</label>
    <input type="text" name="pdcAdminCrearCentroEmail" id="pdcAdminCrearCentroEmail">
    <label for="pdcAdminCrearCentroPassword">Password</label>
    <input type="text" name="pdcAdminCrearCentroPassword" id="pdcAdminCrearCentropassword">
    <input type="submit" value="submit">
</form>
<button id="modificarCentro">modificar centro</button>
<form id="pdcAdminModificarCentro" method="POST" action="controller/pdcAdminModificarCentro.php">
    <label for="pdcAdminModificarCentroNombre">Nombre</label>
    <input type="text" name="pdcAdminModificarCentroNombre" id="pdcAdminModificarCentroNombre">
    <label for="pdcAdminModificarCentroEmail">Email</label>
    <input type="text" name="pdcAdminModificarCentroEmail" id="pdcAdminModificarCentroEmail">
    <label for="pdcAdminModificarCentroPassword">Password</label>
    <input type="text" name="pdcAdminModificarCentroPassword" id="pdcAdminModificarCentropassword">
    <input type="submit" value="submit">
</form>
<button id="eliminarCentro">eliminar centro</button>
<form id="pdcAdminEliminarCentro" method="POST" action="controller/pdcAdminEliminaCentro.php">
    <label for="pdcAdminEliminarCentroEmail">Email</label>
    <input type="text" name="pdcAdminEliminarCentroEmail" id="pdcAdminEliminarCentroEmail">
    <input type="submit" value="Submit">
</form>

<h2>crud practicas</h2>

<button id="crearPractica">crear practica</button>
<form action="controller/pdcAdminCrearPractica" id="pdcAdminCrearPractica" method="POST">
    <label for="pdcAdminCrearPracticaTitulo">titulo</label>
    <input type="text" name="pdcAdminCrearPracticaNombre" id="pdcAdminCrearPracticaNombre">
    <label for="pdcAdminCrearPracticaGuion">Guion</label>
    <input type="text" name="pdcAdminCrearPracticaGuion" id="pdcAdminCrearPracticaGuion">
</form>
<button id="modificarPractica">modificar practica</button>
<form action="controller/pdcAdminModificarPractica" id="pdcAdminModificarPractica" method="POST">
    <label for="pdcAdminModificarPracticaTitulo">titulo</label>
    <input type="text" name="pdcAdminModificarPracticaNombre" id="pdcAdminModificarPracticaNombre">
    <label for="pdcAdminModificarPracticaGuion">Guion</label>
    <input type="text" name="pdcAdminModificarPracticaGuion" id="pdcAdminModificarPracticaGuion">
</form> 
<button id="eliminarPracticas">eliminar practica</button>
<form id="pdcAdminEliminarPractica" method="POST" action="controller/pdcAdminEliminaPractica.php">
    <label for="pdcAdminModificarPracticaEmail">Id</label>
    <input type="text" name="pdcAdminModificarPracticaEmail" id="pdcAdminModificarPracticaEmail">
    <input type="submit" value="Submit">
</form>


<script>



</script>

