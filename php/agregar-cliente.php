<?php
    include "conexion.php";
    // Agregar el código para insertar el nuevo cliente en la base de datos
    if (isset($_POST['submit'])) {
        $disciplina = $_POST['disciplina'];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $celular = $_POST['celular'];
        $detalle = $_POST['detalle'];
        
        
        // Verificar si el cliente ya existe en la base de datos
        $query = mysqli_query($conn, "SELECT * FROM clientes WHERE id='$id'");
        $result = mysqli_fetch_array($query);
        
        if (!$result) {
            // Insertar el nuevo cliente en la base de datos
            $query = mysqli_query($conn, "INSERT INTO clientes (id, nombre, apellido, dni, fecha_nacimiento, celular, detalle, disciplina) 
            VALUES ('$id','$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$celular', '$detalle', '$disciplina')");

            // Ejecutar la consulta
            $resultado = mysqli_query($conn, $query);
            echo "<script>
                window.location.href = 'admin-clientes.php';
              </script>";
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Cliente agregado correctamente!!!',
                    showConfirmButton: false,
                    timer: 2000
                });
              </script>";
            

            // Mostrar un mensaje de éxito si la consulta fue exitosa
            if ($resultado) {
                echo "<script>
                document.getElementById('form-clientes').reset();
                document.getElementById('mensaje-exito').innerHTML = 'Cliente agregado correctamente';
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


<form id="form-clientes" method="POST" class="row border border-2 pt-2 rounded-3">
    <div class="mb-3 col-md-4">
        <label for="disciplina" class="form-label">Disciplina *</label>
        <select class="form-select" name="disciplina" id="disciplina" required>
            <option selected disabled value="">Seleccione...</option>
            <option value="Musculacion">Musculacion</option>
            <option value="Body_Pump">Body Pump</option>
            <option value="body_Combat">Body Combat</option>
            <option value="Funcional">Funcional</option>
            <option value="URKU">URKU</option>
            <option value="Especifico">Especifico</option>
            <option value="Everlast_Boxing">Everlast Boxing</option>
            <option value="Ritmos_Flow">Ritmos Flow</option>
            <option value="Mini_Voley">Mini Voley</option>
            <option value="Taekwondo">Taekwondo</option>
            <option value="Futbol_Infantil">Futbol Infantil</option>
        </select>
    </div>

    <div class="mb-3 col-md-4">
        <label for="id" class="form-label">N° de Socio: *</label>
        <input type="number" class="form-control bg-color" name="id" id="id" placeholder="N° de Socio" >
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
        <label for="celular" class="form-label">Celular *</label>
        <input type="number" class="form-control" name="celular" id="celular" placeholder="Ej. 3885000000">
    </div>
    <div class="mb-3 d-none">
        <label for="detalle" class="form-label">Detalle:</label>
        <textarea class="form-control" name="detalle" id="detalle" rows="3"></textarea>
    </div>
    <div class="d-grid gap-2 my-3">
        <button type="submit" class="btn btn-success" name="submit">Agregar cliente</button>
    </div>
</form>
