<?php
header('Content-Type: application/json');

include "../php/conexion.php";

if (isset($_GET['grupo_familiar'])) {
    $grupoFamiliar = $_GET['grupo_familiar'];

    // Realizar una consulta para obtener los datos de los clientes y sus últimos pagos
    $query = "SELECT c.id, c.nombre, c.apellido, c.disciplina, c.disciplina_dos, c.clases, p.monto, p.fecha_pago, p.fecha_vencimiento, p.tipo_pago 
              FROM clientes c 
              INNER JOIN pagos p ON c.id = p.id_cliente 
              WHERE c.grupo_familiar = ? AND p.fecha_pago = (
                  SELECT MAX(fecha_pago) 
                  FROM pagos 
                  WHERE id_cliente = c.id
              )";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $grupoFamiliar);
    $stmt->execute();
    $result = $stmt->get_result();
    $clientesPagos = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();

    // Devolver los datos en formato JSON
    echo json_encode($clientesPagos);
}
?>
