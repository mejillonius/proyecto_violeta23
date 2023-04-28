<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="anadirCampo">añadir campo</button>
    <form action="" method="post" id="formulario">
        <label for="titulo">titulo</label>
        <input type="text" name="titulo" id="titulo">


    </form>
    <button id="consolaFormulario">consolear</button>
    <div id="prueba">
    </div>
</body>
<script> 
const formu =document.querySelector("#formulario");
const anadirCampo =document.querySelector("#anadirCampo");
const consolear = document.querySelector("#consolaFormulario");



const FieldsetAClonar = document.createElement("fieldset");
let SelectorDeOpciones = document.createElement("select")

let option1 = document.createElement("option");
option1.setAttribute("value", "");
let option1Texto = document.createTextNode("");
option1.appendChild(option1Texto);

let option2 = document.createElement("option");
option2.setAttribute("value", "texto");
let option2Texto = document.createTextNode("texto");
option2.appendChild(option2Texto);

let option3 = document.createElement("option");
option3.setAttribute("value", "regla");
let option3Texto = document.createTextNode("regla");
option3.appendChild(option3Texto);


SelectorDeOpciones.appendChild(option1);
SelectorDeOpciones.appendChild(option2);
SelectorDeOpciones.appendChild(option3);

FieldsetAClonar.appendChild(SelectorDeOpciones);
SelectorDeOpciones.setAttribute("onchange",
"anadirCosa(this)"
);

function anadirCosa(localizacion){
    

    console.log( localizacion.parentNode);
    localizacion.parentNode.appendChild(SelectorDeOpciones);
}


anadirCampo.addEventListener("click", ()=> {

    formu.appendChild(FieldsetAClonar.cloneNode(true));
    console.log(FieldsetAClonar);
});
consolear.addEventListener("click", ()=>{
    console.log(formu.children);
})


</script>
</html>