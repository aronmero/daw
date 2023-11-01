# Realizado por Aarón Medina Rodríguez - 2023

# Enunciado
Vas a crear un juego que consiste en encontrar parejas en 12 cartas con 6 parejas de los personajes de los Simpson. El juego consistirá en lo siguiente:
- La aplicación deberá tener una **tabla con 3 filas y cuatro columnas** de un color. Además habrá un cuadro de texto con el valor 0 pero no modificable.
- Cuando el usuario haga clic sobre una celda, se mostrará una imagen.
- Cuando el usuario haga clic sobre otra celda, se mostrará otra imagen.
- Si las dos imágenes son iguales, se cambiará el color de la celda y se añadirá 1 al cuadro de texto.
- Si las dos imágenes son diferentes, se ocultarán mostrando nuevamente el color inicial.

En primer lugar, crea un esquema en una hoja con el arbol DOM del documento html y en otra indica los métodos que vas a crear asociados a qué evento.

Trata de utilizar el menor número de variables posibles: utiliza las propiedades de los elementos para cambiar su comportamiento.
# Comentarios
Esta planteado como se especifico, al pulsar en una imagen un boton no visible cambia la visibilidad de la imagen, si hay mas de dos imagenes volteadas las oculta antes de mostrar la ultima que se pulso. Si las dos imagenes que estan volteadas son iguales el color se cambia junto con el texto de 0 a 1, este texto es un readonly ademas de que no es visible e interactuable por css.

Cuando se aciertan las 12 imagenes sale un mensaje con el numero de movimientos utilizados en la parte inferior.

La validacion de las imagenes se hace mediante el nombre de ellas. Las imagenes se imprimen de un array de imagenes que las desordena cada vez que se carga la pagina.

# Referencias

https://divtable.com/generator/ Herramienta utilizada para generar tablas en html

https://stackoverflow.com/a/18737649 Codigo css utilizado para alinear las imagenes dentro de la tabla

https://stackoverflow.com/a/3676132 Impedir la modificacion del texto, aunque ya es un display:none

https://bost.ocks.org/mike/shuffle/ Funcion para aleatorizar elementos, utilizada para que las imagenes estuvieran en posiciones al azar.