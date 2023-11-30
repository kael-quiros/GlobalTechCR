<?php
include('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //  inserta los datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    
    //inserta los datos correctamente
    if (mysqli_query($connection, $query)) {
        // Inicia la sesión
        session_start();
        // Almacena el nombre del usuario en la sesión
        $_SESSION['nombreUsuario'] = $nombre;
        // Redirecciona a la página index.php después del registro 
        header("Location: index.php");
        exit();
    } else {
        // Muestra un mensaje de error si hubo un problema en el registro
        echo "Error en el registro. Intente nuevamente.";
    }
}
?>





