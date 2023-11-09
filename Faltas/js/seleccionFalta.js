let opcionesFalta = document.getElementsByClassName("selectorFalta")[0].getElementsByTagName("div");

for (let index = 0; index < opcionesFalta.length; index++) {
  const element = opcionesFalta[index];
  element.addEventListener("click", cambiarSeleccion);
}

function cambiarSeleccion() {
  eliminarSeleccion();
  this.classList.add("seleccionado");
  console.log(this.id);
  generarFormulario(document.location.pathname,"faltaSeleccionado", this.id);
}

function eliminarSeleccion() {
  for (let index = 0; index < opcionesFalta.length; index++) {
    const element = opcionesFalta[index];
    element.classList.remove("seleccionado");
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
