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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
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
        </div>

      </div>

    </nav>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <div class="image-container">
    <img src="img/Muebles.jpg" height="100px">
  </div>


  <div class="container">
    <div class="row text-center py-5">
      <?php
      // Incluye la conexión a la base de datos
      include("connection.php");

      // para obtener los datos de los productos de la categoría
      $query = "SELECT id, product_name, product_price, product_image, product_description FROM productos WHERE id_categoria = 4";
      $result = mysqli_query($connection, $query);

      if ($result) {
        // Recorre los resultados de la consulta
        while ($row = mysqli_fetch_assoc($result)) {
          $productName = $row['product_name'];
          $productPrice = $row['product_price'];
          $productImage = $row['product_image'];
          $productDescription = $row['product_description'];
      ?>
          <!-- Estructura del producto -->
          <div class="col-sm-12 col-md-4 col-lg-4 my-3 my-md-0">
            <form action="shoppingCart.php" method="post">
              <div>
                <div>
                  <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?>" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $productName; ?></h5>
                 
                  <h6>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                  </h6>
                  <!-- Descripción del producto -->
                  <p class="card-text">
                    <?php echo $productDescription; ?> <!-- Muestra la descripción del producto -->
                  </p>
                  <!-- Precio del producto -->
                  <h5>
                    <small><s class="text-secondary">$599</s></small>
                    <span class="precio">$<?php echo $productPrice; ?></span>
                  </h5>
                  <!-- Campos ocultos para enviar información al carrito de compras -->
                  <input type="hidden" name="page" value="audioYVideo">
                  <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                  <button type="submit" name="agregar_al_carrito">Agregar al carrito</button>
                </div>
              </div>
            </form>
          </div>
      <?php
        }
        // Libera el resultado de la consulta
        mysqli_free_result($result);
      } else {
        // Muestra un mensaje en caso de error en la consulta
        echo "Error: " . mysqli_error($connection);
      }
      // Cierra la conexión a la base de datos
      mysqli_close($connection);
      ?>
    </div>
  </div>



    <div class="text-black mt-5 p-2" style="background-color:#27b0a2;">
      <footer class="footer">
        <p>Sitio construido Global Tech CR &COPY - 2023</p>
      </footer>
    </div>

</body>

</html>