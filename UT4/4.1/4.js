import { disco } from "./modulos/disco.js";
import {
  mostrarElementoIndicado,
  mostrarElementos,
  mostrarElementoIntervalo,
  mostrarElementosInverso,
  mostrarElementosOrdenados,
  mostrarNumElementos,
  insertarFinal,
  insertarPrincipio,
  limpiarMuestraDatos,
  borrarFinal,
  borrarPrincipio,
} from "./modulos/array.js";

let opcion = document.getElementById("opciones");
let mostrarDatos = document.getElementById("mostrarDatos");
let valorExtra = document.getElementById("valorExtra");
let valorExtra2 = document.getElementById("valorExtra2");
let valorExtraTextual = document.getElementById("valorExtraTextual");
let nombreDisco = document.getElementById("nombreDisco");
let grupoCantante = document.getElementById("grupoCantante");
let anioPublicacion = document.getElementById("anioPublicacion");
let tipoMusica = document.getElementById("tipoMusica");
let localizacion = document.getElementById("localizacion");
let opcionInsertado = document.getElementById("opcionInsertado");
let opcionMostrado = document.getElementById("opcionMostrado");
let opcionConsulta = document.getElementById("opcionConsulta");
let elementoTemp;
let almacenDiscos = new Array();

let panelConsultaEspecifico = document.getElementById(
  "panelConsultaEspecifico"
);
document.getElementById("boton").addEventListener("click", procesamiento);
document.getElementById("boton2").addEventListener("click", procesamiento);
document.getElementById("boton3").addEventListener("click", procesamiento);
document.getElementById("boton4").addEventListener("click", procesamiento);
document.getElementById("boton5").addEventListener("click", procesamiento);
document.getElementById("boton6").addEventListener("click", procesamiento);

ocultarPaneles();
mostrarPanelSelector();

function procesamiento() {
  switch (opcion.value) {
    case "1":
      limpiarMuestraDatos(mostrarDatos);
      mostrarDatos.innerHTML = "<h1>Mostrar número de discos.</h1>";
      mostrarDatos.innerHTML =
        mostrarDatos.innerHTML +
        "Hay " +
        mostrarNumElementos(almacenDiscos) +
        " discos almacenados";
      break;
    case "2":
      limpiarMuestraDatos(mostrarDatos);
      ocultarPaneles();
      mostrarPanelOrdenMostrado();
      procesamientoOrderMostrar();
      break;
    case "3":
      limpiarMuestraDatos(mostrarDatos);
      ocultarPaneles();
      mostrarPanelOpcionesExtra();
      valorExtra2.style = "display:block";

      if (valorExtra.value != "" && valorExtra2.value != "") {
        mostrarDatos.innerHTML = "<h1>Mostrar un intervalo de discos</h1>";
        mostrarElementoIntervalo(
          almacenDiscos,
          mostrarDatos,
          valorExtra.value,
          valorExtra2.value
        );

        if (
          mostrarDatos.innerHTML == "<h1>Mostrar un intervalo de discos</h1>"
        ) {
          mostrarDatos.innerHTML =
            mostrarDatos.innerHTML + "No hay elemento que mostrar";
        }
        ocultarPaneles();
        mostrarPanelSelector();
        valorExtra2.style = "display:none";
      }
      break;
    case "4":
      limpiarMuestraDatos(mostrarDatos);
      ocultarPaneles();

      mostrarPanelOrden();

      procesamientoInsertarDisco();

      break;
    case "5":
      limpiarMuestraDatos(mostrarDatos);
      ocultarPaneles();
      mostrarPanelOrden();
      procesamientoBorrarDisco();

      break;
    case "6":
      limpiarMuestraDatos(mostrarDatos);
      ocultarPaneles();
      mostrarConsulta();
      switch (opcionConsulta.value) {
        case "1":
          ocultarPaneles();
          crearPanelConsultaEspecifica(0);
          procesamientoConsultaElemento();
          break;
        case "2":
          ocultarPaneles();
          crearPanelConsultaEspecifica(1);
          procesamientoConsultaPosicion();
          break;

        default:
          break;
      }

      break;
    default:
      break;
  }
}
/**
 * Procesamiento borrar disco. Segun la opcion del HTML elimina un disco al principio o al final del array y lo muestra en "mostrarDatos"
 * @param {HTMLElement|document.getElementById} opcionInsertado.value Opcion del HTML
 * @param {HTMLElement|document.getElementById} mostrarDatos ubicacion mostrar datos en HTML
 */
function procesamientoBorrarDisco() {
  switch (opcionInsertado.value) {
    case "1":
      if ((elementoTemp = borrarPrincipio(almacenDiscos)) == undefined) {
        mostrarDatos.innerHTML = "<h1>Borrar un disco al principio.</h1>";
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "No hay elemento que eliminar";
      } else {
        mostrarDatos.innerHTML = "<h1>Borrar un disco al principio.</h1>";
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "El elemento eliminado fue: " + elementoTemp;
      }
      ocultarPaneles();
      mostrarPanelSelector();
      break;
    case "2":
      if ((elementoTemp = borrarFinal(almacenDiscos)) == undefined) {
        mostrarDatos.innerHTML = "<h1>Borrar un disco al final..</h1>";
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "No hay elemento que eliminar";
      } else {
        mostrarDatos.innerHTML = "<h1>Borrar un disco al final..</h1>";
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "El elemento eliminado fue: " + elementoTemp;
      }
      ocultarPaneles();
      mostrarPanelSelector();
      break;

    default:
      break;
  }
}

