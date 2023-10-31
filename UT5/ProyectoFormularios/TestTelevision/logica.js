import {
  crearElemento,
  anadirClase,
  anadirId,
  eliminarClase,
} from "./modulos/crearElemento.js";

import { Pregunta } from "./modulos/pregunta.js";

/** Id de preguntas Activas*/
export let preguntasTest = new Array();
/** Preguntas Totales*/
export let preguntas = new Array();
let puntuacioActual = 0;
let puntuacioTotal = 0;

/**
 *Crea los elementos HTML necesarios para generar una pregunta y sus respuestas
 *@export
 * @param {String} idPregunta id de la pregunta
 * @param {String} valorPuntuacion puntuacion de la pregunta
 * @param {String} textoPregunta enunciado de la pegunta
 * @param {Number} propuestaCorrecta propuesta correcta
 * @param {String} propuesta1 texto de respuesta para opcion 1
 * @param {String} propuesta2 texto de respuesta para opcion 2
 * @param {String} propuesta3 texto de respuesta para opcion 3
 */
export function crearPregunta(
  idPregunta,
  valorPuntuacion,
  textoPregunta,
  propuestaCorrecta,
  propuesta1,
  propuesta2,
  propuesta3
) {
  const prueba = new Pregunta(idPregunta, textoPregunta, valorPuntuacion);
  prueba.anadirPropuesta(propuesta1);
  prueba.anadirPropuesta(propuesta2);
  prueba.anadirPropuesta(propuesta3);
  prueba.setPropuestaCorrecta(propuestaCorrecta);

  preguntas[idPregunta] = prueba;
}

/**
 * Imprime en el HTML una pregunta
 * @param {Pregunta} pregunta
 * @export
 */
export function imprimirPregunta(pregunta) {
  let preguntaDiv = crearElemento("div");
  anadirClase(preguntaDiv, "pregunta");
  anadirId(preguntaDiv, pregunta.getIdPregunta());

  document.getElementById("formulario").appendChild(preguntaDiv);

  anadirPuntuacion();

  anadirEnunciado();
  preguntasTest.push(pregunta.getIdPregunta());
  /**
   * Crea el enunciado de una pregunta y sus posibles respuestas
   *
   */
  function anadirEnunciado() {
    let cuestion = crearElemento("div");
    anadirClase(cuestion, "formulario");
    document.getElementById(pregunta.getIdPregunta()).appendChild(cuestion);
    cuestion.appendChild(crearElemento("label", pregunta.getTextoPregunta()));
    const propuestas = pregunta.getPropuestas();

    let opcion = anadirOpcion(1, propuestas[0]);
    if (opcion != undefined) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(2, propuestas[1]);
    if (opcion != undefined) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(3, propuestas[2]);
    if (opcion != undefined) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(4, propuestas[3]);
    if (opcion != undefined) {
      cuestion.appendChild(opcion);
    }
  }

  /**
   * Crea los elementos de html necesarios para añadir una opcion al formulario
   *
   * @param {number} numOpcion
   * @param {String} textoOpcion
   * @return {HTMLDivElement} Un div con el radio buton y un label
   */
  function anadirOpcion(numOpcion, textoOpcion) {
    if (textoOpcion == undefined) {
      return null;
    } else {
      let propuesta = crearElemento("div");
      anadirClase(propuesta, "divRespuesta");
      let espacioComprobacion = crearElemento("label");
      anadirClase(espacioComprobacion, "espacioCheck");
      espacioComprobacion.setAttribute("name", "c" + pregunta.getIdPregunta());
      propuesta.appendChild(espacioComprobacion);

      let boton = crearElemento("input");
      boton.setAttribute("type", "radio");
      boton.setAttribute("value", numOpcion);
      boton.setAttribute("name", pregunta.getIdPregunta());
      propuesta.appendChild(boton);

      propuesta.appendChild(crearElemento("label", textoOpcion));
      return propuesta;
    }
  }

  /**
   * Añade el texto de puntuacion y su valor
   *
   */
  function anadirPuntuacion() {
    let puntuacion = crearElemento("div");
    anadirClase(puntuacion, "puntuacion");
    anadirId(puntuacion, "puntuacion" + pregunta.getIdPregunta());
    document.getElementById(pregunta.getIdPregunta()).appendChild(puntuacion);
    puntuacion.appendChild(crearElemento("p", "Puntuación"));

    let valorPuntuacion = pregunta.getPuntuacion();
    puntuacion.appendChild(crearElemento("p", valorPuntuacion.toFixed(2)));
  }
}

/**
 * Comprueba si todas las preguntas han sido respondidas, las que no son marcadas en con CSS.
 * Si todo esta respondido se llama a @function validarRespuestas
 * @function anadirMensajeError funcion local. Añade un mensaje de error al final del documento HTML
 */
