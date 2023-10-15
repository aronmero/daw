let fechaUsuario = new Date();
let opciones = document.getElementById("opcion");

function iniciar() {
  switch (opciones.value) {
    case "1":
      document.getElementById("mostrarFecha").innerHTML =fechaUsuario.toLocaleTimeString();
      break;
    case "2":
      document.getElementById("mostrarFecha").innerHTML =fechaUsuario.toLocaleTimeString('en-US');
      break;

    default:
      break;
  }
}
