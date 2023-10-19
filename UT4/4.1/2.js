let arrayPaises = ["españa", "portugal", "alemania"];
let mostrarDatos = document.getElementById("mostrarDatos");
let opcionElegida = parseInt(
  prompt(
    "1.Mostrar número de países.\n" +
      "2.Mostrar listado de países  \n" +
      "3.Mostrar un intervalo de países. \n" +
      "4.Añadir un país. \n" +
      "5.Borrar un país. \n" +
      "6.Consultar un país."
  )
);

switch (opcionElegida) {
  case 1:
    mostrarDatos.innerHTML =
      "<h1>Numero de paises</h1><br>" +
      "Hay " +
      mostrarNumElementos(arrayPaises) +
      " paises almacenados";
    break;
  case 2:
    let opcionExtra = parseInt(
      prompt(
        "En que orden desea verlos: \n 1.Orden actual del array\n2.Del reves\n3.Alfabeticamente"
      )
    );
    switch (opcionExtra) {
      case 1:
        mostrarElementos(arrayPaises, mostrarDatos);
        break;
      case 2:
        mostrarElementosInverso(arrayPaises, mostrarDatos);
        break;
      case 3:
        mostrarElementosOrdenados(arrayPaises, mostrarDatos);
        break;
      default:
        break;
    }

    break;
  case 3:
    let intervalo = prompt("Introduce el el intervalo inicio-fin", "0-2");
    intervaloArray = intervalo.split("-");

    inicio = intervaloArray[0];
    final = intervaloArray[1];

    if (inicio != null && final != null) {
      mostrarElementoIntervalo(arrayPaises, mostrarDatos, inicio, final);
    }

    break;
  case 4:
    let opcion4 = parseInt(
      prompt("Desea añadir al 1.principio o al 2.final", 1)
    );
    let pais = prompt("Nombre del pais");
    if (pais != "") {
      switch (opcion4) {
        case 1:
          mostrarDatos.innerHTML = "<h1>Insertar valor al principio</h1><br>";
          debugger;
          if (insertarPrincipio(arrayPaises, pais) != null) {
            mostrarDatos.innerHTML = mostrarDatos.innerHTML + "Valor insertado";
          } else {
            mostrarDatos.innerHTML =
              mostrarDatos.innerHTML + "Valor no insertado";
          }
          break;
        case 2:
          mostrarDatos.innerHTML = "<h1>Insertar valor al final</h1><br>";
          if (insertarFinal(arrayPaises, pais) != null) {
            mostrarDatos.innerHTML = mostrarDatos.innerHTML + "Valor insertado";
          } else {
            mostrarDatos.innerHTML =
              mostrarDatos.innerHTML + "Valor no insertado";
          }
          break;

        default:
          break;
      }
    }
    break;
  case 5:
    let opcion5 = parseInt(
      prompt("Desea añadir al 1.principio o al 2.final", 1)
    );

    switch (opcion5) {
      case 1:
        mostrarDatos.innerHTML = "<h1>Eliminar al principio</h1><br>";
        if ((elementoTemp = borrarPrincipio(arrayPaises)) == undefined) {
          mostrarDatos.innerHTML =
            mostrarDatos.innerHTML + "No hay elemento que eliminar";
        } else {
          mostrarDatos.innerHTML = mostrarDatos.innerHTML + elementoTemp;
        }
        break;
      case 2:
        mostrarDatos.innerHTML = "<h1>Eliminar al final</h1><br>";
        if ((elementoTemp = borrarFinal(arrayPaises)) == undefined) {
          mostrarDatos.innerHTML =
            mostrarDatos.innerHTML + "No hay elemento que eliminar";
        } else {
          mostrarDatos.innerHTML = mostrarDatos.innerHTML + elementoTemp;
        }
        break;
      default:
        break;
    }
    break;
  case 6:
    let opcion6 = parseInt(prompt("Desea consultar por 1.nombre o 2.posicion"));

    if (opcion6 == 1) {
      let opcion6extra = prompt("Introduzca el nombre a buscar");
      if (opcion6extra != "" && opcion6extra != undefined) {
        mostrarDatos.innerHTML = "<h1>Consultar un país por nombre</h1><br>";
        if (
          (elementoTemp = mostrarPosicionIndicada(arrayPaises, opcion6extra)) ==
          -1
        ) {
          mostrarDatos.innerHTML = "No hay elemento que mostrar";
        } else {
          mostrarDatos.innerHTML = elementoTemp;
        }
      }
    } else if (opcion6 == 2) {
      let opcion6extra = parseInt(prompt("Introduzca la posicion a buscar"));
      if (opcion6extra != "" && opcion6extra != undefined) {
        if (
          (elementoTemp = mostrarElementoIndicado(arrayPaises, opcion6extra)) ==
          -1
        ) {
          mostrarDatos.innerHTML =
            "<h1>Consultar un país por posicion</h1><br>";
          mostrarDatos.innerHTML = "No hay elemento que mostrar";
        } else {
          mostrarDatos.innerHTML = elementoTemp;
        }
      }
    }

  default:
    break;
}

