class Tubo {
    contiene = [];
    padre;
    hijos = [];
    constructor (padre){
        this.padre = padre 
    };
    acoplar (objeto) {
        this.hijos.push(objeto);
    }

}