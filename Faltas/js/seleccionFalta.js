let opcionesFalta = document.getElementsByClassName("selectorFalta")[0].getElementsByTagName("div");

for (let index = 0; index < opcionesFalta.length; index++) {
  const element = opcionesFalta[index];
  element.addEventListener("click", cambiarSeleccion);
}

function cambiarSeleccion() {
  eliminarSeleccion();
  this.classList.add("seleccionado");
  this.childNodes[0].setAttribute("name","faltaSeleccionado");
  this.childNodes[0].setAttribute("value",this.childNodes[0].id);
}

function eliminarSeleccion() {
  for (let index = 0; index < opcionesFalta.length; index++) {
    const element = opcionesFalta[index];
    element.classList.remove("seleccionado");
    element.childNodes[0].removeAttribute("name");
    element.childNodes[0].removeAttribute("class")
    element.childNodes[0].removeAttribute("value");
  }
}

function generarFormulario(webPHP,nombre, valor) {
  let formulario = document.createElement("form");
  formulario.action =webPHP;
  formulario.method = "POST";
  formulario.setAttribute("name", "autoFormulario");
  let input = document.createElement("input");
  input.setAttribute("hidden", "");
  input.setAttribute("type", "text");
  input.setAttribute("value", valor);
  input.setAttribute("name", nombre);
  document.body.appendChild(formulario);
  formulario.appendChild(input);
  document.autoFormulario.submit();
}
