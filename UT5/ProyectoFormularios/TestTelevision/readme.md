# Enunciado
## Test serie de televisión:

Vas a crear un pequeño test sobre la serie de televisión que tú quieras. El test tendrá 10
preguntas con 3 respuestas cada una a elegir con radio buttons.

El programa deberá hacer lo siguiente:
- Cuando el usuario conteste las 10 preguntas obtendrá el resultado final en un cuadro de texto.
- Además, el usuario podrá ver qué preguntas ha fallado, porque al enviar el formulario le aparecerá un pequeño icono con un tick verde en las preguntas correctas y una cruz roja en las preguntas incorrectas.
- En caso de que el usuario deje alguna pregunta sin contestar, no mostrará el resultado e indicará con un mensaje "No has respondido a todas las preguntas". Y se marcará en color rojo la pregunta que no haya sido respondida.

# Referencias:
https://stackoverflow.com/questions/9681601/how-can-i-count-the-number-of-elements-with-same-class
https://stackoverflow.com/a/9681629

Utilice stackoverflow para la siguiente linea *document.querySelectorAll("#formulario .pregunta").length* esta linea busca en el fomulario todas las clase preguntas, esto lo utilizo en la logica de validacion de las preguntas.

# Resolucion
La manera en la que resolvi este ejercicio es bastante enrevesada para poder practicar js al maximo. Se realizo la creacion de las preguntas mediante JS estas preguntas son una clase, y se añaden a un array donde son almacenadas.

Cuando se imprimen las preguntas, las id de estas son almacenadas en un array de preguntas activas, esto se utilizara para la validacion.

Al validar se comprueba primero que todas las preguntas esten selecionadas, si lo estan se vuelve a comprobar todas las preguntas de neuvo pero esta vez comprobando el resultado seleccionado por el usuario con el resultado almacenado en la pregunta determinada. **Este metodo de validacion puede ser mejorado para no tener que hacer la misma funcion casi, dos veces**

Al final de este proceso se muestra el resultado, y se desactivan los boton de interaccion.