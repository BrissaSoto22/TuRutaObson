<?php
require 'db.php';

if ($mysqli->connect_errno) {
    echo "❌ Error al conectar: " . $mysqli->connect_error;
} else {
    echo "✔️ Conexión exitosa a la base de datos: " . $DB_NAME;
}
?>
