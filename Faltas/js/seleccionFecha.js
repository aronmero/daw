//TODO:
//FIXME: ESTO ES PA CURSOS NO FECHA
let grupos = document.getElementsByClassName("selectorCurso")[0].childNodes;
for (let index = 0; index < grupos.length; index++) {
  const element = grupos[index];
  element.addEventListener("click", cambiarSeleccion);
}

function cambiarSeleccion() {
  eliminarSelccion();
  this.classList.add("seleccionado");

  generarFormulario(document.location.pathname,"grupoSeleccionado", this.id);
}

function eliminarSelccion() {
  for (let index = 0; index < grupos.length; index++) {
    const element = grupos[index];
    element.classList.remove("seleccionado");
  }
}

function generarFormulario(webPHP,nombre, valor) {
  let formulario = document.createElement("form");
  formulario.action =webPHP;
  ("post");
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
