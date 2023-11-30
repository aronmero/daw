let variable;
async function pedirDatos(params) {
    fetch("https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=Rum")
      .then((response) => response.json())
      .then((data) => data)
    
}
variable= await pedirDatos();
