<?php
header("Content-Type: application/json");
require "conexion.php";

$nombre = $_POST["nombre"] ?? "";
$usuario = $_POST["usuario"] ?? "";
$password = $_POST["password"] ?? "";

if (!$nombre || !$usuario || !$password) {
    echo json_encode(["ok" => false, "msg" => "Faltan datos"]);
    exit;
}

$passHash = password_hash($password, PASSWORD_BCRYPT);

$query = $conexion->prepare("INSERT INTO usuarios (nombre, usuario, password) VALUES (?, ?, ?)");
$query->bind_param("sss", $nombre, $usuario, $passHash);

if ($query->execute()) {
    echo json_encode(["ok" => true, "msg" => "Usuario registrado"]);
} else {
    echo json_encode(["ok" => false, "msg" => "El usuario ya existe"]);
}
