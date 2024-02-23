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
 * @returns {Promise<Object>} Una promesa que se resolverá con un objeto que contiene información sobre todas las piezas de arte.
 */
export async function apiArtworks() {
  try {
    const response = await fetch(
      `https://api.artic.edu/api/v1/artworks?fields=id,title,artist_title,date_display,image_id,thumbnail&limit=20`
    );
    const data = await response.json();

    const artistNamesSet = new Set();
    data.data.forEach((artwork) => {
      if (artwork.artist_title) {
        artistNamesSet.add(artwork.artist_title);
      }
    });

    const artistNames = Array.from(artistNamesSet);
    const filteredData = { artist: artistNames, data: data.data.filter((artwork) => artwork.image_id !== null) };
    console.log(filteredData);
    return filteredData;
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
 * @param {string} [url="https://api.artic.edu/api/v1/artworks?fields=id,title,artist_title,date_display,image_id,thumbnail&page=1&limit=20"] - La URL de la API que se utilizará para obtener los datos (opcional).
 * @returns {Promise<Object>} Una promesa que se resolverá con un objeto que contiene información paginada sobre todas las piezas de arte.
 */
export async function apiArtworksPaginated(
  url = "https://api.artic.edu/api/v1/artworks?fields=id,title,artist_title,date_display,image_id,thumbnail&limit=20"
) {
  try {
    const response = await fetch(url);
    const data = await response.json();

    const filteredData = {
      artist: data.data[0].artist_title,
      data: data.data.filter((artwork) => artwork.image_id !== null),
    };
    console.log(filteredData);

    return filteredData;
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
 * @param {string} [url="https://api.artic.edu/api/v1/artworks?fields=id,title,artist_title,date_display,image_id,thumbnail&page=1&limit=20"] - La URL de la API que se utilizará para obtener los datos (opcional).
 * @returns {Promise<Object>} Una promesa que se resolverá con un objeto que contiene información paginada sobre todas las piezas de arte.
 */
export async function apiArtworksArtist(
  url = "https://api.artic.edu/api/v1/artworks/search?q=ClaudeMonet&fields=id,title,artist_title,date_display,image_id,thumbnail&limit=20"
) {
  try {
    const response = await fetch(url);
    const data = await response.json();

    const filteredData = {
      artist: data.data[0].artist_title,
      data: data.data.filter((artwork) => artwork.image_id !== null),
    };

    return filteredData;
  } catch (error) {
    console.error(error);
  }
}

export async function apiArtworksRandom() {
  let validArtwork = null;

  while (!validArtwork) {
    const number = Math.round(Math.random() * 130000);
    console.log(number);
    const url = `https://api.artic.edu/api/v1/artworks/${number}?fields=id,title,artist_title,date_display,image_id,thumbnail&limit=20`;

    try {
      const response = await fetch(url);

      if (response.ok) {
        const data = await response.json();

        if (data.data && data.data.id && data.data.image_id) {
          validArtwork = data.data;
        }
      }
    } catch (error) {
      //console.error(error);
    }

    if (!validArtwork) {
      await new Promise((resolve) => setTimeout(resolve, 100));
    }
  }

  return validArtwork;
}
