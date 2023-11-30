<?php
//conexión a la base de datos
include('connection.php');

// Inicia o reanuda la sesión
session_start();

// Verificar el POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // para obtener los datos del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar el usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    // Verifica si se encontró un resultado
    if ($result && mysqli_num_rows($result) == 1) {
        // Obteniene los datos del usuario
        $row = mysqli_fetch_assoc($result);

        // Establece la variable para el nombre de usuario
        $_SESSION['nombreUsuario'] = $row['nombre'];

        // Redirige al usuario al index después de iniciar sesión
        header("Location: index.php");
        exit();
    } else {
        // Mostrar un mensaje si las credenciales son inválidas
        echo "Credenciales inválidas. Intente nuevamente.";
    }
}
?>







