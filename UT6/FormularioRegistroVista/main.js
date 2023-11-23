"./datos/info.json";
import data from "./datos/info.json" assert { type: "json" };

const contenedor = document.getElementsByClassName("contenedor")[0];

imprimirTabla();

/**
 * Imprime una tabla en HTML con los datos de los eventos
 * @date 11/23/2023 - 7:36:05 PM
 * @author Aaron Medina Rodriguez
 */
function imprimirTabla() {
  const tabla = document.createElement("table");
  const rowHead = document.createElement("thead");
    const lugarHead=document.createElement("th");
    lugarHead.append(document.createTextNode("Lugar"));
    const descripcionHead=document.createElement("th");
    descripcionHead.append(document.createTextNode("Descripcion"));
    const fechaHead=document.createElement("th");
    fechaHead.append(document.createTextNode("Fecha"));
    const gruposHead=document.createElement("th");
    gruposHead.append(document.createTextNode("Grupos"));
    const profesoresHead=document.createElement("th");
    profesoresHead.append(document.createTextNode("Profesores"));

    rowHead.append(lugarHead);
    rowHead.append(descripcionHead);
    rowHead.append(fechaHead);
    rowHead.append(gruposHead);
    rowHead.append(profesoresHead);
  tabla.append(rowHead);

  data.eventos.forEach((evento) => {
    const row = document.createElement("tr");
    const lugar = document.createElement("td");
    lugar.append(document.createTextNode(evento.lugar));
    const descripcion = document.createElement("td");
    descripcion.append(document.createTextNode(evento.descripcion));
    const fecha = document.createElement("td");
    fecha.append(document.createTextNode(evento.fecha));
    const grupos = document.createElement("td");

    const profesores = document.createElement("td");

    evento.grupos.forEach((element) => {
      grupos.append(document.createTextNode(element + " "));
    });

    evento.profesores.forEach((element) => {
      profesores.append(document.createTextNode(element + " "));
    });

    row.append(lugar);
    row.append(descripcion);
    row.append(fecha);
    row.append(grupos);
    row.append(profesores);
    tabla.append(row);
  });

  contenedor.append(tabla);
}
