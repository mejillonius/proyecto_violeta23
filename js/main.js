import {Agua} from './elements/substancias.js';
import {Precipitados} from './elements/recipientes.js';

let precipitados = new Precipitados();

for (let i = 0; i < 100; i++) {
    precipitados.aceptar(new Agua);
}

precipitados.calentar(10);
precipitados.listar()