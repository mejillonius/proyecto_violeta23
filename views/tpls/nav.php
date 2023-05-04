<nav class="container bg-light">
    <div class="container-fluid py-4">
        <div class="justified ">
        </div>
    </div>

    <div class="container">

    <?php 
    if (isset($_COOKIE['cookierol'])){
        echo("
            <form action='controller/logout.php'>
                <button type='submit'>logout</button>
            </form>
        ");
    } else {
        echo("
            <form action='controller/login.php' method='POST' id='formulario'>
                <input type='text' name='email' placeholder='email'>
                <input type='text' name='password' placeholder='contraseña'>
                <button type='submit'>Enviar</button>
            </form>
        ");
    }   
    ?>
        <div id="mostra">

    </div>

</nav>

<script>

/* const formulario = document.querySelector("#formulario");
let result = document.querySelector("#mostra");

formulario.addEventListener("submit", function(e){
    e.preventDefault();
    

    let datos = new FormData(formulario);

    console.log(datos.get("usuario"));
    console.log(datos.get("password"));

    fetch("controller/login.php", {
        method: "POST",
        body:datos,
    })
    .then(response => response.text())
    .then(response => {
        console.log("response ".response);
        if (response == "error") {
            result.innerHTML = `<div>rellena todos los campos</div>`;
        } else {
            console.log (response);
            result.innerHTML = `<div>${response}</div>`;
        }
    })
}) */


</script>