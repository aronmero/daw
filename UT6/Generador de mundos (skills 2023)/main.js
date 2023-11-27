import { Zona } from "./modulos/zona.js";

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

/**
 * Crea un mundo, y lo hace crecer.
 * @date 11/23/2023 - 6:30:05 PM
 * @author Aaron Medina Rodriguez
 */
function generarMundo() {
  let mapSize = validarEntrada("mapSize", mapSizeDefault);
  let maxOccupiedArea = validarEntrada("maxOccupiedArea", maxOccupiedAreaDefault);

  let natureMinZones = validarEntrada("natureMinZones", natureMinZonesDefault);
  let natureMaxZones = validarEntrada("natureMaxZones", natureMaxZonesDefault);
  natureMaxZones = natureMaxZones < natureMinZones ? natureMinZones : natureMaxZones;
  let natureZoneMaxSize = validarEntrada("natureZoneMaxSize", natureZoneMaxSizeDefault);
  let natureTotalMaxSize = validarEntrada("natureTotalMaxSize", natureTotalMaxSizeDefault);

  let urbanMinZones = validarEntrada("urbanMinZones", urbanMinZonesDefault);
  let urbanMaxZones = validarEntrada("urbanMaxZones", urbanMaxZonesDefault);
  urbanMaxZones = urbanMaxZones < urbanMinZones ? urbanMinZones : urbanMaxZones;
  let urbanZoneMaxSize = validarEntrada("urbanZoneMaxSize", urbanZoneMaxSizeDefault);
  let urbanTotalMaxSize = validarEntrada("urbanTotalMaxSize", urbanTotalMaxSizeDefault);

  let commercialMinZones = validarEntrada("commercialMinZones", commercialMinZonesDefault);
  let commercialMaxZones = validarEntrada("commercialMaxZones", commercialMaxZonesDefault);
  commercialMaxZones = commercialMaxZones < commercialMinZones ? commercialMinZones : commercialMaxZones;
  let commercialZoneMaxSize = validarEntrada("commercialZoneMaxSize", commercialZoneMaxSizeDefault);
  let commercialTotalMaxSize = validarEntrada("commercialTotalMaxSize", commercialTotalMaxSizeDefault);

  //https://stackoverflow.com/a/38213067
  let mapaMundo = [...Array(mapSize)].map((e) => Array(mapSize));
  let espaciosNature = new Array();
  let espaciosUrban = new Array();
  let espaciosCommercial = new Array();

  poblar();

  crecimiento();

  imprimirMundo();

  /**
   * Generacion inicial de elementos
   * @date 11/23/2023 - 6:28:34 PM
   * @author Aaron Medina Rodriguez
   */
  function poblar() {
    let idZona = 0;
    let zoneNatureRNG = natureMinZones + Math.round(Math.random() * (natureMaxZones - natureMinZones));
    let zoneUrbanRNG = urbanMinZones + Math.round(Math.random() * (urbanMaxZones - urbanMinZones));
    let zoneCommercialRNG =
      commercialMinZones + Math.round(Math.random() * (commercialMaxZones - commercialMinZones));
    let cordenadasIniciales = new Array();
    generarSpawn(zoneNatureRNG, "nature", natureZoneMaxSize, espaciosNature);
    generarSpawn(zoneUrbanRNG, "urban", urbanZoneMaxSize, espaciosUrban);
    generarSpawn(zoneCommercialRNG, "commercial", commercialZoneMaxSize, espaciosCommercial);

    for (let index = 0; index < cordenadasIniciales.length; index++) {
      const coordenada1 = cordenadasIniciales[index][0];
      const coordenada2 = cordenadasIniciales[index][1];
      const tipo = cordenadasIniciales[index][2];
      const idZona = cordenadasIniciales[index][3];
      mapaMundo[coordenada1][coordenada2] = [tipo, idZona];
    }

    /**
     * Genera coordenadas
     * @date 11/20/2023 - 3:30:51 PM
     * @author Aaron Medina Rodriguez
     *
     * @param {int} zonasGenerar
     * @param {string} tipo
     */
    function generarSpawn(zonasGenerar, tipo, tamanoMaximo, espacios) {
      for (let index = 0; index < zonasGenerar; index++) {
        const cordenada1 = Math.ceil(Math.random() * mapSize - 1);
        const cordenada2 = Math.ceil(Math.random() * mapSize - 1);
        cordenadasIniciales.push([cordenada1, cordenada2, tipo, idZona]);

        const zona = new Zona(idZona, tamanoMaximo, tipo);
        zona.anadirEspacio(cordenada1, cordenada2);
        espacios.push(zona);
        idZona++;
      }
    }
  }

  /**
   * Expansion de los mundos
   * @date 11/23/2023 - 6:28:52 PM
   * @author Aaron Medina Rodriguez
   */
  function crecimiento() {
    let numParcelasNatureActuales = espaciosNature.length;
    let numParcelasUrbanActuales = espaciosUrban.length;
    let numParcelasCommercialActuales = espaciosCommercial.length;

    let numParcelasTotales = Math.ceil((mapSize * mapSize * maxOccupiedArea) / 100);
    let sumParcelasMax = natureTotalMaxSize + urbanTotalMaxSize + commercialTotalMaxSize;

    let numParcelasNecesarias = sumParcelasMax < numParcelasTotales ? sumParcelasMax : numParcelasTotales;
    let numParcelasOcupadas =
      numParcelasNatureActuales + numParcelasUrbanActuales + numParcelasCommercialActuales;
    let numExpansion = 0;

    while (numParcelasOcupadas < numParcelasNecesarias) {
      if (numParcelasNatureActuales < natureTotalMaxSize) {
        numExpansion = expandir("nature", espaciosNature);
        numParcelasOcupadas = numParcelasOcupadas + numExpansion;
        numParcelasUrbanActuales = numParcelasUrbanActuales + numExpansion;
      }

      if (numParcelasUrbanActuales < urbanTotalMaxSize) {
        numExpansion = expandir("urban", espaciosUrban);
        numParcelasOcupadas = numParcelasOcupadas + numExpansion;
        numParcelasNatureActuales = numParcelasCommercialActuales + numExpansion;
      }

      if (numParcelasCommercialActuales < commercialTotalMaxSize) {
        numExpansion = expandir("commercial", espaciosCommercial);
        numParcelasOcupadas = numParcelasOcupadas + numExpansion;
        numParcelasCommercialActuales = numParcelasCommercialActuales + numExpansion;
      }
    }

    /**
     * Extiende una zona al azar en una direccion al azar
     * @date 11/21/2023 - 4:43:23 PM
     * @author Aaron Medina Rodriguez
     *
     * @param {String} tipo
     * @param {Array} espacio
     */
    function expandir(tipo, espacio) {
      const zonaAzar = Math.ceil(Math.random() * espacio.length - 1);
      const zona = espacio[zonaAzar];

      const parcelasActivas = zona.getParcelasActuales();

      const index = Math.ceil(Math.random() * (parcelasActivas - 1));

      const espaciosZona = zona.getEspacios();
      const coordenada1 = espaciosZona[index][0];
      const coordenada2 = espaciosZona[index][1];
      const direccion1 = Math.ceil(Math.random() * 3) - 2;
      const direccion2 = Math.ceil(Math.random() * 3) - 2;

      for (let index = 1; index < mapSize - 1; index++) {
        if (comprobarInsertado(coordenada1 + direccion1 * index, coordenada2 + direccion2 * index)) {
          return 1;
        } else {
          return 0;
        }
      }

      /**
       * Comprueba si las coordenadas son correctas e inserta una parcela de un tipo
       * @date 11/21/2023 - 4:42:48 PM
       * @author Aaron Medina Rodriguez
       *
       * @param {int} coordenada1
       * @param {int} coordenada2
       */
      function comprobarInsertado(coordenada1, coordenada2) {
        if (comprobarVacio(coordenada1, coordenada2)) {
          zona.anadirEspacio(coordenada1, coordenada2);

          mapaMundo[coordenada1][coordenada2] = [tipo, zona.getId()];
          return true;
        }
        return false;
      }
    }

    /**
     * Comprueba si esta vacio el espacio
     * @date 11/20/2023 - 4:26:59 PM
     * @author Aaron Medina Rodriguez
     *
     * @returns {boolean}
     */
    function comprobarVacio(coordenada1, coordenada2) {
      if (coordenada1 < 0 || coordenada2 < 0 || coordenada1 >= mapSize || coordenada2 >= mapSize) {
        return false;
      }
      return mapaMundo[coordenada1][coordenada2] === undefined ? true : false;
    }
  }

  /**
   * Imprime en HTML el array de mundo
   * @date 11/23/2023 - 6:29:29 PM
   * @author Aaron Medina Rodriguez
   */
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
          const espacio = mapaMundo[j][i];
          celda.classList.add(espacio[0]);
          textoCelda = espacio[1];
        }

        const contenidoCelda = document.createTextNode(textoCelda);
        celda.append(contenidoCelda);
        row.append(celda);
      }
      tabla.append(row);
    }

    contenedorVisualizado.append(tabla);
  }
}
