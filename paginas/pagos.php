
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
                  <a class="nav-link" aria-current="page" href="presente.php" target="_blank">Presente</a>
                  
                  <a class="nav-link" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container my-3">
            <h2 class="text-center card-subtitle text-dark py-3">Registro de Pagos</h2>
            <!-- Datos del cliente buscado -->
            <form action='' method='GET' name="buscar">
              <div class='input-group mb-3'>
                <input type='text' name='buscar' class='form-control form-control-sm' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2' value=''>
                <div class='input-group-append'>
                  <button id="buscar" class='btn btn-outline-secondary' name='buscar-btn' type='submit'><i class='fa fa-search'></i></button>
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
                <form id="formulario-pago" class=" border border-2 pt-2 rounded-3">
                  <div class="row ">
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

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>


</body>
</html>