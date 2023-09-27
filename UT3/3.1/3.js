let tRestanteMinuto;
let tRestanteSegundo;
let textoImprimir;
let tipoTiempo = document.getElementById("tipoTiempo");
let tTrabajo;
let intervalo;
let isIniciado;
let isTrabajo;

intervalo = setInterval(function () {
  self.actualizarTRestante.apply(self);
}, 1000);

function iniciar() {
  isIniciado = true;
  isTrabajo = true;
  obtenerValores();
  tipoTiempo.innerHTML = "Tiempo de concentracion";
  tRestanteMinuto = tTrabajo;
  tRestanteSegundo = 0;
  
}

function obtenerValores() {
  //Obtiene el valor del input del html
  tTrabajo = document.getElementById("tTrabajo").value;
  //Asigna el valor default si es necesario
  if (tTrabajo == "") {
    tTrabajo = 0;
  }
  //Obtiene el valor del input del html
  tDescanso = document.getElementById("tDescanso").value;
  //Asigna el valor default si es necesario
  if (tDescanso == "") {
    tDescanso = 0;
  }
}


function actualizarTRestante() {
  if (isIniciado) {
    if (isTrabajo) {
      tipoTiempo.innerHTML = "Tiempo de concentracion";
    } else {
      tipoTiempo.innerHTML = "Tiempo de descanso";
    }
    //Anadir cer de relleno a la izquierda
    if (tRestanteMinuto > 10) {
      textoImprimir = tRestanteMinuto;
    } else {
      textoImprimir = "0" + tRestanteMinuto;
    }
    //Anadir cer de relleno a la izquierda
    if (tRestanteSegundo > 10) {
      textoImprimir = textoImprimir + ":" + tRestanteSegundo;
    } else {
      textoImprimir = textoImprimir + ":0" + tRestanteSegundo;
    }
    document.getElementById("tRestante").innerHTML = textoImprimir;
    reducirTRestante();
  }
}

function reducirTRestante() {
  let reduccion = 1; //Controlar la velocidad a la que disminuye el tiempo
  if (tRestanteSegundo - reduccion <= 0 && tRestanteMinuto > 0) {
    tRestanteMinuto = tRestanteMinuto - 1;
    tRestanteSegundo = 60 - reduccion;
  } else if (tRestanteSegundo - reduccion <= 0 && tRestanteMinuto == 0) {
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
