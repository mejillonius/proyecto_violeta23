class Tubo {
    contiene = [];
    padre;
    hijos = [];
    constructor (){ 
    };
    acoplar (objeto) {
        this.padre = objeto;
    }
}