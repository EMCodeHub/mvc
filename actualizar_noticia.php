<?php




require_once "datos_conexion.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $cuerpo = $_POST["cuerpo"];
    $fecha = $_POST["fecha"];

    // Preparar la consulta
    $query = "UPDATE noticia SET titulo = ?, cuerpo = ?, fecha = ? WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);

    // Vincular parámetros
    mysqli_stmt_bind_param($statement, "sssi", $titulo, $cuerpo, $fecha, $id);

    // Ejecutar la consulta
    mysqli_stmt_execute($statement);

    // Verificar si se realizó la actualización correctamente
    if (mysqli_stmt_affected_rows($statement) > 0) {
        header("Location: vista_ver_noticia.php?id=$id");
        exit();
    } else {
        echo "Error al actualizar la noticia.";
    }

    // Cerrar la declaración
    mysqli_stmt_close($statement);
}

// Cerrar la conexión
mysqli_close($conn);
?>
