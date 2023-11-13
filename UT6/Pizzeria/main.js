let listaIngredientes = [
  "Tomate",
  "Maiz",
  "Salami",
  "Pollo",
  "Ternera",
  "Piña",
  "Datiles",
];
let listaMasas = ["Regular", "Fina", "Estilo Chicago"];
const limiteIngredientes = 2;
let ingredientesSeleccionados = new Map();

//TODO: Generar ticket al pulsar enviar, se debe descargar pdf o algo

/**
 * Imprime en un div del HTML la lista de masas
 * @date 11/13/2023 - 4:06:32 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirMasas() {
  const contenedorMasas = document.getElementsByClassName("contenedorMasa")[0];
  for (let index = 0; index < listaMasas.length; index++) {
    const contenedor = document.createElement("div");
    const input = document.createElement("input");
    input.setAttribute("type", "radio");
    input.setAttribute("name", "tipoPizza");
    input.setAttribute("value", listaMasas[index]);
    if (index == 0) {
      input.checked = true;
    }

    input.addEventListener("change", actualizarTipoPizza);
    const label = document.createElement("label");
    label.appendChild(document.createTextNode(listaMasas[index]));

    contenedor.appendChild(input);
    contenedor.appendChild(label);
    contenedorMasas.appendChild(contenedor);
  }
}

/**
 * Imprime en un div del HTML la lista de ingredientes
 * @date 11/13/2023 - 4:25:56 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirIngredientes() {
  const contenedorIngredientes = document.getElementsByClassName("toppings")[0];

  for (let index = 0; index < listaIngredientes.length; index++) {
    const contenedor = document.createElement("div");
    contenedor.classList.add("topping");
    contenedor.setAttribute("num_ing", 0);
    contenedor.setAttribute("info_ing", listaIngredientes[index]);
    const imagenIngrediente = document.createElement("img");
    imagenIngrediente.setAttribute(
      "src",
      "./media/" + "tomate".toLowerCase() + ".webp"
    );
    //FIXME: Actualizar a listaIngredientes[index] cuando esten las imagenes

    const botones = imprimirBotonesInteraccion();

    const label = document.createElement("label");
    label.appendChild(document.createTextNode(listaIngredientes[index]));

    contenedor.appendChild(imagenIngrediente);
    contenedor.appendChild(botones);
    contenedor.appendChild(label);
    contenedorIngredientes.appendChild(contenedor);
    listaIngredientes[index];
  }

  /**
   * Crea los botones de suma y resta de un ingrediente, y les añade los eventos
   * @date 11/13/2023 - 6:10:47 PM
   * @author Aaron Medina Rodriguez
   *
   * @returns {HTMLElement}
   */
  function imprimirBotonesInteraccion() {
    const logicaIngrediente = document.createElement("div");
    logicaIngrediente.classList.add("incremento");

    const reducir = document.createElement("div");
    reducir.appendChild(document.createTextNode("-"));
    reducir.classList.add("icono");
    reducir.classList.add("restar");
    reducir.addEventListener("click", restar);

    const aumentar = document.createElement("div");
    aumentar.appendChild(document.createTextNode("+"));
    aumentar.classList.add("icono");
    aumentar.classList.add("sumar");
    aumentar.addEventListener("click", incrementar);

    logicaIngrediente.appendChild(reducir);
    logicaIngrediente.appendChild(aumentar);
    return logicaIngrediente;
  }
}

/**
 * Obtiene el elemento e imprime en el HTML su valor
 * @date 11/13/2023 - 4:32:38 PM
 * @author Aaron Medina Rodriguez
 */
function actualizarTipoPizza() {
  imprimirTipoPizza(this.value);
}

/**
 * Modifica el valor en HTML del tipo pizza seleccionado
 * @date 11/13/2023 - 4:29:12 PM
 * @author Aaron Medina Rodriguez
 * @param {String} tipoPizza
 */
function imprimirTipoPizza(tipoPizza) {
  const tipo = document.getElementById("tipoPizza");

  tipo.innerHTML = tipoPizza;
}

