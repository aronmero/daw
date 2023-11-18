export class Pizza{
    nombre;
    tipo;
    ingredientes;
    precio;

    /**
     * Creates an instance of Pizza.
     * @date 11/18/2023 - 9:06:22 AM
     * @author Aarón Medina Rodríguez
     *
     * @constructor
     * @param {String} nombre
     * @param {String} tipo
     * @param {String} ingredientes
     * @param {Double} precio
     */
    constructor(nombre,tipo,ingredientes,precio){
        this.nombre=nombre;
        this.tipo=tipo;
        this.ingredientes=ingredientes;
        this.precio=precio;
    }
}