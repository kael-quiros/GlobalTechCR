<?php
session_start();

if (isset($_POST['btn-agregar'])) {
    $product_name = $_POST['btn-agregar'];

    // Inicializar o obtener la variable de sesión del carrito
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar el producto al carrito
    $_SESSION['carrito'][] = $product_name;

    // Redirigir de vuelta a la página de productos después de agregar al carrito
    header("Location: audioYVideo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            echo '<p style="color: white !important;" class="welcome-text">Bienvenido, ' . $_SESSION['nombreUsuario'] . '</p>';
            echo '<a href="logout.php" class="logout-link">Cerrar sesión</a>';
          } else {
            echo '<a href="login.php" class="login-link">Iniciar sesión</a>';
          }
          ?>
        </div>
    </nav>
  </header>


<div class="container-fluid">
  <div class="row px-5  ">
    <div class="col-md-7 bg-white ">
      <div class="shopping-cart ">
        <h6>Mi carrito</h6>
        <hr>
        <form action="shoppingCart.php" method="get" class="cart-items">
          <div class="border rounded">
            <div class="row bg-white">
              <div class="col-md-3 pl-0">
                <img src="img/parlanteSony.jpg" alt="image1" class="img-fluid">
              </div>
              <div class="col-md-6">
                <h5 class="pt-2">Producto1</h5>
                <h5 class="pt-2">$599</h5>
                <button type="submit" class="btn btn-warning">Guardar para despúes</button>
                <button type="submit" class="btn btn-danger mx-2" name="quitar">Quitar</button>
              </div>
              <div class="col-md-3 py-5">
                <div>
                  <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                  <input type="text" value="1" class="form-control w-25 d-inline">
                  <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
    <div class="col-md-3 offset-md-1 border rounded mt-5 bg-white h-25">
      <div class="pt-4">
        <h6>Precio detalles</h6>
        <hr>
        <div class="row price-details">
          <div class="col-md-6">
            <h6>Cantidad Items:</h6>
            <hr>
            <h6>Total a pagar:</h6>
          </div>
          <div class="col-md-6"></div>
        </div>  
      </div>
    </div>
    </div>
    </div>

  <div class="text-black mt-5 p-2" style="background-color:#27b0a2;">
    <footer class="footer">
      <p>Sitio construido Global Tech CR &COPY - 2023</p>
    </footer>
  </div>





  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>