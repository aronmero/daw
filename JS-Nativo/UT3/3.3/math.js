let opcion = document.getElementById("opcion");
let ubicacionImprimir = document.getElementById("mostrarDatos");
let resultado;

function procesamiento() {
  switch (opcion.value) {
    case "1":
      potencia();
      break;
    case "2":
      raiz();
      break;
    case "3":
      redondeo();
      break;
    case "4":
      trigonometria();
      break;
    default:
      break;
  }
}

function potencia() {
  let base = parseFloat(prompt("Introduce una base", 2));
  //Datos default
  if (isNaN(base) || base == null) {
    base = 2;
  }
  debugger
  let exponente = parseFloat(prompt("Introduce un exponente", 3));
  //Datos default
  if (isNaN(exponente) || exponente == null) {
    exponente = 3;
  }
  debugger
  resultado = Math.pow(base, exponente);
  ubicacionImprimir.innerHTML =
    "La potencia de " + base + " elevado a " + exponente + " es: " + resultado;
}

function raiz() {
  let numero = parseInt(prompt("Introduce un numero", 9));
  //Datos default
  if (isNaN(numero) || numero == null) {
    numero = 9;
  }

  numero = Math.abs(numero);
  resultado = Math.sqrt(numero);
  ubicacionImprimir.innerHTML = "La raiz de " + numero + " es: " + resultado;
}

function redondeo() {
  let numero = prompt("Introduce un numero decimal", "3.28");
  //Datos default
  debugger;
  if (isNaN(numero) || numero == null) {
    debugger;
    numero = 3.28;
  } else {
    debugger;
    numero = numero.replace(",", ".");
    numero = parseFloat(numero);
  }
  let resultado1 = Math.ceil(numero);
  let resultado2 = Math.floor(numero);
  ubicacionImprimir.innerHTML =
    "El numero cercano mayor de " +
    numero +
    " es: " +
    resultado1 +
    "<br>" +
    "El numero cercano menor de " +
    numero +
    " es: " +
    resultado2;
}

function trigonometria() {
  let angulo = parseInt(prompt("Introduce un angulo de 0 a 360", "180"));
  //Datos default
  if (isNaN(angulo)) {
    angulo = 180;
  }
  //Corregir datos en rango
  if (angulo < 0) {
    angulo = 0;
  } else if (angulo > 360) {
    angulo = 360;
  }
  let seno = Math.sin(angulo);
  let coseno = Math.cos(angulo);
  let tangente = Math.tan(angulo);
  ubicacionImprimir.innerHTML =
    "El seno de " +
    angulo +
    " es: " +
    seno +
    "<br>" +
    "El coseno de " +
    angulo +
    " es: " +
    coseno +
    "<br>" +
    "El tangente de " +
    angulo +
    " es: " +
    tangente;
}
