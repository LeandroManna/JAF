<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$detalle = $_POST['detalle'];
$disciplina = $_POST['disciplina'];
$disciplina_dos = $_POST['disciplina_dos'];
$clases = $_POST['clases'];

// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE clientes SET nombre=?, apellido=?, dni=?, fecha_nacimiento=?, celular=?, detalle=?, disciplina=?, disciplina_dos=?, clases=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssi", $nombre, $apellido, $dni, $fecha_nacimiento, $celular, $detalle, $disciplina, $disciplina_dos, $clases, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>

