/**
 * Ejemplo de creacion de un componente
 * @date 1/8/2024 - 2:56:13 PM
 * @author Aaron Medina Rodriguez
 *
 * @class Prueba
 * @typedef {Prueba}
 * @extends {HTMLElement}
 */
class Prueba extends HTMLElement {
  constructor() {
    super();
    this.nombre = this.getAttribute("nombre") || "aronmero";
    this.profesion = this.getAttribute("profesion") || "Programador";

    this.innerHTML = `<style>aronmero-prueba {
        display: flex;
        justify-content: center;
      }
      aronmero-prueba > div {
        display: flex;
        flex-direction: column;
      }
      aronmero-prueba > div > div {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
      }
      </style>
    <div><div>${this.nombre}</div>
    <div>${this.profesion}</div></div>`;
  }
}

customElements.define("aronmero-prueba", Prueba);
