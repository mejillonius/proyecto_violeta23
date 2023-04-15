<?php


define("LOADDEBUG",false);
echo(LOADDEBUG?"Debug ":"");

define("ALUMNODEBUG",false);
define("CENTRODEBUG",false);
define("PROFESORDEBUG",false);
define("VARDUMPDEBUG",true);

define("TESTDEBUG", true);


function printvar($var){
    if (VARDUMPDEBUG == true) {
        echo("<br>");
        var_dump($var);
        echo("<br>");
    }
}


