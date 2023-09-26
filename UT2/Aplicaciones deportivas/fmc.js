function solicitarDatos() {
  let edad = prompt("Introduce la edad");
  debugger;
  let sexo = prompt("Introduce la sexo(Masculino | Femenino)", "Masculino");
  debugger;
  let hrMaximo;
  if (sexo == "masculino" || sexo == "Masculino") {
    hrMaximo = 220;
  } else {
    hrMaximo = 226;
  }
  debugger;
  let calculo = hrMaximo - edad;
  debugger;
  /*Evitar datos incorrectos */
  if (!isNaN(calculo) && calculo > 0 && calculo < 220) {
    document.write("Maximo: " + calculo + "<br>");

    document.write(
      "Zona de recuperación (60%-70%). " +
        Math.round(calculo * 0.60) +"~"+Math.round(calculo * 0.70) +
        "<br>Zona aeróbica (70%-80%). " +
        Math.round(calculo * 0.70) +"~"+Math.round(calculo * 0.80) +
        "<br>Zona anaeróbica (80%-90%). " +
        Math.round(calculo * 0.80) +"~"+Math.round(calculo * 0.90) +
        "<br>Línea roja (90%-100%). " +
        Math.round(calculo * 0.90)+"~"+Math.round(calculo)
    );
    debugger;
  } else {
    /*Limpiar datos para proximo bucle*/
    calculo = null;
    edad = null;
    sexo = null;
    debugger;
  }

  return calculo;
}

let bucle;
do {
  bucle = solicitarDatos();
} while (!bucle > 0);
