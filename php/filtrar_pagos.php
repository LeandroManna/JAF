<?php
include("conexion.php");

// Establecer la zona horaria a Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener el valor del filtro enviado por el formulario
$filtro = $_POST['filtro'];

// Obtener la fecha actual
$fecha_actual = date('Y-m-d');

// Consulta para obtener las disciplinas existentes
$sql_disciplinas = "SELECT DISTINCT disciplina, disciplina_dos FROM pagos ORDER BY disciplina, disciplina_dos ASC";
$result_disciplinas = $conn->query($sql_disciplinas);

$total_general = 0;
$total_transferencia = 0;
$total_efectivo = 0;

if ($result_disciplinas->num_rows > 0) {
    while ($row_disciplina = $result_disciplinas->fetch_assoc()) {
        // Obtener la disciplina actual
        $disciplina_actual = $row_disciplina["disciplina"];
        $disciplina_actualDos = $row_disciplina["disciplina_dos"];

        // Consulta para obtener los pagos según el filtro seleccionado
        if ($filtro === 'mes') {
            $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, disciplina_dos, fecha_pago, monto, tipo_pago FROM pagos WHERE MONTH(fecha_pago) = MONTH('$fecha_actual') AND YEAR(fecha_pago) = YEAR('$fecha_actual') AND disciplina = '$disciplina_actual' OR disciplina_dos = '$disciplina_actualDos'";
        } elseif ($filtro === 'dia') {
            $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, disciplina_dos, fecha_pago, monto, tipo_pago FROM pagos WHERE DATE(fecha_pago) = '$fecha_actual' AND disciplina = '$disciplina_actual' OR disciplina_dos = '$disciplina_actualDos'";
        } else {
            // Maneja un caso de filtro no válido si es necesario
            echo "Filtro no válido";
            exit;
        }

        $result_pagos = $conn->query($sql_pagos);

        $total_disciplina = 0;
        $total_transferencia_disciplina = 0;
        $total_efectivo_disciplina = 0;

        if ($result_pagos->num_rows > 0) {
            while ($row_pago = $result_pagos->fetch_assoc()) {
                // Obtener los valores de cada columna
                $id_cliente = $row_pago["id_cliente"];
                $nombre = $row_pago["nombre"];
                $apellido = $row_pago["apellido"];
                $disciplina = $row_pago["disciplina"];
                $disciplina_dos = $row_pago["disciplina_dos"];
                $fecha_pago = $row_pago["fecha_pago"];
                $monto = $row_pago["monto"];
                $tipo_pago = $row_pago["tipo_pago"];
                $transferencia = ($tipo_pago === 'Transferencia') ? $monto : 0;
                $efectivo = ($tipo_pago === 'Efectivo') ? $monto : 0;

                // Update total_transferencia_disciplina and total_efectivo_disciplina
                $total_transferencia_disciplina += $transferencia;
                $total_efectivo_disciplina += $efectivo;

                // Mostrar los datos en la tabla
                echo "<tr>";
                echo "<td>$id_cliente</td>";
                echo "<td>$apellido</td>";
                echo "<td>$nombre</td>";
                echo "<td>$disciplina</td>";
                echo "<td>$disciplina_dos</td>";
                echo "<td>$fecha_pago</td>";
                echo "<td>$transferencia</td>";
                echo "<td>$efectivo</td>";
                echo "</tr>";

                // Sumar el monto por disciplina
                $total_disciplina += $monto;

                // Sumar al total general
                $total_general += $monto;
            }
        }

        // Mostrar el total de la disciplina actual
        echo "<tr>";
        echo "<td><strong>Total Transferencia:</strong></td>";
        echo "<td colspan='5'></td>";
        echo "<td><strong>$total_transferencia_disciplina</strong></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Total Efectivo:</strong></td>";
        echo "<td colspan='6'></td>";
        echo "<td><strong>$total_efectivo_disciplina</strong></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Total por disciplina:</strong></td>";
        echo "<td colspan='7'></td>";
        echo "<td><strong>$total_disciplina</strong></td>";
        echo "</tr>";

        // Sumar el total_transferencia_disciplina y total_efectivo_disciplina al total general
        $total_transferencia += $total_transferencia_disciplina;
        $total_efectivo += $total_efectivo_disciplina;
    }
}

// Mostrar el total general
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
