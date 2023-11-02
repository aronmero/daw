export class Bolsa {
  fecha;
  cocinero;
  destinatario;
  gramos;
  composicion;
  numCuenta;

  constructor(cocinero, destinatario, gramos, composicion, numCuenta) {
    this.fecha = new Date();
    this.cocinero = cocinero;
    this.destinatario = destinatario;
    this.gramos = gramos;
    this.composicion = composicion;
    this.numCuenta = numCuenta;
  }

  getFecha() {
    return this.fecha;
  }

  getCocinero() {
    return this.cocinero;
  }

  getDestinatario() {
    return this.destinatario;
  }

  getGramos() {
    return this.gramos;
  }

  getComposicion() {
    return this.composicion;
  }
  getNumCuenta() {
    return this.numCuenta;
  }

  setFecha(fecha) {
    this.fecha = fecha;
  }

  setCocinero(cocinero) {
    this.cocinero = cocinero;
  }

  setDestinatario(destinatario) {
    this.destinatario = destinatario;
  }

  setGramos(gramos) {
    this.gramos = gramos;
  }

  setComposicion(composicion) {
    this.composicion = composicion;
  }
  setNumCuenta(numCuenta) {
    this.numCuenta = numCuenta;
  }
}
