<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    include "conexion.php";

    $username = $_POST["username"];

    $stmt = mysqli_prepare($conn, "SELECT * FROM clientes WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $clientes = mysqli_stmt_get_result($stmt);

    $num_rows = mysqli_num_rows($clientes);

    if ($num_rows > 0) {
        $cliente = mysqli_fetch_assoc($clientes);
        $nombre_cliente = $cliente['nombre'];
        $detalle_cliente = $cliente['detalle'];
        $disciplina_cliente = $cliente['disciplina'];
        $disciplina2_cliente = $cliente['disciplina_dos'];
        $clase_cliente = $cliente['clases'];
        
        $_SESSION['nombre'] = $nombre_cliente;
        $_SESSION['detalle'] = $detalle_cliente;
        $_SESSION['clases'] = $clase_cliente;
        $_SESSION['disciplina'] = $disciplina_cliente;
        $_SESSION['disciplina_dos'] = $disciplina2_cliente;
        
        if ($cliente) {
            header("Location: confirmar-presencia.php");
            exit;
        }
    }
}

if (isset($_POST['clases'])) {
    include "conexion.php";

    $clases_restantes = intval($_POST['clases']);

    // Obtener el nombre de cliente de la variable de sesión
    $nombre_cliente = $_SESSION['nombre'];

    // Actualizar el número de clases en la base de datos
    $stmt = mysqli_prepare($conn, "UPDATE clientes SET clases = ? WHERE nombre = ?");
    mysqli_stmt_bind_param($stmt, "is", $clases_restantes, $nombre_cliente);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['clases'] = $clases_restantes; // Actualizar la variable de sesión
        echo "El número de clases se ha actualizado correctamente en la base de datos.";
    } else {
        echo "Error al actualizar el número de clases en la base de datos: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
}
?>
