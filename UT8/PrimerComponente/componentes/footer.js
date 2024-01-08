/**
 * Pie de pagina
 * @date 1/8/2024 - 2:56:13 PM
 * @author Aaron Medina Rodriguez
 *
 * @class Footer
 * @typedef {Footer}
 * @extends {HTMLElement}
 */
class Footer extends HTMLElement {
  constructor() {
    super();
    this.iniciarEstilo();
    this.render();
  }

  /**
   * Texto que se mostrara en el elemento
   * @date 1/8/2024 - 3:53:50 PM
   * @author Aaron Medina Rodriguez
   */
  render() {
    const textPrincipal = "aronmero";
    const footer = document.createElement("div");
    const enlacePrincipal = document.createElement("a");
    enlacePrincipal.setAttribute("href", ".");
    enlacePrincipal.append(document.createTextNode(textPrincipal));
    footer.append(enlacePrincipal);

    this.append(footer);
  }

  /**
   * Estilos del componente
   * @date 1/8/2024 - 3:51:46 PM
   * @author Aaron Medina Rodriguez
   */
  iniciarEstilo() {
    const estilo = document.createElement("style");
    estilo.append(
      document.createTextNode(`aronmero-footer a {
        text-decoration: none;
        color: inherit;
      }
      aronmero-footer {
        color: rgb(230, 240, 243);
        margin-top: auto;
        display: flex;
        background-color: rgb(141, 145, 149);
        justify-content: center;
        height: 150px;
        align-items: center;
      }`)
    );
    this.append(estilo);
  }
}

customElements.define("aronmero-footer", Footer);
