class Recipiente {
    contiene = [];
    padre;
    hijos = [];
    constructor (){
    };
    aceptar (item) {
        this.contiene.push(item);
        //console.log(`he metido 1 ${item} en el contiene`);
    }
    listar (){
        this.contiene.forEach(substancia => {
            substancia.toString();
        });
    }
    calentar(potencia){
        for (let i = 0; i < potencia; i++) {
            let index = Math.floor(Math.random()*this.contiene.length);
            this.contiene[index].temperatura +=1;
            
        }
    }
    

}

export class Precipitados extends Recipiente{
    constructor (){
        super();
        console.log("soy un vaso de precipitados");
    }


    
}

export class Erlenmeyer extends Recipiente {
    contiene = [];
    padre;
    hijos = [];
    constructor (){}
}