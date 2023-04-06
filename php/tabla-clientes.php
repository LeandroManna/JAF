<div class=" justify-content-center col-sm-12 col-lg-6 col-xl-6">
    <?php
      include "crearTablaClientes.php";
    ?>
</div>


<!-- Formulario que aparece precargado con datos del cliente seleccionado en la tabla -->
<div class="d-none col-sm-12 col-lg-6 col-xl-6 " id="miDiv">
    <!-- <h2 class="text-center card-subtitle mt-2 text-info py-3">Editar clientes</h2> -->
    <form method="post" name="editClient" id="formulario" class=" row ">
        
        <div class="mb-1 col-md-6">
            <label for="id" class="form-label">N° de Socio</label>
            <input type="number" class="form-control" name="id" id="id" placeholder="N° de Socio" readonly disabled>
        </div>

        <div class="mb-1 col-md-6">
            <label for="disciplina" class="form-label">Disciplina</label>
            <input type="text" class="form-control" name="disciplina" id="inputDisciplina" value="<?php echo "" . $fila['tipo'] . "."; ?>" readonly disabled>
        </div>

        <div class="mb-1 col-md-6">
            <label for="dni" class="form-label">DNI:</label>
            <input type="number" class="form-control" name="dni" id="dni" placeholder="Ej. 12345678" readonly disabled>
        </div>
        <div class="mb-1 col-md-6">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" readonly disabled>
        </div>
        <div class="mb-1 col-md-6">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" readonly disabled >
        </div>
        <div class="mb-1 col-md-6">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" >
        </div>
        <div class="mb-1 col-md-6">
          <label for="validationCustom04" class="form-label">Tipos de Entrenamiento</label>
          <select class="form-select" id="validationCustom04">
            <option selected disabled value="">Seleccione...</option>
            <option id="eBasico" value="eBasico">Entrenamiento basico</option>
            <option id="eIntermedio" value="eIntermedio">Entrenamiento intermedio</option>
            <option id="eAvanzado" value="eAvanzado">Entrenamiento avanzado</option>
          </select>
        </div>
        <div class="mb-1 col-md-6">
            <label for="celular" class="form-label">Celular:</label>
            <input type="number" class="form-control" name="celular" id="celular" >
        </div>
        <div class="mb-1">
            <label for="detalle" class="form-label">Mensaje privado:</label>
            <textarea class="form-control" name="detalle" id="detalle" rows="3" autofocus></textarea>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success" id="editarCliente">Editar cliente</button>
        </div>
    </form>
</div>


<script src="../javascript/eliminarCliente.js"></script>
<script src="../javascript/btnEditarGuardar.js"></script>
