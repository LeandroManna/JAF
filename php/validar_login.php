<?php
session_start();

if (isset($_POST['submit'])){

    include "conexion.php";

    // Obtener los valores de los campos de entrada
    $username = $_POST["username"];

    // Realizar la consulta a la base de datos utilizando una sentencia preparada
    $stmt = mysqli_prepare($conn, "SELECT * FROM clientes WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $clientes = mysqli_stmt_get_result($stmt);

    $stmt1 = mysqli_prepare($conn, "SELECT * FROM body_pump WHERE id = ?");
    mysqli_stmt_bind_param($stmt1, "s", $username);
    mysqli_stmt_execute($stmt1);
    $bodyPumps = mysqli_stmt_get_result($stmt1);

    $stmt2 = mysqli_prepare($conn, "SELECT * FROM administradores WHERE dni = ?");
    mysqli_stmt_bind_param($stmt2, "s", $username);
    mysqli_stmt_execute($stmt2);
    $administradores = mysqli_stmt_get_result($stmt2);

    $num_rows = mysqli_num_rows($clientes);
    $num_rows1 = mysqli_num_rows($bodyPumps);
    $num_rows2 = mysqli_num_rows($administradores);

    if ($num_rows > 0) {
        // Obtener el nombre del cliente
        $cliente = mysqli_fetch_assoc($clientes);
        $nombre_cliente = $cliente['nombre'];
        $detalle_cliente = $cliente['detalle'];
        // Almacenamiento del nombre del cliente en una variable de sesión
        $_SESSION['nombre'] = $nombre_cliente;
        $_SESSION['detalle'] = $detalle_cliente;
        // Si los datos son válidos, redirigir a la página "clientes.php"
        header("Location: clientes.php");
        exit;
    } 
    if ($num_rows1 > 0) {
        // Obtener el nombre del cliente
        $bodyPump = mysqli_fetch_assoc($bodyPumps);
        $nombre_bPump = $bodyPump['nombre'];
        $detalle_bPump = $bodyPump['detalle'];
        // Almacenamiento del nombre del cliente en una variable de sesión
        $_SESSION['nombre'] = $nombre_bPump;
        $_SESSION['detalle'] = $detalle_bPump;
        // Si los datos son válidos, redirigir a la página "clientes.php"
        header("Location: bodyPump.php");
        exit;
    } 
    if ($num_rows2 > 0) {
        // Obtener el nombre del Administrador
        $administrador = mysqli_fetch_assoc($administradores);
        $nombre_administrador = $administrador['nombre'];
        // Almacenamiento del nombre del Administrador en una variable de sesión
        $_SESSION['nombre'] = $nombre_administrador;
        // Si los datos son válidos, redirigir a la página "admin-clientes.php"
        header("Location: admin-clientes.php");
        exit;
    } 
    
    else {
        // Si los datos no son válidos, mostrar un mensaje de error
        echo "Nombre de usuario incorrecto";
    }
}

?>