let pokedex = new Array();
let pokedexFiltrada = [];
let numPokemon = 0;
const numPokemonTotal = 1302;
ocultarProgreso();

if (sessionStorage.getItem("pokedex") != undefined) {
  reasignarPokedex();
  if (numPokemon < numPokemonTotal) {
    inicio()
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

function inicio() {
  mostrarProgreso();
  pedirDatos();
  setTimeout(reasignarPokedex, 1000);
  
  if (pokedex.length < numPokemonTotal) {
    actualizarProgreso();
    const intervalId = setInterval(() => {
      pedirDatos();

      setTimeout(reasignarPokedex(), 1000);
      actualizarProgreso();

      if (pokedex.length >= numPokemonTotal - 5) {
        clearInterval(intervalId);
        setTimeout(ocultarProgreso,500);
        imprimirPokedex();
      }
    }, 1500);
  } else {
    ocultarProgreso();
    imprimirPokedex();
  }
}

function actualizarProgreso() {
  const progressBar = document.getElementById("progressBar");
  const progressPercentage = (pokedex.length / numPokemonTotal) * 100;
  progressBar.style.width = `${progressPercentage}%`;
}

function ocultarProgreso() {
  const progressBar = document.getElementById("progressBar");
  progressBar.hidden = true;
}

function mostrarProgreso() {
  const progressBar = document.getElementById("progressBar");
  progressBar.hidden = false;
}

function imprimirPokedex() {
  reasignarPokedex();
  pokedex.forEach((pokemon) => {
    imprimirPokemon(pokemon);
  });
}

/**
 * Imrpime en HTML un pokemon
 * @date 1/21/2024 - 6:27:27 PM
 * @author Aarón Medina Rodríguez
 *
 * @param {*} pokemon
 */
function imprimirPokemon(pokemon) {
  const container = document.getElementById("containerDisplay");
  const carta = document.createElement("div");

  const sprite = document.createElement("img");

  if (pokemon.sprite != null) {
    sprite.setAttribute("src", pokemon.sprite);
    sprite.onerror = function () {
      sprite.setAttribute("src", "./media/default.webp");
    };
  } else {
    sprite.setAttribute("src", "./media/default.webp");
  }
  sprite.classList.add("sprite");

  const texto = pokemon.nombre;
  const nombre = document.createTextNode(texto);

  carta.append(sprite);
  carta.append(nombre);
  carta.addEventListener("click", mostrarInfo);
  container.append(carta);
  numPokemon++;
}

/**
 * Extrae datos en un formato
 * @date 1/21/2024 - 6:27:02 PM
 * @author Aarón Medina Rodríguez
 *
 * @param {*} pokemon
 * @returns {{ id: any; sprite: any; nombre: any; tipos: any; }}
 */
function extraerDatos(pokemon) {
  const pokemonTemp = {
    id: pokemon.id,
    sprite: pokemon.sprites.front_default,
    nombre: pokemon.name,
    tipos: pokemon.types,
  };
  return pokemonTemp;
}

/**
 * Ordena la pokedex por id
 * @date 1/21/2024 - 6:26:51 PM
 * @author Aarón Medina Rodríguez
 */
function reasignarPokedex() {
  const json_str = sessionStorage.getItem("pokedex");
  pokedex = JSON.parse(json_str);
  pokedex.sort((a, b) => a.id - b.id);
  sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
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
  .getElementById("refrescarDatos")
  .addEventListener(
    "click",
    () => (
      ((numPokemon = 0),
      (document.getElementById("containerDisplay").innerHTML = "")),
      imprimirPokedex()
    )
  );

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
