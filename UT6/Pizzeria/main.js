let listaIngredientes = ["Tomate", "Bacon", "Cebolla", "Champiñones", "Gambas", "Mozarella", "Peperoni","Pimientos","Piña"]; //TODO: MAPA DE INGREDIENTES CON IMAGENES
let listaMasas = ["Regular", "Fina", "Estilo Chicago"];
const limiteIngredientes = 2;
let ingredientesSeleccionados = new Map();
let numIngredientesSeleccionados=0;
const precioPizzaDefault=6.5
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
    index == 0 ? (input.checked = true) : "";

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
    imagenIngrediente.setAttribute("src", "./media/ingredientes/" + listaIngredientes[index].toLowerCase() + ".webp");
    //FIXME: Actualizar a listaIngredientes[index] cuando esten las imagenes

    const botones = imprimirBotonesInteraccionIngrediente();

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
  function imprimirBotonesInteraccionIngrediente() {
    const logicaIngrediente = document.createElement("div");
    logicaIngrediente.classList.add("incremento");

    const reducir = document.createElement("div");
    reducir.appendChild(document.createTextNode("-"));
    reducir.classList.add("icono");
    reducir.classList.add("restar");
    reducir.addEventListener("click", restar);
    reducir.addEventListener("click", eliminarImagenTopping);

    const aumentar = document.createElement("div");
    aumentar.appendChild(document.createTextNode("+"));
    aumentar.classList.add("icono");
    aumentar.classList.add("sumar");
    aumentar.addEventListener("click", incrementar);
    aumentar.addEventListener("click", anadirImagenTopping);

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

/**
 * Imprime en HTML la lista de ingredientes seleccionados con cierto formato
 * @date 11/18/2023 - 7:38:57 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {Map} ingredientesSeleccionados
 */
function imprimirIngredientesPizza(ingredientesSeleccionados) {
  const lista = document.getElementById("ingredientesPizza");
  lista.childNodes[1] != undefined ? lista.removeChild(lista.childNodes[1]) : "";

  let ingredientes;
  const numIngredientes = ingredientesSeleccionados.size;
  if (numIngredientes == 0) {
    ingredientes = document.createTextNode(" salsa");
    lista.appendChild(ingredientes);
  } else {
    let listaIngredientes = " salsa";
    let numIterado = 0;

    for (const ingrediente of ingredientesSeleccionados) {
      numIngredientes == 1 ? (listaIngredientes += " y ") : numIterado == 0 ? (listaIngredientes += ", ") : "";

      ingrediente[1] > 1
        ? (listaIngredientes += " extra de " + ingrediente[0].toLowerCase())
        : (listaIngredientes += " " + ingrediente[0].toLowerCase());

      numIterado++;

      numIterado == numIngredientes - 1
        ? (listaIngredientes += " y ")
        : numIterado < numIngredientes
        ? (listaIngredientes += ", ")
        : (listaIngredientes += ". ");
    }
    ingredientes = document.createTextNode(listaIngredientes);
  }
  lista.appendChild(ingredientes);
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

function actualizarPrecio() {
  const parrafoPrecio=document.getElementsByClassName("contenedorInfoPizza")[0].getElementsByClassName("precioPizza")[0];

  if(numIngredientesSeleccionados>4){
    const precioPizza=precioPizzaDefault+0.5*(numIngredientesSeleccionados-4);
    parrafoPrecio.setAttribute("valor_pizza",precioPizza);
  }else{
    parrafoPrecio.setAttribute("valor_pizza",precioPizzaDefault);
  
  }

  parrafoPrecio.childNodes[0].remove();
  parrafoPrecio.insertBefore(document.createTextNode(parrafoPrecio.getAttribute("valor_pizza")),parrafoPrecio.childNodes[0]);
  
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
    numIngredientesSeleccionados++;
  }
  crearContador(numIngredientes, contenedorPadre);
  actualizarPrecio();
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
    numIngredientesSeleccionados--;
  }
  crearContador(numIngredientes, contenedorPadre);
  actualizarPrecio();
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
  actualizarIngredientesSeleccionados(contenedorPadre, ingredientesSeleccionados);
}

