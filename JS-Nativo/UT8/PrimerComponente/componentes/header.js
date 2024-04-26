/**
 * Cabecera
 * @date 1/8/2024 - 2:56:13 PM
 * @author Aaron Medina Rodriguez
 *
 * @class Header
 * @typedef {Header}
 * @extends {HTMLElement}
 */
class Header extends HTMLElement {
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
    const header = document.createElement("div");

    const enlacePrincipal = document.createElement("a");
    enlacePrincipal.setAttribute("href", ".");
    enlacePrincipal.append(document.createTextNode("aronmero"));
    header.append(enlacePrincipal);
    const grupoEnlaces = document.createElement("div");

    const listaEnlaces = ["Proyectos", "Contacto", "Info"];
    /*Generar un boton para cada elemento de listaEnlaces*/
    listaEnlaces.forEach((element) => {
      const recuadro = document.createElement("div");
      const enlace = document.createElement("a");
      enlace.setAttribute("href", element.toLowerCase() + ".html");
      enlace.append(document.createTextNode(element));
      recuadro.append(enlace);
      grupoEnlaces.append(recuadro);
    });

    this.append(header);
    this.append(grupoEnlaces);
  }

  /**
   * Estilos del componente
   * @date 1/8/2024 - 3:51:46 PM
   * @author Aaron Medina Rodriguez
   */
  iniciarEstilo() {
    const estilo = document.createElement("style");
    estilo.append(
      document.createTextNode(`aronmero-header {
          display: flex;
          justify-content: space-between;
          background-color: rgb(141, 145, 149);
          color: rgb(230, 240, 243);
          margin: 0;
          padding: 15px;
        }
        aronmero-header > div {
          display: flex;
        }
        aronmero-header > div > div {
          margin-left: 10px;
        }
        aronmero-header a {
          text-decoration: none;
          color: inherit;
        }
        `)
    );
    this.append(estilo);
  }
}

customElements.define("aronmero-header", Header);
