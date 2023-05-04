<?php


define("LOADDEBUG",false);
echo(LOADDEBUG?"Debug ":"");

define("ALUMNODEBUG",false);
define("CENTRODEBUG",false);
define("PROFESORDEBUG",false);
define("VARDUMPDEBUG",false);

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

function str_starts_with( $haystack, $needle ){

    $largo = strlen($needle);
    $substring = substr($haystack,0,$largo);
    if ($substring == $needle) {
        return true;
    } else {
        return false;
    }

} 

