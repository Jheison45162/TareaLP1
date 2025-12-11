document.addEventListener("DOMContentLoaded", async () => {
    const id = localStorage.getItem("recetaSeleccionada");
    if (!id) {
        alert("No se encontró la receta seleccionada.");
        return;
    }

    try {
        const respuesta = await fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${id}`);
        const datos = await respuesta.json();

        if (!datos.meals) {
            document.getElementById("detalle").innerHTML = "<p>No se encontró la receta.</p>";
            return;
        }

        const receta = datos.meals[0];

        document.getElementById("titulo-receta").textContent = receta.strMeal;

        const ingredientes = Object.keys(receta)
            .filter(k => k.startsWith("strIngredient") && receta[k])
            .map(k => `<li>${receta[k]}</li>`)
            .join("");

        document.getElementById("detalle").innerHTML = `
            <img src="${receta.strMealThumb}" width="300">
            <h3>Ingredientes:</h3>
            <ul>${ingredientes}</ul>
            <h3>Preparación:</h3>
            <p>${receta.strInstructions}</p>
        `;

        const btnFav = document.getElementById("btnFavorito");
        if (btnFav) {
            btnFav.addEventListener("click", () => {
                agregarAFavoritos(receta);
                alert("Receta guardada en favoritos 🍴");
            });
        }
    } catch (error) {
        console.error("Error al cargar el detalle de la receta:", error);
        document.getElementById("detalle").innerHTML = "<p>Error al cargar los detalles.</p>";
    }
});
