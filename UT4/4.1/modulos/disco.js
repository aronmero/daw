export class disco {
  nombreDisco;
  grupoCantante;
  anioPublicacion;
  tipoMusica;
  localizacion;
  prestado;
  tiposMusica = ["rock", "pop", "punk", "indie"];

  /**
   *
   * @param {String} nombreDisco
   * @param {String} grupoCantante
   * @param {Number} anioPublicacion
   * @param {Number} tipoMusica el tipo de musica se obtiene del array tiposMusica[]
   * @param {Number} localizacion
   */
  constructor(
    nombreDisco = "",
    grupoCantante = "",
    anioPublicacion = "",
    tipoMusica = "",
    localizacion = 0
  ) {
    this.nombreDisco = nombreDisco;
    this.grupoCantante = grupoCantante;
    this.anioPublicacion = anioPublicacion;
    this.tipoMusica = this.tiposMusica[tipoMusica];
    this.localizacion = localizacion;
    this.prestado = false;
  }

  setLocalizacion(localizacion) {
    this.localizacion = localizacion;
  }

  setPrestado(prestado) {
    this.prestado = prestado;
  }
  obtenerNombre(){
    return this.nombreDisco;
  }

  toString() {
    return (
      "Nombre del disco: " +
      this.nombreDisco +
      ", grupo/cantante: " +
      this.grupoCantante +
      ", año de publicacion: " +
      this.anioPublicacion +
      ", tipo de musica: " +
      this.tipoMusica +
      ", localizacion: " +
      this.localizacion +
      ", prestado: " +
      this.prestado
    );
  }
}
