/**
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @returns {unknown}
 */
function pedirDatos() {
  fetch("https://pokeapi.co/api/v2/pokedex/1")
    .then((response) => response.json())
    .then((data) =>
      data.pokemon_entries.forEach((element) => {
        fetch(`https://pokeapi.co/api/v2/pokemon/${element.pokemon_species.name}`)
          .then((response) => response.json())
          .then((data) => {
            imprimirDatos(data);
          })
          .catch(() => console.warn("Error"));
      })
    )
    .catch(() => console.warn("Error"));
}

pedirDatos();

function imprimirDatos(data) {
  const container = document.getElementById("containerDisplay");
  const containerIndividual = document.createElement("div");

  const sprite = document.createElement("img");

  if (data.sprites.front_default != null) {
    sprite.setAttribute("src", data.sprites.front_default);
  } else {
    sprite.setAttribute("src", "./media/default.webp");
  }
  sprite.classList.add("sprite");

  const texto = data.name;
  const nombre = document.createTextNode(texto);

  containerIndividual.append(sprite);
  containerIndividual.append(nombre);
  container.append(containerIndividual);
}

/*
Usa fecth para obtener los datos desde la API.
Utilizar .map() para representar cada uno de los elementos obtenidos de la API. (Modificando el DOM, creando nuevos nodos, intentar evitar usar el innerHTML...)
Utilizar .filter() para realizar busquedas de items.
Utilizar Cookies, LocalStorage, sessionStorage para implementar una funcionalidad de tu interfaz. 
Añade 4 funcionalidades a tu aplicación web (a tu libre elección) usando javascript. 
*/
