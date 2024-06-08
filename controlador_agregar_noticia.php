<?php
include 'model_index.php';

// Inicializar sesión si no está iniciada
session_start();

// Controlador para agregar noticia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo']) && isset($_POST['cuerpo']) && isset($_POST['fecha'])) {
    $titulo = $_POST['titulo'];
    $cuerpo = $_POST['cuerpo'];
    $fecha = $_POST['fecha'];
    
    // Verificar si el usuario está autenticado
    if(isset($_SESSION['usuario_id'])) {


        $usuario_id = $_SESSION['usuario_id'];

        
        
        if (agregarNoticiaModel($usuario_id, $titulo, $cuerpo, $fecha)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al agregar noticia";
        }
    } else {
        // Redirigir al usuario a la página de inicio de sesión si no está autenticado
        header("Location: login.php");
        exit();
    }
}

// Otros controladores para editar, borrar, etc.
?>