/**
 * Procesamiento insertar disco. Segun la opcion del HTML crea un disco nuevo y introduce un disco al principio o al final del array
 * @param {HTMLElement|document.getElementById} opcionInsertado.value Opcion del HTML
 */
function procesamientoInsertarDisco() {
  if (opcionInsertado.value != "") {
    ocultarPaneles();
    mostrarPanelInsertar();
    if (
      nombreDisco.value != "" &&
      grupoCantante.value != "" &&
      anioPublicacion.value != "" &&
      tipoMusica.value != "" &&
      localizacion.value != ""
    ) {
      if (opcionInsertado.value == 1) {
        mostrarDatos.innerHTML = "<h1>Añadir un disco al principio.</h1>";
        if (
          insertarPrincipio(
            almacenDiscos,
            crearDisco(
              nombreDisco.value,
              grupoCantante.value,
              anioPublicacion.value,
              tipoMusica.value,
              localizacion.value
            )
          ) != null
        ) {
          mostrarDatos.innerHTML = mostrarDatos.innerHTML + "Valor insertado";
        } else {
          mostrarDatos.innerHTML =
            mostrarDatos.innerHTML + "Valor no insertado";
        }
        ocultarPaneles();
        mostrarPanelSelector();
      } else if (opcionInsertado.value == 2) {
        mostrarDatos.innerHTML = "<h1>Añadir un disco al final.</h1>";
        if (
          insertarFinal(
            almacenDiscos,
            crearDisco(
              nombreDisco.value,
              grupoCantante.value,
              anioPublicacion.value,
              tipoMusica.value,
              localizacion.value
            )
          ) != null
        ) {
          mostrarDatos.innerHTML = mostrarDatos.innerHTML + "Valor insertado";
        } else {
          mostrarDatos.innerHTML =
            mostrarDatos.innerHTML + "Valor no insertado";
        }
        ocultarPaneles();
        mostrarPanelSelector();
      }
    }
  }
}

/**
 * Procesamiento mostrar. Segun la opcion introducida, muestra el array de discos en un orden. 1 actual, 2 inverso, 3 alfabeticamente
 * @param {HTMLElement|document.getElementById} opcionMostrado.value Opcion del HTML
 */
function procesamientoOrderMostrar() {
  switch (opcionMostrado.value) {
    case "1":
      mostrarDatos.innerHTML =
        "<h1>Mostrar listado de discos. Orden actual</h1>";
      mostrarElementos(almacenDiscos, mostrarDatos);
      if (
        mostrarDatos.innerHTML ==
        "<h1>Mostrar listado de discos. Orden actual</h1>"
      ) {
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "No hay elemento que mostrar";
      }
      ocultarPaneles();
      mostrarPanelSelector();
      break;
    case "2":
      mostrarDatos.innerHTML =
        "<h1>Mostrar listado de discos. Orden inverso</h1>";
      mostrarElementosInverso(almacenDiscos, mostrarDatos);
      if (
        mostrarDatos.innerHTML ==
        "<h1>Mostrar listado de discos. Orden inverso</h1>"
      ) {
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "No hay elemento que mostrar";
      }
      ocultarPaneles();
      mostrarPanelSelector();
      break;
    case "3":
      mostrarDatos.innerHTML =
        "<h1>Mostrar listado de discos. Orden alfabetico</h1>";
      mostrarElementosOrdenados(almacenDiscos, mostrarDatos);
      if (
        mostrarDatos.innerHTML ==
        "<h1>Mostrar listado de discos. Orden alfabetico</h1>"
      ) {
        mostrarDatos.innerHTML =
          mostrarDatos.innerHTML + "No hay elemento que mostrar";
      }
      ocultarPaneles();
      mostrarPanelSelector();
      break;
    default:
      break;
  }
}

/**
 * Proceso consulta posicion. Busca la posicion de un disco, si lo encuentra lo muestra
 */
function procesamientoConsultaPosicion() {
  if (consultaNombreDisco.value != "") {
    if (
      (elementoTemp = mostrarPosicionIndicada(
        almacenDiscos,
        consultaNombreDisco.value
      )) == -1
    ) {
      mostrarDatos.innerHTML = "<h1>Consultar posicion de un disco.</h1>";
      mostrarDatos.innerHTML =
        mostrarDatos.innerHTML + "No hay elemento que mostrar";
    } else {
      mostrarDatos.innerHTML = "<h1>Consultar posicion de un disco.</h1>";
      mostrarDatos.innerHTML =
        mostrarDatos.innerHTML +
        "El disco se encuentra en la posicion " +
        elementoTemp;
    }
    ocultarPaneles();
    mostrarPanelSelector();
  }
}

