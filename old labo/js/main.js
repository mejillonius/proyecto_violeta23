import {Agua} from './elements/substancias.js';
import {Alcohol} from './elements/substancias.js';
import {Precipitados} from './elements/recipientes.js';
import {Calentador} from './elements/actuadores.js';
import {Laboratorio} from './elements/laboratorio.js';



let canvas = new Laboratorio()

canvas.acoplar(new Precipitados(canvas));
let precipitados = canvas.hijos[0];


for (let i = 0; i < 100; i++) {
    precipitados.llenar(new Agua);
    precipitados.llenar(new Alcohol);
}
precipitados.acoplar(new Calentador(precipitados));
console.log (precipitados);

setInterval(() => {  
    canvas.update();
    
}, 100);

