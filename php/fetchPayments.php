<?php
include "conexion.php";

$query = "SELECT * FROM pagos";
$result = mysqli_query($conn, $query);

$payments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $payments[] = $row;
}

mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($payments);
?>
