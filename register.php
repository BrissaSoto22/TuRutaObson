<?php
header("Content-Type: application/json");
require 'db.php';

$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$nombre || !$email || !$password) {
    echo json_encode(["status" => "error", "message" => "Faltan datos"]);
    exit;
}

$passHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $passHash);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "El correo ya está registrado"]);
}

$stmt->close();
