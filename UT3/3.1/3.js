let tTrabajo;
let tDescanso;
let tRestanteMinuto;
let tRestanteSegundo;
let textoImprimir;
let tipoTiempo = document.getElementById("tipoTiempo");
let intervalo;
let isIniciado;
let isTrabajo;

intervalo = setInterval(function () {actualizarTRestante();}, 1000);

function iniciar() {
  isIniciado = true;
  isTrabajo = true;
  obtenerValores();
  tipoTiempo.innerHTML = "Tiempo de concentracion";
  tRestanteMinuto = tTrabajo;
  tRestanteSegundo = 0;
}

//Obtener valores del html
function obtenerValores() {
  tTrabajo = document.getElementById("tTrabajo").value;
  if (tTrabajo == "") {
    tTrabajo = 0;
  }
  tDescanso = document.getElementById("tDescanso").value;
  if (tDescanso == "") {
    tDescanso = 0;
  }
}

//Imprime los valores en el html
function actualizarTRestante() {
  if (isIniciado) {
    if (isTrabajo) {
      tipoTiempo.innerHTML = "Tiempo de concentracion";
    } else {
      tipoTiempo.innerHTML = "Tiempo de descanso";
    }
    //Anadir cero de relleno a la izquierda
    if (tRestanteMinuto > 10) {
      textoImprimir = tRestanteMinuto;
    } else {
      textoImprimir = "0" + tRestanteMinuto;
    }
    //Anadir cero de relleno a la izquierda
    if (tRestanteSegundo > 10) {
      textoImprimir = textoImprimir + ":" + tRestanteSegundo;
    } else {
      textoImprimir = textoImprimir + ":0" + tRestanteSegundo;
    }
    document.getElementById("tRestante").innerHTML = textoImprimir;
    reducirTRestante();
  }
}

//Reduce los contadores de tiempo
function reducirTRestante() {
  let reduccion = 1; //Controlar la velocidad a la que disminuye el tiempo
  if (tRestanteSegundo - reduccion <= 0 && tRestanteMinuto > 0) {
    tRestanteMinuto = tRestanteMinuto - 1;
    tRestanteSegundo = 60 - reduccion;
  } else if (tRestanteSegundo - reduccion <= 0 && tRestanteMinuto == 0) {
    //Cambio de un tiempo al otro
    if (isTrabajo) {
      isTrabajo = false;
      tRestanteMinuto = tDescanso;
      tRestanteSegundo = 0;
    } else {
      isTrabajo = true;
      tRestanteMinuto = tTrabajo;
      tRestanteSegundo = 0;
    }
  } else {
    tRestanteSegundo = tRestanteSegundo - reduccion;
  }
}
