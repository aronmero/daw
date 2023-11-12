# Realizado por Aarón Medina Rodríguez - 2023

# Enunciado

Vamos a realizar un formulario que nos permita registrar actividades a realizar.
Este proyecto debe cumplir los siguientes requisitos:

Debe separarse la estructura del formulario (html), de los estilos y de la lógica(js) en diferentes archivos.

En el archivo Html debe contener los imputs necesarios para registrar:

Lugar: Dirección de celebración de la actividad.
Fecha: Fecha de celebración de la actividad.
Descripción: Descripción de la actividad.

En el archivo javascript añade los siguientes datos de prueba:
profesPrueba=[profe1, profe2, profe3];
Grupos= [1º ESO, 2º ESO, 3º ESO, 4º ESO];

En el archivo javascript define una clase actividad con los siguientes atributos:

Lugar: Dirección de celebración de la actividad. Campo obligatorio
Fecha: Fecha de celebración de la actividad (debe validarse que sea posterior a la fecha actual).
Profesor: Array de profesores implicados en la actividad. (al menos debe haber uno seleccionado).
Grupos implicados: Array de grupos implicados en la actividad (al menos debe haber uno seleccionado).
Descripción: Descripción de la actividad. Campo obligatorio

Se debe generar de forma dinámica en el formulario usando javascript un imput de tipo select para añadir profesores a la actividad y un mensaje de los profesores que han sido agregados a la lista de profesores. (define una funcion para ello)

Se debe generar de forma dinámica en el formulario usando javascript imputs de tipo checkbox para seleccionar los grupos implicados. (define una función para ello.)

Genera las funciones que consideres para validar cada uno de los campos por separado.

Genera una función de aceptación (la que se ejecutará a la hora de pulsar el botón de enviar) que comprobará que se cumplan las validaciones y en caso de cumplirse genere un objeto del tipo actividad (a partir de la clase definida) con los datos del formulario y muestre un mensaje alert con dichos datos.

# Comentarios

# Referencias

https://stackoverflow.com/a/5867262 How to get all selected values of a multiple select box?

https://stackoverflow.com/a/37485871  Javascript how to check if a date is greater than or equal to a date value
