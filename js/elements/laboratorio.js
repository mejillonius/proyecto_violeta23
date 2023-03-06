export class Laboratorio {
    hijos = [];
    nombre = "laboratorio";

    update () {
        for (let i = 0; i < this.hijos.length; i++) {
            this.hijos[i].update(); 
        }
    }
    acoplar(hijo){
        this.hijos.push(hijo);
    }
    getNombre(){
        return this.nombre;
    }
}