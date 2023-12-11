<?php

include("connection.php");

session_start();

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
              <li><a class="dropdown-item" href="#">Por añadir</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactenos.php">Contactenos</a>
          </li>
        </ul>
        <a href="shoppingCart.php" class="navbar-brand"><h3 class="px-5"><i class="fas fa-shopping-basket"></i>Shopping Cart</h3></a>



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


      </div>

    </nav>
  </header>


  <div class="image-container">
    <img src="img/AYV.jpg" height="100px">
  </div>

  <div class="container">
    <div class="row text-center py-5">
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto1</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto2</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto3</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto4</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto5</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
        <form action="audioYVideo.php" method="post">
          <div class="card shadow">
            <div>
              <img src="img/barraSonidoSony.jpg" alt="Image1" class="img-fluid card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title">Producto6</h5>
              <h6>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </h6>
              <p class="card-text">
                Breve descripcion del producto
              </p>
              <h5>
                <small><s class="text-secondary">$599</s></small>
                <span class="precio">$519</span>
              </h5>
              <button type="submit" class="btn btn-warning my-3" name="btn-agregar">Agregar al carrito<i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </form>
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