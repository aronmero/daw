import {
  agregarPropietarioTexto,
  crearEdificio,
} from "./modulos/edificio.js";


let edificioA = crearEdificio("Garcia Prieto", 58, 15706);
let edificioB = crearEdificio("Camino Caneiro", 29, 32004);
let edificioC = crearEdificio("San Clemente", "", 15705);

console.log("-----------------Separador--------------------------");
console.log(
  "El código postal del edificio A es: " + edificioA.imprimeCodigoPostal()
);
console.log("El calle del edificio C es: " + edificioC.imprimeCalle());
console.log(
  "El edificio B esta situado en la calle " +
    edificioB.imprimeCalle() +
    " numero " +
    edificioB.imprimeNumero()
);

console.log("-----------------Separador--------------------------");
edificioA.agregarPlantasYPuertas(3, 2);
agregarPropietarioTexto(edificioA, "Jose Antonio Lopez", 0, 0);
agregarPropietarioTexto(edificioA, "Luisa Martinez", 0, 1);
agregarPropietarioTexto(edificioA, "Marta Castellón", 0, 2);
agregarPropietarioTexto(edificioA, "Antonio Pereira", 1, 1);

console.log("-----------------Separador--------------------------");
edificioA.imprimePlantas();

console.log("-----------------Separador--------------------------");
edificioA.agregarPlantasYPuertas(2, 1);
agregarPropietarioTexto(edificioA, "Pedro Meijide.", 2, 1);
edificioA.imprimePlantas();
