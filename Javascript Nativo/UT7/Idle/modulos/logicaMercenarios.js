import { Mercenario } from "./classes/mercenario.js";
import listaNombres from "../datos/nombres.json" assert { type: "json" };

const vidaDefaultMinima = 100;
const vidaDefaultMaxima = 200;
const defensaDefaultMinima = 10;
const defensaDefaultMaxima = 30;
const danoDefaultMinima = 10;
const danoDefaultMaxima = 25;
const velocidadDefaultMinima = 5;
const velocidadDefaultMaxima = 15;

/**
 * Genera un numero al azar entre el rango introducido
 * @date 11/29/2023 - 4:13:06 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {number} [numMinimo=0]
 * @param {number} [numMaximo=1]
 * @param {number} [numTiradas=1] al aumentar el numero de intentos el valor devuelto es mas cercano al punto medio del rango
 * @param {number} [valorInicial=0]
 * @returns {number}
 */
function generarNumAzar(numMinimo = 0, numMaximo = 1, numTiradas = 1, valorInicial = 0) {
  numMinimo = numMinimo / numTiradas;
  numMaximo = numMaximo / numTiradas;
  let valorAzar = valorInicial;

  for (let index = 0; index < numTiradas; index++) {
    let numAzar = Math.random() * (numMaximo - numMinimo);
    valorAzar = valorAzar + numMinimo + numAzar;
  }

  return Math.round(valorAzar);
}

/**
 * Obtiene un nombre al azar de la lista de nombres
 * @date 11/29/2023 - 4:10:29 PM
 * @author Aaron Medina Rodriguez
 *
 * @returns {string}
 */
function generarNombre() {
  const numNombres = listaNombres.nombres.length;
  const numAzar = Math.floor(Math.random() * numNombres);
  const nombreAzar = listaNombres.nombres[numAzar];
  return nombreAzar;
}

/**
 * Genera un nuevo mercenario con atributos al azar
 * @date 11/29/2023 - 4:10:43 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @returns {Mercenario}
 */
export function generarMercenarioNuevo() {
  const nombre = generarNombre();
  const vidaAzar = generarNumAzar(vidaDefaultMinima, vidaDefaultMaxima, 3);
  const defensaAzar = generarNumAzar(defensaDefaultMinima, defensaDefaultMaxima, 3);
  const danoAzar = generarNumAzar(danoDefaultMinima, danoDefaultMaxima, 3);
  const velocidadAzar = generarNumAzar(velocidadDefaultMinima, velocidadDefaultMaxima, 3);

  const mercenario = new Mercenario(nombre, vidaAzar, danoAzar, velocidadAzar, defensaAzar);
  return mercenario;
}
