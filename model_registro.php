<?php


require "datos_conexion.php";

function agregarUsuario($nombre, $email, $contrasena) {
    global $conn;
    $sql = "INSERT INTO usuario (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

?>
