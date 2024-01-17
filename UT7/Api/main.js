let pokedex = new Array();
let pokedexFiltrada = [];
let numPokemon = 0;

if (sessionStorage.getItem("pokedex") != undefined) {
  const json_str = sessionStorage.getItem("pokedex");
  pokedex = JSON.parse(json_str);
  pokedex.forEach((pokemon) => {
    imprimirDatos(pokemon);
  });
} else {
  pokedex = pedirDatos();
}

/**
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 */
function pedirDatos() {
  const pokedex = new Array();

  fetch("https://pokeapi.co/api/v2/pokedex/1")
    .then((response) => response.json())
    .then((data) =>
      data.pokemon_entries.forEach((element) => {
        fetch(`https://pokeapi.co/api/v2/pokemon/${element.pokemon_species.name}`)
          .then((response) => response.json())
          .then((data) => {
            const pokemon = extraerDatos(data);
            pokedex.push(pokemon);
            imprimirDatos(pokemon);
            sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
          })
          .catch(() => console.warn("Error"));
      })
    )
    .catch(() => console.warn("Error"));

  return pokedex;
}

function extraerDatos(data) {
  const pokemon = {
    sprite: data.sprites.front_default,
    nombre: data.name,
    tipos: data.types,
  };
  return pokemon;
}

function imprimirDatos(data) {
  const container = document.getElementById("containerDisplay");
  const pokemon = document.createElement("div");

  const sprite = document.createElement("img");

  if (data.sprite != null) {
    sprite.setAttribute("src", data.sprite);
  } else {
    sprite.setAttribute("src", "./media/default.webp");
  }
  sprite.classList.add("sprite");

  const texto = data.nombre;
  const nombre = document.createTextNode(texto);

  pokemon.append(sprite);
  pokemon.append(nombre);
  pokemon.addEventListener("click", mostrarInfo);
  container.append(pokemon);
  numPokemon++;
  document.getElementById("numPokedex").innerHTML = "Numero de pokemon: " + numPokemon;
}

/**
 * Filtra los pokemon segun el valor del evento. Oculta los elementos que no cumplen lo requerido
 * @date 1/15/2024 - 3:10:12 PM
 * @author Aaron Medina Rodriguez
 */
function filtrarPokemon() {
  const display = document.getElementById("containerDisplay");
  const rows = display.getElementsByTagName("div");
  pokedexFiltrada = [];

  if (this.value.length > 0) {
    Array.from(rows).forEach((element) => {
      element.style.display = "none";
    });

    let filtrado;
    //Comprueba el otro filtro y utiliza sus datos si el filtro tiene alguno
    if (pokedexFiltrada.length > 0) {
      filtrado = pokedexFiltrada.filter((rows) =>
        rows.childNodes[1].textContent.toLowerCase().includes(this.value.toLowerCase())
      );
    } else {
      filtrado = Array.from(rows).filter((rows) =>
        rows.childNodes[1].textContent.toLowerCase().includes(this.value.toLowerCase())
      );
    }

    filtrado.forEach((element) => {
      element.style.display = "";
      element.style.display = "table row";
      pokedexFiltrada.push(element);
    });
  } else {
    //Oculta todos los elementos excepto si estan en el otro filtro
    if (pokedexFiltrada.length > 0) {
      pokedexFiltrada.forEach((linea) => {
        linea.style.display = "";
      });
    } else {
      Array.from(rows).forEach((linea) => {
        linea.style.display = "";
      });
    }
  }
}

/**
 * Muestra la info de un pokemon concreto mediante un alert
 * @author Aarón Medina Rodríguez
 */
function mostrarInfo() {
  const nombrePokemon = this.childNodes[1].nodeValue;
  const info = pokedex.filter((elemento) => elemento.nombre == nombrePokemon);

  const nombre = info[0].nombre;
  let tipos = "";
  console.log(info[0].tipos);
  info[0].tipos.forEach((element) => {
    tipos = tipos + element.type.name + " ";
  });
  const mensaje = "El nombre es " + nombre + "\nLos tipos son " + tipos;
  alert(mensaje);
}

document.getElementById("busquedaPokemon").addEventListener("input", filtrarPokemon);
document
  .getElementById("refrescarApi")
  .addEventListener(
    "click",
    () => (((numPokemon = 0), (document.getElementById("containerDisplay").innerHTML = "")), pedirDatos())
  );
