<?php

include("connection.php");

session_start();

// Verificar si el usuario tiene el rol de administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Si el usuario no es un administrador, redirige o muestra un mensaje de error
    header("Location: pagina_no_autorizada.php"); // Redirige a una página de error o a otra página
    exit(); // Termina la ejecución del script
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Global Tech CR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img src="img/logo.png" alt="Logo">
      </div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="audioYVideo.php">Audio y Video</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="hogar.php">Hogar</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="muebles.php">Muebles</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="tecnologia.php">Tecnologia</a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
           
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactenos.php">Contactenos</a>
        </li>
      </ul>

      <div class="user">
        <?php
        if (isset($_SESSION['nombreUsuario'])) {
          echo '<p style="color: white !important;" class="welcome-text">Bienvenido, ' . $_SESSION['nombreUsuario'] . '</p>';
          echo '<a href="logout.php" class="logout-link">Cerrar sesión</a>';
        } else {
          echo '<a href="login.php" class="login-link">Iniciar sesión</a>';
        }
        ?>
      </div>

  </nav>

      </header>
