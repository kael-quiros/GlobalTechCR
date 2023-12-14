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
  </div>
  </nav>
</header>

  <div class="container-form">
    <div class="info-form">
          <h1>Contacto</h1>

          <h2>¡Bienvenido a Global Tech</h2>
          <p>
          En Global Tech, valoramos la comunicación directa con nuestros clientes. Si tienes 
          preguntas, comentarios, o simplemente deseas obtener más información sobre nuestros 
          productos o servicios, no dudes en contactarnos.
          </p>
          <a href="#"> <i class="fa fa-phone">
        </i>2249-5587</a>
        <a href="#"> <i class="fa fa-envelope"></i>
        </i>contactanos@globaltech.com</a>
        <a href="#"> <i class="fa fa-map-marked"></i>
        </i>San José, Costa Rica</a>
        </div>

        <div>
            <form id="formComments" action= "guardar_comentario.php" method="post">
              
              <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" class="campo"></input>
            
              <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico"></input>

              <textarea id="mensaje" name="mensaje" placeholder="Ingresa tu comentario" ></textarea>

              <input type="submit" name="enviar" value="Enviar" class="btn-form">
          </form>
  </div>
  </div>


  <div class="text-black mt-5 p-2" style="background-color:#27b0a2;" >
      <footer class="footer">
        <p>Sitio construido Global Tech CR &COPY - 2023</p>
      </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<script>

/*
//Comentarios de Contactanos
document.addEventListener('DOMContentLoaded', function(){
    var formulario = documento.getElementById('formComments');

    formulario.addEventListener('submit', function(event){
        event.preventDefault();

        var nombre = document.getElementById('nombre').value;
        var email = document.getElementById('email').value;
        var mensaje = document.getElementById('mensaje').value;

    var formData = new FormData();
    formData.append('nombre', nombre); 
    formData.append('email', email);
    formData.append('mensaje', mensaje);


    fetch('guardar_comentaio.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data =>{
        console.log(data);
    })
    .catch(error => {
        console.error('Error: ', error)
      })
    })
}) */

document.addEventListener('DOMContentLoaded', function(){
    var respuesta = {
      "status" : "success",
      "message" : "Comentario ha sido guardado y enviado de forma exitosa"

    };

    function mostraMensaje() {
      alert(respuesta.message);
    }

    if (respuesta.status === 'success') {
      mostrarMensaje();
    }
    });

</script>