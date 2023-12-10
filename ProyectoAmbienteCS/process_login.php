<?php
// Incluir el archivo de conexión a la base de datos
include('connection.php');

// Iniciar o reanudar la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar el usuario (usando consultas preparadas para seguridad)
    $query = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Verificar si se encontró un resultado
    if ($result && mysqli_num_rows($result) == 1) {
        // Usuario autenticado correctamente
        $row = mysqli_fetch_assoc($result);

        // Establecer la sesión con el nombre del usuario
        $_SESSION['nombreUsuario'] = $row['nombre'];

        // Verificar el rol del usuario y establecerlo en la sesión
        if ($row['rol'] === 'admin') {
            $_SESSION['rol'] = 'admin'; // Usuario con rol de administrador
            header("Location: index.php"); // Redirigir a la página de administrador
        } else {
            $_SESSION['rol'] = 'user'; // Usuario con rol de usuario estándar
            header("Location: index.php"); // Redirigir a la página de usuario estándar
        }
        exit(); // Terminar el script después de la redirección
    } else {
        http_response_code(401); // Error de no autorizado
    }
}
?>









