<?php

require_once "controlador_index.php"; // Incluir el controlador

iniciarSesion(); // Iniciar sesión

verificarEnvioFormulario(); //Verificar si se ha cerrado sesion

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>

    <link rel="stylesheet" href="./css/index.css" />
</head>

<body>
    <div class="titulonoticias">
        <h1>Login</h1>
    </div>

    <div class="formulariologin">

        <!-- Formulario de inicio de sesión -->

        <form action="login.php" method="post">
            <div class="inputsformulario">
                <input class="inputformulario" type="email" name="email" placeholder="Email" required />
                <input class="inputformulario" type="password" name="contrasena" placeholder="Contraseña" required />
                <button type="submit">Iniciar sesión</button>
            </div>
        </form>

        <!-- Botón de registro -->

        <a href="vista_registro.php">Registrarse</a>

    </div>

    <div class="formulariologin" style="margin-top: 40px;">

        <?php

        verificayMuestraVariablesdeSesion();

        ?>

    </div>

    <div class="titulonoticias" style="margin-top: 40px;">

     
        <form method="post" style="margin-top: 20px;">
            <button type="submit" name="cerrar_sesion">Cerrar sesión</button>
        </form>
    </div>

    <div class="noticias">
        <div class="titulonoticias">
            <h1>Noticias</h1>
        </div>


      <!-- Aquí va el listado de noticias -->

<div class="tabladenoticias" style="display:flex; justify-content: center;" >
        <table class="noticiastable" style="width: 50%;" >
            <thead>
                <tr>
                    <th><a href="?order=titulo">Título</a></th>
                    <th><a href="?order=fecha">Fecha</a></th>
                    <th><a href="?order=autor">Autor o Usuario_ID</a></th>

                    <?php  columnaBotones(); ?>

                </tr>

            </thead>

            <tbody>

                <?php
                pintaNoticias();
                ?>


            </tbody>
        </table>
</div>

        <?php agregarNoticiaLink(); ?>


    </div>
</body>

</html>