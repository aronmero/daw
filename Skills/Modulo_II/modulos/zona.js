export class Zona {
  id;
  tamanoMaximo;
  parcelasActuales;
  tipo;
  espacios;

  constructor(id,tamanoMaximo, tipo) {
    this.id=id;
    this.tamanoMaximo = tamanoMaximo;
    this.tipo = tipo;
    this.espacios = new Array();
    this.parcelasActuales = 0;
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
  getEspacios() {
    return this.espacios;
  }
  getId() {
    return this.id;
  }
  anadirEspacio(coordenada1, coordenada2) {
    if (this.parcelasActuales < this.tamanoMaximo) {
      this.espacios.push([coordenada1, coordenada2]);
      this.parcelasActuales++;
    }
  }
}
