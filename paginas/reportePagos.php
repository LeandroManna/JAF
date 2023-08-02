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
            <div class="row col-md-6">
            <form class="row">
                <div class="d-flex justify-content-center my-3">
                    <button type="button" class="btn btn-success col-md-4 mx-2" id="exportarExcelBtn">Exportar a Excel</button>
                </div>
              </form>
            </div>
          </div>

          <!-- Tabla de reportes -->
          <div class="container-fluid d-flex justify-content-center">
            <div class="col-md-9 " id="tabla">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>N° de Socio</th>
                  <th>Apellido</th>
                  <th>Nombre</th>
                  <th>Disciplina</th>
                  <th>Fecha de pago</th>
                  <th>Transferencia</th>
                  <th>Efectivo</th>
                  <th>Totales</th>
                </tr>
              </thead>
              <tbody>
  <?php
    // Obtener el mes y año actual
    $mes_actual = date('m');
    $anio_actual = date('Y');

    // Consulta para obtener las disciplinas existentes
    $sql_disciplinas = "SELECT DISTINCT disciplina FROM pagos ORDER BY disciplina ASC";
    $result_disciplinas = $conn->query($sql_disciplinas);

    $total_general = 0;
    $total_transferencia = 0;
    $total_efectivo = 0;

    if ($result_disciplinas->num_rows > 0) {
      while ($row_disciplina = $result_disciplinas->fetch_assoc()) {
        // Obtener la disciplina actual
        $disciplina_actual = $row_disciplina["disciplina"];

        // Consulta para obtener los pagos realizados dentro del mes en curso para la disciplina actual
        $sql_pagos = "SELECT id_cliente, nombre, apellido, disciplina, fecha_pago, monto, tipo_pago FROM pagos WHERE MONTH(fecha_pago) = $mes_actual AND YEAR(fecha_pago) = $anio_actual AND disciplina = '$disciplina_actual'";
        $result_pagos = $conn->query($sql_pagos);

        $total_disciplina = 0;
        $total_transferencia_disciplina = 0;
        $total_efectivo_disciplina = 0;

        if ($result_pagos->num_rows > 0) {
          while ($row_pago = $result_pagos->fetch_assoc()) {
            // Obtener los valores de cada columna
            $id_cliente = $row_pago["id_cliente"];
            $nombre = $row_pago["nombre"];
            $apellido = $row_pago["apellido"];
            $disciplina = $row_pago["disciplina"];
            $fecha_pago = $row_pago["fecha_pago"];
            $monto = $row_pago["monto"];
            $tipo_pago = $row_pago["tipo_pago"];
            $transferencia = ($tipo_pago === 'Transferencia') ? $monto : 0;
            $efectivo = ($tipo_pago === 'Efectivo') ? $monto : 0;

            // Update total_transferencia_disciplina and total_efectivo_disciplina
            $total_transferencia_disciplina += $transferencia;
            $total_efectivo_disciplina += $efectivo;

            // Mostrar los datos en la tabla
            echo "<tr>";
            echo "<td>$id_cliente</td>";
            echo "<td>$apellido</td>";
            echo "<td>$nombre</td>";
            echo "<td>$disciplina</td>";
            echo "<td>$fecha_pago</td>";
            echo "<td>$transferencia</td>";
            echo "<td>$efectivo</td>";
            echo "</tr>";

            // Sumar el monto por disciplina
            $total_disciplina += $monto;

            // Sumar al total general
            $total_general += $monto;
          }
        }

        // Mostrar el total de la disciplina actual
        echo "<tr>";
        echo "<td><strong>Total Transferencia:</strong></td>";
        echo "<td colspan='4'></td>";
        echo "<td><strong>$total_transferencia_disciplina</strong></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Total Efectivo:</strong></td>";
        echo "<td colspan='5'></td>";
        echo "<td><strong>$total_efectivo_disciplina</strong></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><strong>Total por disciplina:</strong></td>";
        echo "<td colspan='6'></td>";
        echo "<td><strong>$total_disciplina</strong></td>";
        echo "</tr>";

        // Sumar el total_transferencia_disciplina y total_efectivo_disciplina al total general
        $total_transferencia += $total_transferencia_disciplina;
        $total_efectivo += $total_efectivo_disciplina;
      }
    }

    // Mostrar el total general
    echo "<tr>";
    echo "<td><strong>Total Transferencia general:</strong></td>";
    echo "<td colspan='4'></td>";
    echo "<td><strong>$total_transferencia</strong></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td><strong>Total Efectivo general:</strong></td>";
    echo "<td colspan='5'></td>";
    echo "<td><strong>$total_efectivo</strong></td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td><strong>Total general:</strong></td>";
    echo "<td colspan='6'></td>";
    echo "<td><strong>$total_general</strong></td>";
    echo "</tr>";
  ?>
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

    <script>
            /* Exportar tabla a Excel */
            const $btnExportar = document.querySelector("#exportarExcelBtn"),
        $tabla = document.querySelector("#tabla");

      $btnExportar.addEventListener("click", function() {
          let tableExport = new TableExport($tabla, {
              exportButtons: false, // Sin botones
              filename: "JAF-Reporte-Pagos", //Nombre del archivo de Excel
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