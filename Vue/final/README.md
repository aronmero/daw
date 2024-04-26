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

Se utilizo [mswjs](https://mswjs.io/) para mockear una API para el login simulado. Los datos de la api simulados se encuentran en la `src\mocks\data` y la configuracion en `src\mocks`. 

Datos de usuario para login: 
```js
email: admin@example.com
password: 1234
```

Se utilizo [pinia](https://pinia.vuejs.org/) para almacenar variables globales. Los datos de se encuentran en `src\stores`. Los datos guardados son el usuario para saber si esta conectado, ademas hay stores para las obras de arte generales que se utilizan en varias vista ademas de un store en una ruta para evitar llamadas repetidas a la api si se vuelve a navegar a dicha pagina.

- `usuario.js` contiene la iformacion relativa a un usuario, si esta con sesion iniciada y los datos del usuario.

- `artwork.js` contiene la informacion relativa a las obras de arte obtenidas en la api, tanto obras generales como especificas de un artista. Contiene mas de un store.

Se utilizo [Vue router](https://router.vuejs.org/) para para tener varias rutas.

- Una ruta principal en `/` que muestra un inicio de sesion si no hay usuario activo.
- Una ruta principal en `/home` que muestra hasta 20 obras de artistas.
- Una ruta principal en `/artistas` que muestra hasta 20 obras por artistas con un filtro.
- Una ruta principal en `/random` que muestra una obra aleatoria.
- Una ruta principal en `/monet` que muestra 20 obras del artista Monet.

La api seleccionada ha sido la [API publica del Art Institute of Chicago](https://api.artic.edu/docs/). Los datos de la api estan en `src\Api\api.js` se utilizaron 3 funciones diferentes.
- `apiArtworks` para obtener informacion de hata 20 obras de arte
- `apiArtworksArtist` para obtener informacion de 20 obras de arte de un artista, en este caso Monet
- `apiArtworksRandom` para obtener informacion de una obra aleatoria, realiza llamadas hasta encontrar una obra valida.

La api devolvia obras sin imagen por ello no se devuelven 20 obras siempre, si no tienen imagen no se devuelven.