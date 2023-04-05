<?php
    include "conexion.php";
    // Agregar el código para insertar el nuevo cliente en la base de datos
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $celular = $_POST['celular'];
        $detalle = $_POST['detalle'];
        $tabla = $_POST['tabla'];
        
        // Verificar si el cliente ya existe en la base de datos
        $query = mysqli_query($conn, "SELECT * FROM $tabla WHERE dni='$dni'");
        $result = mysqli_fetch_array($query);
        
        if (!$result) {
            // Insertar el nuevo cliente en la base de datos
            $query = mysqli_query($conn, "INSERT INTO $tabla (id, nombre, apellido, dni, fecha_nacimiento, celular, detalle) 
            VALUES ('$id','$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$celular', '$detalle')");
            
            // Ejecutar la consulta
            $resultado = mysqli_query($conn, $query);
        
            // Mostrar un mensaje de éxito si la consulta fue exitosa
            if ($resultado) {
                echo "<script>
                        document.getElementById('form-clientes').reset();
                        document.getElementById('mensaje-exito').innerHTML = 'Nuevo cliente agregado correctamente';
                      </script>";
            }
        } else {
            // Mostrar un mensaje de error si el cliente ya existe en la base de datos
            echo "<script>
                    document.getElementById('mensaje-error').innerHTML = 'El cliente con el DNI $dni ya existe en la base de datos';
                  </script>";
        }
    }
?>


<form id="form-clientes" method="POST" class="row">
    <div class="mb-3 col-md-4">
        <label for="tabla" class="form-label">Disciplina *</label>
        <select class="form-select" name="tabla" id="tabla">
            <option selected disabled value="">Seleccione...</option>
            <option value="clientes">Musculacion</option>
            <option value="body_pump">Body Pump</option>
        </select>
    </div>

    <div class="mb-3 col-md-4">
        <label for="id" class="form-label">N° de Socio: *</label>
        <input type="number" class="form-control bg-color" name="id" id="id" placeholder="N° de Socio" required>
    </div>
    <div class="mb-3 col-md-4">
        <label for="dni" class="form-label">DNI: *</label>
        <input type="number" class="form-control" name="dni" id="dni" placeholder="Ej. 12345678" >
    </div>
    <div class="mb-3 col-md-4">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento *</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" >
    </div>
    <div class="mb-3 col-md-4">
        <label for="apellido" class="form-label">Apellido *</label>
        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" >
    </div>
    <div class="mb-3 col-md-4">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
    </div>
    <div class="mb-3 col-md-4">
      <label for="validationCustom04" class="form-label">Tipos de Entrenamiento *</label>
      <select class="form-select" id="validationCustom04">
        <option selected disabled value="">Seleccione...</option>
        <option id="eBasico" value="eBasico">Entrenamiento basico</option>
        <option id="eIntermedio" value="eIntermedio">Entrenamiento intermedio</option>
        <option id="eAvanzado" value="eAvanzado">Entrenamiento avanzado</option>
      </select>
    </div>
    <div class="mb-3 col-md-4">
        <label for="celular" class="form-label">Celular *</label>
        <input type="number" class="form-control" name="celular" id="celular" placeholder="Ej. 3885000000">
    </div>
    <div class="mb-3">
        <label for="detalle" class="form-label">Detalle:</label>
        <textarea class="form-control" name="detalle" id="detalle" rows="3"></textarea>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success" name="submit">Agregar cliente</button>
    </div>
</form>
