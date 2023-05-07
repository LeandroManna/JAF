<?php

if (isset($_POST['submit'])){

    include "conexion.php";

    // Obtener los valores de los campos de entrada
    $username = $_POST["username"];

    // Realizar la consulta a la base de datos utilizando una sentencia preparada
    $stmt = mysqli_prepare($conn, "SELECT * FROM clientes WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $clientes = mysqli_stmt_get_result($stmt);

    $num_rows = mysqli_num_rows($clientes);

    if ($num_rows > 0) {
        // Obtener el nombre del cliente
        $cliente = mysqli_fetch_assoc($clientes);
        $nombre_cliente = $cliente['nombre'];
        $detalle_cliente = $cliente['detalle'];
        $disciplina_cliente = $cliente['disciplina'];
        
        // Almacenamiento del nombre del cliente en una variable de sesión
        $_SESSION['nombre'] = $nombre_cliente;
        $_SESSION['detalle'] = $detalle_cliente;
        
        // Redireccionar con el numero de socio
        if ($cliente) {
            header("Location: confirmar-presencia.php");
            exit;
        }
    }
}
?>