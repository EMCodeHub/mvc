<?php

require "datos_conexion.php";

require_once "controlador_ver_noticia.php"; // Incluir el controlador

iniciarSesion(); // Iniciar sesión


// Iniciar sesión
// Verificar si las variables de sesión existen
$usuario_id = retornaUsuarioId();
$usuario_nombre = retornaUsuarioNombre();
// Verificar si se ha pasado un ID válido
$noticia = verificaidValidoyRetornaNoticia($conn);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Noticia</title>
   
    <link rel="stylesheet" href="./css/noticias.css" />

</head>
<body>

<?php
pintaNoticiaIndividual($noticia, $usuario_id);
?>

</body>
</html>

<?php
existeNoticia($noticia, $conn);
?>
