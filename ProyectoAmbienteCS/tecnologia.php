<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
              <li><a class="dropdown-item" href="muebles.php">Muebles</a></li>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <div class="image-container"> 
          <img src="img/Tech.jpg"  height="100px">
        </div>


  

  <div class="container">
    <div class="row text-center">
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card shadow" style="width: 18rem;">
          <img src="img/Samsung S23.jpeg" class="card-img-top" alt="100px">
          <div class="card-body">
            <h5 class="card-title">Celular Samsung S23</h5>
            <p class="card-text">Medido en diagonal, el tamaño de la pantalla del Galaxy S23 es 6.1" en el rectángulo completo y 5.9" teniendo en cuenta las esquinas redondeadas</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">6.1"*</li>
            <li class="list-group-item">2340 x 1080 (pantalla plana FHD+)</li>
            <li class="list-group-item">256 GB</li>
          </ul>
          <div class="row">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Comprar</a>
              <a href="#" class="btn btn-danger">Agregar al carrito</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card shadow" style="width: 18rem;">
          <img src="img/samsung s23+.jpg" class="card-img-top" alt="100px">
          <div class="card-body">
            <h5 class="card-title">Celular Samsung S23+</h5>
            <p class="card-text">El tamaño de la pantalla del Galaxy S23+ es 6.6" en el rectángulo completo y 6.4" con cuentas para las esquinas redondeadas</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">6.6"*</li>
            <li class="list-group-item">2340 x 1080 (pantalla plana FHD+)</li>
            <li class="list-group-item">512 GB</li>
          </ul>
          <div class="row">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Comprar</a>
              <a href="#" class="btn btn-danger">Agregar al carrito</a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card shadow" style="width: 18rem;">
          <img src="img/Samsung S23U.jpg" class="card-img-top" alt="100px">
          <div class="card-body">
            <h5 class="card-title">Celular Samsung S23 Ultra</h5>
            <p class="card-text">Medido en diagonal, el tamaño de la pantalla del Galaxy S23 es 6.1" en el rectángulo completo y 5.9" teniendo en cuenta las esquinas redondeadas</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">6.8"*</li>
            <li class="list-group-item">3088 x 1440 (Edge Quad HD+)</li>
            <li class="list-group-item">1 TB</li>
          </ul>
          <div class="row">
            <div class="card-body">
              <a href="#" class="btn btn-primary">Comprar</a>
              <a href="#" class="btn btn-danger">Agregar al carrito</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="text-black mt-5 p-2" style="background-color:#27b0a2;" >
      <footer class="footer">
        <p>Sitio construido Global Tech CR &COPY - 2023</p>
      </footer>
    </div>


 
</body>

</html>