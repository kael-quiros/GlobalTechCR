<?php
include("connection.php");
include("Usuario.php");

session_start();

// Verificar si no hay una sesión activa, si es así, redirigir al usuario a la página de inicio de sesión
if (!isset($_SESSION['nombreUsuario'])) {
  header("Location: login.php");
  exit();
}

// Crear una instancia de la clase Usuario con la conexión a la base de datos
$usuario = new Usuario($connection);
$nombreUsuario = $_SESSION['nombreUsuario'];

// datos del usuario
$userData = $usuario->obtenerUsuarioPorNombre($nombreUsuario); 

if (!$userData) {
  
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Error - No se encontraron datos del usuario</title>
      
    </head>
    <body>
        <h1>Error</h1>
        <p>No se han encontrado datos del usuario.</p>
      
    </body>
    </html>
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Global Tech CR</title>
  <title>Global Tech CR</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
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
       
        <a href="shoppingCart.php" class="navbar-brand">
          <h3 class="px-5"><i class="fas fa-shopping-basket"></i>Shopping Cart</h3>
        </a>
        <div class="user">
    <?php
    if (isset($_SESSION['nombreUsuario'])) {
        echo '<div class="user-profile">';
        echo '<p style="color: white !important;" class="welcome-text">Bienvenido, ' . $_SESSION['nombreUsuario'] . '</p>';
        echo '<a href="perfilUsuario.php" class="profile-link"><i class="bi bi-person"></i></a>';
        echo '</div>';

        echo '<div class="logout">';
        echo '<a href="logout.php" class="logout-link">Cerrar sesión</a>';
        echo '</div>';
    } else {
        echo '<a href="login.php" class="login-link">Iniciar sesión</a>';
    }
    ?>
</div>

    </nav>
  </header>

  <div class="container mt-5">
        <h2>Perfil de Usuario</h2>
      
        <?php
        if (isset($_GET['updated']) && $_GET['updated'] == 1) {
            echo '<div class="alert alert-success" role="alert">Los datos se han actualizado correctamente.</div>';
        }
        ?>
   
        <form method="POST" action="actualizarPerfil.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
         
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($userData['nombre']) ? $userData['nombre'] : ''; ?>" >
  
                <a href="#" class="btn btn-primary mt-2" id="editarNombre">Editar Nombre</a>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
         
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($userData['email']) ? $userData['email'] : ''; ?>">
       
                <a href="#" class="btn btn-primary mt-2" id="editarEmail">Editar Email</a>
            </div>
     
            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </form>
    </div>


    <script>
         //habilitar la edición del nombre
        document.getElementById('editarNombre').addEventListener('click', function(event) {
            document.getElementById('nombre').readOnly = false;
        });

      //habilitar la edición del correo electrónico
        document.getElementById('editarEmail').addEventListener('click', function(event) {
            document.getElementById('email').readOnly = false;
        });
    </script>

  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

