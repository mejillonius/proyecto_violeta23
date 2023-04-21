<?php
if ($_COOKIE['cookierol'] != 'profesor'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdcprofesor</h1>

<h2>crud alumno</h2>

<button>crear alumno</button>
<button>modificar alumno</button>
<button>eliminar alumno</button>


<h2>crud profesor</h2>

<button>crear profesor</button>
<button>modificar profesor</button>
<button>eliminar profesor</button>

<h2>crud instancias</h2>
<button>crear instancias</button>
<button>modificar instancias</button>
<button>eliminar instancias</button>
<button>revision instancias</button>