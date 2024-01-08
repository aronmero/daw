/**
 * Solicitar datos a la API y devolverlos
 * @date 12/4/2023 - 3:57:33 PM
 * @author Aaron Medina Rodriguez
 *
 * @async
 * @returns {unknown}
 */
function pedirDatos() {
    fetch("https://random-data-api.com/api/v2/users")
      .then((response) => response.json())
      .then((data) =>
        console.log(data)
      )
      .catch(() => console.warn("Error"));
  }

pedirDatos();

/*
Usa fecth para obtener los datos desde la API.
Utilizar .map() para representar cada uno de los elementos obtenidos de la API. (Modificando el DOM, creando nuevos nodos, intentar evitar usar el innerHTML...)
Utilizar .filter() para realizar busquedas de items.
Utilizar Cookies, LocalStorage, sessionStorage para implementar una funcionalidad de tu interfaz. 
Añade 4 funcionalidades a tu aplicación web (a tu libre elección) usando javascript. 
*/