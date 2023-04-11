<?php
include "conexion.php";

// Consulta para obtener todos los socios de la tabla clientes
$sql = "SELECT id, disciplina, nombre, apellido, fecha_nacimiento, dni FROM administradores";

// Si se envió algún filtro por GET, agregar la cláusula WHERE a la consulta
if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
    $sql .= " WHERE disciplina LIKE '%$filtro%'";
}

$resultado = mysqli_query($conn, $sql);
$socios = array();

// Recorrer los resultados y agregar cada socio a un array
while ($fila = mysqli_fetch_assoc($resultado)) {
    $socios[] = $fila;
}

// Devolver el array de socios en formato JSON
echo json_encode($socios);

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
