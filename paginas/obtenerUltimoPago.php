<?php
include "../php/conexion.php";

if (isset($_GET['id'])) {
    $clienteID = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM pagos WHERE id_cliente = '$clienteID' ORDER BY fecha_pago DESC LIMIT 1");

    if (mysqli_num_rows($query) > 0) {
        $ultimoPago = mysqli_fetch_assoc($query);
        $pago = [
            'monto' => $ultimoPago['monto'],
            'fecha_pago' => $ultimoPago['fecha_pago'],
            'fecha_vencimiento' => $ultimoPago['fecha_vencimiento']
        ];
        echo json_encode($pago);
    } else {
        echo json_encode([]);
    }
}
?>
