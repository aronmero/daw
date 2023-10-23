export class edificio {
  calle;
  numero;
  codigo_postal;
  plantas;

  constructor(calle, numero, codigo_postal) {
    this.calle = calle;
    this.numero = numero;
    this.codigo_postal = codigo_postal;
    this.plantas = [];
  }

  /**
   * Se le pasa el número de plantas que queremos crear en el piso y el número de puertas por planta.
   * Cada vez que se llame a este método, añadirá el número de plantas y puertas indicadas en los parámetros, a las que ya están creadas en el edificio.
   * @param {number} puertas
   * @param {number} numPlantas
   */
  agregarPlantasYPuertas(puertas, numPlantas) {
    for (let i = 0; i < numPlantas; i++) {
      let planta = new Array(puertas);
      for (let j = 0; j < puertas; j++) {
        planta[j] = "";
      }
      this.plantas.push(planta);
    }
  }

  /**
   * Modifica el numero del edificio
   * @param {number} numero
   */
  modificarNumero(numero) {
    this.numero = numero;
  }

  /**
   * Modifica el calle del edificio
   * @param {String} calle
   */
  modificarCalle(calle) {
    this.calle = calle;
  }

  /**
   * Modifica el codigo postal del edificio
   * @param {number} codigo
   */
  modificarCodigoPostal(codigo) {
    this.codigo_postal = codigo;
  }

  /**
   *
   * @returns devuelve calle{String}
   */
  imprimeCalle() {
    return this.calle;
  }

  /**
   *
   * @returns devuelve numero{number}
   */
  imprimeNumero() {
    return this.numero;
  }

  /**
   *
   * @returns devuelve codigo_postal{number}
   */
  imprimeCodigoPostal() {
    return this.codigo_postal;
  }

  /**
   * Agrega un propietario a una puerta de una planta
   * @param {String} nombre
   * @param {number} planta
   * @param {number} puerta
   */
  agregarPropietario(nombre, planta, puerta) {
    this.plantas[planta][puerta] = nombre;
  }

  /**
   * Imprime por consola la informacion de todas las puertas y plantas de un edificio
   */
  imprimePlantas() {
    const titulo =
      "Listado de propietarios del edificio calle " +
      this.imprimeCalle() +
      " número " +
      this.imprimeNumero();
    console.log(titulo);
    for (let planta = 0; planta < this.plantas.length; planta++) {
      for (let puerta = 0; puerta < this.plantas[planta].length; puerta++) {
        const element =
          "Propietario del piso " +
          (puerta + 1) +
          " de la planta " +
          (planta + 1) +
          ": " +
          this.plantas[planta][puerta];
        console.log(element);
      }
    }
  }

  /**
   * Muestra los datos iniciales de un edificio
   */
  mostrarDatosEdificio() {
    let numero = this.imprimeNumero() == "" ? "S/n" : this.imprimeNumero();
    console.log(
      "Construido nuevo edificio en calle: " +
        this.imprimeCalle() +
        ", nº: " +
        numero +
        ", CP: " +
        this.imprimeCodigoPostal()
    );
  }
}

/**
 * Agrega un propietario a una puerta de una planta de un edificio y muestra informacion por consola
 * @param {edificio} edificio
 * @param {String} nombre
 * @param {number} planta
 * @param {number} puerta
 */
export function agregarPropietarioTexto(edificio, nombre, planta, puerta) {
  edificio.agregarPropietario(nombre, planta, puerta);
  console.log(
    nombre +
      " es ahora el propietario de la puerta " +
      puerta +
      " de la planta " +
      planta +
      "."
  );
}

/**
 * Crea un edificio, muestra los datos de ese edificio y lo devuelve
 * @param {String} calle
 * @param {number} numero
 * @param {number} codigoPostal
 * @returns
 */
export function crearEdificio(calle, numero, codigoPostal) {
  let edificioTemp = new edificio(calle, numero, codigoPostal);
  edificioTemp.mostrarDatosEdificio();
  return edificioTemp;
}
