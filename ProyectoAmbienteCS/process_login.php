<?php
//conexión a la base de datos
include('connection.php');

// Inicia o reanuda la sesión
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

    // Verifica si se encontró un resultado
    if ($result && mysqli_num_rows($result) == 1) {
        // Usuario autenticado correctamente
        $row = mysqli_fetch_assoc($result);
    
        session_start();
        $_SESSION['nombreUsuario'] = $row['nombre']; // Asegúrate de almacenar el nombre del usuario en la sesión
    
        echo "success"; // Envía una respuesta de éxito al cliente
    } else {
        http_response_code(401); // Indica un error de no autorizado 
    }
}
?>







