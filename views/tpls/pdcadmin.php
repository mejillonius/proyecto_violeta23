<?php
if ($_COOKIE['cookierol'] != 'admin'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdcadmin</h1>

<h2>crud alumno</h2>

<button>crear alumno</button>
<button>modificar alumno</button>
<button>eliminar alumno</button>


<h2>crud profesor</h2>

<button>crear profesor</button>
<button>modificar profesor</button>
<button>eliminar profesor</button>


<h2>crud centros</h2>

<button>crear centro</button>
<button>modificar centro</button>
<button>eliminar centro</button>

<h2>crud practicas</h2>

<button>crear practica</button>
<button>modificar practica</button>
<button>eliminar practica</button>
