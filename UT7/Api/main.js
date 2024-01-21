let pokedex = new Array();
let pokedexFiltrada = [];
let numPokemon = 0;
let numPokemonTotal = 1302;
if (sessionStorage.getItem("pokedex") != undefined) {
  reasignarPokedex();

  pokedex.forEach((pokemon) => {
    imprimirDatos(pokemon);
  });
  if (numPokemon < numPokemonTotal) {
    const error = document.createElement("span");
    error.append(document.createTextNode(" *Se recomienda refrescar la api"));
    error.classList.add("error");
    document.getElementById("numPokedex").appendChild(error);
  }
} else {
  pokedex = inicio();
}

function pedirDatos() {
  const pokedex = JSON.parse(sessionStorage.getItem("pokedex")) || new Array();
  fetch("https://pokeapi.co/api/v2/pokemon/?offset=00&limit=15000")
    .then((response) => response.json())
    .then((pokemonList) =>
      pokemonList.results.forEach((element) => {
        fetch(`${element.url}`)
          .then((response) => response.json())
          .then((data) => {
            const pokemon = extraerDatos(data);
            const pokemonRepetido = pokedex.some((p) => p.id === pokemon.id);

            if (!pokemonRepetido) {
              pokedex.push(pokemon);
              sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
            }
          })
          .catch(() => console.warn("Error al obtener detalles del pokemon"));
      })
    )
    .catch(() => console.warn("Error al obtener la lista de pokemon"));
}

function extraerDatos(pokemon) {
  const pokemonTemp = {
    id: pokemon.id,
    sprite: pokemon.sprites.front_default,
    nombre: pokemon.name,
    tipos: pokemon.types,
  };
  return pokemonTemp;
}

function inicio() {
  pedirDatos();
  reasignarPokedex();
  pokedex.forEach((pokemon) => {
    imprimirDatos(pokemon);
  });
  if (numPokemon < numPokemonTotal) {
    const error = document.createElement("span");
    error.append(document.createTextNode(" *Se recomienda refrescar la api"));
    error.classList.add("error");
    document.getElementById("numPokedex").appendChild(error);
  }
  return pokedex;
}

function reasignarPokedex() {
  const json_str = sessionStorage.getItem("pokedex");
  pokedex = JSON.parse(json_str);
  pokedex.sort((a, b) => a.id - b.id);
  sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
}

function imprimirDatos(data) {
  const container = document.getElementById("containerDisplay");
  const pokemon = document.createElement("div");

  const sprite = document.createElement("img");

  if (data.sprite != null) {
    sprite.setAttribute("src", data.sprite);
    sprite.onerror = function () {
      sprite.setAttribute("src", "./media/default.webp");
    };
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
  document.getElementById("numPokedex").innerHTML =
    "Numero de pokemon cargdos " + numPokemon + " de " + numPokemonTotal;
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
        rows.childNodes[1].textContent
          .toLowerCase()
          .includes(this.value.toLowerCase())
      );
    } else {
      filtrado = Array.from(rows).filter((rows) =>
        rows.childNodes[1].textContent
          .toLowerCase()
          .includes(this.value.toLowerCase())
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
  const sprite = info[0].sprite;
  const mensaje =
    "El nombre es " +
    nombre +
    "\nLos tipos son " +
    tipos +
    "\n sprite:" +
    sprite;
  alert(mensaje);
}

document
  .getElementById("busquedaPokemon")
  .addEventListener("input", filtrarPokemon);
document
  .getElementById("refrescarApi")
  .addEventListener(
    "click",
    () => (
      ((numPokemon = 0),
      (document.getElementById("containerDisplay").innerHTML = "")),
      inicio()
    )
  );
