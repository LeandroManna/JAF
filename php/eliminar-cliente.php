<?php
include "conexion.php";

// Verifica que se haya proporcionado un ID de cliente
if (isset($_POST["cliente_id"])) {
    $clienteID = $_POST["cliente_id"];
    
    // Obtener el tipo de cliente y eliminarlo de la tabla de clientes
    $sql = "SELECT id FROM clientes WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $clienteID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    if ($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $clienteID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        mysqli_close($conn);
        
        // Devuelve una respuesta de éxito al cliente
        /* echo "Cliente eliminado correctamente"; */
    } else {
        // Si no se encontró un cliente con el ID proporcionado, devuelve un error
        header("HTTP/1.1 400 Bad Request");
        echo "No se encontró un cliente con el ID proporcionado";
    }
} else {
    // Si no se proporcionó un ID de cliente, devuelve un error
    header("HTTP/1.1 400 Bad Request");
    echo "No se proporcionó un ID de cliente";
}
?>
