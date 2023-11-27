"./datos/info.json";
import data from "./datos/info.json" assert { type: "json" };
let isFiltroLugar = false;
let isFiltroFecha = false;
let isFiltroGrupo = false;
let isFiltroProfesor = false;
let filtroLugar = "";
let filtroFecha = "";
let filtroGrupo = "";
let filtroProfesor = "";
let vistaActiva;
let isFiltroActivo = false;
setInterval(() => {
  isFiltroActivo = false;
}, 1000);
document.getElementById("tabla").addEventListener("click", cambiarSeleccion);
document.getElementById("tabla").addEventListener("click", cambiarVista);
const contenedor = document.getElementsByClassName("contenedor")[0];

document.getElementById("carta").addEventListener("click", cambiarSeleccion);
document.getElementById("carta").addEventListener("click", cambiarVista);
document.getElementsByClassName("selectorFiltro")[0].addEventListener("click", function () {
  if (document.getElementsByClassName("filtros")[0].classList.contains("activo")) {
    document.getElementsByClassName("filtros")[0].classList.remove("activo");
    isFiltroActivo = true;
  } else {
    if (!isFiltroActivo) {
      isFiltroActivo = true;
      document.getElementsByClassName("filtros")[0].classList.add("activo");
    }
  }
});
document.getElementById("filtroLugar").addEventListener("change", function () {
  this.value != undefined && this.value.length > 0 ? (isFiltroLugar = true) : (isFiltroLugar = false);
  filtroLugar = this.value.toLowerCase();
  actualizarVista();
});
document.getElementById("filtroFecha").addEventListener("change", function () {
  this.value != undefined && this.value.length > 0 ? (isFiltroFecha = true) : (isFiltroFecha = false);
  let filtroIncorrecto = this.value.split("-");
  filtroFecha = filtroIncorrecto[2] + "-" + filtroIncorrecto[1] + "-" + filtroIncorrecto[0];
  actualizarVista();
});
document.getElementById("filtroGrupo").addEventListener("change", function () {
  this.value != undefined && this.value.length > 0 ? (isFiltroGrupo = true) : (isFiltroGrupo = false);
  filtroGrupo = this.value.toLowerCase();
  actualizarVista();
});
document.getElementById("filtroProfesor").addEventListener("change", function () {
  this.value != undefined && this.value.length > 0 ? (isFiltroProfesor = true) : (isFiltroProfesor = false);
  filtroProfesor = this.value.toLowerCase();
  actualizarVista();
});

/**
 * Cambiar una vista segun el boton seleccionado
 * @date 11/24/2023 - 7:30:10 PM
 * @author Aaron Medina Rodriguez
 */
function cambiarVista() {
  limpiarDisplay();
  if (this.id == "tabla") {
    vistaActiva = this.id;
    imprimirTabla();
  } else if (this.id == "carta") {
    vistaActiva = this.id;
    imprimirCartas();
  } else {
    vistaActiva = null;
  }
}

/**
 * Actualiza la vista activa
 * @date 11/24/2023 - 7:40:19 PM
 * @author Aaron Medina Rodriguez
 */
function actualizarVista() {
  limpiarDisplay();
  if (vistaActiva == "tabla") {
    imprimirTabla();
  } else if (vistaActiva == "carta") {
    imprimirCartas();
  }
}

/**
 * Cambia la clase seleccionado de un elemento selector a otro
 * @date 11/24/2023 - 4:25:23 PM
 * @author Aaron Medina Rodriguez
 */
function cambiarSeleccion() {
  const selectoresVista = document.getElementsByClassName("selectorVista");
  for (let index = 0; index < selectoresVista.length; index++) {
    const selector = selectoresVista[index];
    selector.classList.remove("seleccionado");
  }
  this.classList.add("seleccionado");
}

/**
 * Limpiar el contenido mostrado
 * @date 11/24/2023 - 4:17:36 PM
 * @author Aaron Medina Rodriguez
 */
function limpiarDisplay() {
  contenedor.innerHTML = "";
}

