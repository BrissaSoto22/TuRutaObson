<?php
$DB_HOST = "localhost";
$DB_USER = "root";        // usuario por defecto XAMPP
$DB_PASS = "";            // contraseña vacía en XAMPP
$DB_NAME = "turutaobson_db";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Error de conexión a la base de datos"
    ]);
    exit;
}

$mysqli->set_charset("utf8mb4");
