let botonesPagina = document.getElementsByClassName("botonPagina");

for (let index = 0; index < botonesPagina.length; index++) {
  const element = botonesPagina[index];
  element.addEventListener("click", cambiarSeleccion);
}

function cambiarSeleccion() {
  console.log(this.attributes['numpagina'].value);

 generarFormulario(document.location.pathname,"numPaginaVistaActual", this.attributes['numpagina'].value,"number");
}


function generarFormulario(webPHP,nombre, valor,atributoInput) {
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