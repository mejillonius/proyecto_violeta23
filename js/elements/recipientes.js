const  generateRandomString = (num) => {
    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let result1= '';
    const charactersLength = characters.length;
    for ( let i = 0; i < num; i++ ) {
        result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result1;
}

class Recipiente {
    contiene = [];
    padre;
    hijos = [];
    nombre;
    constructor (padre){
        this.padre = padre;
        this.nombre = generateRandomString(6);
    };
    llenar (item) {
        this.contiene.push(item);
    }
    listar (){
        this.contiene.forEach(substancia => {
            substancia.toString();
        });
    }
    acoplar (objeto) {
        this.hijos.push(objeto);
    }
    getContiene(){   
        return this.contiene;
    }
    getNombre(){
        return this.nombre;
    }
    getTemperatura(){
        let temperatura = 0;
        this.contiene.forEach(substancia => {
            temperatura = (temperatura + substancia.getTemperatura())/2;
        });
        
        return temperatura.toFixed(2);
    }

}

export class Precipitados extends Recipiente{
    constructor (padre){
        super(padre);
        console.log("soy un vaso de precipitados");
        document.getElementById("mainBody").innerHTML += `<div id="${this.nombre}" class = "recipiente">
        <p> soy un vaso de precipitados y mi nombre es ${this.nombre} y mi padre es ${this.padre.getNombre()} </p>
        <p class = "contiene"> y contengo ${this.contiene.length}</p>
        <p class = "temperatura"> mi temperatura es 20º</p>
        <p class = "acoples"></p>
        <div class = "color" style="    background-color: blue;
                                        text-align: center;
                                        height: 100px;
                                        width: 100px;
                                                        "></div>
        
        </div>`
        
    }
    update () {
        let arrayC;
        let newR;
        let newG;
        let newB;
        if (this.contiene.length > 0){
            arrayC = this.contiene[0].getColorA();
            newR = arrayC[0];
            newG = arrayC[1];
            newB = arrayC[2];
        }
        //update a las substancias
        if (this.contiene.length>0){
            for (let i = 0; i < this.contiene.length; i++) {
                const substancia = this.contiene[i];
                this.arrayC = substancia.getColorA();
                
                newR = (this.newR + this.arrayC[0])/2;
                newR = (this.newG + this.arrayC[1])/2;
                newR = (this.newB + this.arrayC[2])/2;
                substancia.update();
                if (substancia.estado == 2) {
                    //si se evapora, se escapa del recipiente
                    this.contiene.splice(i,1);
                }
            }
        }
        
        for (let j = 0; j < this.hijos.length; j++) {

            const hijo = this.hijos[j];
            hijo.update();
        }
        document.querySelector(`#${this.nombre} p.contiene`).innerHTML = `y contengo ${this.contiene.length}`;
        document.querySelector(`#${this.nombre} p.temperatura`).innerHTML = `y mi temperatura media es: ${this.getTemperatura()}`;
        document.querySelector(`#${this.nombre} div.color`).innerHTML = `y mi color es: rgb(${newR},${newG},${newB})`;
        //`rgb(${this.newR},${this.newG},${this.newB})`
    }
 
}

export class Erlenmeyer extends Recipiente {
    contiene = [];
    padre;
    hijos = [];
    constructor (){}
}