<?php
session_start();
header("Content-Type: application/json");
require "conexion.php";

if (!isset($_SESSION["id"])) {
    echo json_encode(["ok" => false, "msg" => "No autenticado"]);
    exit;
}

$idUsuario = $_SESSION["id"];
$idReceta = $_POST["id"] ?? "";
$titulo = $_POST["titulo"] ?? "";
$imagen = $_POST["imagen"] ?? "";

$query = $conexion->prepare("
    INSERT INTO favoritos (id_usuario, id_receta, titulo, imagen)
    VALUES (?,?,?,?)
");
$query->bind_param("isss", $idUsuario, $idReceta, $titulo, $imagen);

$query->execute();

echo json_encode(["ok" => true, "msg" => "Guardado en favoritos"]);
