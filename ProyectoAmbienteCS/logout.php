<?php
// Inicia la sesión
session_start();

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirige al index después de cerrar sesión
header("Location: index.php");
exit();
?>
