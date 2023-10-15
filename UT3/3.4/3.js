let fechaUsuario = new Date();
let opciones = document.getElementById("opcion");
const diasSemana = [
  "Domingo",
  "Lunes",
  "Martes",
  "Miercoles",
  "Jueves",
  "Sabado",
];
const meses = [
  "enero",
  "febrero",
  "marzo",
  "abril",
  "mayo",
  "junio",
  "julio",
  "agosto",
  "septiembre",
  "octubre",
  "noviembre",
  "dicicmebre",
];
function iniciar() {
  switch (opciones.value) {
    case "1":
      document.getElementById("mostrarFecha").innerHTML =
        fechaUsuario.toLocaleDateString();
      break;
    case "2":
      document.getElementById("mostrarFecha").innerHTML =
        diasSemana[fechaUsuario.getDay()] +
        ", " +
        fechaUsuario.getDate() +
        " de " +
        meses[fechaUsuario.getMonth()] +
        " de " +
        fechaUsuario.getFullYear();
      break;

    case "3":
      let fechaDividida = fechaUsuario.toDateString().split(" ", 4);

      document.getElementById("mostrarFecha").innerHTML =
        fechaDividida[0] +
        ", " +
        fechaDividida[1] +
        " " +
        fechaDividida[2] +
        ", " +
        fechaDividida[3];
      break;

    default:
      break;
  }
}
