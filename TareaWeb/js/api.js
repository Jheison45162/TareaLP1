const API_URL_NOMBRE = "https://www.themealdb.com/api/json/v1/1/search.php?s=";
const API_URL_INGREDIENTE = "https://www.themealdb.com/api/json/v1/1/filter.php?i=";

/**
 * Busca recetas por nombre o ingrediente
 * @param {string} palabraClave
 * @returns {Promise<Array>} 
 */

async function buscarRecetas(palabraClave) {
    if (!palabraClave) {
        const respuesta = await fetch(API_URL_NOMBRE);
        const datos = await respuesta.json();
        return datos.meals;
    }

    const porNombre = await fetch(API_URL_NOMBRE + palabraClave);
    const datosNombre = await porNombre.json();
    const porIngrediente = await fetch(API_URL_INGREDIENTE + palabraClave);
    const datosIngrediente = await porIngrediente.json();
    const recetasNombre = datosNombre.meals || [];
    const recetasIngrediente = datosIngrediente.meals || [];
    const todas = [...recetasNombre, ...recetasIngrediente];
    const unicas = [];
    const ids = new Set();

    todas.forEach(r => {
        if (!ids.has(r.idMeal)) {
            ids.add(r.idMeal);
            unicas.push(r);
        }
    });

    return unicas.length > 0 ? unicas : null;
}
