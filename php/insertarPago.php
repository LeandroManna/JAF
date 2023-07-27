<?php
include "conexion.php";

// Recibir los datos de pagos mediante una petición AJAX
if (isset($_POST['id']) && isset($_POST['monto']) && isset($_POST['fecha_pago']) && isset($_POST['fecha_vencimiento']) && isset($_POST['forma_pago'])) {
    $clienteId = $_POST['id'];
    $monto = $_POST['monto'];
    $fechaPago = $_POST['fecha_pago'];
    $fechaVencimiento = $_POST['fecha_vencimiento'];
    $formaPago = $_POST['forma_pago'];

    // Consulta para obtener los datos del cliente por su ID
    $sql = "SELECT nombre, apellido, disciplina FROM clientes WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error en la consulta: " . $conn->error);
    }
    
    $stmt->bind_param("i", $clienteId);
    $stmt->execute();
    $stmt->bind_result($nombre, $apellido, $disciplina);

    // Verificar si se encontraron resultados
    if ($stmt->fetch()) {
        $stmt->close();

        // Insertar el pago en la tabla pagos
        $sqlInsert = "INSERT INTO pagos (id_cliente, nombre, apellido, monto, disciplina, fecha_pago, fecha_vencimiento, tipo_pago) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        
        if (!$stmtInsert) {
            die("Error en la consulta de inserción: " . $conn->error);
        }

        $stmtInsert->bind_param("isssssss", $clienteId, $nombre, $apellido, $monto, $disciplina, $fechaPago, $fechaVencimiento, $formaPago);
        $stmtInsert->execute();

        // Verificar si el pago se insertó correctamente
        if ($stmtInsert->affected_rows > 0) {
            echo "Pago insertado correctamente";
        } else {
            echo "Error al insertar el pago";
        }

        $stmtInsert->close();
    } else {
        echo "Cliente no encontrado";
    }

    $conn->close();
}
?>
