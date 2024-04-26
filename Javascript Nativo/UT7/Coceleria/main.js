import { Coctel } from "./modulos/coctel.js";
import { crearFactura } from "./modulos/generarPDF.js";
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
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @returns {unknown}
 */
function pedirDatos() {
  fetch("https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Rum")
    .then((response) => response.json())
    .then((data) =>
      data.drinks.forEach((bebida) => {
        imprimirBebida(bebida, contenedorBebidas);
      })
    )
    .catch(() => console.warn("Error"));
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

/**
 * Limpia el carrito de elementos visuales
 * @date 12/13/2023 - 5:30:18 PM
 * @author Aaron Medina Rodriguez
 */
function limpiarCarritoVisual() {
  const container = document.getElementsByClassName("containerBebidas")[0];
  while (container.firstChild) {
    container.removeChild(container.firstChild);
  }
}

/**
 * Actualiza la factura
 * @date 12/13/2023 - 5:30:28 PM
 * @author Aaron Medina Rodriguez
 */
function actualizarFactura() {
  const factura = document.getElementById("contenedorProducto");
  const afactura = new Array();
  while (factura.firstChild) {
    factura.removeChild(factura.firstChild);
  }

  carrito.forEach((coctel) => {
    let isRepetido = false;
    //FIXME: Funciona parcial
    for (let index = 0; index < afactura.length; index++) {
      if (coctel.id == afactura[index].coctel.id) {
        afactura.push({ coctel: coctel, cantidad: 1 });
        const nuevaCantidad = afactura[0].cantidad + 1;
        afactura[index] = { coctel: coctel, cantidad: nuevaCantidad };
        isRepetido = true;
        break;
      }
    }
    if (!isRepetido) {
      afactura.push({ coctel: coctel, cantidad: 1 });
    }
  });



  afactura.forEach((element) => {
    const linea = document.createElement("div");
    linea.append(document.createTextNode(element.coctel.nombre));
    linea.append(document.createTextNode(element.cantidad));
    factura.append(linea);
  });
  crearFactura(afactura);
}

document.getElementById("abrirModal").addEventListener("click", () => {
  document.getElementsByClassName("modalCarrito")[0].classList.add("activo");
});
document.getElementById("cerrarModal").addEventListener("click", () => {
  document.getElementsByClassName("modalCarrito")[0].classList.remove("activo");
});

pedirDatos();
document.getElementById("realizarPedido").addEventListener("click", () => {
  actualizarFactura();
  limpiarCarritoVisual();
  carrito = [];
  //Eliminar el array de la cookie
  const json_str = JSON.stringify(carrito);
  anadirCaducidadCookie("carrito", json_str,-1);
});
