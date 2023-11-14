//TODO:
//FIXME: ESTO ES PA CURSOS NO FECHA
let fecha = document.getElementsByClassName("selectorFecha")[0].getElementsByTagName("input")[0];
const element = fecha;
element.addEventListener("change", cambiarSeleccionFecha);

function cambiarSeleccionFecha() {
 
  generarFormularioFecha(document.location.pathname,"fechaSeleccionado", this.value,"date");
}

function generarFormularioFecha(webPHP,nombre, valor,atributoInput) {
  let formulario = document.createElement("form");
  formulario.action =webPHP;
  formulario.method = "POST";
  formulario.setAttribute("name", "autoFormulario");
  let input = document.createElement("input");
  input.setAttribute("hidden", "");
  input.setAttribute("type", atributoInput);
  input.setAttribute("value", valor);
  input.setAttribute("name", nombre);
  document.body.appendChild(formulario);
  formulario.appendChild(input);
  document.autoFormulario.submit();
}
