function anadirImagen(url) {
    urlImagenes.push(url);
    urlImagenes.push(url);
}

export let urlImagenes=new Array();

anadirImagen("./media/Abraham_Simpson.webp");
anadirImagen("./media/Barney_Gumble.webp");
anadirImagen("./media/Homer_Simpson.webp");
anadirImagen("./media/Kent_Brockman.webp");
anadirImagen("./media/Moe_Szyslak.webp");
anadirImagen("./media/Ned_Flanders.webp");

shuffle(urlImagenes);
/**
 *
 * Fisher–Yates Shuffle.
 * Creditos a @Mike_Bostock https://bost.ocks.org/mike/shuffle/
 */
function shuffle(array) {
    var m = array.length, t, i;

    // While there remain elements to shuffle…
    while (m) {
  
      // Pick a remaining element…
      i = Math.floor(Math.random() * m--);
  
      // And swap it with the current element.
      t = array[m];
      array[m] = array[i];
      array[i] = t;
    }
  
    return array;
  }