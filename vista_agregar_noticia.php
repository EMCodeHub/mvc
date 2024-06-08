
<?php


session_start(); // Iniciar sesión



// Verificar si las variables de sesión existen
if(isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre'])) {
    // Obtener el contenido de las variables de sesión
    $usuario_id = $_SESSION['usuario_id'];
    $usuario_nombre = $_SESSION['usuario_nombre'];
}

// Verificar si se ha enviado el formulario para cerrar sesión
if(isset($_POST['cerrar_sesion'])) {
    // Eliminar todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea,
        input[type="date"],
        button[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            font-size: 16px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Noticia</h1>
        <!-- Formulario para agregar noticia -->
        <form action="controlador_agregar_noticia.php" method="post">
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea name="cuerpo" placeholder="Cuerpo de la noticia" required></textarea>
            <input type="date" name="fecha" required>




            <?php if(isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre'])): ?>

          <div style="background-color: #2558a1; color:white; border-radius: 20px; display:flex; justify-content:center; height:100px; align-content:center; align-items: center; flex-direction:column; margin-bottom:40px
">

        <p>Usuario ID: <?= $_SESSION['usuario_id'] ?></p>
        <p>Usuario Nombre: <?= $_SESSION['usuario_nombre'] ?></p>

            </div>

    <?php endif; ?>


            <button type="submit">Agregar Noticia</button>
        </form>

        <form action="index.php">
            <button type="submit" style="margin-top:30px; background-color: black; color:white; ">Volver</button>
        </form>





    </div>
</body>
</html>
