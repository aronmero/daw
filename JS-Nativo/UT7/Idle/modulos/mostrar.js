const elementosNavegacion = [
  ["./vistas/vistaMercenarios.html", "Mercenarios"],
  ["./vistas/vistaExpediciones.html", "Expediciones"],
  ["./vistas/vistaEscuadrones.html", "Escuadrones"],
];

/**
 * Imprime el menu de navegacion
 * @date 11/29/2023 - 7:38:52 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 */
export function imprimirNavegacion() {
  const navegacion = document.getElementById("nav");
  for (let index = 0; index < elementosNavegacion.length; index++) {
    const enlace = document.createElement("a");
    enlace.setAttribute("href", elementosNavegacion[index][0]);
    enlace.append(document.createTextNode(elementosNavegacion[index][1]));

    navegacion.append(enlace);
  }
}

/**
 * Elimina los elementos de una ubicacion
 * @date 11/29/2023 - 7:38:29 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @param {HTMLElement} ubicacion
 */
export function limpiarUbicacion(ubicacion) {
  
  while (ubicacion.firstChild) {
    ubicacion.removeChild(ubicacion.firstChild);
  }
  
}

/**
 * Imprime un mercenario
 * @date 11/29/2023 - 4:20:52 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Mercenario} mercenario
 *  @param {HTMLElement} ubicacion
 */
export function imprimirMercenario(mercenario, ubicacion, arrastrable = false) {
  /*TODO:Que al imprimir funcione como las cartas de pares y se vea el retrato del mecenario */
  const carta = document.createElement("div");
  carta.classList.add("cartaMercenario");
  carta.classList.add("prevent-select");
  if (arrastrable) {
    carta.setAttribute("draggable", true);
    carta.setAttribute("ondragstart", "drag(event)");
  }
  carta.id = mercenario.getId();
  const nombre = document.createElement("div");
  const nombreTexto = document.createTextNode(mercenario.getNombre());
  nombre.append(nombreTexto);
  const vidaMax = document.createElement("div");
  vidaMax.append(document.createTextNode("P.Vida Max: " + mercenario.getPuntosVidaMax()));

  const vidaActual = document.createElement("div");
  vidaActual.append(document.createTextNode("P.Vida: " + mercenario.getPuntosVida()));
  const dano = document.createElement("div");
  dano.append(document.createTextNode("Daño: " + mercenario.getDano()));
  const defensa = document.createElement("div");
  defensa.append(document.createTextNode("Defensa: " + mercenario.getDefensa()));
  const velocidad = document.createElement("div");
  velocidad.append(document.createTextNode("Velocidad: " + mercenario.getVelocidad()));
  const estado = document.createElement("div");
  estado.append(document.createTextNode("Estado: " + mercenario.getEstado()));

  carta.append(nombre);
  carta.append(vidaMax);
  carta.append(vidaActual);
  carta.append(dano);
  carta.append(defensa);
  carta.append(velocidad);
  carta.append(estado);
  if (ubicacion != undefined) {
    ubicacion.append(carta);
  }
}
