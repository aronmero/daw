

let intervalo = setInterval(function(){
  if (!confirm("Recoradatorio")) {
    clearInterval(intervalo);
  }
},5000)

