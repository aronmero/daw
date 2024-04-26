let dni = prompt("Introduce los numeros del DNI ");
debugger;
let letraDni = prompt("Introduce la letra");
debugger;
var letras = [
  "T",
  "R",
  "W",
  "A",
  "G",
  "M",
  "Y",
  "F",
  "P",
  "D",
  "X",
  "B",
  "N",
  "J",
  "Z",
  "S",
  "Q",
  "V",
  "H",
  "L",
  "C",
  "K",
  "E",
  "T",
];

letraDni = letraDni.toUpperCase();//la letra a mayusculas para evitar errores
debugger;
if (dni.length ==8) {
  let letra = dni % 23;
  debugger;
  letraComprobada = letras[letra];
  debugger;
  if (letraComprobada == letraDni) {
    alert("Dni y letra correctos");
  } else {
    alert("Error: 2. Letra indicada invalida.");
  }
} else {
  alert("Error: 1. Numero no valido.");
}
