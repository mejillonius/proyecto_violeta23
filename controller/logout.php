<?php

require_once("../conf/debug.php");
require_once("../conf/conf.php");

if (isset($_COOKIE['cookierol'])) {
    unset($_COOKIE['cookierol']); 
    setcookie('cookierol', null, -1, '/'); 

}
if (isset($_COOKIE['cookieCentro'])) {
    unset($_COOKIE['cookieCentro']); 
    setcookie('cookieCentro', null, -1, '/'); 

}
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']); 
    setcookie('user', null, -1, '/'); 

}
if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']); 
    setcookie('PHPSESSID', null, -1, '/'); 

}

header("Refresh:0; url=".url_base);
echo('    
<div class="container-fluid py-4">
<div class="justified ">
    <a href="../index.php">
        <h3>volver</h3>
    </a>
</div>
</div>
');