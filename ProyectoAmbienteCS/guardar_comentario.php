<?php 
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "Esteban051";
$database = "global_tech";

// Verificar si se enviaron los datos del formulario (nombre, email, mensaje)
if (isset($_POST['nombre'], $_POST['email'], $_POST['mensaje'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Establecer conexión con la base de datos
    $conexion = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Conexion fallida:". $conexion->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla 'comentarios'
    $consulta = $conexion->prepare("INSERT INTO comentarios (nombre, email, mensaje) VALUES (?,?,?)");

    // Vincular los parámetros a la consulta preparada
    $consulta->bind_param("sss", $nombre, $email, $mensaje);

    // Ejecutar la consulta preparada
    if ($consulta->execute()) {
        // Si la inserción fue exitosa, redirigir a 'contactenos.php' con un parámetro 'enviado=1' (éxito)
        header('Location: contactenos.php?enviado=1');
        exit();
    } else {
        // Si hubo un error en la inserción, redirigir a 'contactenos.php' con un parámetro 'enviado=0' (error)
        header('Location: contactenos.php?enviado=0');
        exit();
    } 

    // Cerrar la consulta y la conexión
    $consulta->close();
    $conexion->close();

} elseif (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
    // Si alguno de los campos está vacío, redirigir a 'contactenos.php' con un parámetro 'enviado=0' (error por datos incompletos)
    header('Location: contactenos.php?enviado=0');
    exit();
} else {
    // Si la solicitud no es válida, redirigir a 'contactenos.php' con un parámetro 'enviado=0' (error por solicitud no válida)
    header('Location: contactenos.php?enviado=0');
    exit();
}

// Si se llega a este punto, se devuelve una respuesta JSON con la información de la operación
$respuesta = array('status' => 'error', 'message' => 'Solicitud no válida');
header('Content-Type: application/json');
echo json_encode($respuesta);
?>
