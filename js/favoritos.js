async function agregarAFavoritos(receta) {
    const data = new FormData();
    data.append("id", receta.idMeal);
    data.append("titulo", receta.strMeal);
    data.append("imagen", receta.strMealThumb);

    const r = await fetch("backend/agregar_favorito.php", {
        method: "POST",
        body: data
    });

    const res = await r.json();
    alert(res.msg);
}

async function verFavoritos() {
    location.href = "favoritos.php";
}
