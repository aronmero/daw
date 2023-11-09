import "./modulos/actividad.js";
import { crearElemento } from "./modulos/manipularElementos.js";
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
    //TODO para la seleccion multiple
    //https://stackoverflow.com/a/5867262
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

function cambiarSeleccion() {
  this.parentNode.id == "selectorProfesores"
    ? document.getElementById("selectorProfesoresAsignados").appendChild(this)
    : document.getElementById("selectorProfesores").appendChild(this);
}

/*
/**
 * TODO: validacion de entrada
 */
function validacionLugar(nombre) {
  document.getElementsByName(nombre)[0].value;
  //QUE SEA STRING NO VACIA
}

/**
 * TODO: validacion al enviar que llama a validar cada dato y genera objeto actividad y mustre un alert con dichos datos
 */
function validacionDatos() {
  validacionLugar("lugar");
}
//FIXME:Añadir mensajes de error al validar incorrecto y eliminar los de html
anadirInteraccionBotones();
