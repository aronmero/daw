const mapSizeDefault = 64;
const maxOccupiedAreaDefault = 80;
const natureMinZonesDefault = 2;
const natureMaxZonesDefault = 8;
const natureZoneMaxSizeDefault = 500;
const natureTotalMaxSizeDefault = 800;

const urbanMinZonesDefault = 4;
const urbanMaxZonesDefault = 6;
const urbanZoneMaxSizeDefault = 100;
const urbanTotalMaxSizeDefault = 800;

const commercialMinZonesDefault = 2;
const commercialMaxZonesDefault = 8;
const commercialZoneMaxSizeDefault = 50;
const commercialTotalMaxSizeDefault = 200;

document.getElementById("enviarForm").addEventListener("click", generarMundo);

/**
 * Comprueba que el valor del elemento introducido sea mayor a 0
 * @date 11/20/2023 - 3:02:41 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {string} idElemento del elemento HTML
 * @param {int} variableDefault valor default
 * @returns {int}
 */
function validarEntrada(idElemento, variableDefault) {
  return parseInt(document.getElementById(idElemento).value) > 0
    ? parseInt(document.getElementById(idElemento).value)
    : variableDefault;
}

function generarMundo() {
  let mapSize = validarEntrada("mapSize", mapSizeDefault);
  let maxOccupiedArea = validarEntrada("maxOccupiedArea", maxOccupiedAreaDefault);
  let natureMinZones = validarEntrada("natureMinZones", natureMinZonesDefault);
  let natureMaxZones = validarEntrada("natureMaxZones", natureMaxZonesDefault);
  let natureZoneMaxSize = validarEntrada("natureZoneMaxSize", natureZoneMaxSizeDefault);
  let natureTotalMaxSize = validarEntrada("natureTotalMaxSize", natureTotalMaxSizeDefault);
  let urbanMinZones = validarEntrada("urbanMinZones", urbanMinZonesDefault);
  let urbanMaxZones = validarEntrada("urbanMaxZones", urbanMaxZonesDefault);
  let urbanZoneMaxSize = validarEntrada("urbanZoneMaxSize", urbanZoneMaxSizeDefault);
  let urbanTotalMaxSize = validarEntrada("urbanTotalMaxSize", urbanTotalMaxSizeDefault);
  let commercialMinZones = validarEntrada("commercialMinZones", commercialMinZonesDefault);
  let commercialMaxZones = validarEntrada("commercialMaxZones", commercialMaxZonesDefault);
  let commercialZoneMaxSize = validarEntrada("commercialZoneMaxSize", commercialZoneMaxSizeDefault);
  let commercialTotalMaxSize = validarEntrada("commercialTotalMaxSize", commercialTotalMaxSizeDefault);

  //https://stackoverflow.com/a/38213067
  let mapaMundo = [...Array(mapSize)].map((e) => Array(mapSize));

  poblar();
  crecimiento();
  console.log(mapaMundo);
  imprimirMundo();

  function poblar() {
    let zoneNatureRNG = natureMinZones + Math.round(Math.random() * (natureMaxZones - natureMinZones));
    let zoneUrbanRNG = urbanMinZones + Math.round(Math.random() * (urbanMaxZones - urbanMinZones));
    let zoneCommercialRNG =
      commercialMinZones + Math.round(Math.random() * (commercialMaxZones - commercialMinZones));
    let cordenadasIniciales = new Array();
    generarSpawn(zoneNatureRNG, "nature");
    generarSpawn(zoneUrbanRNG, "urban");
    generarSpawn(zoneCommercialRNG, "commercial");

    for (let index = 0; index < cordenadasIniciales.length; index++) {
      const coordenada1 = cordenadasIniciales[index][0];
      const coordenada2 = cordenadasIniciales[index][1];
      const tipo = cordenadasIniciales[index][2];
      mapaMundo[coordenada1][coordenada2] = tipo;
    }

    /**
     * Genera coordenadas
     * @date 11/20/2023 - 3:30:51 PM
     * @author Aaron Medina Rodriguez
     *
     * @param {int} zonasGenerar
     * @param {string} tipo
     */
    function generarSpawn(zonasGenerar, tipo) {
      for (let index = 0; index < zonasGenerar; index++) {
        const cordenada1 = Math.ceil(Math.random() * mapSize - 1);
        const cordenada2 = Math.ceil(Math.random() * mapSize - 1);
        cordenadasIniciales.push([cordenada1, cordenada2, tipo]);
      }
    }
  }

  function crecimiento() {
    let espaciosNature = buscarEspaciosTipo("nature");
    let espaciosUrban = buscarEspaciosTipo("urban");
    let espaciosCommercial = buscarEspaciosTipo("commercial");

    let numParcelasNatureActuales = espaciosNature.length;
    let numParcelasUrbanActuales = espaciosUrban.length;
    let numParcelasCommercialActuales = espaciosCommercial.length;

    let numParcelasTotales = Math.round((mapSize * mapSize * maxOccupiedArea) / 100);
    let numParcelasOcupadas =
      numParcelasNatureActuales + numParcelasUrbanActuales + numParcelasCommercialActuales;

      //Comprobar cada linea
    while (numParcelasNatureActuales < natureTotalMaxSize) {
      numParcelasNatureActuales = numParcelasNatureActuales + 100;
      numParcelasOcupadas =
        numParcelasNatureActuales + numParcelasUrbanActuales + numParcelasCommercialActuales;
      if (numParcelasOcupadas == numParcelasTotales) {
        break;
      }
    }
     //Comprobar cada linea
    while (numParcelasUrbanActuales < urbanTotalMaxSize) {
      numParcelasUrbanActuales = numParcelasUrbanActuales + 100;
      numParcelasOcupadas =
        numParcelasNatureActuales + numParcelasUrbanActuales + numParcelasCommercialActuales;
      if (numParcelasOcupadas == numParcelasTotales) {
        break;
      }
    }
     //Comprobar cada linea
    while (numParcelasCommercialActuales < commercialTotalMaxSize) {
      numParcelasOcupadas =
        numParcelasNatureActuales + numParcelasUrbanActuales + numParcelasCommercialActuales;
      numParcelasCommercialActuales = numParcelasCommercialActuales + 100;
      if (numParcelasOcupadas == numParcelasTotales) {
        break;
      }
    }

    console.log(numParcelasTotales);

    /**
     * Encuentra las coordenadas de todos los elementos de un tipo
     * @date 11/20/2023 - 4:26:11 PM
     * @author Aaron Medina Rodriguez
     *
     * @param {string} tipo
     * @returns {array}
     */
    function buscarEspaciosTipo(tipo) {
      let elementosTipo = new Array();
      for (let j = 0; j < mapSize - 1; j++) {
        for (let i = 0; i < mapSize - 1; i++) {
          if (mapaMundo[j][i] == tipo) {
            elementosTipo.push([[j], [i], [tipo]]);
          }
        }
      }
      return elementosTipo;
    }

    /**
     * Comprueba si esta vacio el espacio
     * @date 11/20/2023 - 4:26:59 PM
     * @author Aaron Medina Rodriguez
     *
     * @returns {boolean}
     */
    function comprobarVacio(coordenada1, coordenada2) {
      return mapaMundo[coordenada1][coordenada2] === undefined ? true : false;
    }
  }

  function imprimirMundo() {
    const contenedorVisualizado = document.getElementById("previsualizado");
    if (contenedorVisualizado.childElementCount >= 1) {
      contenedorVisualizado.removeChild(contenedorVisualizado.firstChild);
    }

    const tabla = document.createElement("table");
    for (let j = 0; j < mapSize - 1; j++) {
      const row = document.createElement("tr");
      for (let i = 0; i < mapSize - 1; i++) {
        const celda = document.createElement("td");
        let textoCelda = "";
        if (mapaMundo[j][i] !== undefined) {
          celda.classList.add(mapaMundo[j][i]);
        }

        const contenidoCelda = document.createTextNode(textoCelda.charAt(0));
        celda.append(contenidoCelda);
        row.append(celda);
      }
      tabla.append(row);
    }

    contenedorVisualizado.append(tabla);
  }
}
