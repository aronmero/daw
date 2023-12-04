const contenedorBebidas = document.getElementById("contBebidas");

/**
 * Obtiene de la API bebidas y las imprime.
 * @date 12/4/2023 - 3:58:01 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @param {*} params
 * @returns {*}
 */
async function procesarDatos() {
  let bebidas = await pedirDatos();
  bebidas.forEach((bebida) => {
    imprimirBebida(bebida, contenedorBebidas);
  });

}

/**
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @returns {unknown}
 */
async function pedirDatos() {
  let bebidas = await fetch("https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Rum")
    .then((response) => response.json())
    .then((data) => data.drinks)
    .catch(() => console.warn("Error"));

  return bebidas;
}

/**
 * Imprime una bebida en una carta HTML
 * @date 12/4/2023 - 3:56:53 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Array} bebida
 * @param {HTMLElement} [ubicacion=document.body]
 */
function imprimirBebida(bebida, ubicacion = document.body) {
  let carta = document.createElement("div");
  carta.classList.add("cartaBebida");
  let imagen = document.createElement("img");
  imagen.setAttribute("src", bebida["strDrinkThumb"]);

  carta.appendChild(imagen);
  carta.appendChild(document.createTextNode(bebida["strDrink"]));
  ubicacion.appendChild(carta);
}

procesarDatos();
