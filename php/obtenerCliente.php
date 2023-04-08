<?php
include "conexion.php";

// Verificar si se proporcionó un ID de cliente válido
if (isset($_GET['id'])) {

    // Obtener el ID del cliente de la petición AJAX
    $id = $_GET['id'];

    // Obtener los datos del cliente correspondiente al ID de la tabla clientes
    $sql = "SELECT * FROM clientes WHERE id = $id";
    
    $resultado = mysqli_query($conn, $sql);
    $cliente = mysqli_fetch_assoc($resultado);

    // Devolver los datos del cliente en formato JSON
    echo json_encode($cliente);

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}

?>
