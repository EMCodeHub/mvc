
<?php

require "datos_conexion.php";

// A continuación veremos las funciones del MODELO.
// En modelo siempre tendremos SQL por definición.
// Las funciones del modelo nos devuelven (true, false) si se ha insertado/editado bien una noticia
// Las funciones del modelo pueden retornarnos datos. (diferentes tipos de datos almacenados en variables-> objetos, variables, arrays).


// La siguiente funcion getNoticias() nos retorna un array asociativo de TODAS las noticias  Ejemplo:  id=>{}   id_autor=>{}   titulo=>{}   cuerpo=>{}  fecha=>{}

function getNoticiasModel()
{

    global $conn;
    $sql = "SELECT * FROM noticia";
    $result = $conn->query($sql);
    $noticias = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $noticias[] = $row;
        }
    }
    return $noticias;
}


// La siguiente funcion getUsuario() nos retorna un array asociativo del usuario seleccionado por email "juan23@gmail.com"  
//Ejemplo:  id=>4  nombre=>Juan  
//email=>juan23@gmail.com 
// contrasena=> 1234


function getUsuarioModel($email, $contrasena)
{


    global $conn;
    $sql = "SELECT * FROM usuario WHERE email='$email' AND contrasena='$contrasena'";
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();
    return $usuario;
}

// La siguiente funcion agregarNoticia() Inserta en la tabla noticia un conjunto de campos, id_autor, titulo, cuerpo, fecha, estos 
//campos se solicitan en el formulario.
// Nos retorna true si la consulta ha tenido exito
// Nos retorna false si la consulta no tuvo exito. 

function agregarNoticiaModel($usuario_id, $titulo, $cuerpo, $fecha)
{

    global $conn;

    $sql = "INSERT INTO noticia (id_autor, titulo, cuerpo, fecha) VALUES ('$usuario_id', '$titulo', '$cuerpo', '$fecha')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//La siguiente función editarNoticiaModel() actualiza la noticia por id,  se conoce el id previamente.
// Nos retorna true si la consulta ha tenido exito
// Nos retorna false si la consulta no tuvo exito. 

function editarNoticiaModel($id, $titulo, $cuerpo, $fecha)
{

    global $conn;
    $sql = "UPDATE noticia SET titulo='$titulo', cuerpo='$cuerpo', fecha='$fecha' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//La siguiente función borrarNoticia() borra la noticia por id,  se conoce el id previamente.
// Nos retorna true si la consulta ha tenido exito
// Nos retorna false si la consulta no tuvo exito. 

function borrarNoticiaModel($id)
{
    global $conn;
    $sql = "DELETE FROM noticia WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

?>


