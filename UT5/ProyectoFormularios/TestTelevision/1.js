import { crearElemento, anadirClase, anadirId } from "./crearElemento.js";

let numPreguntas = 1;

/**
 *  Crea los elementos HTML necesarios para generar una pregunta y sus respuestas
 *
 * @param {Number} valorPuntuacion puntuacion de la pregunta
 * @param {String} textoPregunta enunciado de la pegunta
 * @param {String} propuesta1 texto de respuesta para opcion 1
 * @param {String} propuesta2 texto de respuesta para opcion 2
 * @param {String} propuesta3 texto de respuesta para opcion 3
 * @param {String} propuesta4 texto de respuesta para opcion 4
 */
function crearPregunta(
  valorPuntuacion,
  textoPregunta,
  propuesta1,
  propuesta2,
  propuesta3,
  propuesta4
) {
  const preguntaId = "pregunta" + numPreguntas;
  numPreguntas++;
  let pregunta = crearElemento("div");
  pregunta = anadirClase(pregunta, "pregunta");
  pregunta = anadirId(pregunta, preguntaId);

  document.getElementById("formulario").appendChild(pregunta);

  anadirPuntuacion();

  anadirEnunciado();

  /**
   * Crea el enunciado de una pregunta y sus posibles respuestas
   *
   */
  function anadirEnunciado() {
    let cuestion = crearElemento("div");
    cuestion = anadirClase(cuestion, "formulario");
    document.getElementById(preguntaId).appendChild(cuestion);
    cuestion.appendChild(crearElemento("label", textoPregunta));

    let opcion = anadirOpcion(1, propuesta1);
    if (opcion != null) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(2, propuesta2);
    if (opcion != null) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(3, propuesta3);
    if (opcion != null) {
      cuestion.appendChild(opcion);
    }

    opcion = anadirOpcion(4, propuesta4);
    if (opcion != null) {
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
      boton.setAttribute("name", preguntaId);
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
    puntuacion = anadirClase(puntuacion, "puntuacion");
    document.getElementById(preguntaId).appendChild(puntuacion);
    puntuacion.appendChild(crearElemento("p", "Puntuación"));
    puntuacion.appendChild(crearElemento("p", valorPuntuacion));
  }
}

crearPregunta("1.00", "lorem", "Prop1", "Prop2", "Prop3");
crearPregunta("3.00", "aaa", "Prop1", "Prop2");
