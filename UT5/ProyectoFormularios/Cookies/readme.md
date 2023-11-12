# Realizado por Aarón Medina Rodríguez - 2023

# Enunciado
- Crea un fichero que se llame “cookies.js” y que permita trabajar con las cookies de manera que puedas crear, borrar y consultar una cookie. Consulta los métodos tratados en clase y recuerda que el método borrar no ha sido creado aún así que deberás crearlo tú mismo.
- Modifica el archivo anterior de la siguiente manera:
- Cada vez que el usuario trate de enviar el formulario y haya algún error, una variable contador (almacenada en una cookie) se incrementará.
- El resultado del número de intentos se reflejará en un campo de texto que se encontrará al final del formulario.
- Si el usuario sale del programa y vuelve a entrar, el campo de texto mostrará el número almacenado en la cookie.
- Junto al campo de texto habrá un botón que, al pulsarlo, permitirá reiniciar el valor de la cookie a 0.


# Comentarios
Para la resolucion de cookies se utilizo [1](#referencias).

Utilizando el codigo de logica.js de distribucion, se le añadio una cookie que cuenta el numero de intentos incorrectos, al final del codigo, se añadio  como se aumentaria este numero ademas de poder imprimirlo en pantalla para reiniciarlo.

En modulos/cookie.js se realizaron multiples funciones para crear, modificiar y eliminar cookies, las funciones concreatamente utiles son crearCookie(), obtenerCookie(), obtenerValorCookie(),eliminarCookie() y anadirCaducidadCookie().

Añadir la fecha de caducidad es muy importante porque sino se elimina la cookie al terminar la sesion asi que es casi mas util crear una cookie directamente con esa funcion, y al modificar la cookie lo mismo si no queremos que pierda su valor.


# Referencias
1.https://cybmeta.com/cookies-en-javascript