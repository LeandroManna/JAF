<?php
include "../php/conexion.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $monto = $_POST['monto'];
    $disciplina = $_POST['disciplina'];
    $fecha_pago = $_POST['fecha_pago'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $clases = $_POST['clases'];


    // Depurar los valores de $_POST
    //echo "Nombre: " . $nombre . "<br>";
    //echo "Monto: " . $monto . "<br>";

    // Insertar el nuevo pago en la base de datos
    $query = mysqli_query($conn, "INSERT INTO pagos (id_cliente, nombre, apellido, monto, disciplina, fecha_pago, fecha_vencimiento) 
    VALUES ('$id', '$nombre', '$apellido', '$monto', '$disciplina', '$fecha_pago', '$fecha_vencimiento')");

    if ($query) {
        // Mostrar alerta de pago guardado
        echo '<script>Swal.fire("¡Pago guardado!", "El pago se ha guardado correctamente.", "success");</script>';
    } else {
        echo "Error al registrar el pago: " . mysqli_error($conn);
    }
    // Actualizar los datos del cliente en la base de datos
$sql = "UPDATE clientes SET clases=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $clases, $id);
$stmt->execute();
$stmt->close();
$conn->close();
}
?>


<div class=" justify-content-center col-sm-12" id="tabla">
    <h2 class="text-center card-subtitle py-3">Listado de Clientes</h2>
    <?php
      include "crearTablaClientes.php";
    ?>
</div>


<!-- Formulario que aparece precargado con datos del cliente seleccionado en la tabla -->
<div class="d-none col-sm-12" id="miDiv">
    <h2 class="text-center card-subtitle py-3">Editar clientes</h2>
    <form method="post" name="editClient" id="formulario" class="row border border-2 pt-2 rounded-3">
        <div class="mb-1 col-md-2">
            <label for="id" class="form-label">N° de Socio</label>
            <input type="number" class="form-control" name="id" id="id" placeholder="N° de Socio" readonly >
        </div>
        <div class="mb-1 col-md-2">
            <label for="disciplina" class="form-label">Disciplina:</label>
            <input type="text" class="form-control" name="disciplina" id="disciplina" placeholder="Disciplina..." readonly >
        </div>
        <div class="mb-1 col-md-2">
            <label for="dni" class="form-label">DNI:</label>
            <input type="number" class="form-control" name="dni" id="dni" placeholder="Ej. 12345678">
        </div>
        <div class="mb-1 col-md-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
        </div>
        <div class="mb-1 col-md-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
        </div>
        <div class="mb-1 col-md-2">
            <label for="celular" class="form-label">Celular:</label>
            <input type="number" class="form-control" name="celular" id="celular" >
        </div>
        <div class="mb-1 col-md-2">
            <label for="disciplina_dos" class="form-label">Segunda disciplina:</label>
            <input type="text" class="form-control" name="disciplina_dos" id="disciplina_dos" placeholder="Disciplina..." readonly disabled>
        </div>
        <div class="mb-1 col-md-2">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" >
        </div>
        <div class="mb-1 col-md-3">
            <label for="changeDisciplina" class="form-label">Cambiar 1° disciplina:</label>
            <select class="form-select" name="changeDisciplina" id="changeDisciplina" >
                <option selected disabled value="">Seleccione...</option>
                <option value="Musculacion">Musculacion</option>
                <option value="Body_Pump">Body Pump</option>
                <option value="body_Combat">Body Combat</option>
                <option value="Funcional">Funcional</option>
                <option value="URKU">URKU</option>
                <option value="Ritmos_Flow">Ritmos Flow</option>              
                <option value="Especifico">Especifico</option>
                <option value="Everlast_Boxing">Everlast Boxing</option>
                <option value="Mini_Voley">Mini Voley</option>
                <option value="Taekwondo">Taekwondo</option>
                <option value="Futbol_Infantil">Futbol Infantil</option>
            </select>
        </div>
        <div class="mb-1 col-md-3">
            <label for="addDisciplina" class="form-label">Cambiar 2° disciplina:</label>
            <select class="form-select" name="addDisciplina" id="addDisciplina" >
                <option selected disabled value="">Seleccione...</option>
                <option value="Musculacion">Musculacion</option>
                <option value="Body_Pump">Body Pump</option>
                <option value="body_Combat">Body Combat</option>
                <option value="Funcional">Funcional</option>
                <option value="URKU">URKU</option>
                <option value="Ritmos_Flow">Ritmos Flow</option>
                <option value="Especifico">Especifico</option>
                <option value="Everlast_Boxing">Everlast Boxing</option>
                <option value="Mini_Voley">Mini Voley</option>
                <option value="Taekwondo">Taekwondo</option>
                <option value="Futbol_Infantil">Futbol Infantil</option>
            </select>
        </div>
        <div class="mb-1 col-md-1 d-none">
            <label class="form-label" for="flexSwitchCheckDefault">Activo:</label>
            <div class=" form-check form-switch ">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            </div>
        </div>
        <div class="mb-2">
            <label for="detalle" class="form-label">Mensaje privado:</label>
            <textarea class="form-control" name="detalle" id="detalle" rows="3" autofocus></textarea>
        </div>
        <div class="d-flex justify-content-center btn-group my-3" role="group">
            <button type="submit" class="btn btn-success mx-1 rounded-3" id="editarCliente">Editar cliente</button>
            <a href="admin-clientes.php" class="btn btn-info mx-1 rounded-3">Volver</a>
        </div>
        <div class="border-top border-2 pt-2 rounded-3">
            <h2 class="text-center card-subtitle py-2">Generar pago</h2>
            <div class="row">
                <div class="m-1 col-md-2">
                    <label for="clases" class="form-label">Cantidad de clases:</label>
                    <input type="number" class="form-control" name="clases" id="clases" >
                </div>
                <div class="m-1 col-md-2">
                    <label for="monto" class="form-label">Monto *</label>
                    <input type="number" class="form-control" name="monto" placeholder="Monto del pago">
                </div>
                <div class="m-1 col-md-2">
                    <label for="fecha_pago" class="form-label">Fecha de pago *</label>
                    <input type="date" class="form-control" name="fecha_pago" id="fecha_pago" >
                </div>
                <div class="m-1 col-md-2">
                    <label for="fecha_vencimiento" class="form-label">Vencimiento *</label>
                    <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" >
                </div>
            </div>
            <div class="d-flex justify-content-center btn-group my-3">
                <button type="submit" class="btn btn-success mx-1 rounded-3" name="submit">Guardar Pago</button>
                <a href="admin-clientes.php" class="btn btn-info mx-1 rounded-3">Volver</a>
            </div>
        </div>
        
    </form>

    
</div>

<script src="../javascript/eliminarCliente.js"></script>
<script src="../javascript/btnEditarGuardar.js"></script>