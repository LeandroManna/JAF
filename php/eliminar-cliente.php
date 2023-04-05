<?php
include "conexion.php";

// Verifica que se haya proporcionado un ID de cliente
if (isset($_POST["cliente_id"])) {
    $clienteID = $_POST["cliente_id"];
    
    // Obtener el tipo de cliente y eliminarlo de la tabla correspondiente
    $sql = "SELECT tipo FROM (SELECT id, 'clientes' as tipo FROM clientes UNION ALL SELECT id, 'body_pump' as tipo FROM body_pump) as clientes WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $clienteID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipo);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    if ($tipo == 'clientes') {
        $sql = "DELETE FROM clientes WHERE id = ?";
    } else {
        $sql = "DELETE FROM body_pump WHERE id = ?";
    }
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $clienteID);
    mysqli_stmt_execute($stmt);
    
    // Cierra la declaración preparada y la conexión a la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // Devuelve una respuesta de éxito al cliente
    /* echo "Cliente eliminado correctamente"; */
} else {
    // Si no se proporcionó un ID de cliente, devuelve un error
    header("HTTP/1.1 400 Bad Request");
    echo "No se proporcionó un ID de cliente";
}
?>
