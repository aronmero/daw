
/**
 * Devuelve todas las cookies
 * @date 11/4/2023 - 2:13:42 PM
 * @author Aarón Medina Rodríguez
 * @export
 * @returns {String} cadena de cookies
 */
export function obtenerCookies() {
  let stringCookies = decodeURI(document.cookie);
  return stringCookies;
}

/**
 * Devuelve una cookie en concreto
 * @date 11/4/2023 - 2:14:14 PM
 * @author Aarón Medina Rodríguez
 * @export
 * @param {String} nombreCookie
 * @returns {String} devuelve una cookie
 */
export function obtenerCookie(nombreCookie = "") {
  let arrayCookies = decodeURI(document.cookie).split(";");
  let arrayCookiesIndividual = new Array();
  for (let index = 0; index < arrayCookies.length; index++) {
    arrayCookiesIndividual = arrayCookiesIndividual.concat(
      arrayCookies[index].split("=")[0]
    );
    if (arrayCookiesIndividual[index].trim() == nombreCookie.trim()) {
      return arrayCookies[index];
    }
  }
  return undefined;
}

/**
 * Devuelve el valor de una cookie en concreto
 * @date 11/4/2023 - 2:56:14 PM
 * @author Aarón Medina Rodríguez
 * @export
 * @param {String} nombreCookie
 * @returns {String} devuelve el valor de una cookie
 */
export function obtenerValorCookie(nombreCookie = "") {
  let arrayCookies = decodeURI(document.cookie).split(";");
  let arrayCookiesIndividual = new Array();
  for (let index = 0; index < arrayCookies.length; index++) {
    arrayCookiesIndividual = arrayCookiesIndividual.concat(
      arrayCookies[index].split("=")[0]
    );
    if (arrayCookiesIndividual[index].trim() == nombreCookie.trim()) {
      return arrayCookies[index].split("=")[1];
    }
  }
  return undefined;
}


/**
 * Description placeholder
 * @date 11/4/2023 - 3:56:51 PM
 * @author Aarón Medina Rodríguez
 *
 * @export
 * @param {string} nombreCookie
 * @param {string} valorCookie
 * @param {number} tiempo en dias
 */
export function anadirCaducidadCookie(nombreCookie,valorCookie, tiempo=30) {
  let fechaActual = new Date();
  fechaActual.setTime(fechaActual.getTime()+ tiempo * 24 * 60 * 60 * 1000);
  let fechaCaducidad = "expires="+fechaActual.toUTCString();
  document.cookie = nombreCookie+"="+ valorCookie+ ";" + fechaCaducidad;
}