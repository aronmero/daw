let dni = prompt("Introduce el DNI ");
let letraDni = dni.charAt(dni.length-1);//Obtengo la letra que esta al final

dni=dni.slice(0,8);//elimino la letra y dejo solo los numeros


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

if (dni < 0 || dni > 99999999) {
  alert("Error:1");
} else {
  let letra = dni % 23;

  letraComprobada = letras[letra];

  if (letraComprobada == letraDni) {
    alert("Dni y letra correctos");
  } else {
    alert("Letra indicada incorrecta <br>Error:2");
  }
}
