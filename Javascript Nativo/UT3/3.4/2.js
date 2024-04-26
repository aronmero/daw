let fechaCumple = document.getElementById("fechaCumple");
const hoy = new Date();

function iniciar() {
  let fechaIntroducida = fechaCumple.value;
  var fechaDividida = fechaIntroducida.split("-", 2);
  const fecha = new Date(
    hoy.getFullYear(),
    fechaDividida[1] - 1,
    fechaDividida[0]
  );
  let anioDomingo = [];

  for (let index = fecha.getFullYear(); index < 2100; index++) {
    const element = new Date(index,fecha.getMonth(),fecha.getDate());

    
    if(element.getDay()==0){
      anioDomingo.push(" "+element.getFullYear());
    }
  }

  document.getElementById("mostrarFecha").innerHTML = "Tu cumpleaños cae en domingo"+anioDomingo;
}
