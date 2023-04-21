<?php
if ($_COOKIE['cookierol'] != 'centro'){
    header("Refresh:0; url=".url_base);
}
?>

<h1>pdccentro</h1>

<h2>crud alumno</h2>

<button>crear alumno</button>
<button>modificar alumno</button>
<button>eliminar alumno</button>


<h2>crud profesor</h2>

<button>crear profesor</button>
<button>modificar profesor</button>
<button>eliminar profesor</button>
