import { Coctel } from "./modulos/coctel.js";

import {
  obtenerValorCookie,
  obtenerCookie,
  anadirCaducidadCookie,
} from "./modulos/cookie.js";
const contenedorBebidas = document.getElementById("contBebidas");
let carrito = new Array();
const ubicacionModal = document.getElementsByClassName("containerBebidas")[0];

if (obtenerCookie("carrito") != undefined) {
  const json_str = obtenerValorCookie("carrito");
  carrito = JSON.parse(json_str);
  imprimirCarrito();
}


/**
 * Imprime el carrito
 * @date 12/11/2023 - 5:55:39 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirCarrito() {
  for (let index = 0; index < carrito.length; index++) {
    const coctel = new Coctel(
      carrito[index]["id"],
      carrito[index]["nombre"],
      carrito[index]["imgUrl"]
    );
    imprimirCoctel(coctel, ubicacionModal);
  }
}

/**
 * Obtiene de la API bebidas y las imprime.
 * @date 12/4/2023 - 3:58:01 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @param {*} params
 * @returns {*}
 */
async function procesarDatos() {
  let bebidas = await pedirDatos();
  bebidas.forEach((bebida) => {
    imprimirBebida(bebida, contenedorBebidas);
  });
}

/**
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @returns {unknown}
 */
async function pedirDatos() {
  let bebidas = await fetch(
    "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Rum"
  )
    .then((response) => response.json())
    .then((data) => data.drinks)
    .catch(() => console.warn("Error"));

  return bebidas;
}

/**
 * Imprime una bebida en una carta HTML
 * @date 12/4/2023 - 3:56:53 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Array} bebida
 * @param {HTMLElement} [ubicacion=document.body]
 */
function imprimirBebida(bebida, ubicacion = document.body) {
  let carta = document.createElement("div");
  carta.classList.add("cartaBebida");
  carta.setAttribute("strDrink", bebida["strDrink"]);
  carta.setAttribute("idDrink", bebida["idDrink"]);
  carta.setAttribute("strDrinkThumb", bebida["strDrinkThumb"]);
  let imagen = document.createElement("img");
  imagen.setAttribute("src", bebida["strDrinkThumb"]);
  let boton = document.createElement("button");
  boton.append(document.createTextNode("Añadir"));
  boton.addEventListener("click", anadirBebidaCarrito);
 // boton.addEventListener("click", limpiarCarritoVisual);
  //boton.addEventListener("click", imprimirCarrito);

  boton.addEventListener("click", modificarCookieCarrito);
  let titulo = document.createElement("div");
  titulo.appendChild(document.createTextNode(bebida["strDrink"]));

  carta.appendChild(titulo);
  carta.appendChild(imagen);
  carta.appendChild(boton);
  ubicacion.appendChild(carta);
}

/**
 * Añade la bebida actual al carrito
 * @date 12/11/2023 - 3:06:44 PM
 * @author Aarón Medina Rodríguez
 */
function anadirBebidaCarrito() {
  const idCoctel = this.parentNode.getAttribute("idDrink");
  const nombreCoctel = this.parentNode.getAttribute("strDrink");
  const imgUrl = this.parentNode.getAttribute("strDrinkThumb");
  const coctel = new Coctel(idCoctel, nombreCoctel, imgUrl);

  carrito.push(coctel);
  imprimirCoctel(coctel, ubicacionModal);
}

/**
 * Modifica la cookie del carrito
 * @date 12/11/2023 - 3:38:24 PM
 * @author Aarón Medina Rodríguez
 */
function modificarCookieCarrito() {
  const json_str = JSON.stringify(carrito);
  anadirCaducidadCookie("carrito", json_str);
}

/**
 * Imprime una bebida en el carrito
 * @date 12/11/2023 - 3:07:07 PM
 * @author Aarón Medina Rodríguez
 *
 * @param {Coctel} coctel
 * @param {HTMLElement} ubicacion
 */
function imprimirCoctel(coctel, ubicacion) {
  const contenedor = document.createElement("div");
  contenedor.setAttribute("idDrink", coctel.getId());

  const imagen = document.createElement("img");
  imagen.setAttribute("src", coctel.getImgUrl());
  const info = document.createElement("p");
  info.append(document.createTextNode(coctel.getNombre()));
  const eliminar = document.createElement("div");
  eliminar.classList.add("eliminarCoctel");
  eliminar.addEventListener("click", eliminarCoctelCarrito);
  const icono = document.createElement("img");
  icono.setAttribute("src", "./media/icons/cross.webp");

  eliminar.append(icono);
  contenedor.append(imagen);
  contenedor.append(info);
  contenedor.append(eliminar);
  ubicacion.append(contenedor);
}


/**
 * Elimina un coctel del carrito
 * @date 12/11/2023 - 4:03:06 PM
 * @author Aarón Medina Rodríguez
 */
function eliminarCoctelCarrito() {
  
  const idCoctel = this.parentNode.getAttribute("iddrink");
  const containerBebidas = this.parentNode.parentNode;
  containerBebidas.removeChild(this.parentNode);
  for (let index = 0; index < carrito.length; index++) {
    const element = carrito[index];
    if (element.id == idCoctel) {
      carrito.splice(index, 1);
      break;
    }
  }
  modificarCookieCarrito();
}

function limpiarCarritoVisual() {
 const container= document.getElementsByClassName("containerBebidas")[0];
  while (container.firstChild) {
   container.removeChild(container.firstChild)
  }
}

document.getElementById("abrirModal").addEventListener("click", () => {
  document.getElementsByClassName("modalCarrito")[0].classList.add("activo");
});
document.getElementById("cerrarModal").addEventListener("click", () => {
  document.getElementsByClassName("modalCarrito")[0].classList.remove("activo");
});

procesarDatos();
