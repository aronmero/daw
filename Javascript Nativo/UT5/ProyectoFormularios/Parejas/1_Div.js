import {
  anadirClase,
  crearElemento,
  eliminarClase,
} from "./modulos/crearElemento.js";
import { urlImagenes } from "./imagenes.js";
let celdas = document.getElementsByTagName("div");
let numMovimientos = 0;
let cartasAcertadas = 0;
let cartasVolteadas = 0;
let ultimaCartaVolteada;

/**
 * Oculta todas las tarjetas no acertadas
 * @author Aarón Medina Rodríguez
 */
function ocultar() {
  for (let index = 0; index < celdas.length; index++) {
    if (celdas[index].getElementsByTagName("p")[0].innerHTML != 1) {
      eliminarClase(celdas[index], "revelada");
    }
  }
}

/**
 * Voltea una carta si no esta volteada, si hay mas de una volteada comprueba si son iguales.
 * @author Aarón Medina Rodríguez
 */
function voltear() {
  if (this.parentNode.classList.contains("revelada")) {
    return;
  }
  numMovimientos++;
  if (cartasVolteadas > 1) {
    ocultar();
    cartasVolteadas = 0;
  }
  if (cartasVolteadas == 0) {
    anadirClase(this.parentNode, "revelada");
    cartasVolteadas++;
    ultimaCartaVolteada = this.parentNode;
  } else if (cartasVolteadas == 1) {
    anadirClase(this.parentNode, "revelada");
    cartasVolteadas++;
    comprobarCarta(this.parentNode);
  }
}

/**
 * Compara la tarjeta actual con la anterior volteada. Si son iguales cambia el color
 * @author Aarón Medina Rodríguez
 * @param {HTMLTableCellElement} tarjeta
 */
function comprobarCarta(tarjeta) {
  let imagenUltimaCarta = ultimaCartaVolteada.getElementsByTagName("img")[0];
  let imagen = tarjeta.getElementsByTagName("img")[0];
  if (imagenUltimaCarta.getAttribute("src") == imagen.getAttribute("src")) {
    tarjeta.getElementsByTagName("p")[0].innerHTML = "1";
    ultimaCartaVolteada.getElementsByTagName("p")[0].innerHTML = "1";
    anadirClase(tarjeta, "acertada");
    anadirClase(ultimaCartaVolteada, "acertada");
    cartasAcertadas = cartasAcertadas + 2;
    cartasVolteadas = 0;
    pantallaFinal();
  }
}

/**
 * Imprime en el HTML las imagenes apartir de un array
 * @author Aarón Medina Rodríguez
 */
function imprimirImagenes() {
  for (let index = 0; index < celdas.length; index++) {
    celdas[index]
      .getElementsByTagName("img")[0]
      .setAttribute("src", urlImagenes[index]);
  }
}

/**
 * Muestra el numero de movimientos utilizados
 * @author Aarón Medina Rodríguez
 */
function pantallaFinal() {
  if (cartasAcertadas >= 12) {
    const elemento = crearElemento(
      "h2",
      "Te ha llevado " + numMovimientos + " movimientos"
    );
    document.body.appendChild(elemento);
  }
}

//* Añadir eventos a los botones
let botones = document.getElementsByTagName("button");
for (let index = 0; index < botones.length; index++) {
  botones[index].addEventListener("click", voltear);
}

imprimirImagenes();
