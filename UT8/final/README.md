# Aarón Medina Rodríguez

2º DAW - Desarrollo Web en entorno cliente - DEW

2024 Q1

# Enunciado

Realiza un proyecto libre (escoge la temática que quieras) que cumpla los siguientes requisitos:

- Use vue-router para renderizar las diferentes secciones (al menos crear 3 rutas).
- La ruta "/" debe ser un formulario de login simulado (no es necesario que utilice interacciones con proyectos de backend ni nada por el estilo...)
- Se debe definir al menos un store con pinia que se usará en los diferentes componentes del proyecto.
- En alguna parte del proyecto se deben recuperar datos de una API externa y renderizar sus resultados (uso de fetch).
- Además debe contener al menos algún componente anidado donde se definan props para obtener el valor de un atributo desde el componente padre.

La entrega debe incluir un archivo.zip con el código del proyecto, así como un documento pdf donde se explique la funcionalidad y uso del proyecto.

Además de los requisitos propuestos, se valorará que el código esté documentado siguiendo la nomenclatura de JSDoc, usabilidad, accesibilidad y diseño del proyecto final.

# Resolucion

Se utilizo [mswjs](https://mswjs.io/) para mockear la API. Los datos de la api simulados se encuentran en la `src\mocks\data` y la configuracion en `src\mocks`

Se utilizo [pinia](https://pinia.vuejs.org/) para almacenar variables globales. Los datos de se encuentran en `src\stores`.

- `usuario.js` contiene la iformacion relativa a un usuario, si esta con sesion iniciada y los datos del usuario.

Se utilizo [Vue router](https://router.vuejs.org/) para para tener varias rutas.

- Una ruta principal en `/` que muestra un inicio de sesion si no hay usuario activo.

La api seleccionada ha sido la [API publica del Art Institute of Chicago](https://api.artic.edu/docs/) 