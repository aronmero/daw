# Enunciado

Selecciona una API publica de tu elección (puedes escoger una del repositorio:
https://github.com/public-apis/public-apis ) y genera una interfaz con los siguientes requisitos:

Usa fecth para obtener los datos desde la API.
Utilizar .map() para representar cada uno de los elementos obtenidos de la API. (Modificando el DOM, creando nuevos nodos, intentar evitar usar el innerHTML...)
Utilizar .filter() para realizar busquedas de items.
Utilizar Cookies, LocalStorage, sessionStorage para implementar una funcionalidad de tu interfaz.
Añade 4 funcionalidades a tu aplicación web (a tu libre elección) usando javascript.

# Resolucion

Se eligio la api de pokemon que contiene todos los pokemon *https://pokeapi.co/api/v2/pokemon/?offset=00&limit=15000*.

Utilizamos un doble fecth para obtener los datos que requerimos de la api. El primero obtiene de un objeto con el siguiente formato la url del pokemon concreto.

```json
{
  "name": "bulbasaur",
  "url": "https://pokeapi.co/api/v2/pokemon/1/"
}
```

El segundo fetch obtiene el resto de datos del pokemon principalmente extraemos los siguientes datos para trabajar en nuestra app.

```json
{
    "id": "pokemon.id",
    "sprite": "pokemon.sprites.front_default",
    "nombre": "pokemon.name",
    "tipos": "pokemon.types",
  }
```

Imprimimos cada elemento de la api individualmente en el HTML.

Filtro por nombre del pokemon.

Se guardan los datos en un sessionStorage para evitar llamadas repetidas a la api en la misma sesion.

Opcion para refrescar la api por si hubiera problemas al obtener los datos y mostrarlos.
