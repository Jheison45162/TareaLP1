<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recetario Inteligente</title>
  <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
  <header>
    <h1>🍽 Recetario Inteligente</h1>

    <nav class="menu">
      <a href="login.php" class="btn-link">Iniciar sesión</a>
      <a href="registro.php" class="btn-link">Registrarse</a>
      <a href="favorito.php" class="btn-link">⭐ Favoritos</a>
    </nav>


    <input type="text" id="busqueda" placeholder="Buscar..." />
  </header>


  <main id="resultados" class="contenedor"></main>

  <div id="modalDetalle" class="modal oculto">
    <div class="modal-contenido">
      <span id="cerrarModal" class="cerrar">&times;</span>
      <h2 id="titulo-receta"></h2>
      <img id="imagen-receta" width="300" />
      <div id="detalle"></div>
      <button id="btnFavorito">⭐ Guardar en Favoritos</button>
    </div>
  </div>

  <footer>
    <p>
      © 2025 Recetario Inteligente | Desarrollado en Ingeniería de Software
    </p>
  </footer>

  <script src="js/api.js"></script>
  <script src="js/detalle.js"></script>
  <script src="js/favoritos.js"></script>
  <script src="js/main.js"></script>
  <script src="js/ui.js"></script>
</body>

</html>