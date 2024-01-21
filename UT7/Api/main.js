let pokedex = new Array();
let pokedexFiltrada = [];
let numPokemon = 0;
let llamadasAPI = 0;
const numTiposPokemon = 18;
let tiposPokemon = new Array();
const numPokemonTotal = 1302;

obtenerTiposAPI();
ocultarProgreso();

if (sessionStorage.getItem("tiposPokemon") != undefined) {
  const json_str = sessionStorage.getItem("tiposPokemon");
  tiposPokemon = JSON.parse(json_str);

  if (tiposPokemon.length < numTiposPokemon) {
    obtenerTiposAPI();
  }
} else {
  obtenerTiposAPI();
}

if (sessionStorage.getItem("pokedex") != undefined) {
  reasignarPokedex();
  reasignarTipos();
  sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
  if (numPokemon < numPokemonTotal) {
    inicio();
  }
} else {
  inicio();
}

document
  .getElementById("busquedaPokemon")
  .addEventListener("input", filtrarPokemon);

//Imprime de la pokedex
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

//Llama a la API y imprime la pokedex
document.getElementById("refrescarApi").addEventListener("click", () => {
  if (numPokemon < numPokemonTotal) {
    numPokemon = 0;
    document.getElementById("containerDisplay").innerHTML = "";
    inicio();
  }
});

/**
 * Llama a la api de tipos y guarda los valores en un array
 * @date 1/21/2024 - 9:39:19 PM
 * @author Aarón Medina Rodríguez
 */
function obtenerTiposAPI() {
  fetch("https://pokeapi.co/api/v2/type")
    .then((response) => response.json())
    .then((tipos) => {
      tipos.results.forEach((tipo) => {
        fetch(`${tipo.url}`)
          .then((response) => response.json())
          .then((data) => {
            let tipoTemp;

            if (data.names[5].language.name == "es") {
              tipoTemp = {
                id: tipo.url,
                nombre: data.names[5].name,
              };
            } else {
              tipoTemp = {
                id: tipo.url,
                nombre: tipo.name,
              };
            }
            const tipoRepetido = tiposPokemon.some((p) => p.id === tipoTemp.id);

            if (!tipoRepetido) {
              tiposPokemon.push(tipoTemp);
              sessionStorage.setItem(
                "tiposPokemon",
                JSON.stringify(tiposPokemon)
              );
            }
          })
          .catch(() => console.warn("Error al obtener detalles del tipo"));
      });
    })
    .catch(() => console.warn("Error al obtener la lista de tipos"));
}

/**
 * Llama a la API principal de pokemon y guarda los valores en un array
 * @date 1/21/2024 - 8:15:25 PM
 * @author Aarón Medina Rodríguez
 */
function obtenerPokedexAPI() {
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

/**
 * Realiza llamadas a la API hasta obtener todos los pokemon.
 * @date 1/21/2024 - 7:44:44 PM
 * @author Aarón Medina Rodríguez
 */
function inicio() {
  mostrarProgreso();
  obtenerPokedexAPI();
  setTimeout(reasignarPokedex, 1000);

  if (pokedex.length < numPokemonTotal) {
    actualizarProgreso();
    const tiempoInicial = performance.now();
    const intervaloApi = setInterval(() => {
      obtenerPokedexAPI();
      setTimeout(reasignarPokedex, 1000);
      actualizarProgreso();

      if (pokedex.length >= numPokemonTotal - 5) {
        clearInterval(intervaloApi);
        finalizarProgreso();
        setTimeout(ocultarProgreso, 250);
        setTimeout(imprimirPokedex,250);
      }
      const tiempoActual = performance.now();
      const tiempoTranscurrido = tiempoActual - tiempoInicial;

      // Detener el intervalo después de 30000 ms (30 segundos)
      if (tiempoTranscurrido >= 30000) {
        clearInterval(intervaloApi);
        finalizarProgreso();
        setTimeout(ocultarProgreso, 250);
        setTimeout(imprimirPokedex,250);
        console.error("Se ha superado el tiempo limite de 30 segundos");
      }
    }, 1500);
  } else {
    ocultarProgreso();
    imprimirPokedex();
  }
  reasignarTipos();
  sessionStorage.setItem("pokedex", JSON.stringify(pokedex));
}

/**
 * Imprime la pokedex ordenada
 * @date 1/21/2024 - 7:41:03 PM
 * @author Aarón Medina Rodríguez
 */
function imprimirPokedex() {
  reasignarPokedex();
  pokedex.forEach((pokemon) => {
    imprimirPokemon(pokemon);
  });

  document.getElementById("containerDisplay").classList.add("mostrar");
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
  carta.classList.add("carta");
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
 * Reasigna los tipos a Español
 * @date 1/21/2024 - 10:19:02 PM
 * @author Aarón Medina Rodríguez
 */
function reasignarTipos() {
  pokedex.forEach((pokemon) => {
    const tipos = [];
    pokemon.tipos.forEach((tipo) => {
      tiposPokemon.forEach((tipoEspanol) => {
        if (tipo.type.url == tipoEspanol.id) {
          const tipoTemp = {
            slot: tipo.slot,
            type: {
              name: tipoEspanol.nombre,
              url: tipo.type.url,
            },
          };
          tipos.push(tipoTemp);
        }
      });
    });
    pokemon.tipos = tipos;
  });
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
  const id = info[0].id;

  let tipos = "";
  info[0].tipos.forEach((element) => {
    tipos = tipos + element.type.name + " ";
  });

  const mensaje =
    "El ID en la pokedex es: " +
    id +
    "\nEl nombre del pokemon es " +
    nombre +
    "\nLos tipos son " +
    tipos;
  alert(mensaje);
}

/**
 * Actualiza la barra de porgreso
 * @date 1/21/2024 - 7:40:42 PM
 * @author Aarón Medina Rodríguez
 */
function actualizarProgreso() {
  const progressBar = document.getElementById("progressBar");
  const progressPercentage = (pokedex.length / numPokemonTotal) * 100;
  progressBar.style.width = `${progressPercentage}%`;
}

function finalizarProgreso() {
  const progressBar = document.getElementById("progressBar");
  progressBar.style.width = "100%";
}

/**
 * Oculta la barra de progreso
 * @date 1/21/2024 - 7:40:24 PM
 * @author Aarón Medina Rodríguez
 */
function ocultarProgreso() {
  const progressBar = document.getElementById("progressBar");
  progressBar.hidden = true;
}

/**
 * Muestra la barra de progreso
 * @date 1/21/2024 - 7:40:24 PM
 * @author Aarón Medina Rodríguez
 */
function mostrarProgreso() {
  const progressBar = document.getElementById("progressBar");
  progressBar.hidden = false;
}
