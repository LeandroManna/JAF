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
                      <li><a class="nav-link active" href="reporteClientes.php">Clientes</a></li>
                      <li><a class="nav-link" href="reportePagos.php">Pagos</a></li>
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
          <h2 class="text-center card-subtitle text-dark py-3">Reportes de clientes</h2>
          <div class="row my-3 justify-content-center">
            <div class="row col-md-6">
              <form class="row">
                <div class="form-group">
                  <label for="disciplina">Disciplina:</label>
                  <select class="form-control" id="disciplina">
                    <option value="todas">-- Todas las disciplinas --</option>
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
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary col-md-4" id="buscarBtn">Buscar</button>
                    <button type="button" class="btn btn-success col-md-4 mx-2" id="exportarExcelBtn">Exportar a Excel</button>
                </div>
              </form>
            </div>
          </div>

          <!-- Tabla de reportes -->
          <div class="d-flex justify-content-center">
            <div class="col-md-9" id="tabla">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Disciplina</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Celular</th>
                  </tr>
                </thead>
                <tbody id="tablaClientes">
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
      /* Dar funcion al boton de busqueda */
      $("#buscarBtn").click(function(e){
        e.preventDefault();
        cargarClientesFiltrados();
      });

      /* Mostrar los clientes filtrados en la tabala */
      function cargarClientesFiltrados() {
        var disciplina = $("#disciplina").val();

        $.ajax({
          url: "../php/obtenerClientesTot.php",
          type: "POST",
          data: { disciplina: disciplina},
          dataType: "json",
          success: function(data) {
            // Limpiar la tabla de clientes
            $("#tablaClientes").empty(); 

            // Filtrar los clientes según la disciplina seleccionada
            if (disciplina !== "todas") {
              data = data.filter(function(cliente) {
                return cliente.disciplina === disciplina;
              });
            }

            // Agregar los clientes filtrados a la tabla
            data.forEach(function(cliente) {
              $("#tablaClientes").append(`
                <tr>
                  <td>${cliente.id}</td>
                  <td>${cliente.disciplina}</td>
                  <td>${cliente.nombre}</td>
                  <td>${cliente.apellido}</td>
                  <td>${cliente.fecha_nacimiento}</td>
                  <td>${cliente.celular}</td>
                </tr>
              `);
            });
          },
          error: function(error) {
            console.log(error);
          }
        });
      }

      /* Exportar tabla a Excel */
      const $btnExportar = document.querySelector("#exportarExcelBtn"),
        $tabla = document.querySelector("#tabla");

      $btnExportar.addEventListener("click", function() {
          let tableExport = new TableExport($tabla, {
              exportButtons: false, // Sin botones
              filename: "JAF-Reporte", //Nombre del archivo de Excel
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


      <?php
        /*
        // Estas son dos librerias pora poder exportar a un pdf
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script> -->
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js" integrity="sha512-sk0cNQsixYVuaLJRG0a/KRJo9KBkwTDqr+/V94YrifZ6qi8+OO3iJEoHi0LvcTVv1HaBbbIvpx+MCjOuLVnwKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
      
        //Exportar tabla a PDF
        function exportarTablaAPdf() {
          // Obtener la tabla y el botón de exportar
          var tabla = document.getElementById('tabla');
          var btnExportarPdf = document.getElementById('exportarPdfBtn');
        
          // Agregar evento click al botón
          btnExportarPdf.addEventListener("click", function() {
            // Capturar la tabla con html2canvas
            html2canvas(tabla, {
              height: tabla.offsetHeight,
              width: tabla.offsetWidth
            }).then(function(canvas) {
              // Generar el PDF a partir del canvas
              var imgData = canvas.toDataURL("image/png");
              var aspectRatio = canvas.width / canvas.height;
              var pdfWidth = 504; // 5 pulgadas
              var pdfHeight = pdfWidth / aspectRatio;
              var doc = new jsPDF('p', 'pt');
              var xPosition = (pdfWidth - canvas.width * pdfHeight / canvas.height) / 2;
              doc.internal.pageSize = {width: pdfWidth, height: pdfHeight};
              doc.addImage(imgData, 'PNG', xPosition, 0, canvas.width * pdfHeight / canvas.height, pdfHeight);
            
              // Agregar páginas adicionales si es necesario
              var currentPage = 1;
              var imgHeightLeft = canvas.height - pdfHeight;
              while (imgHeightLeft > 0) {
                doc.addPage();
                var pageHeight = pdfHeight - 10;
                doc.addImage(imgData, 'PNG', xPosition, -currentPage * pageHeight, canvas.width * pdfHeight / canvas.height, pdfHeight);
                imgHeightLeft -= pageHeight;
                currentPage++;
              }
            
              var text = "";
              var fontSize = 12;
              var yPos = 50;
              var textWidth = doc.getStringUnitWidth(text) * fontSize / doc.internal.scaleFactor;
              var textOffset = (pdfWidth - textWidth) / 2;
              doc.setFontSize(fontSize);
              doc.text(textOffset, yPos, text);
              doc.save("reporte.pdf");
            });
          });
        }
        // Llamar a la función de exportar tabla a PDF al cargar la página
        window.onload = function() {
          exportarTablaAPdf();
        }; 
        */
      ?>
    </script>

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

</body>
</html>