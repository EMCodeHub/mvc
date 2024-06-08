<?php

require_once "datos_conexion.php"; 



require_once 'NoticiaModel.php';



function iniciarSesion() {
    session_start();
}



function retornaUsuarioId() {

    if(isset($_SESSION['usuario_id'])) {

        return $_SESSION['usuario_id'];
        
    }
}


function retornaUsuarioNombre() {

    if(isset($_SESSION['usuario_nombre'])) {

      
        return $_SESSION['usuario_nombre'];
    }
}



function verificaidValidoyRetornaNoticia($conn) {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
    
        // Consultar la noticia
        $query = "SELECT * FROM noticia WHERE id = $id";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) > 0) {
            $noticia = mysqli_fetch_assoc($result);
            return $noticia;
        }
    }
    return null;

}



function existeNoticia($noticia, $conn) {
    if (empty($noticia)) {
        echo "La noticia no existe.";
    }

    // Cerrar la conexión (si se ha definido previamente)
    if (isset($conn)) {
        mysqli_close($conn);
    }
}



function pintaNoticiaIndividual($noticia, $usuario_id) {
    ?>
   
    <div class="container">
        <h1>Detalles de la Noticia</h1>
        <h2><?= $noticia['titulo'] ?></h2>
        <p>Fecha: <?= $noticia['fecha'] ?></p>
        <p>Autor o Usuario_ID: <?= isset($noticia['id_autor']) ? $noticia['id_autor'] : 'Sin autor' ?></p>
        <p>Cuerpo de la noticia:</p>
        <p><?= $noticia['cuerpo'] ?></p>

        <?php if(isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_nombre'])): ?>


            <form action="actualizar_noticia.php" method="post">


                <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= $noticia['titulo'] ?>">
                <label for="cuerpo">Cuerpo:</label>
                <textarea id="cuerpo" name="cuerpo"><?= $noticia['cuerpo'] ?></textarea>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="<?= $noticia['fecha'] ?>">
                <div style="background-color: #efefef; color:black; border-radius: 20px; display:flex; justify-content:center; height:100px; align-content:center; align-items: center; flex-direction:column">
                    <p>Usuario ID: <?= $_SESSION['usuario_id'] ?></p>
                    <p>Usuario Nombre: <?= $_SESSION['usuario_nombre'] ?></p>
                </div>
                <?php if(isset($usuario_id) && $usuario_id == $noticia['id_autor']): ?>
                    <div class="button-group">
                        <button type="submit">Actualizar</button>
                    </div>
                <?php endif; ?>
            </form>

            <?php if(isset($usuario_id) && $usuario_id == $noticia['id_autor']): ?>
                <!-- Segundo formulario para el botón "Borrar" -->


                <form action="borrar_noticia.php" method="post">



                    <input type="hidden" name="id" value="<?= $noticia['id'] ?>">
                    <button type="submit" name="borrar" style="margin-top:30px; background-color: #cb0f0f; color:white; " onclick="return confirm('¿Estás seguro de que deseas borrar esta noticia?')">Borrar</button>
                </form>
            <?php endif; ?>

        <?php endif; ?>

        <!-- Botón para regresar a index.php -->
        <form action="index.php">
            <button type="submit" style="margin-top:30px; background-color: black; color:white; ">Volver</button>
        </form>
    </div>
    <?php
}





?>
