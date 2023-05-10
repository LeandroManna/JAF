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
        $act_cinco = array();
        $act_seis = array();
        $act_siete = array();
        $act_ocho = array();
        $act_nueve = array();
        $act_diez = array();
        $act_once = array();
        $act_doce = array();
        $act_trece = array();
        $act_catorce = array();
        $act_quince = array();
        $act_dieciseis = array();
        $core_uno = array();
        $core_dos = array();
        $core_tres = array();
        $core_cuatro = array();
        $core_cinco = array();
        $core_seis = array();
        $core_siete = array();
        while($fila = mysqli_fetch_assoc($rdo_activacion)) {
            $brazos[] = mysqli_real_escape_string($conn, $fila['brazo']);
            $pechos[] = mysqli_real_escape_string($conn, $fila['pecho']);
            $abdominales[] = mysqli_real_escape_string($conn, $fila['abdominal']);
            $piernas[] = mysqli_real_escape_string($conn, $fila['pierna']);
            $act_cinco[] = mysqli_real_escape_string($conn, $fila['act_cinco']);
            $act_seis[] = mysqli_real_escape_string($conn, $fila['act_seis']);
            $act_siete[] = mysqli_real_escape_string($conn, $fila['act_siete']);
            $act_ocho[] = mysqli_real_escape_string($conn, $fila['act_ocho']);
            $act_nueve[] = mysqli_real_escape_string($conn, $fila['act_nueve']);
            $act_diez[] = mysqli_real_escape_string($conn, $fila['act_diez']);
            $act_once[] = mysqli_real_escape_string($conn, $fila['act_once']);
            $act_doce[] = mysqli_real_escape_string($conn, $fila['act_doce']);
            $act_trece[] = mysqli_real_escape_string($conn, $fila['act_trece']);
            $act_catorce[] = mysqli_real_escape_string($conn, $fila['act_catorce']);
            $act_quince[] = mysqli_real_escape_string($conn, $fila['act_quince']);
            $act_dieciseis[] = mysqli_real_escape_string($conn, $fila['act_dieciseis']);
            $core_uno[] = mysqli_real_escape_string($conn, $fila['core_uno']);
            $core_dos[] = mysqli_real_escape_string($conn, $fila['core_dos']);
            $core_tres[] = mysqli_real_escape_string($conn, $fila['core_tres']);
            $core_cuatro[] = mysqli_real_escape_string($conn, $fila['core_cuatro']);
            $core_cinco[] = mysqli_real_escape_string($conn, $fila['core_cinco']);
            $core_seis[] = mysqli_real_escape_string($conn, $fila['core_seis']);
            $core_siete[] = mysqli_real_escape_string($conn, $fila['core_siete']);
        }
    }
    
?>