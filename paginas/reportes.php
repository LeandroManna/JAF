
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
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>
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
                  <a class="nav-link " aria-current="page" href="pagos.php">Pagos</a>
                  <a class="nav-link active" aria-current="page" href="reportes.php">Reportes</a>
                  <a class="nav-link" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container my-3">
          <h2 class="text-center">Reporte de clientes</h2>
          <div class="row my-3 justify-content-center">
            <div class="col-md-6">
              <form>
                <div class="form-group">
                  <label for="disciplina">Disciplina:</label>
                  <select class="form-control" id="disciplina">
                    <option value="">-- Todas las disciplinas --</option>
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
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido:</label>
                  <input type="text" class="form-control" id="apellido" placeholder="Ingrese el apellido">
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary ">Buscar</button>
                </div>
              </form>
            </div>
          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Disciplina</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
              </tr>
            </thead>
            <tbody id="tablaClientes">
            </tbody>
          </table>
        </div>
    </main>

    <footer class="bg-dark text-light p-3 centrado ">
        <div class="row">
          <div class="col-md-6">
            <p class="p-footer">Información de contacto</p>
          </div>
          <div class="col-md-6">
            <span class="text-muted">&copy; 2023 - Manna Leandro. Todos los derechos reservados.</span>
          </div>
        </div>
    </footer>

    
    <script src="../javascript/bootstrap.bundle.min.js"></script>
    <script src="../javascript/jquery-3.6.4.min.js"></script>

    <script src="../javascript/cerrarSesion.js"></script>

    <script>
    $(document).ready(function(){
      cargarClientes();

      $("form").submit(function(e){
        e.preventDefault();
        cargarClientes();
      });
    });

    function cargarClientes(){
      var disciplina = $("#disciplina").val();
      var nombre = $("#nombre").val();
      var apellido = $("#apellido").val();

      $.ajax({
        url: "../php/obtenerClientesTot.php",
        type: "GET",
        data: { disciplina: disciplina, nombre: nombre, apellido: apellido },
        dataType: "json", // especificar que se espera recibir datos en formato JSON
        success: function(data){
          var tabla = "";
          if(data.length > 0){
            for(var i=0; i<data.length; i++){
              tabla += "<tr>";
              tabla += "<td>" + data[i].id + "</td>";
              tabla += "<td>" + data[i].disciplina + "</td>";
              tabla += "<td>" + data[i].nombre + "</td>";
              tabla += "<td>" + data[i].apellido + "</td>";
              tabla += "<td>" + data[i].fecha_nacimiento + "</td>";
              tabla += "</tr>";
            }
          } else {
            tabla += "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
          }
          $("#tablaClientes").html(tabla);
        },
        error: function(){
          alert("Error al obtener los clientes.");
        }
      });
    }
  </script>

</body>
</html>