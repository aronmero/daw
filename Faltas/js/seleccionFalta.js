let opcionesFalta = document.getElementsByClassName("selectorFalta")[0].getElementsByTagName("div");

for (let index = 0; index < opcionesFalta.length; index++) {
  const element = opcionesFalta[index];
  element.addEventListener("click", cambiarSeleccion);
}

function cambiarSeleccion() {
  eliminarSeleccion();
  this.classList.add("seleccionado");
  this.setAttribute("name","faltaSeleccionado");
}

function eliminarSeleccion() {
  for (let index = 0; index < opcionesFalta.length; index++) {
    const element = opcionesFalta[index];
    element.classList.remove("seleccionado");
    element.removeAttribute("name");
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
