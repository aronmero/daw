/**
 *
 * @date 11/6/2023 - 7:46:05 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @class Actividad
 * @typedef {Actividad}
 */
export class Actividad {
  lugar;
  fecha;
  profesor;
  grupos;
  descripcion;

  /**
   * Crea una instancia de Actividad.
   * @date 11/6/2023 - 7:46:40 PM
   * @author Aaron Medina Rodriguez
   *
   * @constructor
   * @param {String} lugar
   * @param {Date} fecha
   * @param {Array} profesor que asistiran
   * @param {Array} grupos que asistiran
   * @param {String} descripcion breve descripcion de la actividad
   */
  constructor(lugar, fecha, profesor, grupos, descripcion) {
    this.lugar = lugar;
    this.fecha = fecha;
    this.profesor = profesor;
    this.grupos = grupos;
    this.descripcion = descripcion;
  }

  toString(){
    return "Lugar: "+this.lugar+"; Fecha: "+this.fecha+"; Descripcion: "+this.descripcion+"; Grupos: "+this.grupos+"; Profesores: "+this.profesor
  }
}
