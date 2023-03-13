export class Agua {
    colorArray = Array(0,255,255);
    color = 'rgb(colorArray[0],colorArray[1],colorArray[2])';
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
            console.log ("soy agua y me evaporo");
        } else if (this.temperatura < this.congelacion) {
            this.estado = 0;
            console.log ("soy agua y me congelo");
        }
        
    }
    getTemperatura(){
        return this.temperatura;
    }
    getColor(){
        return this.color;
    }
    getColorA(){
        return this.colorArray;
    }

}

export class Alcohol {
    colorArray = Array(255,0,0);
    color = 'rgb(colorArray[0],colorArray[1],colorArray[2])';
    ebullicion = 78;
    congelacion = -114;
    estado = 1;
    absorcionCalor = 1;  
    temperatura = 20;
    
    constructor () {
    }
    toString () {
        console.log(`soy Alcohol a ${this.temperatura} grados.\n`);
    }
    update(){
        if (this.temperatura > this.ebullicion){
            this.estado = 2;
            console.log ("soy alcohol y me evaporo");
        } else if (this.temperatura < this.congelacion) {
            this.estado = 0;
            console.log ("soy alcohol y me congelo");
        }
        
    }
    getTemperatura(){
        return this.temperatura;
    }
    getColor(){
        return this.color;
    }
    getColorA(){
        return this.colorArray;
    }
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