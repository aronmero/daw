
/*
let tTrabajo= setInterval(saludo,1000);
let tDescanso= setInterval(saludo,1000);

function saludo(){
    document.write("aaaaaaaaa");
}
*/
let tTrabajo;
let tRestanteMinuto;
let tRestanteSegundo;
let tipoTiempo =document.getElementById("tipoTiempo");
function prueba(){
    //Obtiene el valor del input del html
    tTrabajo = document.getElementById("tTrabajo").value;
    tDescanso= document.getElementById("tDescanso").value;
    
    //Conocer si esta vacio el tipo
    if (tipoTiempo.innerHTML.trim() == "") {
        tipoTiempo.innerHTML="Tiempo de concentracion";
        tRestanteMinuto=tTrabajo;
        tRestanteSegundo=0;
        actualizarTRestante();
    }else{
        alert("tipo");
    }

    /*
    if(document.getElementById("tipoTiempo").innerHTML){

    }
    setInterval(actualizarTRestante(),tTrabajo);
*/
}

function actualizarTRestante(){
    document.getElementById("tRestante").innerHTML = tRestanteMinuto+":"+tRestanteSegundo;
}
