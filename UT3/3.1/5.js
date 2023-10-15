contadorVisitas();

function contadorVisitas() {
  if (isNaN(parseInt(localStorage.getItem("visitas")))) {
    localStorage.setItem("visitas", "1");
  } else {
    visita = parseInt(localStorage.getItem("visitas")) + 1;
    localStorage.setItem("visitas", visita.toString());
  }
  document.write(localStorage.getItem("visitas"));
}
