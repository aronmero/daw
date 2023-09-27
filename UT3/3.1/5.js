contadorVisitas();

function contadorVisitas() {
  if (localStorage.contadorVisitas) {
    localStorage.contadorVisitas = Number(localStorage.contadorVisitas) + 1;
  } else {
    localStorage.contadorVisitas = 1;
  }
  document.write(localStorage.contadorVisitas);
}
