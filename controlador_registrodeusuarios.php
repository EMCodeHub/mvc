<?php

include 'model_registro.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contrasena'])) {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];


    // Agregar el nuevo usuario a la base de datos utilizando la función del modelo_registro.php



    if (agregarUsuario($nombre, $email, $contrasena)) {
      
    
        // Redireccionar a la página de inicio después del registro

        header("Location: vista_registro.php");
        exit();

    } else {

        echo "Error al registrar el usuario.";

    }

} else {


    // Redireccionar a la página de inicio si se intenta acceder a este archivo directamente

    header("Location: vista_registro.php");
    
    exit();
}
?>
