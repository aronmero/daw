fetch('https://services.arcgis.com/hkQNLKNeDVYBjvFE/arcgis/rest/services/Alojamientos_turisticos/FeatureServer/0/query?where=1%3D1&outFields=*&returnGeometry=false&outSR=4326&f=json')
    .then(response => response.json())
    .then(datos => {
        console.log(datos.features);
        imprimirDatosAPI(datos.features);
        return datos.features;
    })

let listaFiltradaMunicipio = [];
let listaFiltradaCategoria = [];
let listaElementos = [];

/**
 * Imprime los datos de la api en la tabla html
 * @param {array} datosAPI 
 * @author Aarón Medina Rodríguez
 */
function imprimirDatosAPI(datosAPI = []) {
    const tabla = document.getElementById('tabla')
    tabla.innerHTML = "";

    const linea = document.createElement("thead");
    const cNombre = document.createElement("th");
    cNombre.textContent = "Nombre";
    const cModalidad = document.createElement("th");
    cModalidad.textContent = "Modalidad";
    const cCategoria = document.createElement("th");
    cCategoria.textContent = "Categoria";
    const cMunicipio = document.createElement("th");
    cMunicipio.textContent = "Municipio";

    linea.appendChild(cNombre)
    linea.appendChild(cModalidad)
    linea.appendChild(cCategoria)
    linea.appendChild(cMunicipio)
    tabla.append(linea);

    datosAPI.forEach(alojamiento => {
        const row = document.createElement("tr");
        const nombre = document.createElement("td");
        nombre.textContent = alojamiento.attributes.NOMBRE;
        const modalidad = document.createElement("td");
        modalidad.textContent = alojamiento.attributes.MODALIDAD;
        const categoria = document.createElement("td");
        categoria.textContent = alojamiento.attributes.Est_LLav;
        const municipio = document.createElement("td");
        municipio.textContent = alojamiento.attributes.MUNICIPIO;

        row.appendChild(nombre);
        row.appendChild(modalidad);
        row.appendChild(categoria);
        row.appendChild(municipio);
        row.addEventListener("click", mostrarInfo)
        const infoExtra = []
        infoExtra.push(alojamiento.attributes.DIRECCION)
        infoExtra.push(alojamiento.attributes.TELEFONO)
        infoExtra.push(alojamiento.attributes.PLAZAS)
        listaElementos.push({ row, infoExtra });
        tabla.appendChild(row);
    });
}

/**
 * Filtra los municipios segun el valor del evento. Oculta los elementos que no cumplen lo requerido
 * @author Aarón Medina Rodríguez
 */
function filtrarDatosMunicipio() {
    const tabla = document.getElementById('tabla')
    const rows = tabla.getElementsByTagName('tr')

    listaFiltradaMunicipio = []

    if (this.value.length > 0) {

        Array.from(rows).forEach(element => {
            element.style.display = 'none';
        });

        let filtrado;
        //Comprueba el otro filtro y utiliza sus datos si el filtro tiene alguno
        if (listaFiltradaCategoria.length > 0) {
            filtrado = listaFiltradaCategoria.filter((rows) => rows.children[3].textContent.toLowerCase().includes(this.value.toLowerCase()))
        } else {
            filtrado = Array.from(rows).filter((rows) => rows.children[3].textContent.toLowerCase().includes(this.value.toLowerCase()))
        }

        filtrado.forEach(element => {
            element.style.display = '';
            element.style.display = 'table row';
            listaFiltradaMunicipio.push(element);
        });
    } else {
        //Oculta todos los elementos excepto si estan en el otro filtro
        if (listaFiltradaCategoria.length > 0) {
            listaFiltradaCategoria.forEach(linea => {
                linea.style.display = '';
            });
        } else {
            Array.from(rows).forEach(linea => {
                linea.style.display = '';
            });
        }

    }
}

/**
 * Filtra las categorias segun el valor del evento. Oculta los elementos que no cumplen lo requerido
 * @author Aarón Medina Rodríguez
 */
function filtrarDatosCategoria() {

    const tabla = document.getElementById('tabla')
    const rows = tabla.getElementsByTagName('tr')
    listaFiltradaCategoria = []
    if (this.value.length > 0) {

        Array.from(rows).forEach(element => {
            element.style.display = 'none';
        });

        let filtrado;
        //Comprueba el otro filtro y utiliza sus datos si el filtro tiene alguno
        if (listaFiltradaMunicipio.length > 0) {
            filtrado = listaFiltradaMunicipio.filter((rows) => rows.children[2].textContent.toLowerCase().includes(this.value.toLowerCase()))
        } else {
            filtrado = Array.from(rows).filter((rows) => rows.children[2].textContent.toLowerCase().includes(this.value.toLowerCase()))
        }

        filtrado.forEach(element => {
            element.style.display = '';
            element.style.display = 'table row';
            listaFiltradaCategoria.push(element);
        });

    } else {
        //Oculta todos los elementos excepto si estan en el otro filtro
        if (listaFiltradaMunicipio.length > 0) {
            listaFiltradaMunicipio.forEach(linea => {
                linea.style.display = '';
            });
        } else {
            Array.from(rows).forEach(linea => {
                linea.style.display = '';
            });
        }
    }

}

/**
 * Muestra la info de un alojamiento concreto mediante un alert
 * @author Aarón Medina Rodríguez
 */
function mostrarInfo() {
    const info = listaElementos.filter(elemento => elemento.row == this);
    const lineaInfo = info[0].row

    const nombre = lineaInfo.children[0].textContent;
    const modalidad = lineaInfo.children[1].textContent;
    const categoria = lineaInfo.children[2].textContent;
    const municipio = lineaInfo.children[3].textContent;

    const direccion = info[0].infoExtra[0];
    const telefono = info[0].infoExtra[1];
    const plazas = info[0].infoExtra[2];

    const mensaje = "El nombre es " + nombre
        + "\nLa modalidad es " + modalidad
        + "\nLa categoria es " + categoria
        + "\nEl municipio es " + municipio
        + "\nLa direccion es " + direccion
        + "\nEl telefono es " + telefono
        + "\nEl numero de plazas es " + plazas;
    alert(mensaje)
}

document.getElementById('busquedaMunicipio').addEventListener('input', filtrarDatosMunicipio)

document.getElementById('busquedaCategoria').addEventListener('input', filtrarDatosCategoria)
