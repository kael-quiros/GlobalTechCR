<?php 
$servername = "localhost";
$username = "root";
$password = "Esteban051";
$database = "global_tech";

if (isset($_POST['nombre'], $_POST['email'], $_POST['mensaje'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexion fallida:". $conexion->connect_error);
}

$consulta = $conexion->prepare("INSERT INTO comentarios (nombre, email, mensaje) VALUES (?,?,?)");

$consulta->bind_param("sss", $nombre, $email, $mensaje);


if ($consulta->execute()){
    $respuesta = array('status' => 'success', 'message' => 'Comentario ha sido guardado y enviado de forma exitosa');
    header('Location: contactenos.php?enviado=1');
    exit();

} else  {
    $respuesta = array('status' => 'error', 'message' => 'Error al guardar el comentario');
    header('Location: contactenos.php?enviado=0');
    exit();

} 

$consulta->close();
$conexion->close();

}  elseif (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
    $respuesta = array('status' => 'error', 'message' => 'Datos incompletos');
    header('Location: contactenos.php?enviado=0');
    exit();
} else {
    $respuesta = array('status' => 'error', 'message' => 'Solicitud no válida');
    header('Location: contactenos.php?enviado=0');
    exit();
}

header('Content-Type: application/json');
echo json_encode($respuesta);

?>