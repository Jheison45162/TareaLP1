function mostrarRecetas(recetas) {
    const contenedor = document.getElementById("resultados");
    contenedor.innerHTML = "";

    if (!recetas) {
        contenedor.innerHTML = "<p>No se encontraron resultados.</p>";
        return;
    }

    recetas.forEach(receta => {
        const div = document.createElement("div");
        div.className = "card";
        div.innerHTML = `
            <img src="${receta.strMealThumb}" alt="${receta.strMeal}">
            <h3>${receta.strMeal}</h3>
            <button onclick="verDetalle('${receta.idMeal}')">Ver Detalle</button>
        `;
        contenedor.appendChild(div);
    });  
}

