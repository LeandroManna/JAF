<?php
include "conexion.php";

$id = $_POST['id'];
$brazo = $_POST['brazo'];
$pecho = $_POST['pecho'];
$abdominal = $_POST['abdominal'];
$pierna = $_POST['pierna'];
$act_cinco = $post['act_cinco'];
$act_seis = $post['act_seis'];
$act_siete = $post['act_siete'];
$act_ocho = $post['act_ocho'];
$act_nueve = $post['act_nueve'];
$act_diez = $post['act_diez'];
$act_once = $post['act_once'];
$act_doce = $post['act_doce'];
$act_trece = $post['act_trece'];
$act_catorce = $post['act_catorce'];
$act_quince = $post['act_quince'];
$act_dieciseis = $post['act_dieciseis'];

$core_uno = $_POST['core_uno'];

// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE activacionmuscular SET brazo=?, pecho=?, abdominal=?, pierna=?, act_cinco=?, act_seis=?, act_siete=?, act_ocho=?, act_nueve=?, act_diez=?, act_once=?, act_doce=?, act_trece=?, act_catorce=?, act_quince=?, act_dieciseis=?, core_uno=?  WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssi", $brazo, $pecho, $abdominal, $pierna, $act_cinco, $act_seis, $act_siete, $act_ocho, $act_nueve, $act_diez, $act_once, $act_doce, $act_trece, $act_catorce, $act_quince, $act_dieciseis, $core_uno, $id);
$stmt->execute();
$stmt->close();
$conn->close();
?>
