export class Pregunta {
  idPregunta
  valorPuntuacion;
  textoPregunta;
  propuestas;
  propuestaCorrecta;

  constructor(idPregunta,textoPregunta, valorPuntuacion) {
    this.valorPuntuacion = valorPuntuacion;
    this.textoPregunta = textoPregunta;
    this.propuestas = new Array();
    this.propuestaCorrecta = null;
    this.idPregunta=idPregunta;
  }

  setPuntuacion(valorPuntuacion) {
    this.valorPuntuacion = valorPuntuacion;
  }

  setTextoPregunta(textoPregunta) {
    this.textoPregunta = textoPregunta;
  }

  setPropuestaCorrecta(propuestaCorrecta) {
    this.propuestaCorrecta = propuestaCorrecta;
  }

  getPuntuacion() {
    return this.valorPuntuacion;
  }

  getTextoPregunta() {
    return this.textoPregunta;
  }

  getIdPregunta() {
    return this.idPregunta;
  }

  getPropuestaCorrecta() {
    return this.propuestaCorrecta;
  }

  getPropuestas(){
    return this.propuestas;
  }

  anadirPropuesta(textoPropuesta) {
    this.propuestas.push(textoPropuesta);
  }
}
