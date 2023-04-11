
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
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
                <a class="navbar-brand text-center" href="#" id="text-musculacion">Pagos</a>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                  <a class="nav-link " aria-current="page" href="admin-clientes.php">Clientes</a>
                  <a class="nav-link active" aria-current="page" href="pagos.php">Pagos</a>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reportes
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                      <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
                      <li><a class="nav-link" href="reportePagos.html">Pagos</a></li>
                    </ul>
                  </li>
                  
                  <a class="nav-link" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container my-3">
            <h5 class="text-center mb-5">Pagina de Pagos</h5>
            <!-- Datos del cliente buscado -->
            <form action='' method='GET' name="buscar">
              <div class='input-group mb-3'>
                <input type='text' name='buscar' class='form-control form-control-sm' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2' value=''>
                <div class='input-group-append'>
                  <button class='btn btn-outline-secondary' name='buscar-btn' type='submit'><i class='fa fa-search'></i></button>
                </div>
              </div>
            </form>
            <form action="" method="post">
                <div class="row justify-content-center my-3">
                    <div class="col-12 col-md-2 mb-2">
                        <!-- <label for="id" class="form-label">N° de Socio</label> -->
                        <input type="number" class="form-control" name="id" id="id" placeholder="N° de Socio" readonly disabled>
                    </div>
                    <div class="col-12 col-md-5 mb-2">
                        <!-- <label for="nombre" class="form-label">Nombre:</label> -->
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" readonly disabled>
                    </div>
                    <div class="col-12 col-md-5 ">
                        <!-- <label for="apellido" class="form-label">Apellido:</label> -->
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" readonly disabled>
                    </div>
                </div>
            </form>
            

            <!-- Formulario de pago -->
            <div class="row justify-content-center">
                <form id="formulario-pago" class="">
                    <div class="row">
                    <div class="form-group col-12 col-md-4">
                        <label for="validationCustom04" class="form-label">Disciplina</label>
                        <select class="form-select" id="validationCustom04">
                          <option selected disabled value="">Seleccione...</option>
                          <option id="eBasico" value="eBasico">Musculacion</option>
                          <option id="eIntermedio" value="eIntermedio">Body pump</option>
                          <option id="eAvanzado" value="eAvanzado">Funcional</option>
                          <option id="eAvanzado" value="eAvanzado">Ritmos flow</option>
                          <option id="eAvanzado" value="eAvanzado">Futbol infantil</option>
                          <option id="eAvanzado" value="eAvanzado">Body combat</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4">
                      <label for="validationCustom04" class="form-label">Metodo de pago</label>
                      <select class="form-select" id="validationCustom04">
                        <option selected disabled value="">Seleccione...</option>
                        <option id="eBasico" value="eBasico">Efectivo</option>
                        <option id="eIntermedio" value="eIntermedio">Transferencia</option>
                        <option id="eAvanzado" value="eAvanzado">Debito</option>
                      </select>
                    </div>
                    <div class="form-group col-12 col-md-4">
                      <label class="form-label" for="fecha-pago">Importe abonado:</label>
                      <input type="number" class="form-select" id="fecha-pago" placeholder="$4000">
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="fecha-pago">Fecha de pago</label>
                      <input type="date" class="form-control" id="fecha-pago">
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="fecha-vencimiento">Fecha de vencimiento</label>
                      <input type="date" class="form-control" id="fecha-vencimiento">
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                      <div class="m-3">
                          <button type="submit" id="gPago" class="btn btn-success mt-3">Guardar pago</button>
                      </div>
                      <div class="m-3">
                          <button type="submit" id="cPago" class="btn btn-danger mt-3">Cancelar pago</button>
                      </div>
                    </div>
                    
                </form>
            </div>
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


</body>
</html>