/**
 * Modifica el mapa de ingrediente segun los valores del HTML
 * @date 11/13/2023 - 7:17:49 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {HTMLElement} contenedorPadre
 * @param {Map} ingredientesSeleccionados
 */
function actualizarIngredientesSeleccionados(contenedorPadre, ingredientesSeleccionados) {
  const ingrediente = contenedorPadre.getAttribute("info_ing");
  const numIngrediente = contenedorPadre.getAttribute("num_ing");

  numIngrediente <= 0
    ? ingredientesSeleccionados.delete(ingrediente)
    : ingredientesSeleccionados.set(ingrediente, numIngrediente);
  imprimirIngredientesPizza(ingredientesSeleccionados);
}

/**
 * Renombrar pizza html
 * @date 11/18/2023 - 8:02:47 AM
 * @author Aarón Medina Rodríguez
 */
function renombrarPizza() {
  const nombrePizza = document.getElementById("nombrePizza");
  nombrePizza.removeChild(nombrePizza.lastChild);
  nombrePizza.appendChild(document.createTextNode(" " + this.value));
}

/**
 * Imprime una nueva pizza
 * @date 11/18/2023 - 8:46:31 AM
 * @author Aarón Medina Rodríguez
 */
function imprimirPizzaInfo() {
  const contendorInfo = document.getElementsByClassName("contenedorInfoPizza")[0];
  const contenedorPizza = contendorInfo.getElementsByClassName("contenedorPizza")[0];

  const nombrePizza = document.createElement("p");
  nombrePizza.id = "nombrePizza";
  const textPizza = document.createElement("span");
  textPizza.append(document.createTextNode("Pizza"));
  nombrePizza.appendChild(textPizza);
  nombrePizza.appendChild(document.createTextNode(" sin nombre"));

  const tipoPizza = document.createElement("p");
  tipoPizza.id = "tipoPizza";
  tipoPizza.appendChild(document.createTextNode("Regular"));

  const ingredientesPizza = document.createElement("p");
  ingredientesPizza.id = "ingredientesPizza";
  const textIngredientes = document.createElement("span");
  textIngredientes.append(document.createTextNode("Con"));
  ingredientesPizza.appendChild(textIngredientes);
  ingredientesPizza.append(document.createTextNode(" salsa"));

  const contendorImagen = document.createElement("div");
  contendorImagen.classList.add("contendorImagenPizza");
  const imagenPizza = document.createElement("img");
  imagenPizza.src = "./media/masa.webp";
  const precio=document.createElement("p");
  precio.appendChild(document.createTextNode(precioPizzaDefault));
  precio.appendChild(document.createTextNode("€"));
  precio.classList.add("precioPizza");
  precio.setAttribute("valor_pizza",precioPizzaDefault);

  contenedorPizza.appendChild(nombrePizza);
  contenedorPizza.appendChild(tipoPizza);
  contenedorPizza.appendChild(ingredientesPizza);
  contendorImagen.appendChild(imagenPizza);
  contenedorPizza.appendChild(contendorImagen);
  contenedorPizza.appendChild(precio);
  return contenedorPizza;
}

/**
 * Clona una pizza a la seccion de pedidos
 * @date 11/18/2023 - 8:54:39 AM
 * @author Aarón Medina Rodríguez
 */
function clonarPizza() {
  const pizza = document.getElementsByClassName("contenedorInfoPizza")[0].getElementsByClassName("contenedorPizza")[0];
  const copia = pizza.cloneNode(true);
  document.getElementsByClassName("pizzasPedido")[0].append(copia);
}

/**
 * Elimina de la seccion info la pizza
 * @date 11/18/2023 - 8:57:14 AM
 * @author Aarón Medina Rodríguez
 */
function eliminarPizzaInfo() {
  const pizza = document.getElementsByClassName("contenedorInfoPizza")[0].getElementsByClassName("contenedorPizza")[0];
  while (pizza.firstChild) {
    pizza.removeChild(pizza.firstChild);
  }
}

/**
 * Cambiar los inputs a sus valores default
 * @date 11/18/2023 - 9:25:16 AM
 * @author Aarón Medina Rodríguez
 */
