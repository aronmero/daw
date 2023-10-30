import { crearElemento, anadirClase, anadirId } from "./crearElemento.js";
import { Pregunta } from "./pregunta.js";

/** Id de preguntas Activas*/
let preguntasTest = new Array();
/** Preguntas Totales*/
let preguntas = new Array();

/**
 *Crea los elementos HTML necesarios para generar una pregunta y sus respuestas
 *
 * @param {String} idPregunta id de la pregunta
 * @param {String} valorPuntuacion puntuacion de la pregunta
 * @param {String} textoPregunta enunciado de la pegunta
 * @param {Number} propuestaCorrecta propuesta correcta
 * @param {String} propuesta1 texto de respuesta para opcion 1
 * @param {String} propuesta2 texto de respuesta para opcion 2
 * @param {String} propuesta3 texto de respuesta para opcion 3
 */
function crearPregunta(
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
 */
function imprimirPregunta(pregunta) {
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
 *
 * Valida las respuestas del HTML con respecto al array de preguntas
 */
function validarRespuestas() {
  for (
    let i = 0;
    i < document.querySelectorAll("#formulario .pregunta").length;
    i++
  ) {
    let respuestas = document.getElementsByName(preguntasTest[i]);
    let respuesta = preguntas[preguntasTest[i]];
    for (let j = 0; j < 3; j++) {
      let puntuacion = 0.0;

      respuestas[j].disabled = true;
      //TODO: cambiar el if a uno doble para poner el check verde o el rojo
      if (
        respuestas[j].checked == true &&
        respuestas[j].value == respuesta.getPropuestaCorrecta()
      ) {
        puntuacion = respuesta.getPuntuacion();
        actualizarPuntuacion(preguntasTest[i], puntuacion);
        break;
      }
      if (j == 2) {
        actualizarPuntuacion(preguntasTest[i], puntuacion);
      }
    }
  }
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

crearPregunta("pre01", 1.0, "Lorem", 1, "aaa", "bbb", "ccc");
crearPregunta("pre02", 13.0, "Lorem", 2, "a", "bbb", "ccc");
crearPregunta("pre03", 2.0, "Lorem", 3, "b", "bbb", "ccc");
crearPregunta("pre04", 1.5, "Lorem", 3, "d", "bbb", "ccc");
crearPregunta("pre05", 1.0, "Lorem", 1, "e", "bbb", "ccc");
crearPregunta("pre06", 1.0, "Lorem", 1, "aaa", "bbb", "ccc");
crearPregunta("pre07", 13.0, "Lorem", 2, "a", "bbb", "ccc");
crearPregunta("pre08", 2.0, "Lorem", 3, "b", "bbb", "ccc");
crearPregunta("pre09", 1.5, "Lorem", 3, "d", "bbb", "ccc");
crearPregunta("pre10", 1.0, "Lorem", 1, "e", "bbb", "ccc");

imprimirPregunta(preguntas["pre01"]);
imprimirPregunta(preguntas["pre02"]);
imprimirPregunta(preguntas["pre03"]);
imprimirPregunta(preguntas["pre04"]);
imprimirPregunta(preguntas["pre05"]);
imprimirPregunta(preguntas["pre06"]);
imprimirPregunta(preguntas["pre07"]);
imprimirPregunta(preguntas["pre08"]);
imprimirPregunta(preguntas["pre09"]);
imprimirPregunta(preguntas["pre10"]);

//Añadir boton de envio
let botonEnvio = crearElemento("button", "Enviar y comprobar");
anadirId(botonEnvio, "botonEnvio");
document.getElementById("test").appendChild(botonEnvio);

document
  .getElementById("botonEnvio")
  .addEventListener("click", validarRespuestas);

/**
 * TODO:
 * * Cuando el usuario conteste las 10 preguntas obtendrá el resultado final en un cuadro de texto.
 * * Además, el usuario podrá ver qué preguntas ha fallado, porque al enviar el formulario le aparecerá un
 * pequeño icono con un tick verde en las preguntas correctas y una cruz roja en las preguntas incorrectas.
 * * En caso de que el usuario deje alguna pregunta sin contestar, no mostrará el resultado e indicará con un mensaje
 * "No has respondido a todas las preguntas". Y se marcará en color rojo la pregunta que no haya sido respondida.
 */
