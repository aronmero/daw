export class Zona{
    tamanoMaximo;
    parcelasActuales;

    constructor(tamanoMaximo){
        this.tamanoMaximo=tamanoMaximo;
    }

    getParcelasActuales(){
        return this.parcelasActuales;
    }

    setParcelasActuales(parcelasActuales){
        this.parcelasActuales=parcelasActuales;
    }
}