<?php
header("Content-Type: application/json");
require_once "db.php";

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

if (!$usuario || !$password) {
    echo json_encode([
        "status" => "error",
        "message" => "Faltan datos"
    ]);
    exit;
}

$stmt = $mysqli->prepare(
    "SELECT id, password FROM usuarios WHERE email = ?"
);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Usuario no encontrado"
    ]);
    exit;
}

$user = $result->fetch_assoc();

if (password_verify($password, $user['password'])) {
    echo json_encode([
        "status" => "success"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Contraseña incorrecta"
    ]);
}
