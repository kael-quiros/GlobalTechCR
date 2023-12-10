<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico proporcionado por el usuario desde el formulario
    $email = $_POST["email"];

    // Verificar si el correo electrónico existe en la base de datos (ajustar según tu base de datos)
    // Aquí debes realizar la verificación en tu base de datos para comprobar si el correo existe
    // Por ejemplo:
    // $query = "SELECT * FROM usuarios WHERE email = '$email'";
    // Realizar la consulta y verificar si se encuentra el correo en la base de datos

    // Si el correo existe, generar un token único para la recuperación de contraseña
    // En este ejemplo, se utiliza una función simple para generar un token aleatorio
    $token = bin2hex(random_bytes(32)); // Generar un token único para recuperación

    // Actualizar la base de datos con el token generado para el usuario correspondiente
    // Por ejemplo, si tienes una tabla "usuarios", podrías tener una columna "token_recovery"
    // y actualizarla con el token generado para el usuario con el correo ingresado

    // Envío del correo electrónico con el enlace de recuperación (solo ejemplo)
    $subject = "Recuperación de Contraseña";
    $message = "Hola,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace: http://tudominio.com/reset_password.php?token=$token\n\nSi no solicitaste este cambio, ignora este mensaje.";
    $headers = "From: tuemail@tudominio.com";

    // Enviar el correo electrónico
    $success = mail($email, $subject, $message, $headers);

    if ($success) {
        echo "Se ha enviado un correo con instrucciones para restablecer tu contraseña.";
    } else {
        http_response_code(500); // Error interno del servidor al enviar el correo
    }
}
?>
