<?php
// obtenerClientesPorGrupoFamiliar.php

// Incluir el archivo de conexión a la base de datos
include "conexion.php";

// Obtener el ID del cliente que se ha pasado como parámetro en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el grupo_familiar del cliente cuyo ID se ha proporcionado
    $sql = "SELECT grupo_familiar FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($grupo_familiar);
    $stmt->fetch();
    $stmt->close();

    // Si se ha obtenido el grupo_familiar, obtener todos los clientes que pertenecen al mismo grupo_familiar
    if ($grupo_familiar) {
        $sqlClientes = "SELECT * FROM clientes WHERE grupo_familiar = ?";
        $stmtClientes = $conn->prepare($sqlClientes);
        $stmtClientes->bind_param("s", $grupo_familiar);
        $stmtClientes->execute();
        $resultClientes = $stmtClientes->get_result();
        $clientes = array();

        // Recorrer los resultados y almacenarlos en un array
        while ($row = $resultClientes->fetch_assoc()) {
            $clientes[] = $row;
        }

        $stmtClientes->close();
        echo json_encode($clientes); // Devolver los datos en formato JSON
    } else {
        echo "No se encontraron clientes para el grupo familiar proporcionado.";
    }
} else {
    echo "ID del cliente no proporcionado.";
}
?>
