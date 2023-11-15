let alumnos = document.getElementsByClassName("navAlumno");

//Añadir eventos a todos los botones de navegacion de los alumnos
for (let index = 0; index < alumnos.length; index++) {
  const divNavegacion = alumnos[index];
  const checkboxAlumno = divNavegacion.getElementsByTagName("input")[0];
  checkboxAlumno.addEventListener("change", actualizarCheck);
}

for (let index = 0; index < alumnos.length; index++) {
  const divNavegacion = alumnos[index];
  const selectAlumno = divNavegacion.getElementsByTagName("select")[0];
  selectAlumno.addEventListener("change", actualizarTipoFalta);
}

/**
 * Actualiza los select HTML segun el valor de elemento seleccioando
 * @date 11/15/2023 - 4:30:26 PM
 * @author Aarón Medina Rodríguez
 */
function actualizarTipoFalta() {
  const listaDiv = this.parentNode.parentNode.childNodes;
  const tipoFalta=this.value;
  for (let index = 1; index < listaDiv.length; index++) {
    const divInput = listaDiv[index];
    const select = divInput.getElementsByTagName("select")[0].getElementsByTagName("option");
    for (let index = 0; index < select.length; index++) {
      const element = select[index];
      if(element.value==tipoFalta){
        element.selected=true;
        element.setAttribute("selected","");
      }else{
        element.selected=false;
        element.removeAttribute("selected")
      }
    }
  }
}

/**
 * Actualiza los checkBox HTML segun el valor de elemento seleccioando
 * @date 11/8/2023 - 10:51:26 AM
 * @author Aarón Medina Rodríguez
 */
function actualizarCheck() {
  const listaDiv = this.parentNode.parentNode.childNodes;
  if (this.checked == true) {
    cambiarCheck(listaDiv, true);
  } else {
    cambiarCheck(listaDiv, false);
  }

  /**
   * Cambiar los check de seleccioando a no seleccionado de un elemento
   * @date 11/8/2023 - 10:50:35 AM
   * @author Aarón Medina Rodríguez
   *
   * @param {HTMLElement} listaDiv
   * @param {Boolean} valor
   */
  function cambiarCheck(listaDiv, valor) {
    for (let index = 1; index < listaDiv.length; index++) {
      const divInput = listaDiv[index];

      const checkbox = divInput.getElementsByTagName("input")[0];
      
      if (checkbox.disabled == false) {
        checkbox.checked = valor;
      }
    }
  }
}
