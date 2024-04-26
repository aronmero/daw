// Función para obtener y mostrar la información de los países
function fetchCountries() {
  // Verificar si ya hay datos en localStorage
  const storedCountries = localStorage.getItem("countries");

  if (storedCountries) {
    // Si hay datos almacenados, usar esos datos
    displayCountries(JSON.parse(storedCountries));
  } else {
    // Si no hay datos almacenados, hacer la solicitud a la API
    fetch("https://restcountries.com/v3.1/all")
      .then((response) => response.json())
      .then((data) => {
        // Filtrar países que no tienen información relevante
        const filteredCountries = data.filter(
          (country) => country.name && country.capital
        );

        // Almacenar los datos en localStorage
        localStorage.setItem("countries", JSON.stringify(filteredCountries));

        // Mostrar la información de cada país en la lista
        displayCountries(filteredCountries);
        console.log(data);
      })
      .catch((error) =>
        console.error("Error al obtener datos de países:", error)
      );
  }
}

// Función para mostrar la información de los países
function displayCountries(countries) {
  const countriesList = document.getElementById("countriesList");
  countriesList.innerHTML = ""; // Limpia la lista antes de agregar nuevos elementos

  const countryItems = countries.map((country) => {
    const listItem = document.createElement("li");
    listItem.textContent = `País: ${country.name.common}, Capital: ${country.capital}`;
    return listItem;
  });

  // Agrega todos los elementos al DOM
  countryItems.forEach((item) => {
    countriesList.appendChild(item);
  });
}

// Función para buscar y mostrar países según la entrada de usuario
function searchCountries() {
  const searchInput = document.getElementById("searchInput");
  const searchTerm = searchInput.value.toLowerCase();

  // Filtra los países basados en el término de búsqueda
  const storedCountries = localStorage.getItem("countries");
  const filteredCountries = storedCountries
    ? JSON.parse(storedCountries).filter(
        (country) =>
          country.name.common.toLowerCase().includes(searchTerm) ||
          country.capital[0].toLowerCase().includes(searchTerm)
      )
    : [];

  // Muestra la lista actualizada de países
  displayCountries(filteredCountries);
}

// Ejecutar la función para obtener datos de países al cargar la página
fetchCountries();

// Asignar la función de búsqueda al evento de cambio en el input
document
  .getElementById("searchInput")
  .addEventListener("input", searchCountries);
