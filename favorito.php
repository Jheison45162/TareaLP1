<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>⭐ Mis Favoritos</h1>

<div id="listaFavs" class="contenedor"></div>

<script>
async function cargarFavoritos() {
    const r = await fetch("main/listar_favorito.php");
    const favs = await r.json();

    const div = document.getElementById("listaFavs");
    div.innerHTML = "";

    favs.forEach(f => {
        div.innerHTML += `
            <div class="card">
                <img src="${f.imagen}">
                <h3>${f.titulo}</h3>
                <button onclick="verDetalle('${f.id_receta}')">Ver</button>
            </div>
        `;
    });
}

cargarFavoritos();
</script>

</body>
</html>
