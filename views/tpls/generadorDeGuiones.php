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
    const formu = document.querySelector("#formulario");
    const anadirCampo = document.querySelector("#anadirCampo");
    const consolear = document.querySelector("#consolaFormulario");





    function anadirCosa(localizacion) {




        console.log(localizacion.value);
        /* localizacion.parentNode.appendChild(SelectorDeOpciones); */
        switch (localizacion.value) {
            case "texto":
                while (localizacion.nextSibling != null) {
                    localizacion.nextSibling.remove();
                }

                let opcionTextoLabel = document.createElement("label");
                let opcionTextoLabelTexto = document.createTextNode("texto");
                opcionTextoLabel.appendChild(opcionTextoLabelTexto);      
                let opcionTextoInput = document.createElement("input");
                opcionTextoInput.setAttribute("type", "textarea");

                localizacion.parentNode.appendChild(opcionTextoLabel);
                localizacion.parentNode.appendChild(opcionTextoInput);
                break;
            case "regla":
                while (localizacion.nextSibling != null) {
                    localizacion.nextSibling.remove();
                }
                let opcionReglasLabel = document.createElement("p");
                let optionReglasTexto = document.createTextNode("TODO");
                opcionReglasLabel.appendChild(optionReglasTexto);
                localizacion.parentNode.appendChild(opcionReglasLabel);
                break;
            default:
                while (localizacion.nextSibling != null) {
                    localizacion.nextSibling.remove();
                }

                break;
        }
    }


    anadirCampo.addEventListener("click", () => {
        let FieldsetAClonar = document.createElement("fieldset");
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

        formu.appendChild(FieldsetAClonar.cloneNode(true));
    });
    consolear.addEventListener("click", () => {
        console.log(formu.children);
    })
</script>

</html>