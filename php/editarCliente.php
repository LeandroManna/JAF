<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$detalle = $_POST['detalle'];

// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE clientes SET nombre=?, apellido=?, dni=?, fecha_nacimiento=?, celular=?, detalle=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $nombre, $apellido, $dni, $fecha_nacimiento, $celular, $detalle, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>
