/**
 * Añade al array dos veces la url de una imagen
 * @author Aarón Medina Rodríguez
 * @param {String} url
 */
function anadirImagen(url) {
  urlImagenes.push(url);
  urlImagenes.push(url);
}

export let urlImagenes = new Array();

anadirImagen("./media/Abraham_Simpson.webp");
anadirImagen("./media/Barney_Gumble.webp");
anadirImagen("./media/Homer_Simpson.webp");
anadirImagen("./media/Kent_Brockman.webp");
anadirImagen("./media/Moe_Szyslak.webp");
anadirImagen("./media/Ned_Flanders.webp");

shuffle(urlImagenes);
/**
 * Fisher–Yates Shuffle.
 * Creditos a @Mike_Bostock https://bost.ocks.org/mike/shuffle/
 * @variation Cambie el nombre de las variables para comprenderlas mejor respecto al original
 */
function shuffle(array) {
  let ultimaPosicion = array.length, elementoTemporal, posicionAzar;

  // While there remain elements to shuffle…
  while (ultimaPosicion) {
    // Pick a remaining element…
    posicionAzar = Math.floor(Math.random() * ultimaPosicion--);

    // And swap it with the current element.
    elementoTemporal = array[ultimaPosicion];
    array[ultimaPosicion] = array[posicionAzar];
    array[posicionAzar] = elementoTemporal;
  }

  return array;
}
