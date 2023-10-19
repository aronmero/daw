/**
   * Oculta el panel secundario y muestra el primario. Reinicio el valor de las opciones extra a ""
   */
export function mostrarPanel1() {
  valorExtra.value = "";
  valorExtra2.value = "";
  document.getElementById("opcionesExtra").hidden = true;
  document.getElementById("selectorOpciones").hidden = false;
}

/**
 * Oculta el panel primario y muestra el secundario. Reinicia el valor de la muestra de datos en HTML a ""
 */
export function mostrarPanel2() {
  limpiarMuestraDatos(mostrarDatos);
  document.getElementById("opcionesExtra").hidden = false;
  document.getElementById("selectorOpciones").hidden = true;
}

/***
 * Devuelve el numero de elementos que hay en el array introducido
 */
export function mostrarNumElementos(array = []) {
  return array.length;
}
/**
 * Imprime los elementos del array en el html dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
export function mostrarElementos(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
}
/**
 * Imprime los elementos del array en orden inverso en el html dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
export function mostrarElementosInverso(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.reverse();
  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
  array.reverse();
}

/**
 * Imprime los elementos del array ordenados alfabeticamente en el html dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
export function mostrarElementosOrdenados(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.sort();

  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
}
/**
 * Cambia el valor del html introducido a ""
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
export function limpiarMuestraDatos(ubicacion) {
  ubicacion.innerHTML = "";
}

/**
 * Inserta el elemento dado al final del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
export function insertarFinal(array = [], elemento) {
  return array.push(elemento);
}
/**
 * Inserta el elemento dado al principio del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
export function insertarPrincipio(array = [], elemento) {
  return array.unshift(elemento);
}
/**
 * Eliminba un elemento al principio del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
export function borrarPrincipio(array = []) {
  return array.shift();
}

/**
 * Eliminba un elemento al final del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
export function borrarFinal(array = []) {
  return array.pop();
}

/**
 *
 * @param {Array.<String>} array
 * @param {number} num posicion de un elemento dentro del array
 * @returns Muestra el elemento del array indicado
 */
export function mostrarElementoIndicado(array = [], num) {
  return array[num];
}
/**
 *
 * @param {Array.<String>} array
 * @param {String} elemento dentro del array que se desea buscar
 * @returns Muestra el elemento del array indicado
 */
export function mostrarPosicionIndicada(array = [], elemento) {
  for (let index = 0; index < array.length; index++) {
    const element = array[index];
    if (elemento == element) {
      return index;
    }
  }
  return -1;
}
/**
 * Imprime en el html dado los elementos del array que se encuentran en el intervalo dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion  un elemento HTML donde se mostrara el texto
 * @param {Number} numInicial Inicio del intervalo
 * @param {Number} numFinal Final del intervalo
 */
export function mostrarElementoIntervalo(
  array = [],
  ubicacion,
  numInicial,
  numFinal
) {
  for (let index = numInicial; index <= numFinal; index++) {
    const element = array[index];
    if (element != undefined) {
      ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
    }
  }
}
