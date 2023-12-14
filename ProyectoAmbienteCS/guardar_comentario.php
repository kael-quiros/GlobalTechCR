<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "global_tech";

if (isset($_POST['nombre'], $email = $_POST['email'], $_POST['mensaje'])){

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

} else {
    $respuesta = array('status' => 'error', 'message' => 'Error al guardar el comentario');

} 

$consulta->close();
$conexion->close();

} else {
    $respuesta = array('status' => 'error', 'message' => 'Datos incompletos');

} else {
    $respuesta = array('status' => 'error', 'message' => 'Solicitud no válida');
}

header('Content-Type: application/json');
echo json_encode($respuesta);

?>