/**
 * Imprime una tabla en HTML con los datos de los eventos
 * @date 11/23/2023 - 7:36:05 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirTabla() {
  const tabla = document.createElement("table");
  const rowHead = document.createElement("thead");

  const lugarHead = document.createElement("th");
  lugarHead.append(document.createTextNode("Lugar"));

  const descripcionHead = document.createElement("th");
  descripcionHead.append(document.createTextNode("Descripcion"));

  const fechaHead = document.createElement("th");
  fechaHead.append(document.createTextNode("Fecha"));

  const gruposHead = document.createElement("th");
  gruposHead.append(document.createTextNode("Grupos"));

  const profesoresHead = document.createElement("th");
  profesoresHead.append(document.createTextNode("Profesores"));

  rowHead.append(lugarHead);
  rowHead.append(descripcionHead);
  rowHead.append(fechaHead);
  rowHead.append(gruposHead);
  rowHead.append(profesoresHead);
  tabla.append(rowHead);

  data.eventos.forEach((evento) => {
    let anadirEvento = comprobarFiltros(evento);

    if (anadirEvento) {
      const row = document.createElement("tr");
      const lugar = document.createElement("td");
      lugar.append(document.createTextNode(evento.lugar));
      const descripcion = document.createElement("td");
      descripcion.append(document.createTextNode(evento.descripcion));
      const fecha = document.createElement("td");
      fecha.append(document.createTextNode(evento.fecha));
      const grupos = document.createElement("td");

      const profesores = document.createElement("td");

      evento.grupos.forEach((element) => {
        grupos.append(document.createTextNode(element + " "));
      });

      evento.profesores.forEach((element) => {
        profesores.append(document.createTextNode(element + " "));
      });

      row.append(lugar);
      row.append(descripcion);
      row.append(fecha);
      row.append(grupos);
      row.append(profesores);
      tabla.append(row);
    }
  });

  contenedor.append(tabla);
}


/**
 * Imprime unos div como si fueran cartas en HTML con los datos de los eventos
 * @date 11/27/2023 - 2:33:21 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirCartas() {
  const contenedorCartas = document.createElement("div");
  contenedorCartas.classList.add("contenedorCartas");
  data.eventos.forEach((evento) => {
    let anadirEvento = comprobarFiltros(evento);
    if (anadirEvento) {
      const carta = document.createElement("div");
      carta.classList.add("carta");

      const lugar = document.createElement("div");
      lugar.append(document.createTextNode(evento.lugar));
      lugar.classList.add("lugar");
      const descripcion = document.createElement("div");
      descripcion.append(document.createTextNode(evento.descripcion));
      const fecha = document.createElement("div");
      fecha.append(document.createTextNode(evento.fecha));
      const grupos = document.createElement("div");

      const profesores = document.createElement("div");

      evento.grupos.forEach((element) => {
        grupos.append(document.createTextNode(element + " "));
      });

      evento.profesores.forEach((element) => {
        profesores.append(document.createTextNode(element + " "));
      });

      carta.append(lugar);
      carta.append(descripcion);
      carta.append(fecha);
      carta.append(grupos);
      carta.append(profesores);

      contenedorCartas.append(carta);
    }
  });

  contenedor.append(contenedorCartas);
}

/**
 * Comprueba si un evento cumple con todos los filtros establecidos
 * @date 11/24/2023 - 7:07:25 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Array} evento
 * @returns {boolean}
 */
function comprobarFiltros(evento) {
  let anadirEvento = true;
  if (isFiltroLugar && evento.lugar.toLowerCase() != filtroLugar) {
    anadirEvento = false;
  }
  if (isFiltroFecha && evento.fecha != filtroFecha) {
    anadirEvento = false;
  }
  if (isFiltroGrupo) {
    let isGrupo = false;
    evento.grupos.forEach((grupo) => {
      if (grupo.toLowerCase() == filtroGrupo) {
        isGrupo = true;
      }
    });
    if (!isGrupo) {
      anadirEvento = false;
    }
  }
  if (isFiltroProfesor) {
    let isProfe = false;
    evento.profesores.forEach((profesor) => {
      if (profesor.toLowerCase() == filtroProfesor) {
        isProfe = true;
      }
    });
    if (!isProfe) {
      anadirEvento = false;
    }
  }
  return anadirEvento;
}
