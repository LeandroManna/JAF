<?php
include("conexion.php");

// Establecer la zona horaria a Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener el valor del filtro enviado por el formulario
$filtro = $_POST['filtro'];

// Obtener la fecha actual
$fecha_actual = date('Y-m-d');

// Obtener la fecha del mes anterior
$fecha_mes_anterior = date('Y-m-d', strtotime('-1 month'));

// Consulta para obtener los pagos según el filtro seleccionado
if ($filtro === 'mes_actual') {
    $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, disciplina_dos, fecha_pago, monto, tipo_pago, CONCAT_WS(' / ', disciplina, disciplina_dos) AS disciplinas_combinadas FROM pagos WHERE MONTH(fecha_pago) = MONTH('$fecha_actual') AND YEAR(fecha_pago) = YEAR('$fecha_actual') ORDER BY disciplinas_combinadas";
} elseif ($filtro === 'mes_anterior') {
    $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, disciplina_dos, fecha_pago, monto, tipo_pago, CONCAT_WS(' / ', disciplina, disciplina_dos) AS disciplinas_combinadas FROM pagos WHERE MONTH(fecha_pago) = MONTH('$fecha_mes_anterior') AND YEAR(fecha_pago) = YEAR('$fecha_mes_anterior') ORDER BY disciplinas_combinadas"; // Consulta para el mes anterior
} elseif ($filtro === 'dia') {
    $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, disciplina_dos, fecha_pago, monto, tipo_pago, CONCAT_WS(' / ', disciplina, disciplina_dos) AS disciplinas_combinadas FROM pagos WHERE DATE(fecha_pago) = '$fecha_actual' ORDER BY disciplinas_combinadas";
} else {
    // Maneja un caso de filtro no válido si es necesario
    echo "Filtro no válido";
    exit;
}

$result_pagos = $conn->query($sql_pagos);

$total_general = 0;
$total_transferencia = 0;
$total_efectivo = 0;

$disciplinas = array();

if ($result_pagos->num_rows > 0) {
    while ($row_pago = $result_pagos->fetch_assoc()) {
        $disciplinas_combinadas = $row_pago["disciplinas_combinadas"];

        // Update total_transferencia_disciplina and total_efectivo_disciplina
        $transferencia = ($row_pago["tipo_pago"] === 'Transferencia') ? $row_pago["monto"] : 0;
        $efectivo = ($row_pago["tipo_pago"] === 'Efectivo') ? $row_pago["monto"] : 0;

        if (!isset($disciplinas[$disciplinas_combinadas])) {
            $disciplinas[$disciplinas_combinadas] = array(
                'total_transferencia' => 0,
                'total_efectivo' => 0,
                'total_disciplina' => 0,
                'pagos' => array()
            );
        }

        $disciplinas[$disciplinas_combinadas]['total_transferencia'] += $transferencia;
        $disciplinas[$disciplinas_combinadas]['total_efectivo'] += $efectivo;
        $disciplinas[$disciplinas_combinadas]['total_disciplina'] += $row_pago["monto"];

        $disciplinas[$disciplinas_combinadas]['pagos'][] = $row_pago;
        $total_general += $row_pago["monto"];
    }
}

foreach ($disciplinas as $disciplina_combinada => $info) {
    echo "<tr>";
    echo "<td colspan='9' style='text-align: center;'><h5>Disciplina: $disciplina_combinada</h5></td>";
    echo "</tr>";

    foreach ($info['pagos'] as $pago) {
        echo "<tr>";
        echo "<td>{$pago['id_cliente']}</td>";
        echo "<td>{$pago['apellido']}</td>";
        echo "<td>{$pago['nombre']}</td>";
        echo "<td>{$pago['disciplina']}</td>";
        echo "<td>{$pago['disciplina_dos']}</td>";
        echo "<td>{$pago['fecha_pago']}</td>";
        
        // Mostrar el monto por transferencia y efectivo
        $transferencia = ($pago['tipo_pago'] === 'Transferencia') ? $pago['monto'] : '';
        $efectivo = ($pago['tipo_pago'] === 'Efectivo') ? $pago['monto'] : '';
        
        echo "<td>$transferencia</td>";
        echo "<td>$efectivo</td>";
        echo "</tr>";
    }
    

    echo "<tr>";
    echo "<td><strong>Total Transferencia:</strong></td>";
    echo "<td colspan='5'></td>";
    echo "<td><strong>{$info['total_transferencia']}</strong></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td><strong>Total Efectivo:</strong></td>";
    echo "<td colspan='6'></td>";
    echo "<td><strong>{$info['total_efectivo']}</strong></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td><strong>Total por disciplina:</strong></td>";
    echo "<td colspan='7'></td>";
    echo "<td><strong>{$info['total_disciplina']}</strong></td>";
    echo "</tr>";

    $total_transferencia += $info['total_transferencia'];
    $total_efectivo += $info['total_efectivo'];
}

echo "<tr>";
echo "<td><strong>Total Transferencia general:</strong></td>";
echo "<td colspan='5'></td>";
echo "<td><strong>$total_transferencia</strong></td>";
echo "</tr>";

echo "<tr>";
echo "<td><strong>Total Efectivo general:</strong></td>";
echo "<td colspan='6'></td>";
echo "<td><strong>$total_efectivo</strong></td>";
echo "</tr>";

echo "<tr>";
echo "<td><strong>Total general:</strong></td>";
echo "<td colspan='7'></td>";
echo "<td><strong>$total_general</strong></td>";
echo "</tr>";
?>

