import { Bolsa } from "./modulos/bolsa.js";
document.getElementById("enviar").addEventListener("click", crearBolsa);
let bolsa;
const letras = "abcdefghijklmnopqrstuvwxyz".split("");

function crearBolsa() {
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
  numCuenta = numCuenta.toLowerCase();
  const regCuenta = /[a-z]{2}\d{2}-\d{12}-\d{2}/;
  const numCuentaLimpio = numCuenta.replace(/-/g, "");
  if (!numCuenta.match(regCuenta)) {
    isDatosCorrectos = false;
  } else {
    const valorLetras =
      letras.indexOf(numCuenta.charAt(0)) +
      1 +
      letras.indexOf(numCuenta.charAt(1)) +
      1;
    const valorDigitos = parseInt(numCuenta.charAt(2) + numCuenta.charAt(3));

    /** Separacion de los 12 digitos en dos numeros enteros*/
    const doceDigitos = numCuenta.slice(5, 17);
    const primerosSeisDigitos = doceDigitos.slice(0, 6).split("");
    let sumaPrimerosSeisDigitos = 0;
    for (let index = 0; index < primerosSeisDigitos.length; index++) {
      sumaPrimerosSeisDigitos =
        sumaPrimerosSeisDigitos + parseInt(primerosSeisDigitos[index]);
    }
    sumaPrimerosSeisDigitos = parseInt(sumaPrimerosSeisDigitos / 6);

    const segundosSeisDigitos = doceDigitos.slice(6, 12).split("");
    let sumaSegundosSeisDigitos = 0;
    for (let index = 0; index < segundosSeisDigitos.length; index++) {
      sumaSegundosSeisDigitos =
        sumaSegundosSeisDigitos + parseInt(segundosSeisDigitos[index]);
    }
    sumaSegundosSeisDigitos = parseInt(sumaSegundosSeisDigitos / 6);
    /**/

    if (
      valorLetras == valorDigitos &&
      sumaPrimerosSeisDigitos == parseInt(numCuenta.charAt(18)) &&
      sumaSegundosSeisDigitos == parseInt(numCuenta.charAt(19))
    ) {
      document.getElementsByName("numCuentaLimpio")[0].innerHTML =
        numCuentaLimpio;
    } else {
      isDatosCorrectos = false;
    }
  }
  if (isDatosCorrectos) {
    bolsa = new Bolsa(
      fecha,
      cocinero,
      destinatario,
      gramos,
      composicion,
      numCuentaLimpio
    );
    document.getElementById("mostrarBolsa").innerHTML =
      "<p>" +
      "<b>Fecha:</b> " +
      bolsa.getFecha() +
      "<br><b>Cocinero:</b> " +
      bolsa.getCocinero() +
      "<br><b>Destinatario:</b> " +
      bolsa.getDestinatario() +
      "<br><b>Gramos:</b> " +
      bolsa.getGramos() +
      "g" +
      "<br><b>Composicion:</b> " +
      bolsa.getComposicion() +
      "<br><b>Numero de cuenta:</b> " +
      bolsa.getNumCuenta() +
      "</p>";
  }
}
