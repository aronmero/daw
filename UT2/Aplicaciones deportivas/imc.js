function solicitarDatos() {
  let peso = prompt("Introduce el peso en kg");
  let altura = prompt("Introduce la altura en cm");

  altura = altura / 100;
  /*Calculo del IMC */
  let calculo = peso / Math.pow(altura, 2);
  /*Redondear a dos decimales*/
  calculo = Math.round(calculo * 100) / 100;

  /*Evitar datos incorrectos */
  if (!isNaN(calculo) && calculo != Infinity && calculo != 0 && calculo > 0) {
    document.write(calculo + "<br>");
    /*Mostrar IMC segun valor*/
    if (calculo < 16.0) {
      document.write("Infrapeso (delgadez severa)");
    } else if (calculo < 16.99) {
      document.write("Infrapeso (delgadez moderada)");
    } else if (calculo < 18.49) {
      document.write("Infrapeso (delgadez aceptable)");
    } else if (calculo < 24.99) {
      document.write("Peso normal");
    } else if (calculo < 29.99) {
      document.write("Sobrepeso");
    } else if (calculo < 34.99) {
      document.write("Obeso (Tipo I)");
    } else if (calculo < 40.99) {
      document.write("Obeso (Tipo II)");
    } else if (calculo > 40.0) {
      document.write("Obeso (Tipo III)");
    }
  } else {
    /*Limpiar datos para proximo bucle*/
    calculo = null; 
    peso = null;
    altura = null;
  }

  return calculo;
}

let bucle;
do {
  bucle = solicitarDatos();
} while (!bucle > 0);
