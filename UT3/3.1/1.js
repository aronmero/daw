//let ventana=open("https://perezpulido.org/","","width=1000,height=1000");
let porcentaje = parseInt(
  prompt("Que porcentaje quiere aplicar para redimensionar la ventana", "50")
);

if (!isNaN(porcentaje)) {
  if (confirm("¿Redimensionar al " + porcentaje + "%?")) {
    porcentaje = porcentaje / 100;
    document.write(porcentaje);

  }
}
