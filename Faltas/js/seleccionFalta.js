let opcionesFalta = document.getElementsByClassName("selectorFalta")[0].getElementsByTagName("div");

for (let index = 0; index < opcionesFalta.length; index++) {
  const element = opcionesFalta[index];
  element.addEventListener("click", cambiarSeleccionFalta);
}

function cambiarSeleccionFalta() {
  eliminarSeleccionFalta();
  this.classList.add("seleccionado");
  this.childNodes[0].setAttribute("name","faltaSeleccionado");
  this.childNodes[0].setAttribute("value",this.childNodes[0].id);
}

function eliminarSeleccionFalta() {
  for (let index = 0; index < opcionesFalta.length; index++) {
    const element = opcionesFalta[index];
    element.classList.remove("seleccionado");
    element.childNodes[0].removeAttribute("name");
    element.childNodes[0].removeAttribute("class")
    element.childNodes[0].removeAttribute("value");
  }
}

