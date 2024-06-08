<?php
session_start(); // Iniciar sesión


//comentario nuevo

include 'model_index.php';

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['contrasena'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Obtener usuario de la base de datos
    $usuario = getUsuarioModel($email, $contrasena);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario) {
        // Guardar datos del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        
        // Redireccionar a la página de inicio
        header("Location: index.php");
        exit();
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo "Email o contraseña incorrectos.";
    }
} else {
    // Redireccionar a la página de inicio si se intenta acceder a este archivo directamente
    header("Location: index.php");
    exit();
}
?>
