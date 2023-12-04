const contenedorBebidas = document.getElementById("contBebidas");

 function pedirDatos() {
   fetch("https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Rum")
    .then((response) => response.json())
    .then(function (data) {
      data["drinks"].forEach((bebida) => {
        imprimirBebida(bebida, contenedorBebidas);
      });
    })
    .catch(() => console.warn("Error"));
}



function imprimirBebida(bebida, ubicacion = document.body) {
  let carta = document.createElement("div");
  carta.classList.add("cartaBebida");
  let imagen = document.createElement("img");
  imagen.setAttribute("src", bebida["strDrinkThumb"]);

  carta.appendChild(imagen);
  carta.appendChild(document.createTextNode(bebida["strDrink"]));
  ubicacion.appendChild(carta);
}

let prueba = pedirDatos();
