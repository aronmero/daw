/**
 * Comprueba que la cadena no este vacia
 * @date 11/12/2023 - 8:23:38 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} nombre
 * @returns {boolean}
 */
export function validacionCadenas(nombre) {
  let cadena = document.getElementsByName(nombre)[0].value;
  const regCadena = /\s*/;
  if (cadena.length < 1 || !cadena.match(regCadena)) {
    return false;
  }
  return true;
}

/**
 * Comprueba que la fecha no este vacia, este en formato fecha y sea mayor a hoy
 * @date 11/12/2023 - 9:19:38 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} nombre
 * @returns {boolean}
 */
export function validacionFecha(nombre) {
  const fecha = document.getElementsByName(nombre)[0].value;
  const regFecha = /\d{4}-\d{2}-\d{2}/;
  if (fecha.length < 1 || !fecha.match(regFecha)) {
    return false;
  }
  //Comprobar que sea mayor a hoy
  const fechaString = String(fecha).split("-");
  const fechaActual = new Date();
  fechaActual.setHours(0, 0, 0, 0);
  const fechaDate = new Date(
    fechaString[0],
    fechaString[1] - 1,
    fechaString[2]
  );

  if (fechaActual > fechaDate) {
    return false;
  }

  return true;
}

/**
 * Comprueba que al menos un grupo este seleccionado.
 * @date 11/12/2023 - 8:24:33 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {string} nombreContenedor
 * @returns {boolean}
 */
export function validacionGrupos(nombreContenedor) {
  const contenedor = document
    .getElementById(nombreContenedor)
    .getElementsByTagName("div");

  for (let index = 0; index < contenedor.length; index++) {
    const element = contenedor[index].getElementsByTagName("input")[0];
    if (element.checked) {
      return true;
    }
  }
  return false;
}

/**
 * Comprueba que al menos un profesor este asiganado.
 * @date 11/12/2023 - 8:38:10 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {String} nombreContenedor
 * @returns {boolean}
 */
export function validacionProfesores(nombreContenedor) {
  const contenedor = document.getElementById(nombreContenedor);

  for (let index = 0; index < contenedor.length; index++) {
    const element = contenedor.getElementsByTagName("option")[index];
    const regProfe = /profe\d*/g;
    if (element.value.match(regProfe)) {
      return true;
    }
  }

  return false;
}
