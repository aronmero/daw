let arrayPaises = ["españa", "portugal", "alemania"];
let opcion = document.getElementById("opciones");
let mostrarDatos = document.getElementById("mostrarDatos");
let valorExtra = document.getElementById("valorExtra");
let valorExtra2 = document.getElementById("valorExtra2");
let selectorOpciones = document.getElementById("selectorOpciones");


function procesamiento() {
  switch (opcion.value) {
    case "1":
      mostrarDatos.innerHTML =
        "Hay " + mostrarNumElementos(arrayPaises) + " paises almacenados";
      break;
    case "2":
      mostrarElmentos(arrayPaises, mostrarDatos);
      break;
    case "3":
      mostrarElmentosInverso(arrayPaises, mostrarDatos);
      break;
    case "4":
      mostrarElmentosOdenados(arrayPaises, mostrarDatos);
      break;
    case "5":
      mostrarPanel2();

      if (valorExtra.value) {
        if (insertarPrincipio(arrayPaises, valorExtra.value) != null) {
          mostrarDatos.innerHTML = "Valor insertado";
        } else {
          mostrarDatos.innerHTML = "Valor no insertado";
        }
        mostrarPanel1();
      }

      break;
    case "6":
      mostrarPanel2();

      if (valorExtra.value != "") {
        if (insertarFinal(arrayPaises, valorExtra.value) != null) {
          mostrarDatos.innerHTML = "Valor insertado";
        } else {
          mostrarDatos.innerHTML = "Valor no insertado";
        }
        mostrarPanel1();
      }
      break;
    case "7":
      if ((elementoTemp = borrarPrincipio(arrayPaises)) == undefined) {
        mostrarDatos.innerHTML = "No hay elemento que eliminar";
      } else {
        mostrarDatos.innerHTML = elementoTemp;
      }
      break;
    case "8":
      if ((elementoTemp = borrarFinal(arrayPaises)) == undefined) {
        mostrarDatos.innerHTML = "No hay elemento que eliminar";
      } else {
        mostrarDatos.innerHTML = elementoTemp;
      }
      break;
    case "9":
      mostrarPanel2();

      if (valorExtra.value != "") {
        if (
          (elementoTemp = mostrarElementoIndicado(
            arrayPaises,
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
    case "10":
      mostrarPanel2();

      if (valorExtra.value != "") {
        if (
          (elementoTemp = mostrarPosicionIndicada(
            arrayPaises,
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
    case "11":
      mostraPranel2();
      valorExtra2.hidden = false;

      if (valorExtra.value != "" && valorExtra2.value != "") {
        mostrarElementoIntervalo(
          arrayPaises,
          mostrarDatos,
          valorExtra.value,
          valorExtra2.value
        );

        mostrarPanel1();
        valorExtra2.hidden = true;
      }
      break;

    default:
      break;
  }

  /**
   * Oculta el panel secundario y muestra el primario. Reinicio el valor de las opciones extra a ""
   */
  function mostrarPanel1() {
    valorExtra.value = "";
    valorExtra2.value = "";
    document.getElementById("opcionesExtra").hidden = true;
    document.getElementById("selectorOpciones").hidden = false;
  }

  /**
   * Oculta el panel primario y muestra el secundario. Reinicia el valor de la muestra de datos en HTML a ""
   */
  function mostrarPanel2() {
    limpiarMuestraDatos(mostrarDatos);
    document.getElementById("opcionesExtra").hidden = false;
    document.getElementById("selectorOpciones").hidden = true;
  }
}
/***
 * Devuelve el numero de elementos que hay en el array introducido
 */
function mostrarNumElementos(array = []) {
  return array.length;
}
/**
 * Imprime los elementos del array en el html dado
 * @param {Array} array 
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
function mostrarElmentos(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
}
/**
 * Imprime los elementos del array en orden inverso en el html dado
 * @param {Array} array 
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
function mostrarElmentosInverso(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.reverse();
  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
  array.reverse();
}

/**
 * Imprime los elementos del array ordenados alfabeticamente en el html dado
 * @param {Array} array 
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
function mostrarElmentosOdenados(array = [], ubicacion) {
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
function limpiarMuestraDatos(ubicacion) {
  ubicacion.innerHTML = "";
}

/**
 * Inserta el elemento dado al final del array
 * @param {Array} array 
 * @param {String} elemento 
 * @returns devuelve la ejecucion del comando
 */
function insertarFinal(array = [], elemento) {
  return array.push(elemento);
}
/**
 * Inserta el elemento dado al principio del array
 * @param {Array} array 
 * @param {String} elemento 
 * @returns devuelve la ejecucion del comando
 */
function insertarPrincipio(array = [], elemento) {
  return array.unshift(elemento);
}
/**
 * Eliminba un elemento al principio del array
 * @param {Array} array 
 * @param {String} elemento 
 * @returns devuelve la ejecucion del comando
 */
function borrarPrincipio(array = []) {
  return array.shift();
}

/**
 * Eliminba un elemento al final del array
 * @param {Array} array 
 * @param {String} elemento 
 * @returns devuelve la ejecucion del comando
 */
function borrarFinal(array = []) {
  return array.pop();
}

/**
 * 
 * @param {Array} array 
 * @param {number} num posicion de un elemento dentro del array
 * @returns Muestra el elemento del array indicado
 */
function mostrarElementoIndicado(array = [], num) {
  return array[num];
}
/**
 * 
 * @param {Array} array 
 * @param {String} elemento dentro del array que se desea buscar
 * @returns Muestra el elemento del array indicado
 */
function mostrarPosicionIndicada(array = [], elemento) {
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
 * @param {Array} array 
 * @param {HTMLElement|document.getElementById} ubicacion  un elemento HTML donde se mostrara el texto
 * @param {Number} numInicial Inicio del intervalo
 * @param {Number} numFinal Final del intervalo
 */
function mostrarElementoIntervalo(array = [], ubicacion, numInicial, numFinal) {
  for (let index = numInicial; index <= numFinal; index++) {
    const element = array[index];
    if (element != undefined) {
      ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
    }
  }
}
