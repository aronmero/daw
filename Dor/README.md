# Proyecto final dor

Tras clonar el proyecto se debe utilizar el comando `npm run install`.

El `npm run dev` esta default en el puerto 3010.

Las los componentes scss se puedes añadir al **main.js**. En la carpeta _/src/styles_ se almacenan los elementos scss, para añadir variables globales utilizar el variables.scss.

El style.scss esta vinculado al main.js, se puede importar ahi elementos scss para utilizarlos.

### Plugins utilizados

Utilizamos [Vue router](https://router.vuejs.org/) la configuracion se puede encontrar en `src\router\index.js`, ahi se pueden añadir mas rutas.

Utilizamos [mswjs](https://mswjs.io/) para los datos de prueba simulando una api. Estos datos se pueden encontrar en `src\mocks\data` y en la carpeta `src\mocks` la configuración.

Utilizamos [pinia](https://pinia.vuejs.org/) para variables globales. Los datos se pueden encontrar en `src\stores`


### Alias

- `@` => `src`
- `@public` => `public`
