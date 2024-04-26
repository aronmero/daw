let ventana =open("", "", "width=1000,height=1000");
let porcentaje = parseInt(
  ventana.prompt("Que porcentaje quiere aplicar para redimensionar la ventana", "50")
);
if (!isNaN(porcentaje)) {
  if (ventana.confirm("¿Redimensionar al " + porcentaje + "%?")) {
    porcentaje = porcentaje / 100;

    let widthVentana =ventana.outerWidth*porcentaje;
    let heightVentana =ventana.outerHeight*porcentaje;

    ventana.resizeTo(widthVentana,heightVentana);
  }
}
