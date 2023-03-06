const  generateRandomString = (num) => {
    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let result1= '';
    const charactersLength = characters.length;
    for ( let i = 0; i < num; i++ ) {
        result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result1;
}

class Actuador {
    padre;
    nombre;
    constructor(padre){
        this.nombre = generateRandomString(6);
        this.padre = padre;
    }
}

export class Calentador extends Actuador {
    onOff = "false";
    potencia = 10;
    constructor(padre){
        super(padre);
        console.log (`soy un calentador con nombre ${this.nombre} y mi padre es ${this.padre.getNombre()}`);   
        document.querySelector(`#${padre.getNombre()} p.acoples`).innerHTML += `soy un calentador con nombre ${this.nombre} acoplado a ${padre.getNombre()} y mi estado es : <select name = "selector_calentador" id="${this.nombre}estado"><option value="false" selected>Apagado</option><option value="true">Encendido</option>`;
    }
    calentar(contiene){
   
            if (contiene.length>0){
                let index = Math.floor(Math.random()*contiene.length);
                contiene[index].temperatura +=1;
                contiene[index].update();  
            }
    }

    update(){
        this.onOff = document.getElementById(`${this.nombre}estado`).value;
        if (this.onOff == "true"){
            console.log("caliento");
            for (let i = 0; i < this.potencia; i++) {
                this.calentar (this.padre.getContiene())
            } 
        }else{
            console.log("el calentador esta apagado");
        }

    }
}