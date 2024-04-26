Vamos a trabajar con una API pública de alojamientos turísticos de la Palma;

tienes una breve descripción en: https://www.opendatalapalma.es/datasets/lapalma::alojamientos-turisticos/about

podemos consultar la tabla de datos de esta API en el siguiente enlace: https://www.opendatalapalma.es/datasets/lapalma::alojamientos-turisticos/explore?location= 28.664588%2C-17.857287%2C11.84&showTable=true

El ejercicio a realizar consiste en una interfaz que representa en una tabla un listado con los alojamientos turísticos de la palma, mostrando para cada uno de ellos el nombre, tipo de alojamiento, categoría (Est_LLav) y municipio.

Se deben integrar elementos en la interfaz que permitan filtrar los resultados que se muestran en la tabla por municipios y/o categorías.

Al seleccionar un alojamiento se debe mostrar toda la información del mismo (además de la información de la tabla anterior, se mostrará dirección, teléfono y número de plazas). Para ello puedes usar un modal, offcanvas, alert personalizado…

La lista de ítems a valorar es la siguiente:

●Código comentado siguiendo la nomenclatura de JSDOC. 1 punto 


●Obtener los datos desde la API propuesta. 2 puntos 

Para obtener los datos de la API usa la url: https://services.arcgis.com/hkQNLKNeDVYBjvFE/arcgis/rest/services/Alojami entos_turisticos/FeatureServer/0/query?where=1%3D1&outFields=*&returnG eometry=false&outSR=4326&f=json

#Pista Features

● Representar los datos de los alojamientos en una tabla. (DOM javascript) 2 punto.

● Introducir elementos que permitan filtrar los resultados de la tabla por municipio y/o categoría (deben ser dos elementos independientes). 1,5 punto por filtro.

● Mostrar datos del alojamiento seleccionado (modal, offcanvas, alert personalizado…) 1 punto.

● Apariencia, integración de los elementos en la interfaz, funcionalidad. 1 punto.

Sólo se permite el uso de la extensión live server y el uso de cualquier otra extensión o web que permita realizar consultas usando inteligencia artificial será considerado plágio y supondrá un 0 en este ejercicio.