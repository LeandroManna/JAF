<div class=" justify-content-center col-sm-12 col-lg-8 col-xl-8" id="tabla">
    <?php
      include "crearTablaClientes.php";
    ?>
</div>


<!-- Formulario que aparece precargado con datos del cliente seleccionado en la tabla -->
<div class="d-none col-sm-12" id="miDiv">
    <!-- <h2 class="text-center card-subtitle mt-2 text-info py-3">Editar clientes</h2> -->
    <form method="post" name="editClient" id="formulario" class="row">
        <div class="mb-1 col-md-2">
            <label for="id" class="form-label">N° de Socio</label>
            <input type="number" class="form-control" name="id" id="id" placeholder="N° de Socio" readonly disabled>
        </div>
        <div class="mb-1 col-md-2">
            <label for="disciplina" class="form-label">Disciplina:</label>
            <input type="text" class="form-control" name="disciplina" id="disciplina" placeholder="Disciplina..." readonly disabled>
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
        <div class="mb-1 col-md-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" >
        </div>
        <div class="mb-1 col-md-3">
          <label for="changeDisciplina" class="form-label">Cambiar disciplina:</label>
            <select class="form-select" name="changeDisciplina" id="changeDisciplina">
              <option selected disabled value="">Seleccione...</option>
              <option value="Musculacion">Musculacion</option>
              <option value="Body_Pump">Body Pump</option>
              <option value="body_Combat">Body Combat</option>
              <option value="Funcional">Funcional</option>
              <option value="Hit">Hit</option>
              <option value="Especifico">Especifico</option>
              <option value="Everlast_Boxing">Everlast Boxing</option>
              <option value="Mini_Voley">Mini Voley</option>
              <option value="Taekwondo">Taekwondo</option>
              <option value="Futbol_Infantil">Futbol Infantil</option>
            </select>
        </div>
        <div class="mb-1 col-md-3">
          <label for="addDisciplina" class="form-label">Agregar disciplina:</label>
            <select class="form-select" name="addDisciplina" id="addDisciplina">
              <option selected disabled value="">Seleccione...</option>
              <option value="Musculacion">Musculacion</option>
              <option value="Body_Pump">Body Pump</option>
              <option value="body_Combat">Body Combat</option>
              <option value="Funcional">Funcional</option>
              <option value="Hit">Hit</option>
              <option value="Especifico">Especifico</option>
              <option value="Everlast_Boxing">Everlast Boxing</option>
              <option value="Mini_Voley">Mini Voley</option>
              <option value="Taekwondo">Taekwondo</option>
              <option value="Futbol_Infantil">Futbol Infantil</option>
            </select>
        </div>
        <div class="mb-1 col-md-1">
            <label class="form-label" for="flexSwitchCheckDefault">Activo:</label>
            <div class=" form-check form-switch ">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            </div>
        </div>
        
        <div class="mb-1">
            <label for="detalle" class="form-label">Mensaje privado:</label>
            <textarea class="form-control" name="detalle" id="detalle" rows="3" autofocus></textarea>
        </div>
        <div class="d-flex justify-content-center btn-group" role="group">
            <button type="submit" class="btn btn-success mx-1" id="editarCliente">Editar cliente</button>
            <button type="submit" class="btn btn-info mx-1" id="">Presente</button>
        </div>
    </form>
</div>


<script src="../javascript/eliminarCliente.js"></script>
<script src="../javascript/btnEditarGuardar.js"></script>
