export class Agua {
    color = 'aqua';
    ebullicion = 100;
    congelacion = 0;
    estado = 1;
    absorcionCalor = 1;
    temperatura = 20;

    constructor () {
    }
    toString () {
        console.log(`soy Agua a ${this.temperatura} grados.\n`);
    }
    update(){
        if (this.temperatura > this.ebullicion){
            this.estado = 2;
            console.log ("me evaporo");
        } else if (this.temperatura < this.congelacion) {
            this.estado = 0;
            console.log ("me congelo");
        }
        
    }

}

export class Alcohol {
    color = 'aqua';
    ebullicion = 78;
    congelacion = -114;
    estado = 1;
    absorcionCalor = 1;   
}

export class SubstanciaA {
    color = 'blue';
    ebullicion = 78;
    congelacion = -114;
    estado = 1;
    absorcionCalor = 1;   
}

export class SubstanciaB {
    color = 'yellow';
    ebullicion = 78;
    congelacion = -114;
    estado = 1;
    absorcionCalor = 1;   
}


export class SubstanciaC {
    color = 'red';
    ebullicion = 78;
    congelacion = -114;
    estado = 1;
    absorcionCalor = 1;   
}