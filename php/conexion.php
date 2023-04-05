<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gimnasio";

// Crear la conexión
$conn = new mysqli ($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die ("No hay conexion: ".mysqli_connect_error());
}
?>
