import { Mercenario } from "./mercenario.js";
import listaNombres from "../datos/nombres.json" assert { type: "json" };

const vidaDefaultMinima = 100;
const vidaDefaultMaxima = 200;
const defensaDefaultMinima = 10;
const defensaDefaultMaxima = 30;
const danoDefaultMinima = 10;
const danoDefaultMaxima = 25;
const velocidadDefaultMinima = 5;
const velocidadDefaultMaxima = 15;

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
function generarNombre() {
  const numNombres = listaNombres.nombres.length;
  const numAzar = Math.floor(Math.random() * numNombres);
  const nombreAzar = listaNombres.nombres[numAzar];
  return nombreAzar;
}

export function generarUnidadNueva() {
  const nombre = generarNombre();
  const vidaAzar = generarNumAzar(vidaDefaultMinima, vidaDefaultMaxima, 3);
  const defensaAzar = generarNumAzar(defensaDefaultMinima, defensaDefaultMaxima, 3);
  const danoAzar = generarNumAzar(danoDefaultMinima, danoDefaultMaxima, 3);
  const velocidadAzar = generarNumAzar(velocidadDefaultMinima, velocidadDefaultMaxima, 3);

  const unidad = new Mercenario(nombre, vidaAzar, danoAzar, velocidadAzar, defensaAzar);
  return unidad;
}
