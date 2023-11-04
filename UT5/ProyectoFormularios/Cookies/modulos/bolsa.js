export class Bolsa {
  /** Formato dd/mm/aaaa*/
  fecha;
  cocinero;
  destinatario;
  gramos;
  composicion;
  numCuenta;

  constructor(fecha, cocinero, destinatario, gramos, composicion, numCuenta) {
    this.fecha = new Date(
      fecha.slice(6, 10),
      fecha.slice(3, 5) - 1,
      fecha.slice(0, 2)
    );
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

  toString() {
    return (
      "Fecha: " +
      this.fecha +
      ", Cocinero: " +
      this.cocinero +
      ", Destinatario: " +
      this.destinatario +
      ", Gramos: " +
      this.gramos +
      ", Composición: " +
      this.composicion +
      ", Número de Cuenta: " +
      this.numCuenta
    );
  }
}
