<?php

include("connection.php");
include("process_register.php");

 
$conn = new mysqli($servername, $username, $password, $database);
 
if ($conn->connect_error) {
    die("Error de conexion");
}
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Global Tech CR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    <div id="logo">
        <img src="img/logo.png" alt="Logo">
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
        <div class="container-fluid">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="audioYVideo.html">Audio y Video</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="hogar.php">Hogar</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="muebles.php">Muebles</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="tecnologia.php">Tecnologia</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Por añadir</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactenos.php">Contactenos</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>  
    
    <div class="login-box">
    <h2>Registro</h2>
    <?php
    if (isset($_SESSION['registration_message'])) {
        echo '<p style="color: red;">' . $_SESSION['registration_message'] . '</p>';
        unset($_SESSION['registration_message']);
    }
    ?>
    <form id="registerForm" method="POST" action="process_register.php">
        <div id="owl-login"></div>
        <div class="user-box">
            <input type="text" name="nombre" required>
            <label>Nombre</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="user-box">
            <input id="password" type="password" name="password" required autocomplete="off">
            <label>Password</label>
        </div>
        <button type="submit" name="action" value="register">Register</button>
    </form>
    <p style="color: white !important;" class="welcome-text">Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>

    
</div>



<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>