export class Zona {
  tamanoMaximo;
  parcelasActuales;
  tipo;
  espacios;

  constructor(tamanoMaximo, tipo) {
    this.tamanoMaximo = tamanoMaximo;
    this.tipo = tipo;
    this.espacios=new Array();
    this.parcelasActuales=0;
  }

  getParcelasActuales() {
    return this.parcelasActuales;
  }
  getTamnoMaximo() {
    return this.tamanoMaximo;
  }
  getTipo() {
    return this.tipo;
  }
  getEspacios(){
    return this.espacios;
  }
  anadirEspacio(coordenada1,coordenada2){
    this.espacios.push([coordenada1,coordenada2]);
    this.parcelasActuales++;
  }


}
