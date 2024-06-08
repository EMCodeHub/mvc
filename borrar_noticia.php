<?php




require_once "datos_conexion.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Preparar la consulta
    $query = "DELETE FROM noticia WHERE id = ?";
    $statement = mysqli_prepare($conn, $query);

    // Vincular parámetro
    mysqli_stmt_bind_param($statement, "i", $id);

    // Ejecutar la consulta
    mysqli_stmt_execute($statement);

    // Verificar si se realizó el borrado correctamente
    if (mysqli_stmt_affected_rows($statement) > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al borrar la noticia.";
    }

    // Cerrar la declaración
    mysqli_stmt_close($statement);
}

// Cerrar la conexión
mysqli_close($conn);
?>
