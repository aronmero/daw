/**
 * Arreglo que contiene formatos comunes para la URL de las imágenes.
 * @date 2/22/2024 - 3:27:48 PM
 * @author Aaron Medina Rodriguez
 *
 */
const formatosComunes = [
  "/full/843,/0/default.jpg",
  "/full/200,/0/default.jpg",
  "/full/400,/0/default.jpg",
  "/full/600,/0/default.jpg",
  "/full/1686,/0/default.jpg",
];

/**
 * Realiza una llamada a la API de Art Institute of Chicago para obtener información sobre todas las piezas de arte.
 * @date 2/22/2024 - 3:13:34 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @async
 * @param {string} [id=""] - El ID opcional de la obra de arte que se desea obtener información (por defecto vacío).
 * @returns {Promise<Object>} Una promesa que se resolverá con un objeto que contiene información sobre todas las piezas de arte.
 */
export async function apiArtworks(id = "") {
  try {
    const response = await fetch(`https://api.artic.edu/api/v1/artworks/${id}`);
    return response.json();
  } catch (error) {
    console.error(error);
  }
}

/**
 * Realiza una llamada a la API de Art Institute of Chicago para obtener información paginada sobre todas las piezas de arte.
 * @date 2/22/2024 - 3:13:34 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @async
 * @param {string} [url="https://api.artic.edu/api/v1/artworks?page=2&limit=20"] - La URL de la API que se utilizará para obtener los datos (opcional).
 * @returns {Promise<Object>} Una promesa que se resolverá con un objeto que contiene información paginada sobre todas las piezas de arte.
 */

export async function apiArtworksPaginated(url = "https://api.artic.edu/api/v1/artworks?page=2&limit=20") {
  try {
    const response = await fetch(url);
    return response.json();
  } catch (error) {
    console.error(error);
  }
}

/**
 * Realiza una llamada a la API de Art Institute of Chicago para obtener una imagen en formato jpg.
 * @date 2/22/2024 - 3:12:44 PM
 * @author Aaron Medina Rodriguez
 *
 * @export
 * @async
 * @param {string} image_id - El ID de la imagen que se desea obtener.
 * @param {number} [formato=0] - El índice del formato de la imagen a utilizar (opcional).
 * @returns {Promise<File>}  Una promesa que se resolverá con la imagen en formato jpg.
 */
export async function apiArtwork(image_id, formato = 0) {
  try {
    const response = await fetch(`https://www.artic.edu/iiif/2/${image_id}${formatosComunes[formato]}`);
    return response.json();
  } catch (error) {
    console.error(error);
  }
}
