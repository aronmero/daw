import { generarMercenarioNuevo } from "./modulos/logicaMercenarios.js";
import { imprimirNavegacion, imprimirMercenario,limpiarUbicacion } from "./modulos/mostrar.js";

const mercenariosActivos = [];
const mercenariosTotales = [];
const ubicacionMercenario = document.getElementsByClassName("contenedorMercenario")[0];
const vistaActiva = document.body.id;
const mercenariosVenta = [];

for (let index = 0; index < 5; index++) {
  mercenariosVenta.push(generarMercenarioNuevo());
}

imprimirNavegacion();

if (vistaActiva == "vistaMercenarios") {
  const botonCompra = document.getElementById("comprarMercenarios");
  botonCompra.addEventListener("click", () => {
    limpiarUbicacion(ubicacionMercenario);
    const contenedorMercenariosComprar=document.createElement("div");
    contenedorMercenariosComprar.classList.add("contenedorMercenario");
    ubicacionMercenario.append(contenedorMercenariosComprar);
    for (let index = 0; index < mercenariosVenta.length; index++) {
      imprimirMercenario(mercenariosVenta[index], contenedorMercenariosComprar,true);
    }
    /**
     * TODO: añadir atributos para arrastrar y comprar unidad
     */
    const contenedorCompra=document.createElement("div");
    ubicacionMercenario.append(contenedorCompra);
  });
}
