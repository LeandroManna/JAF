<?php
    // Conexión a la base de datos
    include "conexion.php"; 

    // Obtener los datos de la tabla 'activacionmuscular'
    $sql = "SELECT * FROM activacionmuscular";
    $rdo_activacion = mysqli_query($conn, $sql);

    if (!$rdo_activacion) {
        echo "Error al ejecutar la consulta SQL: " . mysqli_error($conn);
    }

    // Verificar que se hayan obtenido resultados en ambas consultas
    if (mysqli_num_rows($rdo_activacion) > 0) {
        // Crear un array para almacenar los datos
        $brazos = array();
        $pechos = array();
        $abdominales = array();
        $piernas = array();
        while($fila = mysqli_fetch_assoc($rdo_activacion)) {
            $brazos[] = mysqli_real_escape_string($conn, $fila['brazo']);
            $pechos[] = mysqli_real_escape_string($conn, $fila['pecho']);
            $abdominales[] = mysqli_real_escape_string($conn, $fila['abdominal']);
            $piernas[] = mysqli_real_escape_string($conn, $fila['pierna']);
        }
    }
    
?>