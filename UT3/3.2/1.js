
let nombreApellidos;
let nletras;
let nombre;
let apellido1;
let apellido2;
let nombreUsuario1;
let nombreUsuario2;

function procesamiento() {
  nombreApellidos = document.getElementById("nombreApellidos").value;
  nletras = nombreApellidos.replace(/\s{1,}/gm, "");//Patron eliminar espacios

  document.getElementById("nletras").innerHTML ="Longitud: "+ nletras.length;
  document.getElementById("minus").innerHTML = nombreApellidos.toLowerCase();
  document.getElementById("mayus").innerHTML = nombreApellidos.toUpperCase();

  let partes = (nombreApellidos.toLowerCase()).split(" ");
  document.getElementById("nombre").innerHTML = "Nombre: "+partes[0];
  document.getElementById("apellido1").innerHTML = "Apellido 1: "+partes[1];
  document.getElementById("apellido2").innerHTML = "Apellido 2: "+partes[2];

  document.getElementById("nombreUsuario1").innerHTML = "Nombre de usuario: "+
    partes[0].charAt(0) + partes[1].substr(0, 3) + partes[2].charAt(0);
  document.getElementById("nombreUsuario2").innerHTML ="Nombre de usuario: "+
    partes[0].substr(0, 3) + partes[1].substr(0, 3) + partes[2].substr(0, 3);
}
