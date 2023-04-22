<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profes</title>
    <link rel="icon" href="../asets/Img/logo.png" type="image/png">
    <!-- Incluir los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="../asets/Img/logo.png" alt="" width="50" height="50">
                <a class="navbar-brand text-center" href="#" id="text-musculacion">Clientes</a>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                  <a class="nav-link active" aria-current="page" href="admin-clientes.php">Clientes</a>
                  <a class="nav-link" aria-current="page" href="pagos.php">Pagos</a>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reportes
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                      <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
                      <li><a class="nav-link" href="#">Pagos</a></li>
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
        <div class="row justify-content-center">
          <!-- Saludo de bienvenida con datos de la BD -->
          <div class="col-sm-12 py-1" style="text-align: center;">
              <!-- Bienvenida al cliente con su nombre almacenado en la variable de sesión -->
              <?php
                include "../php/conexion.php";
                // Inicio de la sesión
                session_start();
                // Verificación de que el cliente haya iniciado sesión y su nombre esté almacenado en la variable de sesión
                if (!isset($_SESSION['nombre'])) {
                  // Si el nombre del cliente no está almacenado en la variable de sesión, redirige al cliente a la página1.php para iniciar sesión
                  header('Location: login.php');
                  exit();
                }
              ?>
              <h5 class="text-center">Bienvenido(a), 
              <?php echo "" . $_SESSION['nombre'] . "!";?>!
              </h5>
          </div>
          <!-- Contenido gral de la pagina -->
          <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 py-1">
            <!-- Lista de pestañas -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Clientes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Agregar</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Entrenamientos</button>
              </li>
            </ul>
            <!-- Contenido asociado a cada pestaña -->
            <div class="tab-content" id="myTabContent">
              <!-- Tabla de Clientes en pestaña CLIENTES -->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row d-flex justify-content-center">
                  <?php
                    include ("../php/tabla-clientes.php");
                  ?>
                </div>
              </div>
              <!-- Formulario para agregar clientes en la pestaña AGREGAR -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h2 class="text-center card-subtitle text-dark py-3">Agregar clientes</h2>
                <div>
                  <?php
                    include ("../php/agregar-cliente.php");
                  ?>
                </div>
                <!-- <div class="mt-3" id="mensaje-exito"></div> -->
              </div>
              <!-- Formulario de tipos de entrenamiento en pestaña ENTRENAMIENTOS -->
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h2 class="text-center card-subtitle text-dark py-3">Activacion para Musculacion</h2>
                <div class="">
                  <form class="row justify-content-center" method="post">
                    <!-- Menu desplegable de tipos de entrenamiento -->
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                      <label for="validationCustom04" class="form-label">Tipos de Entrenamiento</label>
                      <select class="form-select" id="selectOption" name="tipoEntrenamiento">
                        <option selected disabled value="">Seleccione...</option>
                        <option id="eBasico" value="eBasico">Activar brazos</option>
                        <option id="eIntermedio" value="eIntermedio">Activar pecho</option>
                        <option id="eAvanzado" value="eAvanzado">Activar abdomen</option>
                        <option id="ePiernas" value="ePiernas">Activar piernas</option>
                      </select>
                    </div>
                    <?php
                      include ("../php/activarMusculos.php");
                    ?>
                    <?php
                      // Verificar si se ha enviado el formulario
                      if (isset($_POST['addEnt'])) {
                        // Obtener los datos del formulario
                        $brazo = $_POST['brazo'];
                        $pecho = $_POST['pecho'];
                        $abdominal = $_POST['abdominal'];
                        $pierna = $_POST['pierna'];
                      
                        // Preparar la consulta SQL para actualizar la tabla
                        $sql = "UPDATE activacionmuscular SET brazo='$brazo', pecho='$pecho', abdominal='$abdominal', pierna='$pierna' WHERE id=1";
                      
                        // Ejecutar la consulta SQL y verificar si se ha actualizado la tabla
                        if ($conn->query($sql) === TRUE) {
                          
                            /* echo "Los datos se han actualizado correctamente en la tabla activacion muscular"; */
                        } else {
                            echo "Error al actualizar los datos en la tabla activacion muscular: " . $conn->error;
                        }
                      }
                      mysqli_close($conn);
                    ?>

                    <!-- Checks de entrenamiento Brazos -->
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 form-check my-2" id="entrenamientoBasico">
                      <!-- aca se ejecuta el script mostrarCampo -->
                      <div class="mb-3">
                        <label for="brazo" class="form-label">Activar brazos con...</label>
                        <textarea class="form-control" id="brazo" name="brazo" rows="8"></textarea>
                      </div>
                    </div>
                    
                    <!-- Checks de entrenamiento Pecho -->
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 form-check my-2" id="entrenamientoIntermedio">
                      <!-- aca se ejecuta el script mostrarCampo -->
                      <div class="mb-3">
                        <label for="pecho" class="form-label">Activar pecho con...</label>
                        <textarea class="form-control" id="pecho" name="pecho" rows="8"></textarea>
                      </div>
                    </div>

                    <!-- Checks de entrenamiento Abdomen -->
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 form-check my-2 " id="entrenamientoAvanzado">
                      <!-- aca se ejecuta el script mostrarCampo -->
                      <div class="mb-3">
                        <label for="abdominal" class="form-label">Activar abdominales con...</label>
                        <textarea class="form-control" id="abdominal" name="abdominal" rows="8"></textarea>
                      </div>
                    </div>

                    <!-- Checks de entrenamiento Piernas -->
                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 form-check my-2 " id="entrenamientoPiernas">
                      <!-- aca se ejecuta el script mostrarCampo -->
                      <div class="mb-3">
                        <label for="pierna" class="form-label">Activar piernas con...</label>
                        <textarea class="form-control" id="pierna" name="pierna" rows="8"></textarea>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                      <button type="submit" class="btn btn-success" name="addEnt" id="addEnt" >Agregar entrenamiento</button>
                    </div>
                  </form>
                </div>
              </div>
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
    <script src="../javascript/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>

    <script src="../javascript/cerrarSesion.js"></script>
    <script src="../javascript/mostrarCampo.js"></script>

    <!-- EL SIGUIENTE SCRIPT CARGA LOS DATOS DE LA TABLA
          ACTIVARMUSCULOS EN LOS RESPECTIVOS TEXTAREA -->
    <script>
      const brazos = '<?php echo nl2br(implode('\n', $brazos)); ?>';
      if (document.getElementById('brazo')) {
          document.getElementById('brazo').value += brazos;
      }
      const pechos = '<?php echo nl2br(implode('\n', $pechos)); ?>';
      if (document.getElementById('pecho')) {
          document.getElementById('pecho').value += pechos;
      }
      const abdominales = '<?php echo nl2br(implode('\n', $abdominales)); ?>';
      if (document.getElementById('abdominal')) {
          document.getElementById('abdominal').value += abdominales;
      }
      const piernas = '<?php echo nl2br(implode('\n', $piernas)); ?>';
      if (document.getElementById('pierna')) {
          document.getElementById('pierna').value += piernas;
      }
    </script>

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>



</body>
</html>