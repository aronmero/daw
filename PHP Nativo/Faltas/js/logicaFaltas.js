let alumnos = document.getElementsByClassName("navAlumno");
let faltasExistentes = document.getElementsByClassName("faltaExistente");
//Añadir eventos a todos los botones de navegacion de los alumnos
for (let index = 0; index < alumnos.length; index++) {
  const divNavegacion = alumnos[index];
  const checkboxAlumno = divNavegacion.getElementsByTagName("input")[0];
  checkboxAlumno.addEventListener("change", actualizarChecks);
}

for (let index = 0; index < alumnos.length; index++) {
  const divNavegacion = alumnos[index];
  const checkboxEliminarAlumno = divNavegacion.getElementsByClassName("botonEliminar")[0];
  checkboxEliminarAlumno.addEventListener("change", eliminarFaltasTodas);
}

for (let index = 0; index < alumnos.length; index++) {
  const divNavegacion = alumnos[index];
  const selectAlumno = divNavegacion.getElementsByTagName("select")[0];
  selectAlumno.addEventListener("change", actualizarTipoFalta);
}

for (let index = 0; index < faltasExistentes.length; index++) {
  const divNavegacion = faltasExistentes[index];
  const botonEliminar = divNavegacion.getElementsByClassName("botonEliminar")[0];
  botonEliminar.addEventListener("change", actualizarEliminar);
}

for (let index = 0; index < alumnos.length; index++) {
  const lineasAlumno = alumnos[index].parentNode;
  for (let index = 1; index < lineasAlumno.childNodes.length; index++) {
    const casillaFalta = lineasAlumno.childNodes[index].getElementsByTagName("input")[0];
    casillaFalta.addEventListener("change", eliminarCheckFalta);
  }
}

/**
 * Elimina el check de una falta al deseleccionar la casilla de verificacion de dicha falta
 * @date 11/17/2023 - 8:21:06 AM
 * @author Aarón Medina Rodríguez
 */
function eliminarCheckFalta() {
  if (this.parentNode.classList.contains("faltaExistente")) {
    if (this.checked == false) {
      this.parentNode.getElementsByClassName("botonEliminar")[0].checked = false;
    }
  }
}

/**
 * Actualiza los select HTML segun el valor de elemento seleccioando
 * @date 11/15/2023 - 4:30:26 PM
 * @author Aarón Medina Rodríguez
 */
function actualizarTipoFalta() {
  const listaDiv = this.parentNode.parentNode.childNodes;
  const tipoFalta = this.value;
  if (tipoFalta != "-") {
    for (let index = 1; index < listaDiv.length; index++) {
      const divInput = listaDiv[index];
      const select = divInput.getElementsByTagName("select")[0].getElementsByTagName("option");
      for (let index = 0; index < select.length; index++) {
        const element = select[index];
        if (element.value == tipoFalta) {
          element.selected = true;
          element.setAttribute("selected", "");
        } else {
          element.selected = false;
          element.removeAttribute("selected");
        }
      }
    }
  }
}

/**
 * Actualiza los checkBox HTML segun el valor de elemento seleccioando
 * @date 11/8/2023 - 10:51:26 AM
 * @author Aarón Medina Rodríguez
 */
function actualizarChecks() {
  const listaDiv = this.parentNode.parentNode.childNodes;
  if (this.checked == true) {
    cambiarCheckTodos(listaDiv, true);
  } else {
    cambiarCheckTodos(listaDiv, false);
  }

  /**
   * Cambiar los check de seleccioando a no seleccionado de un elemento
   * @date 11/8/2023 - 10:50:35 AM
   * @author Aarón Medina Rodríguez
   *
   * @param {HTMLElement} listaDiv
   * @param {Boolean} valor
   */
  function cambiarCheckTodos(listaDiv, valor) {
    for (let index = 1; index < listaDiv.length; index++) {
      const divInput = listaDiv[index];

      const checkbox = divInput.getElementsByTagName("input")[0];
      checkbox.checked = valor;
      checkbox.dispatchEvent(new Event("change"));
    }
  }
}

/**
 * Cambiar los check de seleccioando a no seleccionado de un una linea de falta al pulsar la casilla de eliminar
 * @date 11/17/2023 - 7:54:01 AM
 * @author Aarón Medina Rodríguez
 */
function actualizarEliminar() {
  let linea = this.parentNode.parentNode.getElementsByTagName("input")[0];
  if (this.checked == true) {
    linea.checked = true;
  } else {
    linea.checked = false;
  }
}

/**
 * Cambiar los check de todos los botones de de eliminar de un alumno
 * @date 11/17/2023 - 8:02:29 AM
 * @author Aarón Medina Rodríguez
 */
function eliminarFaltasTodas() {
  const faltasExistentesAlumno = this.parentNode.parentNode.parentNode.getElementsByClassName("faltaExistente");
  if (this.checked == true) {
    cambiarCheckEliminar(true);
  } else {
    cambiarCheckEliminar(false);
  }

  /**
   * Cambia el check de un boton de eliminar segun el valor introducido
   * @date 11/17/2023 - 8:16:34 AM
   * @author Aarón Medina Rodríguez
   *
   * @param {boolean} isChecked
   */
  function cambiarCheckEliminar(isChecked) {
    for (let index = 0; index < faltasExistentesAlumno.length; index++) {
      const casillaEliminar = faltasExistentesAlumno[index].getElementsByClassName("botonEliminar")[0];
      if (casillaEliminar.checked != isChecked) {
        casillaEliminar.checked = isChecked;
        casillaEliminar.dispatchEvent(new Event("change"));
      }
    }
  }
}
