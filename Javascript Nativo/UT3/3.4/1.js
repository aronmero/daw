const fechaActual = new Date();
const fechaFinal = new Date("2024-06-24");

let diferencia = Math.round(
  (fechaFinal.getTime() - fechaActual.getTime()) / (1000 * 3600 * 24)
);

document.writeln(
  "Quedan aun " + diferencia + " días para finalizar las clases"
);
