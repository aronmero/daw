import { disco } from "./modulos/disco.js";
import {
  mostrarElementoIndicado,
  mostrarElementos,
  mostrarElementoIntervalo,
  mostrarElementosInverso,
  mostrarElementosOrdenados,
  mostrarNumElementos,
  mostrarPosicionIndicada,
  insertarFinal,
  insertarPrincipio,
  limpiarMuestraDatos,
  borrarFinal,
  borrarPrincipio,
  mostrarPanel1,
  mostrarPanel2,
} from "./modulos/array.js";

let opcion = document.getElementById("opciones");
let mostrarDatos = document.getElementById("mostrarDatos");
let valorExtra = document.getElementById("valorExtra");
let valorExtra2 = document.getElementById("valorExtra2");
let selectorOpciones = document.getElementById("selectorOpciones");

let almacenDiscos = new Array();
let juan = new disco("paco", "el teniente", 2023, 2, 3);
document.getElementById("boton").addEventListener("click", procesamiento);
document.getElementById("boton2").addEventListener("click", procesamiento);
function procesamiento() {
  switch (opcion.value) {
    case "1":
      mostrarDatos.innerHTML =
        "Hay " + mostrarNumElementos(almacenDiscos) + " discos almacenados";
      break;
    case "2":
      mostrarPanel2();
      switch (parseInt(valorExtra.value)) {
        case 1:
          mostrarElementos(almacenDiscos, mostrarDatos);
          mostrarPanel1();
          break;
        case 2:
          mostrarElementosInverso(almacenDiscos, mostrarDatos);
          mostrarPanel1();
          break;
        case 3:
          mostrarElementosOrdenados(almacenDiscos, mostrarDatos);
          mostrarPanel1();
          break;
        default:
          break;
      }
      break;
    case "3":
      mostrarPanel2();
      valorExtra2.hidden = false;

      if (valorExtra.value != "" && valorExtra2.value != "") {
        mostrarElementoIntervalo(
          almacenDiscos,
          mostrarDatos,
          valorExtra.value,
          valorExtra2.value
        );

        mostrarPanel1();
        valorExtra2.hidden = true;
      }
      break;
    case "4":
      mostrarPanel2();
      switch (valorExtra.value) {
        case 1:
          ///ESTA MAL EL INSERTAR ⚠⚠⚠⚠⚠⚠⚠⚠
          if (insertarPrincipio(almacenDiscos, valorExtra.value) != null) {
            mostrarDatos.innerHTML = "Valor insertado";
          } else {
            mostrarDatos.innerHTML = "Valor no insertado";
          }
          mostrarPanel1();
          break;
        case 2:
          //ESTA MAL EL INSERTAR ⚠⚠⚠⚠⚠⚠⚠⚠
          if (insertarFinal(almacenDiscos, valorExtra.value) != null) {
            mostrarDatos.innerHTML = "Valor insertado";
          } else {
            mostrarDatos.innerHTML = "Valor no insertado";
          }
          mostrarPanel1();
          break;

        default:
          break;
      }
      break;
    case "5":
      mostrarPanel2();
      switch (valorExtra.value) {
        case 1:
          ///ESTA MAL EL borrar ⚠⚠⚠⚠⚠⚠⚠⚠
          if ((elementoTemp = borrarPrincipio(almacenDiscos)) == undefined) {
            mostrarDatos.innerHTML = "No hay elemento que eliminar";
          } else {
            mostrarDatos.innerHTML = elementoTemp;
          }
          mostrarPanel1();
          break;
        case 2:
          //ESTA MAL EL borrar ⚠⚠⚠⚠⚠⚠⚠⚠
          if ((elementoTemp = borrarFinal(almacenDiscos)) == undefined) {
            mostrarDatos.innerHTML = "No hay elemento que eliminar";
          } else {
            mostrarDatos.innerHTML = elementoTemp;
          }
          mostrarPanel1();
          break;

        default:
          break;
      }
      break;
    case "6":
      mostrarPanel2();
      switch (valorExtra.value) {
        case 1:
          ///ESTA MAL EL CONSULTAR ⚠⚠⚠⚠⚠⚠⚠⚠
          if (valorExtra.value != "") {
            if (
              (elementoTemp = mostrarElementoIndicado(
                almacenDiscos,
                valorExtra.value
              )) == undefined
            ) {
              mostrarDatos.innerHTML = "No hay elemento que mostrar";
            } else {
              mostrarDatos.innerHTML = elementoTemp;
            }
            mostrarPanel1();
          }
          break;
        case 2:
          //ESTA MAL EL CONSULTAR ⚠⚠⚠⚠⚠⚠⚠⚠
          if (valorExtra.value != "") {
            if (
              (elementoTemp = mostrarPosicionIndicada(
                almacenDiscos,
                valorExtra.value
              )) == -1
            ) {
              mostrarDatos.innerHTML = "No hay elemento que mostrar";
            } else {
              mostrarDatos.innerHTML = elementoTemp;
            }
            mostrarPanel1();
          }
          break;

        default:
          break;
      }
      break;

    default:
      break;
  }

  insertarFinal(almacenDiscos, juan);
  console.log(juan);
}
