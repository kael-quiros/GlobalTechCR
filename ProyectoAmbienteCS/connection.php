<?php 
$servername = "localhost";
$username = "root";
$password = "Esteban051";
$database = "global_tech";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

$title_page = "Global Tech CR";
$title_welcome = "¡Bienvenido a mi Global Tech CR!";