/**
 * Proceso consulta elemento. Busca el nombre de un disco introducido, si lo encuentra lo muestra
 */
function procesamientoConsultaElemento() {
  if (consultaPosicion.value != "") {
    if (
      (elementoTemp = mostrarElementoIndicado(
        almacenDiscos,
        consultaPosicion.value
      )) == undefined
    ) {
      mostrarDatos.innerHTML = "<h1>Consultar un disco.</h1>";
      mostrarDatos.innerHTML =
        mostrarDatos.innerHTML + "No hay elemento que mostrar";
    } else {
      mostrarDatos.innerHTML = mostrarDatos.innerHTML + elementoTemp;
    }
    ocultarPaneles();
    mostrarPanelSelector();
  }
}

/**
 * Genera en el html un panel de consulta especifico para disco
 * @param {number} opcion 0 para ver elemento 1 para ver posicion
 */
function crearPanelConsultaEspecifica(opcion) {
  panelConsultaEspecifico.innerHTML = "";
  if (opcion == 0) {
    panelConsultaEspecifico.innerHTML =
      panelConsultaEspecifico.innerHTML +
      ' <p>Introduce la posicion del disco</p><input type="number" id="consultaPosicion" />';
    panelConsultaEspecifico.innerHTML =
      panelConsultaEspecifico.innerHTML + '<button id="boton7">Enviar</button>';
    document
      .getElementById("boton7")
      .addEventListener("click", procesamientoConsultaElemento);
  } else if (opcion == 1) {
    panelConsultaEspecifico.innerHTML =
      panelConsultaEspecifico.innerHTML +
      ' <p>Introduce el nombre del disco</p><input type="text" id="consultaNombreDisco" />';
    panelConsultaEspecifico.innerHTML =
      panelConsultaEspecifico.innerHTML + '<button id="boton8">Enviar</button>';
    document
      .getElementById("boton8")
      .addEventListener("click", procesamientoConsultaPosicion);
  }
}

/**
 *
 * @param {disco} array
 * @param {String} elemento dentro del array que se desea buscar
 * @returns Muestra el elemento del array indicado
 */
export function mostrarPosicionIndicada(array = [], elemento) {
  for (let index = 0; index < array.length; index++) {
    const element = array[index];
    if (elemento == element.obtenerNombre()) {
      return index;
    }
  }
  return -1;
}

/**
 * Creacion de un disco
 * @param {String} nombreDisco
 * @param {String} grupoCantante
 * @param {Number} anioPublicacion
 * @param {Number} tipoMusica
 * @param {Number} localizacion
 * @returns devuelve el disco creado
 */
function crearDisco(
  nombreDisco,
  grupoCantante,
  anioPublicacion,
  tipoMusica,
  localizacion
) {
  let tempDisco = new disco(
    nombreDisco,
    grupoCantante,
    anioPublicacion,
    tipoMusica,
    localizacion
  );
  return tempDisco;
}

/**
 * Oculta todos los paneles del html
 */
function ocultarPaneles() {
  document.getElementById("opcionesExtra").style = "display:none";
  document.getElementById("selectorOpciones").style = "display:none";
  document.getElementById("insertarDisco").style = "display:none";
  document.getElementById("panelOrden").style = "display:none";
  document.getElementById("panelOrdenMostrado").style = "display:none";
  document.getElementById("panelConsulta").style = "display:none";
  panelConsultaEspecifico.innerHTML = "";
}
/**
 *  Muestra el panel primario. Reinicio el valor de las opciones extra a ""
 */
function mostrarPanelSelector() {
  valorExtra.value = "";
  valorExtra2.value = "";
  valorExtraTextual.value = "";
  nombreDisco.value = "";
  grupoCantante.value = "";
  anioPublicacion.value = "";
  tipoMusica.value = "";
  localizacion.value = "";
  opcionInsertado.value = "";
  opcionMostrado.value = "";
  opcionConsulta.value = "";

  document.getElementById("selectorOpciones").style = "display:flex";
}
/**
 *  Muestra el panel de opciones extra.
 */
function mostrarPanelOpcionesExtra() {
  document.getElementById("opcionesExtra").style = "display:flex";
  valorExtra2.style = "display:none";
  valorExtraTextual.style = "display:none";
}

/**
 *  Muestra el panel de insertado.
 */
function mostrarPanelInsertar() {
  document.getElementById("insertarDisco").style = "display:flex";
}

/**
 *  Muestra el panel de Orden.
 */
function mostrarPanelOrden() {
  document.getElementById("panelOrden").style = "display:flex";
}

/**
 *  Muestra el panel de Orden mostrado
 */
function mostrarPanelOrdenMostrado() {
  document.getElementById("panelOrdenMostrado").style = "display:flex";
}

/**
 *  Muestra el panel de consulta.
 */
function mostrarConsulta() {
  document.getElementById("panelConsulta").style = "display:flex";
}
