<?php
session_start();
header("Content-Type: application/json");
require "conexion.php";

if (!isset($_SESSION["id"])) {
    echo json_encode([]);
    exit;
}

$idUsuario = $_SESSION["id"];

$result = $conexion->query("SELECT * FROM favoritos WHERE id_usuario=$idUsuario");

$favs = [];
while ($fila = $result->fetch_assoc()) {
    $favs[] = $fila;
}

echo json_encode($favs);
