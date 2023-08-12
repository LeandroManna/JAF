<?php
include "../php/conexion.php";

if (isset($_GET['id'])) {
    $clienteID = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM pagos WHERE id_cliente = '$clienteID' ORDER BY fecha_pago DESC LIMIT 2");

    if (mysqli_num_rows($query) > 0) {
        $ultimoPago = mysqli_fetch_assoc($query);
        
        if ($ultimoPagoDos = mysqli_fetch_assoc($query)) {
            $pago = [
                'disciplina' => $ultimoPago['disciplina'],
                'monto' => $ultimoPago['monto'],
                'fecha_pago' => $ultimoPago['fecha_pago'],
                'fecha_vencimiento' => $ultimoPago['fecha_vencimiento'],

                'disciplina_dos' => $ultimoPagoDos['disciplina_dos'],
                'monto_dos' => $ultimoPagoDos['monto'],
                'fecha_pago_dos' => $ultimoPagoDos['fecha_pago'],
                'fecha_vencimiento_dos' => $ultimoPagoDos['fecha_vencimiento']
            ];
        } else {
            $pago = [
                'disciplina' => $ultimoPago['disciplina'],
                'monto' => $ultimoPago['monto'],
                'fecha_pago' => $ultimoPago['fecha_pago'],
                'fecha_vencimiento' => $ultimoPago['fecha_vencimiento'],

                'disciplina_dos' => null,
                'monto_dos' => null,
                'fecha_pago_dos' => null,
                'fecha_vencimiento_dos' => null
            ];
        }
        
        echo json_encode($pago);
    } else {
        echo json_encode([]);
    }
}

?>