function limpiarInputs() {
  document.getElementById("renombrarPizza").value = "";
  const icoNumIngredientes = document.getElementsByClassName("numIngrediente");
  while (icoNumIngredientes.length > 0) {
    icoNumIngredientes[0].remove();
  }
  const toppingIngredientes = document.getElementsByClassName("topping");
  for (let index = 0; index < toppingIngredientes.length; index++) {
    const topping = toppingIngredientes[index];
    topping.setAttribute("num_ing", 0);
  }
  ingredientesSeleccionados.clear();
}

function generarPizza() {
  clonarPizza();
  eliminarPizzaInfo();
  imprimirPizzaInfo();
  limpiarInputs();
  numIngredientesSeleccionados=0;
}

/**
 * Busca en el contenedor la img con el mismo nombre de mayor valor y la devuelve
 * @date 11/18/2023 - 10:43:38 AM
 * @author Aarón Medina Rodríguez
 *
 * @param {HTMLElement} contenedorPizza
 * @param {string} informacionIngrediente
 * @returns {HTMLImageElement} img de mayor valor
 */
function obtenerImgToppingMayor(contenedorPizza, informacionIngrediente) {
  const imgUndefined = document.createElement("img");
  imgUndefined.setAttribute("img_num_ing", 0);
  let numMayor = 0;
  let imgMayor;

  for (let index = 0; index < contenedorPizza.getElementsByClassName("imgTopping").length; index++) {
    const element = contenedorPizza.getElementsByClassName("imgTopping")[index];
    if (
      element.getAttribute("img_info_ing") == informacionIngrediente &&
      element.getAttribute("img_num_ing") > numMayor
    ) {
      numMayor = element.getAttribute("img_num_ing");
      imgMayor = element;
    }
  }
  return imgMayor == undefined ? imgUndefined : imgMayor;
}

/**
 * Elimina una imagen de ingrediente a la pizza
 * @date 11/18/2023 - 10:46:00 AM
 * @author Aarón Medina Rodríguez
 */
function eliminarImagenTopping() {
  const contenedorPizza = document
    .getElementsByClassName("contenedorInfoPizza")[0]
    .getElementsByClassName("contendorImagenPizza")[0];
  const informacionIngrediente = this.parentNode.parentNode.getAttribute("info_ing");
  const numeroIngredientes = this.parentNode.parentNode.getAttribute("num_ing");
  const imgMayor = obtenerImgToppingMayor(contenedorPizza, informacionIngrediente);

  imgMayor.getAttribute("img_num_ing") > 0 ? contenedorPizza.removeChild(imgMayor) : "";
}

/**
 * Añade una imagen de ingrediente a la pizza
 * @date 11/18/2023 - 10:46:18 AM
 * @author Aarón Medina Rodríguez
 */
function anadirImagenTopping() {
  const contenedorPizza = document
    .getElementsByClassName("contenedorInfoPizza")[0]
    .getElementsByClassName("contendorImagenPizza")[0];
  const informacionIngrediente = this.parentNode.parentNode.getAttribute("info_ing");
  const numeroIngredientes = this.parentNode.parentNode.getAttribute("num_ing");
  const imgMayor = obtenerImgToppingMayor(contenedorPizza, informacionIngrediente);

  if (imgMayor.getAttribute("img_num_ing") < limiteIngredientes) {
    const imagenIngredinte = document.createElement("img");
    imagenIngredinte.src = "./media/ingredientes/"+informacionIngrediente.toLowerCase()+"_Topping.webp";
    imagenIngredinte.setAttribute("img_info_ing", informacionIngrediente);
    imagenIngredinte.setAttribute("img_num_ing", numeroIngredientes);
    imagenIngredinte.classList.add("imgTopping");
    contenedorPizza.appendChild(imagenIngredinte);
  }
}

imprimirMasas();
imprimirIngredientes();

imprimirPizzaInfo();
document.getElementById("renombrarPizza").addEventListener("change", renombrarPizza);
document.getElementById("generarPizza").addEventListener("click", generarPizza);
