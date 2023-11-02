export class Bolsa{
    fecha;
    cocinero;
    destinatario;
    gramos;
    composicion;
    numCuenta;

    constructor(cocinero,destinatario,gramos,composicion,numCuenta){
        this.fecha=new Date();
        this.cocinero=cocinero;
        this.destinatario=destinatario;
        this.gramos=gramos;
        this.composicion=composicion;
        this.numCuenta=numCuenta;

    }


}