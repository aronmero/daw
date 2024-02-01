# Aarón Medina Rodríguez

2º DAW - Desarrollo Web en entorno cliente - DEW

2024 Q1

# Enunciado

Genera  usando componentes de Vue 3 una interfaz para una aplicación de registro de eventos.
Al menos debe incluir los siguientes componentes:

- Eventos: se debe mostrar en forma de tarjetas los eventos registrados en la aplicación. Al menos:
    - Lugar: Dirección de celebración de la actividad.
    - Fecha: Fecha de celebración de la actividad.
    - Descripción: Descripción de la actividad.
- Login: Componente que gestionará el acceso a los usuarios registrados al aplicativo.
- Registro de nuevos eventos: Una vez logueado un usuario se debe mostrar un botón que permita desplegar un componente para registrar nuevos eventos.

Puedes usar más componentes si lo consideras oportuno y configurar la interfaz a tu gusto siempre que cumpla estos requisitos y sea accesible y usable. Para los datos del aplicativo puedes generar un API o usar Mock Service Worker.

# Resolucion

Se utilizo [mswjs](https://mswjs.io/)  para mockear la API. Los datos de la api simulados se encuentran en la ``src\mocks``, se realizaron 4 posibles API una para actividades, una para profesores, una para grupos y una para usuarios.

Se utilizo [Vue router](https://router.vuejs.org/) para para tener dos rutas una principal en ``"/"`` donde se verian los eventos publicos y si estas logeado se permite crear eventos y una ruta ``"/login"`` para iniciar sesion.

En la vista principal al estar con sesion iniciada se puede crear un evento, este no es guardado permanentemente solo temporalmente en un array y es mostrado en la pagina principal.