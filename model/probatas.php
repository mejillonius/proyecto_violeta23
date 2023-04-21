<?php
require_once('../conf/debug.php');
require_once('Consultas.php');
require_once('BaseMySql.php');

$bd = new BaseMysql();

$crios = Consultas::getAlumnoByCentro($bd,10);
/* printvar($crios); */

echo("<table><tr><th>nombre</th><th>apellido</th><th>email</th></tr>");
foreach ($crios as $crio ) {
    
    echo("<tr><td>".$crio->getNombre()."</td><td>".$crio->getApellido()."</td><td>".$crio->getEmail()."</td></tr>");
}
echo("</table>");