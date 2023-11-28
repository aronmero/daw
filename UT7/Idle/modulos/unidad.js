export class Unidad {
  puntosVidaMax;
  puntosVida;
  dano;
  velocidad;
  defensa;
  talentos;
  numMaximoTalentos = 5;
  nivel;

  constructor(
    vidaMaxima = 10,
    dano = 10,
    velocidad = 10,
    defensa = 10,
    nivel = 1
  ) {
    this.puntosVidaMax = vidaMaxima;
    this.dano = dano;
    this.velocidad = velocidad;
    this.defensa = defensa;
    this.puntos_vida = this.puntosVidaMax;
    this.talentos = [];
    this.nivel = nivel;
  }
  getPuntosVidaMax() {
    return this.puntosVidaMax;
  }

  getDano() {
    return this.dano;
  }

  getVelocidad() {
    return this.velocidad;
  }

  getDefensa() {
    return this.defensa;
  }

  getPuntosVida() {
    return this.puntosVida;
  }

  getTalentos() {
    return this.talentos;
  }
  anadirTalento(talentoNuevo) {
    if (this.talentos.length < this.numMaximoTalentos) {
      this.talentos.push(talentoNuevo);
      return true;
    }
    return false;
  }

  setPuntosVida(vidaNueva) {
    this.puntosVida = vidaNueva;
  }

  setPuntosVidaMax(puntosVidaMaxNuevo) {
    this.puntosVidaMax = puntosVidaMaxNuevo;
  }

  setDano(danoNuevo) {
    this.dano = danoNuevo;
  }

  setVelocidad(velocidadNuevo) {
    this.velocidad = velocidadNuevo;
  }

  setDefensa(defensaNuevo) {
    this.defensa = defensaNuevo;
  }
}
