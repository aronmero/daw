function solicitarDatos() {
  let edad = prompt("Introduce el año de nacimiento");
  debugger;
  let categoria;
  let calculo = 2023 - edad;
  debugger;
  let categoria1 = "Pre-Benjamin";
  let categoria2 = "Benjamin";
  let categoria3 = "Alevín";
  let categoria4 = "Infantil";
  let categoria5 = "Cadete";
  let categoria6 = "Juvenil";
  let categoria7 = "Senior";
  debugger;
  /*Evitar datos incorrectos */
  if (!isNaN(calculo) && calculo >= 5 && calculo < 150) {
    if (calculo < 9) {
      categoria = categoria1;
    } else if (calculo < 11) {
      categoria = categoria2;
    } else if (calculo < 13) {
      categoria = categoria3;
    } else if (calculo < 15) {
      categoria = categoria4;
    } else if (calculo < 17) {
      categoria = categoria5;
    } else if (calculo < 20) {
      categoria = categoria6;
    } else {
      categoria = categoria7;
    }
    debugger;
    document.write("Pertenecea a " + categoria + "<br>");

    document.write("En españa existen 7 categorias<br>");
    document.write(categoria1+ "<br>");
    document.write(categoria2+ "<br>");
    document.write(categoria3+ "<br>");
    document.write(categoria4+ "<br>");
    document.write(categoria5+ "<br>");
    document.write(categoria6+ "<br>");
    document.write(categoria7+ "<br>");
  } else {
    /*Limpiar datos para proximo bucle*/
    calculo = null;
    edad = null;
  }
  debugger;
  return calculo;
}

let bucle;
do {
  bucle = solicitarDatos();
} while (!bucle > 0);
