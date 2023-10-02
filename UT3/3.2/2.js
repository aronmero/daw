let tabla = document.getElementById("tablaDatos");
let opciones = document.getElementById("opcion");
let textoimprimir;
const datos =
  "Cliente;Localidad;Cuota" +
  "\n" +
  "Laura;Santander;50" +
  "\n" +
  "Álvaro;Castro;50" +
  "\n" +
  "Igor;Castro;60" +
  "\n" +
  "Ivan;Santander;40" +
  "\n" +
  "Mónica;Zamora;30" +
  "\n" +
  "Javi;Bilbao;30" +
  "\n" +
  "David;Bilbao;50" +
  "\n" +
  "José Luis;Bilbao;60";

//Separar los datos de la variable individualmente en un array
let lineaDatos = datos.split("\n");
let parteDatos;
for (let index = 0; index < lineaDatos.length; index++) {
  const element = lineaDatos[index].split(";");
  if (parteDatos == undefined) {
    parteDatos = element;
  } else {
    parteDatos = parteDatos.concat(element);
  }
}

//Funcion inicial
function procesamiento() {
  switch (opciones.value) {
    case "1":
      imprimirTodo();
      break;
    case "2":
      imprimirLocalidad();
      break;
    case "3":
      imprimirCuota();
      break;
    default:
      break;
  }
}


//Muestra todos los datos en una tabla
function imprimirTodo() {
  let row = crearCabeceraTabla();
  //Bucle exterior que recorre una linea de tabla del array
  for (let index = 3; index < parteDatos.length; index = index + 3) {
    row = tabla.insertRow();
    imprimirDatosLinea(row, index);
  }
}

//Muestra la localidad selecionada con los datos en una tabla
function imprimirLocalidad() {
  let localidad = prompt("Nombre de la localidad", "Bilbao");
  localidad = localidad.toLowerCase();
  let row = crearCabeceraTabla();
  //Bucle exterior que recorre una linea de tabla del array
  for (let index = 3; index < parteDatos.length; index = index + 3) {
    if (localidad == parteDatos[index + 1].toLowerCase()) {
      row = tabla.insertRow();
      imprimirDatosLinea(row, index);
    }
  }
}

//Muestra la cuota selecionada con los datos en una tabla
function imprimirCuota() {
  let isMayor;
  let cuota = prompt("Valor de cuota", "50");
  if (confirm("¿Mostrar cuotas de mayor valor?")) {
    isMayor = true;
  } else {
    isMayor = false;
  }
  let row = crearCabeceraTabla();
  //Bucle exterior que recorre una linea de tabla del array
  for (let index = 3; index < parteDatos.length; index = index + 3) {
    if (isMayor == true) {
      if (cuota < parteDatos[index + 2]) {
        row = tabla.insertRow();
        imprimirDatosLinea(row, index);
      }
    } else if (cuota > parteDatos[index + 2]) {
      row = tabla.insertRow();
      imprimirDatosLinea(row, index);
    }
  }
}

//Bucle interior que imprime los datos de una linea de la tabla del array
function imprimirDatosLinea(row, index) {
  for (let index2 = 0; index2 < 3; index2++) {
    celda = row.insertCell(index2);
    celda.innerHTML = parteDatos[index + index2];
  }
}

//Añade la linea de datos comunes a la tabla
function crearCabeceraTabla() {
  textoimprimir = "";
  tabla.innerHTML = textoimprimir;

  let head = tabla.createTHead();
  let row = head.insertRow();

  for (let index = 0; index < 3; index++) {
    let celda = row.insertCell();
    celda.innerHTML = parteDatos[index];
  }
  return row;
}