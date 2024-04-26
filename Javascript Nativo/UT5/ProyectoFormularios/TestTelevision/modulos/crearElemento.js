/**
 * Crea un elemento HTML segun los valores introducidos y lo devuelve
 *
 * @export
 * @param {String} elemento tipo de elemento html
 * @param {string} [contenido=""] texto interno del elemento
 * @return {HTMLElement} el elemento creado
 */
export function crearElemento(elemento, contenido = "") {
  let elementoNuevo = document.createElement(elemento);
  elementoNuevo.innerText = contenido;
  return elementoNuevo;
}

/**
 * Añade una clase a un elemento HTML 
 *
 * @export
 * @param {HTMLElement} elemento
 * @param {String} clase
 */
export function anadirClase(elemento, clase) {
  elemento.classList.add(clase);
}

/**
 * Elimina una clase a un elemento HTML
 *
 * @export
 * @param {HTMLElement} elemento
 * @param {String} clase
 */
export function eliminarClase(elemento, clase) {
  elemento.classList.remove(clase);
}

/**
 * Añade un id a un elemento HTML
 *
 * @export
 * @param {HTMLElement} elemento
 * @param {String} id
 */
export function anadirId(elemento, id) {
  elemento.id = id;
}
