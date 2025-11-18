function agregarAFavoritos(receta) {
    let favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];
    favoritos.push(receta);
    localStorage.setItem("favoritos", JSON.stringify(favoritos));
}