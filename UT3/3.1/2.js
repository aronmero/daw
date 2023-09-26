let ventana =open("https://perezpulido.org/");

let intervalo = setTimeout(cerrar,3000);

function cerrar(){
    ventana.close();
}