<?php

/*
require_once "datos_conexion.php"; 




// Definir las funciones del modelo de noticia
function obtenerTodasLasNoticias($conn) {
    $sql = "SELECT * FROM noticia";
    $result = mysqli_query($conn, $sql);
    $noticias = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $noticias[] = $row;
        }
    }
    return $noticias;
}



function obtenerNoticiaPorId($conn, $id) {
    $sql = "SELECT * FROM noticia WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $noticia = mysqli_fetch_assoc($result);
    return $noticia;
}



function actualizarNoticia($conn, $id, $titulo, $cuerpo, $fecha) {
    $sql = "UPDATE noticia SET titulo='$titulo', cuerpo='$cuerpo', fecha='$fecha' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}



function borrarNoticia($conn, $id) {
    $sql = "DELETE FROM noticia WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

*/


?>
