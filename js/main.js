import {Agua} from './elements/substancias.js';
import {Precipitados} from './elements/recipientes.js';

let precipitados = new Precipitados();

for (let i = 0; i < 10; i++) {
    precipitados.aceptar(new Agua);
}

setInterval(() => {
    precipitados.calentar(100);
    precipitados.update();
    precipitados.listar()
}, 1000);

