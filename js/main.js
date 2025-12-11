document.addEventListener("DOMContentLoaded", async () => {
    try {
        const recetas = await buscarRecetas("");
        mostrarRecetas(recetas);
    } catch (error) {
        console.error("Error al cargar recetas:", error);
    }
});

const campoBusqueda = document.getElementById("busqueda");
campoBusqueda.addEventListener("input", async (e) => {
    const texto = e.target.value.trim();
    const recetas = await buscarRecetas(texto || "");
    mostrarRecetas(recetas);
});

async function verDetalle(id) {
    try {
        const respuesta = await fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${id}`);
        const datos = await respuesta.json();
        const receta = datos.meals[0];

        document.getElementById("titulo-receta").textContent = receta.strMeal;
        document.getElementById("imagen-receta").src = receta.strMealThumb;

        const ingredientes = Object.keys(receta)
            .filter(k => k.startsWith("strIngredient") && receta[k])
            .map(k => `<li>${receta[k]}</li>`)
            .join("");

        document.getElementById("detalle").innerHTML = `
            <h3>Ingredientes:</h3>
            <ul>${ingredientes}</ul>
            <h3>Preparación:</h3>
            <p>${receta.strInstructions}</p>
        `;

        const modal = document.getElementById("modalDetalle");
        modal.classList.remove("oculto");

        // ⭐⭐⭐ AÑADIDO: FAVORITOS — SIN CAMBIAR NADA MÁS ⭐⭐⭐
        document.getElementById("btnFavorito").onclick = () => {
            agregarAFavoritos(receta);
            alert("Receta guardada en favoritos 🍴");
        };
        // ⭐⭐⭐ FIN DEL CÓDIGO AÑADIDO ⭐⭐⭐

    } catch (error) {
        console.error("Error al mostrar detalle:", error);
    }
}

document.getElementById("cerrarModal").addEventListener("click", () => {
    document.getElementById("modalDetalle").classList.add("oculto");
});

