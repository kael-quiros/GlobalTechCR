<?php
include("Usuario.php");
include('connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email']; // Obtener el email del formulario

    echo "Nombre a actualizar: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
    
    $usuario = new Usuario($connection);
    
    // Imprimir la consulta SQL generada
    $query = "UPDATE usuarios SET email = '$email' WHERE nombre = '$nombre'";
    echo "Consulta SQL: " . $query . "<br>";
    
    $actualizacionExitosa = $usuario->actualizarDatosUsuario($nombre, $email);
    

    // Verificar si la actualización fue exitosa
    if ($actualizacionExitosa) {
        header("Location: perfilUsuario.php?updated=1");
        exit();
    } else {
        echo "Hubo un problema al actualizar los datos. No se actualizó ninguna fila. Error: " . $usuario->obtenerError(); // Mostrar el mensaje de error de la base de datos
        exit();
    }
}
?>


