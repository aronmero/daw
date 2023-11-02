import { Bolsa } from "./modulos/bolsa.js";

document.getElementById("enviar").addEventListener("click", crearBolsa);
let bolsa = new Bolsa();

function crearBolsa(params) {
  let isDatosCorrectos = true;

  let fecha = document.getElementById("fecha").value;
  const regFecha = /\d{2}\/\d{2}\/\d{4}/;
  if (!fecha.match(regFecha)) {
    isDatosCorrectos = false;
  }

  let cocinero = document.getElementById("cocinero").value;
  const regCocinero = /[A-Z]{2}\W\d{4}/;
  if (!cocinero.match(regCocinero)) {
    isDatosCorrectos = false;
  }

  let destinatario = document.getElementById("destinatario").value;
  const regDireccion = /[A-Z]{2,3}_[a-z]*:\d{4}/;
  if (!destinatario.match(regDireccion)) {
    isDatosCorrectos = false;
  }

  let gramos = document.getElementById("gramos").value;
  const regGramos = /\d{3,4}/g;
  if (!gramos.match(regGramos) && gramos > 200 && gramos < 5000) {
    isDatosCorrectos = false;
  }

  let composicion = document.getElementById("composicion").value;
  const regComposicion = /\d{2,4}g[A-Z]{1,2}\d?[A-Z]{1,2}\d?/;
  if (!composicion.match(regComposicion)) {
    isDatosCorrectos = false;
  }

  let numCuenta = document.getElementById("numCuenta").value;
  const regCuenta = /[a-z]{2}\d{2}-\d{12}-\d{2}/;
  if (!numCuenta.match(regCuenta)) {
    isDatosCorrectos = false;
  }

  console.log(isDatosCorrectos);
}
