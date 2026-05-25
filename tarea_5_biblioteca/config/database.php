<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "biblioteca";
$port = 3308;

// Crear conexión
$conn = mysqli_connect($host, $user, $password, $database, $port);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>