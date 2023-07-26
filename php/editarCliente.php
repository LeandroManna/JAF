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
$grupoFamiliar = $_POST['grupo_familiar'];

// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE clientes SET nombre=?, apellido=?, dni=?, fecha_nacimiento=?, celular=?, detalle=?, disciplina=?, disciplina_dos=?, clases=?, grupo_familiar=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssi", $nombre, $apellido, $dni, $fecha_nacimiento, $celular, $detalle, $disciplina, $disciplina_dos, $clases, $grupoFamiliar, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>

