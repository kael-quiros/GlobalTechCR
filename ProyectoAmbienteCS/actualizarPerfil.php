<?php
include("Usuario.php");
include('connection.php');

// Se inicia la sesión
session_start();

// Se verifica si la solicitud es del tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se obtienen los datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Se muestra en pantalla el nombre y email a actualizar
    echo "Nombre a actualizar: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
    
    // Se instancia la clase Usuario pasando la conexión a la base de datos
    $usuario = new Usuario($connection);
    
    // para actualizar el email del usuario con el nombre proporcionado
    $query = "UPDATE usuarios SET email = '$email' WHERE nombre = '$nombre'";
    echo "Consulta SQL: " . $query . "<br>";
    
    // Se llama a actualizarDatosUsuario para actualizar los datos
    $actualizacionExitosa = $usuario->actualizarDatosUsuario($nombre, $email);

    // Se verifica si la actualización fue exitosa
    if ($actualizacionExitosa) {
        // Redirige a la página de perfil del usuario
        header("Location: perfilUsuario.php?updated=1");
        exit(); 
    } else {
        // En caso de error, muestra un mensaje que hubo un problema
        echo "Hubo un problema al actualizar los datos. No se actualizó ninguna fila. Error: " . $usuario->obtenerError();
        exit(); 
    }
}
?>



