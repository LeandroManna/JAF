<?php
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $paymentId = $_GET['id'];

    $query = "DELETE FROM pagos WHERE id = '$paymentId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(array('message' => 'Payment deleted successfully'));
    } else {
        echo json_encode(array('error' => 'Error deleting payment'));
    }
}

mysqli_close($conn);
?>
