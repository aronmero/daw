import {Bolsa} from "./modulos/bolsa.js"

document.getElementById("enviar").addEventListener("click",crearBolsa);
let bolsa= new Bolsa();

function crearBolsa(params) {
   let fecha = document.getElementById("fecha").value;
   let cocinero = document.getElementById("cocinero").value;
   let destinatario = document.getElementById("destinatario").value;
   let gramos = document.getElementById("gramos").value;
   let composicion = document.getElementById("composicion").value;
   let numCuenta = document.getElementById("numCuenta").value;
   debugger
}