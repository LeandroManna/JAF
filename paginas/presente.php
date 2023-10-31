


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presente</title>
    <link rel="icon" href="../asets/Img/logo.png" type="image/png">
    <!-- Incluir los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../asets/Img/logo.png" alt="" width="50" height="50">
            <a class="navbar-brand text-center" href="#" id="text-musculacion">Presente</a>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link d-none " aria-current="page" href="admin-clientes.php">Clientes</a>
              <a class="nav-link d-none " aria-current="page" href="pagos.php">Pagos</a>
              <li class="nav-item dropdown d-none">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                  <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                  <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
                  <li><a class="nav-link" href="pagos.php">Pagos</a></li>
                </ul>
              </li>
              <a class="nav-link active" aria-current="page" href="presente.php">Presente</a>
              <a class="nav-link d-none" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    
    <main class="d-flex align-items-center">
      <div class="container my-3 py-4 d-flex justify-content-center">
          <div class="row col-9 justify-content-center rounded py-5 shadow-lg">
            <div class="col-md-6 rounded cuadro-fondo">
              <h2 class="text-center text-blue my-3"><strong>Registra tu presencia</strong></h2>
              <hr style="border: 1px solid #000000;">
              <div class="d-none">
                <video class="w-100 my-2 video-player" controls="controls" >
                  <source src="..\asets\Videos\lv_0_20230331074205.mp4" type="video/mp4" />
                </video>
              </div>
    
              <div class="d-flex justify-content-center">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="mb-3">
                    <h4 for="username" class="form-label"><strong>N° de Socio</strong></h4>
                    <input type="number" class="form-control" name="username" id="username" required autofocus placeholder="N° de Socio">
                  </div>
                  <div class="d-grid gap-2 mb-3">
                    <input type="submit" class="btn btn-primary" value="Registrar presencia" name="submit">
                    <?php
                      include ("../php/validar_presente.php");
                    ?>
                  </div>
                </form>
              </div>
              
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
    <script src="../javascript/cerrarSesion.js"></script>
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>


    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

  </body>
</html>