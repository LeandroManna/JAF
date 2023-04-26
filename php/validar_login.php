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

    $stmt2 = mysqli_prepare($conn, "SELECT * FROM administradores WHERE dni = ?");
    mysqli_stmt_bind_param($stmt2, "s", $username);
    mysqli_stmt_execute($stmt2);
    $administradores = mysqli_stmt_get_result($stmt2);

    $num_rows = mysqli_num_rows($clientes);
    $num_rows2 = mysqli_num_rows($administradores);

    if ($num_rows > 0) {
        // Obtener el nombre del cliente
        $cliente = mysqli_fetch_assoc($clientes);
        $nombre_cliente = $cliente['nombre'];
        $detalle_cliente = $cliente['detalle'];
        $disciplina_cliente = $cliente['disciplina'];
        
        // Almacenamiento del nombre del cliente en una variable de sesión
        $_SESSION['nombre'] = $nombre_cliente;
        $_SESSION['detalle'] = $detalle_cliente;
        
        // Redireccionar según la disciplina
        if ($disciplina_cliente == "Musculacion") {
            header("Location: clientes.php");
        } elseif ($disciplina_cliente == "Especifico") {
            header("Location: especifico.php");
        } elseif ($disciplina_cliente == "Mini_Voley") {
            header("Location: mini-voley.php");
        } elseif ($disciplina_cliente == "Funcional") {
            header("Location: funcional.php");
        }
    }
    else {
        // Si los datos no son válidos, mostrar un mensaje de error
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'No se encontro un socio con ese número!!!',
            showConfirmButton: false,
            timer: 2000
          });</script>";
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
        echo "Socio o disciplina desconocida";
    }
}

?>