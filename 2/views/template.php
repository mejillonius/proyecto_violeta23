<?php
echo(LOADDEBUG?"Template ":"");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>K-boom</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>

<body> 
    
<?php
    require("tpls/logo.php");
    require("tpls/nav.php");

    $rutas = [];
    if (isset($_GET["tpls"])) {
        $rutas = explode("/", $_GET["tpls"]);
        var_dump($_GET);
        if (
            $rutas[0] == "inicio" ||
            $rutas[0] == "pdcadmin" ||
            $rutas[0] == "pdcalumno" ||
            $rutas[0] == "pdccentro" ||
            $rutas[0] == "pdcprofesor" ||
            $rutas[0] == "recovery" ||
            $rutas[0] == "laboratorio"
        ) {
            include "tpls/".$rutas[0].".php";
        } else {
            include "tpls/error404.php";
        }
    } else {
        include "tpls/inicio.php";
    }
?>



</main>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Latest compiled Fontawesome-->
<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

<script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>

<!-- sweet alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</main>

</body>

</html>