/***
 * Devuelve el numero de elementos que hay en el array introducido
 */
function mostrarNumElementos(array = []) {
  return array.length;
}
/**
 * Imprime los elementos del array en el html dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
function mostrarElementos(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  ubicacion.innerHTML = "<h1>Mostrar listado de paises orden actual</h1><br>";
  array.forEach((element) => {
    ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
  });
}
/**
 * Imprime los elementos del array en orden inverso en el html dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion un elemento HTML donde se mostrara el texto
 */
function mostrarElementosInverso(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.reverse();
  ubicacion.innerHTML = "<h1>Mostrar listado de paises del reves</h1><br>";
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
function mostrarElementosOrdenados(array = [], ubicacion) {
  limpiarMuestraDatos(ubicacion);
  array.sort();
  ubicacion.innerHTML =
    "<h1>Mostrar listado de paises Odenadados Alfabeticamente</h1><br>";
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
 * Imprime en el html dado los elementos del array que se encuentran en el intervalo dado
 * @param {Array.<String>} array
 * @param {HTMLElement|document.getElementById} ubicacion  un elemento HTML donde se mostrara el texto
 * @param {Number} numInicial Inicio del intervalo
 * @param {Number} numFinal Final del intervalo
 */
function mostrarElementoIntervalo(array = [], ubicacion, numInicial, numFinal) {
  ubicacion.innerHTML = "<h1>Mostrar intervalo de paises</h1><br>";
  for (let index = numInicial; index <= numFinal; index++) {
    const element = array[index];
    if (element != undefined) {
      ubicacion.innerHTML = ubicacion.innerHTML + " " + element;
    }
  }
}
/**
 * Inserta el elemento dado al final del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
function insertarFinal(array = [], elemento) {
  return array.push(elemento);
}
/**
 * Inserta el elemento dado al principio del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
function insertarPrincipio(array = [], elemento) {
  return array.unshift(elemento);
}
/**
 * Eliminba un elemento al principio del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
function borrarPrincipio(array = []) {
  return array.shift();
}

/**
 * Eliminba un elemento al final del array
 * @param {Array.<String>} array
 * @param {String} elemento
 * @returns devuelve la ejecucion del comando
 */
function borrarFinal(array = []) {
  return array.pop();
}
/**
 *
 * @param {Array.<String>} array
 * @param {number} num posicion de un elemento dentro del array
 * @returns Muestra el elemento del array indicado
 */
function mostrarElementoIndicado(array = [], num) {
  return array[num];
}
/**
 *
 * @param {Array.<String>} array
 * @param {String} elemento dentro del array que se desea buscar
 * @returns Muestra el elemento del array indicado
 */
function mostrarPosicionIndicada(array = [], elemento) {
  for (let index = 0; index < array.length; index++) {
    debugger;
    const element = array[index];
    if (elemento == element) {
      return index;
    }
  }
  return -1;
}
