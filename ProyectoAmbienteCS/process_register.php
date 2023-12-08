<?php
include('connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verificar si el usuario ya está registrado en la base de datos
    $check_query = "SELECT * FROM usuarios WHERE email = '$email'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // El usuario ya está registrado, redirige a la página de inicio de sesión con un mensaje
        header("Location: login.php?registered=1");
        exit();
    } else {
        // Inserta los datos en la base de datos
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
        
        // Inserta los datos correctamente
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
}
?>





