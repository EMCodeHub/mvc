<?php

// Conexión a la base de datos

$servername = "localhost";
$username = "root";
$password = "emdevapps123";
$database = "noticias";

// Crear una nueva conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



?>