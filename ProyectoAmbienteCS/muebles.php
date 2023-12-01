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
        <div id="logo">
         <img src="/img/logo.png" alt="Logo">
       </div>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >Categorias</a>
              
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="audioYVideo.php"
                  >Audio y Video</a
                >
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="hogar.php">Hogar</a></li>
              <li><hr class="dropdown-divider" /></li>
              
              <li>
                <a class="dropdown-item" href="tecnologia.php">Tecnologia</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
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


      <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="100px">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"></li>
          <li class="list-group-item"></li>
          <li class="list-group-item"></li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
        </div>
      </div>
   
  


  
    
      <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="100px">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"> </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"></li>
          <li class="list-group-item"></li>
          <li class="list-group-item"> </li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
        </div>
      </div>
    
  
  
    
      <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="100px">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"></li>
          <li class="list-group-item"></li>
          <li class="list-group-item"></li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
        </div>
      </div>


</body>
</html>