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
            if (this.contiene.length>0){
                let index = Math.floor(Math.random()*this.contiene.length);
                this.contiene[index].temperatura +=1;
                this.update();  
            }
        }
    }
    acoplar (objeto) {
        this.padre = objeto;
    }
    

}

export class Precipitados extends Recipiente{
    constructor (){
        super();
        console.log("soy un vaso de precipitados");
    }
    update () {
        //update a las substancias
        if (this.contiene.length>0){
            for (let i = 0; i < this.contiene.length; i++) {
                const substancia = this.contiene[i];
                substancia.update();
                if (substancia.estado == 2) {
                    //si se evapora, se escapa del recipiente
                    this.contiene.splice(i,1);
                }
            }
        }
        for (let j = 0; j < this.hijos.length; j++) {
            const hijo = hijos[j];
            hijo.update();
        }
    }


    
}

export class Erlenmeyer extends Recipiente {
    contiene = [];
    padre;
    hijos = [];
    constructor (){}
}