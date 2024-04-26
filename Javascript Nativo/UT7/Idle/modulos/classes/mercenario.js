const estadosPosibles = ["Vivo", "Muerto"];

export class Mercenario {
  id;
  nombre;
  puntosVidaMax;
  puntosVida;
  dano;
  velocidad;
  defensa;
  talentos;
  estado;
  numMaximoTalentos = 5;
  nivel;

  constructor(nombre = "", vidaMaxima = 10, dano = 10, velocidad = 10, defensa = 10, nivel = 1) {
    this.id = Math.round(Math.random() * Math.pow(10, 15));
    this.nombre = nombre;
    this.puntosVidaMax = vidaMaxima;
    this.dano = dano;
    this.velocidad = velocidad;
    this.defensa = defensa;
    this.puntosVida = this.puntosVidaMax;
    this.talentos = [];
    this.nivel = nivel;
    this.estado = estadosPosibles[0];
  }
  
  getId() {
    return this.id;
  }
  getEstado() {
    return this.estado;
  }

  getNombre() {
    return this.nombre;
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
  setEstado(estado) {
    this.estado = estadosPosibles[estado];
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
