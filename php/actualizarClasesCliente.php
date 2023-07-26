<?php
include "conexion.php";

if (isset($_POST['id']) && isset($_POST['clases'])) {
    $id = $_POST['id'];
    $clases = $_POST['clases'];

    // Update the "clases" field in the "pagos" table
    $sql = "UPDATE pagos SET clases=? WHERE id_cliente=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $clases, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
