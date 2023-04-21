<?php


define("LOADDEBUG",false);
echo(LOADDEBUG?"Debug ":"");

define("ALUMNODEBUG",false);
define("CENTRODEBUG",false);
define("PROFESORDEBUG",false);
define("VARDUMPDEBUG",true);

define("TESTDEBUG", false);


function printvar(...$var){
    if (VARDUMPDEBUG == true) {
        foreach ($var as $key) {
            var_dump($key);
            echo(" ");
        }
        echo("<br>");
    }
}


