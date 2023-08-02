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
    $tipo_pago = $_POST['tipo_pago'];

    // Insertar el nuevo pago en la base de datos
    $query = mysqli_query($conn, "INSERT INTO pagos (id_cliente, nombre, apellido, monto, disciplina, fecha_pago, fecha_vencimiento, tipo_pago) 
    VALUES ('$id', '$nombre', '$apellido', '$monto', '$disciplina', '$fecha_pago', '$fecha_vencimiento', '$tipo_pago')");

    if ($query) {
        // Mostrar alerta de pago guardado
        echo "El pago se ha guardado correctamente.";
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
                <option value="Eliminar">Eliminar</option>
            </select>
        </div>
        <div class="mb-1 col-md-1 d-none">
            <label class="form-label" for="flexSwitchCheckDefault">Activo:</label>
            <div class=" form-check form-switch ">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            </div>
        </div>
        <div class="mb-1 col-md-2">
            <label for="grupoFamiliar" class="form-label">Grupo familiar:</label>
            <input type="text" class="form-control" name="grupoFamiliar" id="grupoFamiliar" >
        </div>
        <div class="mb-2">
            <label for="detalle" class="form-label">Mensaje privado:</label>
            <textarea class="form-control" name="detalle" id="detalle" rows="3" autofocus></textarea>
        </div>
        <div class="d-flex justify-content-center btn-group my-3" role="group">
            <button type="submit" class="btn btn-success mx-1 rounded-3" id="editarCliente">Editar cliente</button>
            <a href="admin-clientes.php" class="btn btn-info mx-1 rounded-3">Volver</a>
        </div>

        <!-- INICIO SECTOR DE PAGOS -->
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
                <!-- <div class="m-1 col-md-2">
                    <label for="tipo_pago" class="form-label">Forma de pago *</label>
                    <input type="text" class="form-control" name="tipo_pago" id="tipo_pago" >
                </div> -->
                <div class="mb-1 col-md-3">
                    <label for="tipo_pago" class="form-label">Forma de pago:</label>
                    <select class="form-select" name="tipo_pago" id="tipo_pago" >
                        <option selected disabled value="">Seleccione...</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center btn-group my-3">
                <button type="submit" class="btn btn-success mx-1 rounded-3" name="submit">Guardar Pago</button>
                <a href="admin-clientes.php" class="btn btn-info mx-1 rounded-3">Volver</a>
            </div>
        </div>
    </form>
    <!-- MOSTRAR ULTIMO PAGO -->
    <div class="d-flex justify-content-center gap-3 m-3">
        <div class="d-none">
            <img src="../asets/Img/logo.png" alt="Logo de la empresa" id="logoPreload">
        </div>
        <div id="ultimoPago"></div>
        <div>
            <canvas id="pdfCanvas"></canvas>
            <div>
                <button type="button" class="btn btn-info mx-1 rounded-3 d-none" id="descargarPdf">Descargar PDF</button>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center btn-group my-3" role="group">
        <button type="button" class="btn btn-success mx-1 rounded-3" id="generarPDF">Generar Comprobante</button>
    </div>
</div>
<!-- INICIO GRUPO FAMILIAR -->
<div class="d-none col-sm-12" id="gFamiliar">
    <h2 class="text-center card-subtitle py-3">Grupo familiar</h2>
    <!-- Label para mostrar el nombre del grupo familiar -->
    <label id="grupoFamiliarLabel"></label>
    <!-- Input oculto para almacenar el valor del grupo familiar -->
    <input type="hidden" id="grupoFamiliarValue" value="">
    
    <form method="post" name="formFam" id="formFam" class="row pt-2 rounded-3">
        <!-- Aquí se agregarán los campos de cada socio -->
    </form>
        <!-- MOSTRAR ULTIMO PAGO FAMILIAR-->
        <div class="d-flex justify-content-center gap-3 m-3">
            <div class="d-none">
                <img src="../asets/Img/logo.png" alt="Logo de la empresa" id="logoPreload">
            </div>
            <div id="ultimoPagoFamiliar">
            </div>
            <div>
                <canvas id="pdfCanvasFam"></canvas>
                <div>
                    <button type="button" class="btn btn-info mx-1 rounded-3 d-none" id="descargarPdfFam">Descargar PDF</button>
                </div>
            </div>
        </div>
        <!-- Agregar el siguiente evento al botón "Generar Comprobante" en admin-clientes.php -->
        <div class="d-flex justify-content-center btn-group my-3" role="group">
            <button type="button" class="btn btn-success mx-1 rounded-3" id="generarPDFFam">Generar Comprobante</button>
        </div>

</div>

<script src="../javascript/eliminarCliente.js"></script>
<script src="../javascript/btnEditarGuardar.js"></script>
<!-- Incluir pdf.js desde los servidores de Mozilla -->
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script src="../javascript/generarComprobante.js"></script>
<script src="../javascript/generarComprobanteFamiliar.js"></script>

<!-- Script para mostrar el ultimo pago de cada socio -->
<script>
    // Función para cargar el último pago del cliente seleccionado
    function cargarUltimoPago(clienteID) {
        const container = document.getElementById('ultimoPago');
        container.innerHTML = ''; // Limpiar el contenedor antes de cargar los datos

        // Hacer una solicitud AJAX para obtener el último pago del cliente
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                const pago = JSON.parse(this.responseText);

                // Crear elementos HTML para mostrar los datos del último pago
                const titulo = document.createElement('h2');
                titulo.textContent = 'Último pago registrado';

                const monto = document.createElement('p');
                monto.textContent = 'Monto: $' + pago.monto;

                const fecha = document.createElement('p');
                fecha.textContent = 'Fecha de pago: ' + pago.fecha_pago;
                
                const fechaVencimiento = document.createElement('p');
                fechaVencimiento.textContent = 'Fecha de vencimiento: ' + pago.fecha_vencimiento; 

                // Agregar los elementos al contenedor
                container.appendChild(titulo);
                container.appendChild(monto);
                container.appendChild(fecha);
                container.appendChild(fechaVencimiento);
            }
        };
        xhr.open('GET', 'obtenerUltimoPago.php?id=' + clienteID, true);
        xhr.send();
    }

    // Evento para capturar la selección de un cliente en la tabla
    document.addEventListener('DOMContentLoaded', function () {
        const editarBotones = document.querySelectorAll('.editar');
        editarBotones.forEach(function (boton) {
            boton.addEventListener('click', function () {
                const clienteID = this.getAttribute('data-id');
                cargarUltimoPago(clienteID);
            });
        });
    });
