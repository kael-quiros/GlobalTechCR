<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_al_carrito'])) {
    if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        $product_details = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price
        ];

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        $_SESSION['carrito'][] = $product_details;

        if (isset($_POST['page'])) {
            $page = $_POST['page'];
            header("Location: $page.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos del carrito</title>
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
  
            <?php
            
          // Definición de la función obtenerImagen($nombre)
          function obtenerImagen($nombre)
          {
              // Implementación de la función obtenerImagen()
              $extensiones = ['jpg', 'jpeg', 'png', 'gif']; // Agrega aquí las extensiones adicionales que puedas tener

              foreach ($extensiones as $extension) {
                  $rutaImagen = 'img/' . str_replace(' ', '', $nombre) . '.' . $extension;
                  if (file_exists($rutaImagen)) {
                      return $rutaImagen;
                  }
              }

              return null; // Si no se encuentra ninguna imagen con ninguna extensión conocida
          }

          // Verificar y mostrar el carrito de compras
          if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
              ?>
              <div class="container">
                  <div class="row text-center py-5">
                      <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
                          <div class="card-body">
                              <h2>Detalles del carrito:</h2>
                              <ul>
                                  <?php
                                  $total = 0.00;
                                  foreach ($_SESSION['carrito'] as $key => $producto) {
                                      if (is_array($producto) && isset($producto['name']) && isset($producto['price'])) {
                                          $nombre = $producto['name'];
                                          $precio = $producto['price'];
                                          $total += $precio;

                                          $imagen = obtenerImagen($nombre);
                                          if ($imagen !== null) {
                                              echo '<li>' . $nombre . ' - $' . $precio . '</li>';
                                              echo '<img src="' . $imagen . '" width="100" height="100" />';
                                              echo '<form>';
                                              echo '<button class="eliminarProducto" data-producto="' . $nombre . '">Eliminar</button>';
                                              echo '</form>';
                                              echo '</li>';
                                          }
                                      }
                                  }
                                  ?>
                              </ul>
                              <h3>Total a pagar: $<?php echo number_format($total, 2); ?></h3>
                          </div>
                      </div>
                  </div>
              </div>
              <?php
          } else {
              echo '<div class="container"><p>No hay productos en el carrito.</p></div>';
          }
          ?>
                      </div>
                  </div>
              </div>
          </div>
        

  


  <div class="text-black mt-5 p-2" style="background-color:#27b0a2;">
    <footer class="footer">
      <p>Sitio construido Global Tech CR &COPY - 2023</p>
    </footer>
  </div>



  <script src="js/eliminar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

