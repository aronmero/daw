import { Actividad } from "./modulos/actividad.js";
import { crearElemento } from "./modulos/manipularElementos.js";
import {
  validacionCadenas,
  validacionFecha,
  validacionGrupos,
  validacionProfesores,
} from "./modulos/validacionEntrada.js";
let profesPrueba = ["profe1", "profe2", "profe3"];
let grupos = ["1º ESO", "2º ESO", "3º ESO", "4º ESO"];
document
  .getElementById("botonEnviar")
  .addEventListener("click", validacionDatos);
/**
 * Muestra un array de profesores en el HTML en formato de <option>
 * @date 11/6/2023 - 6:46:22 PM
 * @author Aaron Medina Rodriguez
 * @param {Array} arrayProfesores
 */
function mostrarProfesoresHTML(arrayProfesores) {
  let selectorProfes = document.getElementById("selectorProfesores");
  for (let index = 0; index < arrayProfesores.length; index++) {
    const element = crearElemento("option", arrayProfesores[index]);
    element.value = arrayProfesores[index];
    selectorProfes.appendChild(element);
  }
}

/**
 * Muestra un array de grupos en el HTML en formato <div><input><p></p></div>
 * @date 11/6/2023 - 7:29:09 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {*} arrayGrupos
 */
function mostrarGruposHTML(arrayGrupos) {
  let selectorProfes = document.getElementById("selectorGrupos");
  for (let index = 0; index < arrayGrupos.length; index++) {
    const contenedor = crearElemento("div");
    const check = crearElemento("input");
    check.type = "checkbox";
    check.value = arrayGrupos[index];
    check.name = "grupos" + index;
    const grupo = crearElemento("p", arrayGrupos[index]);

    contenedor.appendChild(check);
    contenedor.appendChild(grupo);
    selectorProfes.appendChild(contenedor);
  }
}

function anadirInteraccionBotones() {
  let selectProfesores = document.getElementById("selectorProfesores");
  for (let index = 0; index < selectProfesores.childNodes.length; index++) {
    const element = selectProfesores.childNodes[index];
    element.addEventListener("click", cambiarSeleccion);
  }
}

mostrarProfesoresHTML(profesPrueba);
mostrarGruposHTML(grupos);

/**
 * Mueve un profesor de un elemento HTML a otro
 * @author Aarón Medina Rodríguez
 */
function cambiarSeleccion() {
  this.parentNode.id == "selectorProfesores"
    ? document.getElementById("selectorProfesoresAsignados").appendChild(this)
    : document.getElementById("selectorProfesores").appendChild(this);
}

/**
 * Obtiene los grupos asiganados y los almacena en un array
 * @date 11/12/2023 - 8:55:00 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} nombreContenedor
 * @returns {boolean}
 */
function obtenerGruposAsignados(nombreContenedor) {
  const contenedor = document
    .getElementById(nombreContenedor)
    .getElementsByTagName("div");
  const gruposAsiganados = new Array();
  for (let index = 0; index < contenedor.length; index++) {
    const element = contenedor[index].getElementsByTagName("input")[0];
    if (element.checked) {
      gruposAsiganados.push(element.value);
    }
  }
  return gruposAsiganados;
}

/**
 * Obtiene los profesores asiganados y los almacena en un array
 * @date 11/12/2023 - 8:53:00 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} nombreContenedor
 * @returns {Array} array de profesores asignados
 */
function obtenerProfesoresAsignados(nombreContenedor) {
  const contenedor = document.getElementById(nombreContenedor);
  const profesoresAsigandos = new Array();
  for (let index = 0; index < contenedor.length; index++) {
    const element = contenedor.getElementsByTagName("option")[index];
    profesoresAsigandos.push(element.value);
  }

  return profesoresAsigandos;
}


/**
 * Añade un mensaje de error a un elemento HTML
 * @date 11/12/2023 - 9:32:10 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} idHTML id del elemento
 * @param {string} error mensaje de error
 */
function anadirMensajeError(idHTML, error) {
  document.getElementById(idHTML).innerHTML = error;
}


/**
 * Elimina todos los mensajes de error del formulario HTML
 * @date 11/12/2023 - 9:36:49 AM
 * @author Aarón Medina Rodríguez
 */
function limpiarErrores() {
    const errores=document.getElementsByClassName("error")
    for (let index = 0; index < errores.length; index++) {
      const element = errores[index];
      element.innerHTML="";
    }
}

function validacionDatos() {
  limpiarErrores();
  let isValidacionCorrecta = true;
  if (!validacionCadenas("lugar")) {
    isValidacionCorrecta = false;
    anadirMensajeError("errorLugar", "*Obligatorio");
  }
  if (!validacionFecha("fecha")) {
    isValidacionCorrecta = false;
    anadirMensajeError("errorFecha", "*Obligatorio");
  }
  if (!validacionCadenas("descripcion")) {
    isValidacionCorrecta = false;
    anadirMensajeError("errorDescripcion", "*Obligatorio");
  }
  if (!validacionGrupos("selectorGrupos")) {
    isValidacionCorrecta = false;
    anadirMensajeError("errorGrupos", "*Obligatorio");
  }
  if (!validacionProfesores("selectorProfesoresAsignados")) {
    isValidacionCorrecta = false;
    anadirMensajeError("errorProfesor", "*Obligatorio");
  }
  if (isValidacionCorrecta) {
    let actividad = new Actividad(
      document.getElementsByName("lugar")[0].value,
      document.getElementsByName("fecha")[0].value,
      obtenerProfesoresAsignados("selectorProfesoresAsignados"),
      obtenerGruposAsignados("selectorGrupos"),
      document.getElementsByName("descripcion")[0].value
    );
    alert(actividad);
  }
}

anadirInteraccionBotones();