</script>

<!-- Script para mostrar el último pago de cada socio del grupo familiar-->
<script>
    function cargarUltimosPagosGrupoFamiliar() {
        // Obtener el valor del grupo familiar desde el contenido del elemento con el id "grupoFamiliarLabel"
        const grupoFamiliarLabel = document.getElementById('grupoFamiliarLabel');
        const grupoFamiliarValue = grupoFamiliarLabel.textContent.replace('Socios pertenecientes al grupo familiar (', '').replace(')', '');

        // Actualizar el valor del input oculto con el valor del grupo familiar
        const grupoFamiliarInput = document.getElementById('grupoFamiliarValue');
        grupoFamiliarInput.value = grupoFamiliarValue;

        const container = document.getElementById('ultimoPagoFamiliar');
        container.innerHTML = ''; // Limpiar el contenedor antes de cargar los datos

        // Hacer una solicitud AJAX para obtener los datos de los clientes y sus últimos pagos
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                const clientesPagos = JSON.parse(this.responseText);

                // Recorrer los datos de los clientes y sus últimos pagos
                clientesPagos.forEach(function (clientePago) {
                    // Crear elementos HTML para mostrar los datos de cada cliente y su último pago
                    const clienteContainer = document.createElement('div');

                    const titulo = document.createElement('h2');
                    titulo.textContent = 'Último pago de ' + clientePago.apellido + ' ' + clientePago.nombre;

                    const monto = document.createElement('p');
                    monto.textContent = 'Monto: $' + clientePago.monto;

                    const fechaPago = document.createElement('p');
                    fechaPago.textContent = 'Fecha de pago: ' + clientePago.fecha_pago;

                    const fechaVencimiento = document.createElement('p');
                    fechaVencimiento.textContent = 'Fecha de vencimiento: ' + clientePago.fecha_vencimiento;

                    const formaPago = document.createElement('p');
                    formaPago.textContent = 'Forma de pago: ' + clientePago.tipo_pago;

                    // Agregar los elementos al contenedor de pagos
                    clienteContainer.appendChild(titulo);
                    clienteContainer.appendChild(monto);
                    clienteContainer.appendChild(fechaPago);
                    clienteContainer.appendChild(fechaVencimiento);
                    clienteContainer.appendChild(formaPago);

                    container.appendChild(clienteContainer);
                });
            }
        };

        // Modificamos la URL de la solicitud AJAX para incluir el parámetro "grupo_familiar"
        xhr.open('GET', `obtenerUltimosPagosGrupoFamiliar.php?grupo_familiar=${encodeURIComponent(grupoFamiliarValue)}`, true);
        xhr.send();
    }

    // Evento para cargar la función "cargarUltimosPagosGrupoFamiliar" cuando el documento se haya cargado
    document.addEventListener('DOMContentLoaded', function() {
        const generarPDFFamButton = document.getElementById('generarPDFFam');
        generarPDFFamButton.addEventListener('click', cargarUltimosPagosGrupoFamiliar);
    });
</script>











