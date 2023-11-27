# Realizado por Aarón Medina Rodríguez - 2023

# Enunciado
El enunciado tambien se puede encontrar en **GeneradorDeMundos.pdf**

Te proponemos un ejercicio para que empieces a crear mundos o, al menos, unos planos básicos. Tienes unos ejemplos del resultado esperado al final de este anexo. Estos mundos se crearán para ser poblados por los futuros usuarios de una red social y sólo te pedimos que tu programa sea capaz de generar y distribuir sobre un mapa las distintas zonas con las que contará:

• Naturaleza: estas zonas serán el respiro virtual del mundo.

• Urbanas: zonas donde los usuarios podrán crear sus casas y espacios virtuales.

• Comercial: zonas de encuentro para los usuarios y el espacio para las empresas asociadas.

Cada zona del plano estará compuesta por parcelas que son la unidad mínima del plano

Pero estos mundos virtuales se deben crear de manera dinámica. Dados unos parámetros de configuración del mundo, debes ser capaz de generar un plano que cumpla con esos parámetros.

Resumiendo: Hay distintos tipos de zona (Naturaleza, Urbana y Comercial), puede haber varias zonas de cada tipo y dentro de cada zona habrá un número de parcelas.

Especificaciones:

Crea un único documentos HTML y tantos documentos CSS y JS como necesites para
cumplir con los siguientes puntos:

1.  Formulario de configuración: crea un formulario HTML con los siguientes
    campos:

    ◦ Map size: tamaño del mapa, será el número de parcelas tanto de ancho como de alto (valor por defecto: 64).

    ◦ Max occupied area %: el numero máximo de parcelas del total del mapa que tendrán un uso asignado (valor por defecto: 80).

    ◦ **Nature**:

    ▪ Min zones: número mínimo de zonas de naturaleza con las que contará el mapa (valor por defecto: 2).

    ▪ Max zones: número máximo de zonas de naturaleza con las que contará el mapa (valor por defecto: 8).

    ▪ Zone max size: número máximo de parcelas con las que contará una misma zona (valor por defecto: 500).

    ▪ Total max size: número máximo de parcelas de naturaleza con las que contará el mapa (valor por defecto: 800)

    ◦ **Urban**:

    ▪ Min zones: número mínimo de zonas urbanas con las que contará el mapa (valor por defecto: 4)

    ▪ Max zones: número máximo de zonas urbanas con las que contará el mapa (valor por defecto: 6).

    ▪ Zone max size: número máximo de parcelas con las que contará una misma zona (valor por defecto: 100).

    ▪ Total max size: número máximo de parcelas urbanas con las que contará el mapa (valor por defecto: 800).

    ◦ **Commercial**:

    ▪ Min zones: número mínimo de zonas comerciales con las que contará el mapa (valor por defecto: 2).

    ▪ Max zones: número máximo de zonas comerciales con las que contará el mapa (valor por defecto: 8).

    ▪ Zone max size: número máximo de parcelas con las que contará una misma zona (valor por defecto: 50).

    ▪ Total max size: número máximo de parcelas urbanas con las que contará el mapa (valor por defecto: 200).

    ◦ Generate: botón para iniciar la generación del mundo con los parámetros anteriormente indicados.

2.  Generación del mapa: utilizando JavaScript desarrolla el código necesario para que al pulsar el botón “generate” se genere en la misma página una previsualización del mundo como se muestra en las imágenes.

    ◦ Las parcelas no vacías se deben mostrar como cuadrados mostrando en el interior el identificador de zona a la que pertenecen (un id numérico) y con un color de fondo indicativo del tipo de zona (naturaleza: verde, urbana: amarilla, comercial: naranja).

    ◦ Unos posibles pasos para desarrollar el proceso de generación del mapa pueden ser:

    1. Inicialización:

       • Limpia las previsualizaciones anteriores.

       • Selecciona aleatoriamente el número de zonas de cada tipo dentro
       de los parámetros introducidos en el formulario.

    2. Germen:

       • Elige aleatoriamente un punto dentro del plano (coordenadas X e Y) y asigna la primera parcela para cada zona. Estas parcelas establecerán el punto de partida desde donde crecerán las distintas zonas.

    3. Crecimiento: mientras no se alcancen los límites establecidos en el formulario de configuración.

       • Por cada zona que haya en el mapa:

       ◦ Elije una parcela de esa zona aleatoriamente.

       ◦ Elije una dirección de crecimiento de manera aleatoria y busca la primera parcela libre en esa dirección, si la encuentras asigna esa parcela a la zona. Ojo si llegas a otra zona o te sales de los límites del mapa la zona no crecerá en esta iteración y pasaremos a la siguiente zona.
    4. Muestra el mapa generado.

# Comentarios

Para esta actividad lo pimero fue extraer lo valores default del enunciado.

Separe los requerimientos en diferentes partes un primera poblacion del array 2D, en la que genero unos puntos iniciales al azar para cada tipo de zona, estas Zonas son un objeto con algunas de las variables que vi mas importates para el desarrollo del enunciado. 

Seguido de una funcion de crecimiento, dividida en un bucle que intenta expandir el numero de veces disponible y si no lo logra tiene una medida para salir del bucle. El sistema para expandir consiste en un intento de expansion en una direccion al azar de las parcelas de una zona.

Por ultimo se imprime mediante DOM de JS una tabla con las zonas.
# Referencias
