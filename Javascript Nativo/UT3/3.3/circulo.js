let ubicacionImprimir = document.getElementById("mostrarDatos");

let valor = parseInt(prompt("Introduce un valor", 5));
if (isNaN(valor)|| valor==null) {
  valor = 5;
}

let radio = valor;
let diametro = valor * 2;
let perimetro = Math.PI * diametro;
let areaCirculo = Math.PI * Math.pow(radio, 2);
let areaEsfera = 4 * Math.PI * Math.pow(radio, 2);
let volumen = (4 / 3) * Math.PI * Math.pow(radio, 3);



ubicacionImprimir.innerHTML =
  "El valor del radio es: " +
  radio +
  " cm" +
  "<br>El valor del diámetro es: " +
  diametro +
  " cm" +
  "<br>El valor del perímetro de la circunferencia es: " +
  redondear(perimetro) +
  " cm" +
  "<br>El valor del área del círculo es: " +
  redondear(areaCirculo) +
  " cm2" +
  "<br>El valor del área de la esfera es: " +
  redondear(areaEsfera) +
  " cm2" +
  "<br>El valor del volumen de la esfera es: " +
  redondear(volumen) +
  " cm3";

function redondear(numero) {
  return numero.toFixed(2);
}
