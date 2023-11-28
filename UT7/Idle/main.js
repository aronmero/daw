import { Unidad } from "./modulos/unidad.js";

const vidaDefaultMinima = 100;
const vidaDefaultMaxima = 200;
const defensaDefaultMinima = 10;
const defensaDefaultMaxima = 30;
const danoDefaultMinima = 10;
const danoDefaultMaxima = 25;
const velocidadDefaultMinima = 5;
const velocidadDefaultMaxima = 15;

function generarNumAzar(
  numTiradas = 1,
  numMinimo = 0,
  numMaximo = 1,
  valorInicial = 0
) {
  let valorAzar = valorInicial;
  for (let index = 0; index < numTiradas; index++) {
    valorAzar =
      valorAzar +
      Math.ceil(numMinimo + Math.random() * (numMaximo - numMinimo));
  }
  return valorAzar;
}

function generarUnidadNueva(params) {
  /**TODO:generacion stats por dados es decir multiples MathRandom */
  const vidaAzar = Math.random();
  const defensaAzar = Math.random();
  const danoAzar = Math.random();
  const velocidadAzar = Math.random();

  let unidad = new Unidad();
}
