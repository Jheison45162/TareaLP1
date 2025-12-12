<?php
session_start();
header("Content-Type: application/json");
require "conexion.php";

$usuario = $_POST["usuario"] ?? "";
$password = $_POST["password"] ?? "";

$query = $conexion->prepare("SELECT id, password FROM usuarios WHERE usuario=?");
$query->bind_param("s", $usuario);
$query->execute();

$result = $query->get_result();
if ($result->num_rows === 0) {
    echo json_encode(["ok" => false, "msg" => "Usuario no encontrado"]);
    exit;
}

$data = $result->fetch_assoc();

if (password_verify($password, $data["password"])) {
    $_SESSION["id"] = $data["id"];
    echo json_encode(["ok" => true, "msg" => "Bienvenido"]);
} else {
    echo json_encode(["ok" => false, "msg" => "Contraseña incorrecta"]);
}
