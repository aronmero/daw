/**
 * Permite dropear un elemento sobre este
 * @date 11/29/2023 - 6:34:41 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Event} ev elemento donde se dropeara otro elemento
 */
 function allowDrop(ev) {
  ev.preventDefault();
}

/**
 * Permite dragear un elemento
 * @date 11/29/2023 - 6:35:05 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Event} ev elemento al que se le permite ser drageado
 */
 function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

/**
 * Mueve el elemento al soltarlo sobre este elemento
 * @date 11/29/2023 - 6:35:11 PM
 * @author Aaron Medina Rodriguez
 *
 * @param {Event} ev elemento donde se soltara el elemento drageado
 */
 function drop(ev) {
  ev.preventDefault();
  let data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));

}
