<?php
  include ("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="icon" href="../asets/Img/logo.png" type="image/png">
    <!-- Incluir los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../javascript/Fontawesome.js" crossorigin="anonymous"></script>
    <!-- Librerias para exportar a excel -->
    <script src="../javascript/xlsx.full.min.js"></script>
    <script src="../javascript/FileSaver.min.js"></script>
    <script src="../javascript/tableexport.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="../asets/Img/logo.png" alt="" width="50" height="50">
                <a class="navbar-brand text-center" href="#" id="text-musculacion">Reportes</a>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                  <a class="nav-link " aria-current="page" href="admin-clientes.php">Clientes</a>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reportes
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                      <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
                      <li><a class="nav-link active" href="reportePagos.php">Pagos</a></li>
                    </ul>
                  </li>
                  <a class="nav-link" aria-current="page" href="presente.php" target="_blank">Presente</a>

                  <a class="nav-link" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container my-3">
          <h2 class="text-center card-subtitle text-dark py-3">Reporte de pagos</h2>
          <div class="row my-3 justify-content-center">
            <div class="row col-12">
              <form class="row" id="filtroForm">
                <div class="form-group">
                  <h4 for="filtro" class="form-label">Elegí entre que fechas buscar el reporte <h6>(ambos campos son obligatorios)</h6></h4>
                  <div class="row my-3">
                    <div class="form-group col-4">
                      <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                      <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                    </div>
                    <div class="form-group col-4">
                      <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                      <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                    </div>
                    <div class="form-group col-2">
                      <label class="form-label invisible">Precionar para buscar</label>
                      <button type="button" class="form-control btn btn-primary col-md-4 mx-2" id="btnBuscar">Buscar</button>
                    </div>
                    <div class="form-group col-2">
                      <label class="form-label invisible">Precionar para exportar</label>
                      <button type="button" class="form-control btn btn-success col-md-4 mx-2" id="exportarExcelBtn">Exportar a Excel</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- Tabla de reportes -->
          <div class="container-fluid d-flex justify-content-center">
            <div class="col-md-12 " id="tabla">
            <table class="table table-striped">
              <thead>
              <tr>
                <th colspan="8" id="tituloReporte"></th>
              </tr>
              <tr>
                <th colspan="8"></th>
              </tr>
                <tr>
                  <th>N° de Socio</th>
                  <th>Apellido</th>
                  <th>Nombre</th>
                  <th>Disciplina</th>
                  <th>Disciplina Dos</th>
                  <th>Fecha de pago</th>
                  <th>Transferencia</th>
                  <th>Efectivo</th>
                  <th>Totales</th>
                </tr>
              </thead>
              <tbody id="tablaCuerpo">
                <!-- Se genera de forma dinamica la tabla -->
              </tbody>
            </table>
            </div>
          </div>
        </div>
    </main>

    <footer class="bg-dark text-light p-3 centrado">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <hr>
            <h5>Contacto</h5>
            <hr>
            <p><a href="https://goo.gl/maps/Hq8do2AZd5iJhNqe6" class="text-decoration-none text-light" target="_blank"><i class="fas fa-map-marker-alt"></i> Avda. Dr. Ricardo Balbin 1896, <br> B° Bajo La Viña</a></p>
            <p><a href="http://wa.me/543884751385" class="text-decoration-none text-light" target="_blank"><i class="fab fa-whatsapp"></i> 388 475-1385</a> </p>
            <p><a href="mailto: juanaguirrefitnes@gmail.com" class="text-decoration-none text-light" target="_blank"><i class="far fa-envelope"></i> juanaguirrefitnes@gmail.com</a></p>
          </div>
          <div class="col-md-4">
            <hr>
            <h5 class="">Redes sociales</h5>
            <hr>
            <ul class="list-unstyled d-grid justify-content-center">
              <li><a href="https://www.facebook.com/juanaguirrefitness" class="text-decoration-none d-flex align-items-center text-muted" target="_blank"><i class="fab fa-facebook mx-2"></i>Juan Aguirre Fitness</a></li>
              <li><a href="https://www.instagram.com/juanaguirrefitnes/" class="text-decoration-none d-flex align-items-center text-muted my-3" target="_blank"><i class="fab fa-instagram mx-2"></i>juanaguirrefitnes</a></li>
              <li><a href="https://www.youtube.com/@juanaguirrefitness2127" class="text-decoration-none d-flex align-items-center text-muted" target="_blank"><i class="fab fa-youtube mx-2"></i>Juan Aguirre Fitness</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <hr>
            <h5>Horarios</h5>
            <hr>
            <p>Lunes a Viernes:</p>
            <p>7:00 - 12:00 | 14:00 - 22:00</p>
            <p>Sábado: 9:00 - 12:00</p>
            <p>Domingo: Cerrado</p>
          </div>
        </div>
        <hr>
        <div class="row mt-3">
          <div class="col-md-12 text-center">
            <span class="text-muted">&copy; <strong><span id="currentYear"></span></strong> - Manna Leandro. Todos los derechos reservados.</span>
          </div>
        </div>
      </div>
    </footer>

    
    <script src="../javascript/bootstrap.bundle.min.js"></script>
    <script src="../javascript/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>

    <script src="../javascript/cerrarSesion.js"></script>

    <!-- FILTRO DE PAGOS POR MES Y DIA -->
    <script>
const filtroForm = document.getElementById('filtroForm');
const btnBuscar = document.getElementById('btnBuscar');
const tablaCuerpo = document.getElementById('tablaCuerpo');
const tituloReporte = document.getElementById('tituloReporte'); // Agregado

btnBuscar.addEventListener('click', function () {
    const formData = new FormData(filtroForm);
    const fechaInicio = formData.get('fecha_inicio');
    const fechaFin = formData.get('fecha_fin');

    // Llamada AJAX para obtener los resultados filtrados por fechas
    fetch('../php/filtrar_pagos.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        // Actualiza la tabla con los nuevos datos
        tablaCuerpo.innerHTML = data;
    
        // Cambiar título del reporte según las fechas seleccionadas
        tituloReporte.textContent = `Reporte de Pagos desde ${fechaInicio} hasta ${fechaFin}`;
    })
    .catch(error => {
        console.error('Error al obtener los datos:', error);
    });
});

    </script>

    <!-- Maneja los valores de los input tipo date como valor minimo y valor maximo -->
    <script>
      // Obtén referencias a los elementos de fecha de inicio y fecha de fin
      const fechaInicioInput = document.getElementById("fecha_inicio");
      const fechaFinInput = document.getElementById("fecha_fin");

      // Establece la fecha mínima en el campo de fecha de inicio
      fechaInicioInput.addEventListener("input", function() {
        fechaFinInput.min = fechaInicioInput.value;
      });
    
      // Establece la fecha máxima en el campo de fecha de fin
      fechaFinInput.addEventListener("input", function() {
        fechaInicioInput.max = fechaFinInput.value;
      });
    </script>

    <!-- EXPORTAR A EXCEL -->
    <script>
      /* Exportar tabla a Excel */
      const $btnExportar = document.querySelector("#exportarExcelBtn"),
      $tabla = document.querySelector("#tabla");

      $btnExportar.addEventListener("click", function() {
        let tableExport = new TableExport($tabla, {
            exportButtons: false, // Sin botones
            filename: "Reporte-PagosJAF", //Nombre del archivo de Excel
            sheetname: "Reporte", //Título de la hoja
        });
        let datos = tableExport.getExportData();
        let preferenciasDocumento = datos.tabla.xlsx;
        tableExport.export2file(
          preferenciasDocumento.data, 
          preferenciasDocumento.mimeType, 
          preferenciasDocumento.filename, 
          preferenciasDocumento.fileExtension, 
          preferenciasDocumento.merges, 
          preferenciasDocumento.RTL, 
          preferenciasDocumento.sheetname);
      });
    </script>

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

</body>
</html>