//TODO: FIXME:
function imprimirIngredientesPizza(ingredientesSeleccionados) {
  const lista = document.getElementById("ingredientesPizza");
  if (lista.childNodes[1] != undefined) {
    lista.removeChild(lista.childNodes[1]);
  }
  let ingredientes;
  if (ingredientesSeleccionados.size == 0) {
    ingredientes = document.createTextNode(" salsa");
    lista.appendChild(ingredientes);
  } else {
    //FIXME: falta poner ingredientes dentro del for e igualar los elementos
    let ingredientes="";
    for (const key of ingredientesSeleccionados) {
      if (key[1] > 1) {
        console.log("extra de " + key[0] + " ");
        
      } else {
        console.log(" " + key[0] + " ");
      }
    }
   ingredientes = document.createTextNode(ingredientesSeleccionados);
  }
  //lista.appendChild(ingredientes);
}

/**
 * Reiniciar el num de ingredientes si sobrepasa los limites
 * @date 11/13/2023 - 6:31:20 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {number} numIngredientes
 * @param {HTMLElement} contenedorPadre
 */
function limitesNumIngredientes(numIngredientes, contenedorPadre) {
  if (numIngredientes <= 0) {
    contenedorPadre.setAttribute("num_ing", 0);
  }
  if (numIngredientes > limiteIngredientes) {
    contenedorPadre.setAttribute("num_ing", limiteIngredientes);
  }
}

/**
 * Incrementa el numero de ingredientes en uno, hasta un cierto limite
 * @date 11/13/2023 - 6:31:48 PM
 * @author Aaron Medina Rodriguez
 */
function incrementar() {
  const contenedorPadre = this.parentNode.parentNode;
  let numIngredientes = parseInt(contenedorPadre.getAttribute("num_ing"));
  limitesNumIngredientes(numIngredientes, contenedorPadre);
  if (numIngredientes < limiteIngredientes) {
    numIngredientes = numIngredientes + 1;
    contenedorPadre.setAttribute("num_ing", numIngredientes);
  }
  crearContador(numIngredientes, contenedorPadre);
}

/**
 * Reduce el numero de ingredientes en uno, hasta un cierto limite
 * @date 11/13/2023 - 6:32:33 PM
 * @author Aaron Medina Rodriguez
 */
function restar() {
  const contenedorPadre = this.parentNode.parentNode;
  let numIngredientes = parseInt(contenedorPadre.getAttribute("num_ing"));
  limitesNumIngredientes(numIngredientes, contenedorPadre);

  if (numIngredientes > 0) {
    numIngredientes = numIngredientes - 1;
    contenedorPadre.setAttribute("num_ing", numIngredientes);
  }
  crearContador(numIngredientes, contenedorPadre);
}

/**
 * Crea un div en un topping del HTML con un contador
 * @date 11/13/2023 - 6:55:35 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {number} numIngredientes
 * @param {HTMLElement} contenedorPadre
 */
function crearContador(numIngredientes, contenedorPadre) {
  const contenedor = document.createElement("div");

  contenedor.classList.add("icono");
  contenedor.classList.add("numIngrediente");
  contenedor.appendChild(document.createTextNode(numIngredientes));
  const elemento = contenedorPadre.getElementsByClassName("numIngrediente")[0];
  if (elemento != null) {
    contenedorPadre.removeChild(elemento);
  }
  if (numIngredientes > 0) {
    contenedorPadre.appendChild(contenedor);
  }
  actualizarIngredientesSeleccionados(
    contenedorPadre,
    ingredientesSeleccionados
  );
}

/**
 * Modifica el mapa de ingrediente segun los valores del HTML
 * @date 11/13/2023 - 7:17:49 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {HTMLElement} contenedorPadre
 * @param {Map} ingredientesSeleccionados
 */
function actualizarIngredientesSeleccionados(
  contenedorPadre,
  ingredientesSeleccionados
) {
  const ingrediente = contenedorPadre.getAttribute("info_ing");
  const numIngrediente = contenedorPadre.getAttribute("num_ing");

  if (numIngrediente <= 0) {
    ingredientesSeleccionados.delete(ingrediente);
  } else {
    ingredientesSeleccionados.set(ingrediente, numIngrediente);
  }

  imprimirIngredientesPizza(ingredientesSeleccionados);
}

imprimirMasas();
imprimirIngredientes();

imprimirIngredientesPizza(ingredientesSeleccionados);
