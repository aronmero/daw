import { generarMercenarioNuevo } from "./modulos/logicaMercenarios.js";
import { imprimirMercenario, limpiarUbicacion } from "./modulos/mostrar.js";

const ubicacionIframe = document.getElementsByClassName("contenedorIframe")[0];
const mercenariosDisponibles = [];
const mercenariosTotales = [];

const mercenariosVenta = [];

for (let index = 0; index < 5; index++) {
  mercenariosVenta.push(generarMercenarioNuevo());
}


function activarVistaMercenarios() {
  const ubicacionMercenario = document.createElement("div");
  ubicacionMercenario.classList.add("contenedorMercenario");

  const navSecundario = document.createElement("div");
  navSecundario.classList.add("navSecundario");
  const botonCompra = document.createElement("button");
  botonCompra.append(document.createTextNode("Comprar Mercenarios"));
  botonCompra.id = "comprarMercenarios";
  botonCompra.addEventListener("click", mostrarVentanaCompra);
  const botonVer = document.createElement("button");
  botonVer.append(document.createTextNode("Ver Mercenarios"));
  botonVer.id = "verMercenarios";
  botonVer.addEventListener("click", mostrarVentanMercenarios);

  navSecundario.append(botonCompra);
  navSecundario.append(botonVer);
  ubicacionIframe.append(navSecundario);
  ubicacionIframe.append(ubicacionMercenario);

  /**
 * Muestra la ventana de compra de mercenarios
 * @date 11/30/2023 - 4:36:06 PM
 * @author Aaron Medina Rodriguez
 */
function mostrarVentanaCompra() {
  limpiarUbicacion(ubicacionMercenario);
  limpiarContenedorMercenario();
  const contenedorMercenariosComprar = document.createElement("div");
  contenedorMercenariosComprar.classList.add("contenedorCompraMercenarioVista");
  ubicacionMercenario.append(contenedorMercenariosComprar);

  for (let index = 0; index < mercenariosVenta.length; index++) {
    imprimirMercenario(mercenariosVenta[index], contenedorMercenariosComprar, true);
  }
  const contenedorCompra = document.createElement("div");
  contenedorCompra.classList.add("contenedorCompraMercenarioCompra");
  contenedorCompra.setAttribute("ondragover", "allowDrop(event)");
  contenedorCompra.setAttribute("ondrop", "drop(event)");
  contenedorCompra.addEventListener("drop", () => {
    realizarCompra(contenedorCompra.firstChild.id);
    contenedorCompra.removeChild(contenedorCompra.firstChild);
  });

  ubicacionMercenario.classList.add("compraMercenarios");
  ubicacionMercenario.append(contenedorCompra);
}

/**
 * Elimina el mercenario de la tienda y lo añade a los mercenarios disponibles
 * @date 11/30/2023 - 4:36:16 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {number} id
 */
function realizarCompra(id) {
  for (let index = 0; index < mercenariosVenta.length; index++) {
    const element = mercenariosVenta[index];
    if (element.id == id) {
      mercenariosVenta.splice(index, 1);
      mercenariosTotales.push(element);
      mercenariosDisponibles.push(element);
    }
  }
}

/**
 * Muestra la ventana de compra de mercenarios
 * @date 11/30/2023 - 4:36:06 PM
 * @author Aaron Medina Rodriguez
 */
function mostrarVentanMercenarios() {
  limpiarUbicacion(ubicacionMercenario);
  limpiarContenedorMercenario();
  const contenedorMercenariosVer = document.createElement("div");
  contenedorMercenariosVer.classList.add("contenedorCompraMercenarioVista");
  ubicacionMercenario.append(contenedorMercenariosVer);

  for (let index = 0; index < mercenariosTotales.length; index++) {
    imprimirMercenario(mercenariosTotales[index], contenedorMercenariosVer, true);
  }

  ubicacionMercenario.classList.add("verMercenarios");
}

function limpiarContenedorMercenario() {
  ubicacionMercenario.classList.remove("verMercenarios");
  ubicacionMercenario.classList.remove("compraMercenarios");
}
}

activarVistaMercenarios();
