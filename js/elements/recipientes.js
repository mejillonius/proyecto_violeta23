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
    turnos = 0;
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

    color = [0,0,0];

    constructor (padre){
        super(padre);
        console.log("soy un vaso de precipitados");
        document.getElementById("mainBody").innerHTML += `<div id="${this.nombre}" class = "recipiente">
        <p> soy un vaso de precipitados y mi nombre es ${this.nombre} y mi padre es ${this.padre.getNombre()} </p>
        <p class = "contiene"> y contengo ${this.contiene.length}</p>
        <p class = "temperatura"> mi temperatura es 20º</p>
        <p class = "acoples"></p>
        <div class = "color" style="    background-color: rgb(${this.color[0]},${this.color[1]},${this.color[2]});
                                        text-align: center;
                                        height: 100px;
                                        width: 100px;
                                                        "></div>
        
        </div>`
        
    }
    update () {
        this.color = [0,0,0];
        let proporciones = new Array();
        let gases = new Array

        for (let j = 0; j < this.hijos.length; j++) {
            const hijo = this.hijos[j];
            hijo.update();
        }

        for (let k = gases.length; k > 0; k--) {
            const element = gases[k];
            this.contiene.splice(element,1);
            
        }

        //update a los contenidos
        if (this.contiene.length>0){
            

            //calculo del color
            for (let i = 0; i < this.contiene.length; i++) {
                const substancia = this.contiene[i];

                if (substancia.constructor.name in proporciones) {
                    proporciones[substancia.constructor.name] += 1;
                } else {
                    proporciones[substancia.constructor.name] = 1
                }

                this.arrayC = substancia.getColorA();
                
                this.color[0] = (this.color[0] + this.arrayC[0])/2;
                this.color[1] = (this.color[1] + this.arrayC[1])/2;
                this.color[2] = (this.color[2] + this.arrayC[2])/2;
                
                if (substancia.estado == 2) {
                    //si se evapora, se escapa del recipiente
                    this.contiene.splice(i,1);
                    //gases.push(i)
                }
            }
        }else{
            this.color = [170,170,170];
        }
        



        console.log(this.turnos, proporciones, gases);
        document.querySelector(`#${this.nombre} p.contiene`).innerHTML = `y contengo ${this.contiene.length} elemantos, `;
        document.querySelector(`#${this.nombre} p.temperatura`).innerHTML = `y mi temperatura media es: ${this.getTemperatura()}, ${proporciones}`;
        document.querySelector(`#${this.nombre} div.color`).innerHTML = `y mi color es: rgb(${this.color[0]},${this.color[1]},${this.color[2]})`;
        document.querySelector(`#${this.nombre} div.color`).style.backgroundColor = `rgb(${this.color[0]},${this.color[1]},${this.color[2]})`;
        this.turnos ++;
    }
 
}

export class Erlenmeyer extends Recipiente {
    contiene = [];
    padre;
    hijos = [];
    constructor (){}
}