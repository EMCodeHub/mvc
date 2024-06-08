<?php

require_once "datos_conexion.php"; // Incluir el archivo de datos de conexión

require_once "model_index.php"; // Incluir el modelo

// Función para obtener todas las noticias


function iniciarSesion()
{

    session_start();
}


function verificarEnvioFormulario()
{

    if (isset($_POST['cerrar_sesion'])) {
        // Eliminar todas las variables de sesión
        session_unset();
        // Destruir la sesión
        session_destroy();
        // Redirigir a la página de inicio de sesión
        header("Location: index.php");
        exit();
    }
}


function verificayMuestraVariablesdeSesion()
{

    if (isset($_SESSION['usuario_id'])) {
        echo "<div>Usuario ID: {$_SESSION['usuario_id']}</div>";
    }
    if (isset($_SESSION['usuario_nombre'])) {
        echo "<div>Usuario Nombre: {$_SESSION['usuario_nombre']}</div>";
    }
}




function columnaBotones()
{

    if (isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre'])) {
        echo '<th></th>'; // Columna para botones
    }
}




function obtenerNoticias()
{
    return getNoticiasModel();
}




// Definir la función pintaNoticias
function pintaNoticias()
{

    // Obtener las noticias
    $noticias = obtenerNoticias();

    // Iterar sobre cada noticia
    foreach ($noticias as $noticia) {
?>
        <tr>
            <td>
                <!-- Enlace para ver la noticia -->
                <a href="vista_ver_noticia.php?id=<?= $noticia['id'] ?>">
                    <?= $noticia['titulo'] ?>
                </a>
            </td>
            <td><?= $noticia['fecha'] ?></td>
            <!-- Verificar si la clave 'autor' está definida -->
            <td>
                <?= isset($noticia['id_autor']) ? $noticia['id_autor'] : 'Sin autor' ?>
            </td>
            <?php if (isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre']) && $noticia['id_autor'] == $_SESSION['usuario_id']) : ?>
                <td>
                    <!-- Botón de editar -->
                    <form action="vista_ver_noticia.php" method="get" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                    <!-- Botón de borrar -->
                    <form action="borrar_noticia.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
<?php
    }
}




function agregarNoticiaLink()
{

    if (isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre'])) {

        echo '<div class="titulonoticias" style="margin-bottom:80px;">';
        echo '<a href="vista_agregar_noticia.php">Agregar noticia</a>';
        echo '</div>';

    }
}




// Función para obtener un usuario por email y contraseña
function obtenerUsuario($email, $contrasena)
{
    return getUsuarioModel($email, $contrasena);
}

// Función para editar una noticia existente
function editarNoticia($id, $titulo, $cuerpo, $fecha)
{
    return editarNoticiaModel($id, $titulo, $cuerpo, $fecha);
}


// Función para borrar una noticia existente
function borrarNoticia($id)
{
    return borrarNoticiaModel($id);
}