function comprobarRespuestas() {
  let isCheckedAll = true;
  for (
    let i = 0;
    i < document.querySelectorAll("#formulario .pregunta").length;
    i++
  ) {
    let respuestas = document.getElementsByName(preguntasTest[i]);
    let isChecked = false;
    let pregunta = document.getElementById(preguntasTest[i]);
    for (let j = 0; j < 3; j++) {
      if (respuestas[j].checked == true) {
        isChecked = true;
        eliminarClase(pregunta, "preguntaSinResponder");
        break;
      }
      if (j == 2 && isChecked == false) {
        isCheckedAll = false;
        anadirClase(pregunta, "preguntaSinResponder");
      }
    }
  }

  if (isCheckedAll == true) {
    if (document.getElementById("divResultadoError") != undefined) {
      document.getElementById("divResultadoError").remove();
    }
    validarRespuestas();
  } else {
    anadirMensajeError();
  }

  /** Añade un mensajee de error al final avisando de que no se han respondido todas las preguntas.*/
  function anadirMensajeError() {
    let resultadoDiv = crearElemento("div");
    anadirClase(resultadoDiv, "divResultadoError");
    anadirId(resultadoDiv, "divResultadoError");
    let resultado = crearElemento(
      "p",
      "No has respondido a todas las preguntas"
    );
    resultadoDiv.appendChild(resultado);
    document.body.appendChild(resultadoDiv);
  }
}
/**
 *
 * Comprueba la respuesta almacenada con la seleccionada en el input, si son correctas suma la puntuacion.
 * Genera en el HTML un elemento si esta bien respondida o no.
 * @function actualizarPuntuacion actualiza las puntuaciones en el HTML
 * @function imprimirResultados imprime el resultado final en HTML
 */
function validarRespuestas() {
  for (
    let i = 0;
    i < document.querySelectorAll("#formulario .pregunta").length;
    i++
  ) {
    let respuestas = document.getElementsByName(preguntasTest[i]);

    let casillaResultado = document.getElementsByName("c" + preguntasTest[i]);
    let respuesta = preguntas[preguntasTest[i]];
    let puntuacion = 0.0;
    for (let j = 0; j < 3; j++) {
      respuestas[j].disabled = true;

      //Segun si es correcta o no cambia el color y actualiza la puntuacion
      if (respuestas[j].checked == true) {
        if (respuestas[j].value == respuesta.getPropuestaCorrecta()) {
          anadirClase(casillaResultado[j], "espacioCheckVerde");
          casillaResultado[j].innerHTML = "🗸";
          puntuacion = respuesta.getPuntuacion();
          actualizarPuntuacion(preguntasTest[i], puntuacion);
          puntuacioActual = puntuacioActual + puntuacion;
        } else {
          anadirClase(casillaResultado[j], "espacioCheckRojo");
          casillaResultado[j].innerHTML = "✗";
        }
      }

      if (j == 2) {
        actualizarPuntuacion(preguntasTest[i], puntuacion);
        puntuacioTotal = puntuacioTotal + respuesta.getPuntuacion();
      }
    }
  }
  imprimirResultados();
}

/**
 * Elimina el valor de puntuacion e imprime el valor actualizado
 * @param {String} id
 * @param {Number} puntuacion
 */
function actualizarPuntuacion(id, puntuacion) {
  let idPuntuacion = "puntuacion" + id;
  document.getElementById(idPuntuacion).innerHTML = "";
  document
    .getElementById(idPuntuacion)
    .appendChild(crearElemento("p", "Puntuación"));
  document
    .getElementById(idPuntuacion)
    .appendChild(crearElemento("p", puntuacion.toFixed(2)));

  let puntacion = preguntas[id];
  document
    .getElementById(idPuntuacion)
    .appendChild(
      crearElemento("p", "de " + puntacion.getPuntuacion().toFixed(2))
    );
}

function imprimirResultados() {
  let resultadoDiv = crearElemento("div");
  anadirClase(resultadoDiv, "resultadoDiv");
  let resultado = crearElemento(
    "p",
    "Tu puntuacion es de " + puntuacioActual + " sobre " + puntuacioTotal
  );
  resultadoDiv.appendChild(resultado);
  document.body.appendChild(resultadoDiv);
  document.getElementById("botonEnvio").remove();
}

//Añadir boton de envio
let botonEnvio = crearElemento("button", "Enviar y comprobar");
anadirId(botonEnvio, "botonEnvio");
document.getElementById("test").appendChild(botonEnvio);

document
  .getElementById("botonEnvio")
  .addEventListener("click", comprobarRespuestas);
