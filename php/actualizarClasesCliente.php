<?php
include "conexion.php";

if (isset($_POST['id']) && isset($_POST['clases'])) {
    $id = $_POST['id'];
    $clases = $_POST['clases'];

    // Debug: Verificar los datos recibidos
    echo "ID: " . $id . "<br>";
    echo "Clases: " . $clases . "<br>";

    // Update the "clases" field in the "pagos" table
    $sql = "UPDATE clientes SET clases=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la consulta tuvo éxito
    if (!$stmt) {
        echo "Error en la consulta: " . $conn->error;
        exit;
    }

    $stmt->bind_param("si", $clases, $id);
    $stmt->execute();

    // Verificar si la ejecución de la consulta tuvo éxito
    if ($stmt->affected_rows > 0) {
        echo "Clases actualizadas correctamente";
    } else {
        echo "Error al actualizar las clases: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
