import { edificio } from "./edificio.js";

/**
 * Crea un edificio y lo devuelve
 * @param {String} calle 
 * @param {number} numero 
 * @param {number} codigo 
 * @returns 
 */
function crearEdificio(calle, numero, codigo) {
  let edificioTemp = new edificio(calle, numero, codigo);

  return edificioTemp;
}

/**
 * Muestra los datos de un edificio por consola
 * @param {edificio} nombreEdificio 
 */
function mostrarDatosEdificio(nombreEdificio) {
    let numero=(nombreEdificio.imprimeNumero() == "") ? "S/n": nombreEdificio.imprimeNumero();
  console.log(
    "Construido nuevo edificio en calle: " +
      nombreEdificio.imprimeCalle() +
      ", nº: " +
      numero +
          ", CP: " +
          nombreEdificio.imprimeCodigoPostal()
  );
}
let edificioA = crearEdificio("Garcia Prieto", 58, 15706);
mostrarDatosEdificio(edificioA);

let edificioB = crearEdificio("Camino Caneiro", 29, 32004);
mostrarDatosEdificio(edificioB);

let edificioC = crearEdificio("San Clemente", '', 15705);
mostrarDatosEdificio(edificioC);

edificioA.agregarPlantasYPuertas(3, 2);

edificioA.agregarPropietario("Jose Antonio Lopez.", 0, 0);
edificioA.agregarPropietario("Luisa Martinez.", 0, 1);
edificioA.agregarPropietario("Marta Castellón.", 0, 2);
edificioA.agregarPropietario("Antonio Pereira.", 1, 2);
edificioA.imprimePlantas();
console.log(edificioA);

edificioA.agregarPlantasYPuertas(1, 3);
edificioA.agregarPropietario("Pedro Meijide.", 2, 1);
edificioA.imprimePlantas();
