<?php
include "conexion.php";

$id = $_POST['id'];
$brazo = $_POST['brazo'];
$pecho = $_POST['pecho'];
$abdominal = $_POST['abdominal'];
$pierna = $_POST['pierna'];

// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE activacionmuscular SET brazo=?, pecho=?, abdominal=?, pierna=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $brazo, $pecho, $abdominal, $pierna, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>
