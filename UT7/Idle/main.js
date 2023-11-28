import { generarUnidadNueva } from "./modulos/logicaMercenarios.js";
const mercenariosActivas = [];
const mercenariosTotales = [];
const mercenarioPruebas = generarUnidadNueva();

console.log(mercenarioPruebas);
console.log("Mercenario: " + mercenarioPruebas.getNombre());
console.log("Puntos de Vida Maximos: " + mercenarioPruebas.getPuntosVidaMax());
console.log("Puntos de Vida actuales: " + mercenarioPruebas.getPuntosVida());
console.log("Daño: " + mercenarioPruebas.getDano());
console.log("Defensa: " + mercenarioPruebas.getDefensa());
console.log("Velocidad: " + mercenarioPruebas.getVelocidad());
console.log("Estado: " + mercenarioPruebas.getEstado());