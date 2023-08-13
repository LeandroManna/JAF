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
    $act_cinco = $_POST['actCinco'];
    $act_seis = $_POST['actSeis'];
    $act_siete = $_POST['actSiete'];
    $act_ocho = $_POST['actOcho'];
    $act_nueve = $_POST['actNueve'];
    $act_diez = $_POST['actDiez'];
    $act_once = $_POST['actOnce'];
    $act_doce = $_POST['actDoce'];
    $act_trece = $_POST['actTrece'];
    $act_catorce = $_POST['actCatorce'];
    $act_quince = $_POST['actQuince'];
    $act_dieciseis = $_POST['actDieciseis'];
    $core_uno = $_POST['coreUno'];
    $core_dos = $_POST['coreDos'];
    $core_tres = $_POST['coreTres'];
    $core_cuatro = $_POST['coreCuatro'];
    $core_cinco = $_POST['coreCinco'];
    $core_seis = $_POST['coreSeis'];
    $core_siete = $_POST['coreSiete'];
  
    // Preparar la consulta SQL para actualizar la tabla
    $sql = "UPDATE activacionmuscular SET brazo='$brazo', pecho='$pecho', abdominal='$abdominal', pierna='$pierna', act_cinco='$act_cinco', act_seis='$act_seis', act_siete='$act_siete', act_ocho='$act_ocho', act_nueve='$act_nueve', act_diez='$act_diez', act_once='$act_once', act_doce='$act_doce', act_trece='$act_trece', act_catorce='$act_catorce', act_quince='$act_quince', act_dieciseis='$act_dieciseis', core_uno='$core_uno', core_dos='$core_dos', core_tres='$core_tres', core_cuatro='$core_cuatro', core_cinco='$core_cinco', core_seis='$core_seis', core_siete='$core_siete' WHERE id=1";
  
    // Ejecutar la consulta SQL y verificar si se ha actualizado la tabla
    if ($conn->query($sql) === TRUE) {
      // Redirigir
      header("Location: admin-clientes.php");
      //echo "Los datos se han actualizado correctamente en la tabla activacion muscular"; 
    } else {
        echo "Error al actualizar los datos en la tabla activacion muscular: " . $conn->error;
    }
  }
  mysqli_close($conn);
?>


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

    <!-- Agrega estos enlaces en el <head> de tu archivo HTML -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
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

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Reportes
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                      <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
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
        <div class="row justify-content-center">
          <!-- Saludo de bienvenida con datos de la BD -->
          <div class="col-sm-12 py-1" style="text-align: center;">
            <?php
              include "../php/conexion.php";
              session_start();
          
              if (!isset($_SESSION['nombre'])) {
                header('Location: login.php');
                exit();
              }
            
              // Establecer la zona horaria a Argentina
              date_default_timezone_set('America/Argentina/Buenos_Aires');
            
              // Obtener el nombre del administrador actual
              $nombreAdministrador = $_SESSION['nombre'];
            
              echo '<h5 class="text-center d-none">Bienvenido(a), ' . $nombreAdministrador . '!</h5>';
            
              // Obtener la fecha actual
              $fechaActual = date('Y-m-d');
            
              // Consulta para obtener los clientes que cumplen años en la fecha actual
              $consulta = "SELECT nombre, apellido, celular FROM clientes WHERE DATE_FORMAT(fecha_nacimiento, '%m-%d') = DATE_FORMAT('$fechaActual', '%m-%d')";
              $resultado = mysqli_query($conn, $consulta);
            
              // Verificar si hay clientes que cumplen años hoy
              if (mysqli_num_rows($resultado) > 0) {
                echo '<h3 class="text-center pb-3">Clientes que cumplen años hoy:</h3>';
              
                // Mostrar los nombres, apellidos y números de celular de los clientes que cumplen años hoy
                while ($row = mysqli_fetch_assoc($resultado)) {
                  $celular = $row['celular'];
                  $enlaceWhatsapp = 'https://wa.me/' . '54' . $celular;
                  echo '<p class="pb-2">' . $row['nombre'] . ' ' . $row['apellido'] . ' - Celular: <a href="' . $enlaceWhatsapp . '" target="_BLANC" type="button" class="btn btn-secondary py-0">' . $celular . '</a></p>';
                }
              }
            ?>
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
                  <form class="row" method="post">
                    <!-- Menu desplegable de tipos de entrenamiento -->
                    <!-- Activacion -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg rounded">
                      <label for="validationCustom04" class="form-label">Tipos de Activacion</label>
                      <select class="form-select mb-3" id="selectOption" name="tipoEntrenamiento">
                        <option selected disabled value="">Seleccione...</option>
                        <option id="eBasico" value="eBasico">Activacion #1</option>
                        <option id="eIntermedio" value="eIntermedio">Activacion #2</option>
                        <option id="eAvanzado" value="eAvanzado">Activacion #3</option>
                        <option id="ePiernas" value="ePiernas">Activacion #4</option>
                        <option id="act_cinco" value="act_cinco">Activacion #5</option>
                        <option id="act_seis" value="act_seis">Activacion #6</option>
                        <option id="act_siete" value="act_siete">Activacion #7</option>
                        <option id="act_ocho" value="act_ocho">Activacion #8</option>
                        <option id="act_nueve" value="act_nueve">Activacion #9</option>
                        <option id="act_diez" value="act_diez">Activacion #10</option>
                        <option id="act_once" value="act_once">Activacion #11</option>
                        <option id="act_doce" value="act_doce">Activacion #12</option>
                        <option id="act_trece" value="act_trece">Activacion #13</option>
                        <option id="act_catorce" value="act_catorce">Activacion #14</option>
                        <option id="act_quince" value="act_quince">Activacion #15</option>
                        <option id="act_dieciseis" value="act_dieciseis">Activacion #16</option>
                      </select>
                      <!-- Ejercicios de Activacion -->
                      <div>
                        <!-- Checks de entrenamiento Brazos -->
                        <div class="form-check my-2 p-0" id="entrenamientoBasico">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="brazo" class="form-label">Activar brazos con...</label>
                            <textarea class="form-control" id="brazo" name="brazo" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento Pecho -->
                        <div class="form-check my-2 p-0" id="entrenamientoIntermedio">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="pecho" class="form-label">Activar pecho con...</label>
                            <textarea class="form-control" id="pecho" name="pecho" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento Abdomen -->
                        <div class="form-check my-2 p-0" id="entrenamientoAvanzado">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="abdominal" class="form-label">Activar abdominales con...</label>
                            <textarea class="form-control" id="abdominal" name="abdominal" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento Piernas -->
                        <div class="form-check my-2 p-0 " id="entrenamientoPiernas">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="pierna" class="form-label">Activar piernas con...</label>
                            <textarea class="form-control" id="pierna" name="pierna" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #5 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoCinco">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actCinco" class="form-label">Activacion #5...</label>
                            <textarea class="form-control" id="actCinco" name="actCinco" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #6 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoSeis">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actSeis" class="form-label">Activacion #6...</label>
                            <textarea class="form-control" id="actSeis" name="actSeis" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #7 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoSiete">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actSiete" class="form-label">Activacion #7...</label>
                            <textarea class="form-control" id="actSiete" name="actSiete" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #8 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoOcho">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actOcho" class="form-label">Activacion #8...</label>
                            <textarea class="form-control" id="actOcho" name="actOcho" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #9 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoNueve">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actNueve" class="form-label">Activacion #9...</label>
                            <textarea class="form-control" id="actNueve" name="actNueve" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #10 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoDiez">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actDiez" class="form-label">Activacion #10...</label>
                            <textarea class="form-control" id="actDiez" name="actDiez" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #11 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoOnce">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actOnce" class="form-label">Activacion #11...</label>
                            <textarea class="form-control" id="actOnce" name="actOnce" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #12 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoDoce">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actDoce" class="form-label">Activacion #12...</label>
                            <textarea class="form-control" id="actDoce" name="actDoce" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #13 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoTrece">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actTrece" class="form-label">Activacion #13...</label>
                            <textarea class="form-control" id="actTrece" name="actTrece" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #14 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoCatorce">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actCatorce" class="form-label">Activacion #14...</label>
                            <textarea class="form-control" id="actCatorce" name="actCatorce" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #15 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoQuince">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actQuince" class="form-label">Activacion #15...</label>
                            <textarea class="form-control" id="actQuince" name="actQuince" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de entrenamiento #16 -->
                        <div class="form-check my-2 p-0 " id="entrenamientoDieciseis">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="actDieciseis" class="form-label">Activacion #16...</label>
                            <textarea class="form-control" id="actDieciseis" name="actDieciseis" rows="8"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Core -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg rounded">
                      <label for="validationCustom04" class="form-label">Tipos de Core</label>
                      <select class="form-select mb-3" id="selectOptionCore" name="tipoEntrenamiento">
                        <option selected disabled value="">Seleccione...</option>
                        <option id="core_uno" value="core_uno">Core #1</option>
                        <option id="core_dos" value="core_dos">Core #2</option>
                        <option id="core_tres" value="core_tres">Core #3</option>
                        <option id="core_cuatro" value="core_cuatro">Core #4</option>
                        <option id="core_cinco" value="core_cinco">Core #5</option>
                        <option id="core_seis" value="core_seis">Core #6</option>
                        <option id="core_siete" value="core_siete">Core #7</option>
                      </select>
                      <!-- Ejercicios de Core -->
                      <div>
                        <!-- Checks de core #1 -->
                        <div class="form-check my-2 p-0 " id="core-uno">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreUno" class="form-label">Core #1...</label>
                            <textarea class="form-control" id="coreUno" name="coreUno" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #2 -->
                        <div class="form-check my-2 p-0 " id="core-dos">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreDos" class="form-label">Core #2...</label>
                            <textarea class="form-control" id="coreDos" name="coreDos" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #3 -->
                        <div class="form-check my-2 p-0 " id="core-tres">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreTres" class="form-label">Core #3...</label>
                            <textarea class="form-control" id="coreTres" name="coreTres" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #4 -->
                        <div class="form-check my-2 p-0 " id="core-cuatro">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreCuatro" class="form-label">Core #4...</label>
                            <textarea class="form-control" id="coreCuatro" name="coreCuatro" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #5 -->
                        <div class="form-check my-2 p-0 " id="core-cinco">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreCinco" class="form-label">Core #5...</label>
                            <textarea class="form-control" id="coreCinco" name="coreCinco" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #6 -->
                        <div class="form-check my-2 p-0 " id="core-seis">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreSeis" class="form-label">Core #6...</label>
                            <textarea class="form-control" id="coreSeis" name="coreSeis" rows="8"></textarea>
                          </div>
                        </div>

                        <!-- Checks de core #7 -->
                        <div class="form-check my-2 p-0 " id="core-siete">
                          <!-- aca se ejecuta el script mostrarCampo -->
                          <div class="mb-3">
                            <label for="coreSiete" class="form-label">Core #7...</label>
                            <textarea class="form-control" id="coreSiete" name="coreSiete" rows="8"></textarea>
                          </div>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

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
      const act_cinco = '<?php echo nl2br(implode('\n', $act_cinco)); ?>';
        if (document.getElementById('actCinco')) {
            document.getElementById('actCinco').value += act_cinco;
        }
      const act_seis = '<?php echo nl2br(implode('\n', $act_seis)); ?>';
      if (document.getElementById('actSeis')) {
          document.getElementById('actSeis').value += act_seis;
      }
      const act_siete = '<?php echo nl2br(implode('\n', $act_siete)); ?>';
      if (document.getElementById('actSiete')) {
          document.getElementById('actSiete').value += act_siete;
      }
      const act_ocho = '<?php echo nl2br(implode('\n', $act_ocho)); ?>';
      if (document.getElementById('actOcho')) {
          document.getElementById('actOcho').value += act_ocho;
      }
      const act_nueve = '<?php echo nl2br(implode('\n', $act_nueve)); ?>';
      if (document.getElementById('actNueve')) {
          document.getElementById('actNueve').value += act_nueve;
      }
      const act_diez = '<?php echo nl2br(implode('\n', $act_diez)); ?>';
      if (document.getElementById('actDiez')) {
          document.getElementById('actDiez').value += act_diez;
      }
      const act_once = '<?php echo nl2br(implode('\n', $act_once)); ?>';
      if (document.getElementById('actOnce')) {
          document.getElementById('actOnce').value += act_once;
      }
      const act_doce = '<?php echo nl2br(implode('\n', $act_doce)); ?>';
      if (document.getElementById('actDoce')) {
          document.getElementById('actDoce').value += act_doce;
      }
      const act_trece = '<?php echo nl2br(implode('\n', $act_trece)); ?>';
      if (document.getElementById('actTrece')) {
          document.getElementById('actTrece').value += act_trece;
      }
      const act_catorce = '<?php echo nl2br(implode('\n', $act_catorce)); ?>';
      if (document.getElementById('actCatorce')) {
          document.getElementById('actCatorce').value += act_catorce;
      }
      const act_quince = '<?php echo nl2br(implode('\n', $act_quince)); ?>';
      if (document.getElementById('actQuince')) {
          document.getElementById('actQuince').value += act_quince;
      }
      const act_dieciseis = '<?php echo nl2br(implode('\n', $act_dieciseis)); ?>';
      if (document.getElementById('actDieciseis')) {
          document.getElementById('actDieciseis').value += act_dieciseis;
      }
      const core_uno = '<?php echo nl2br(implode('\n', $core_uno)); ?>';
      if (document.getElementById('coreUno')) {
          document.getElementById('coreUno').value += core_uno;
      }
      const core_dos = '<?php echo nl2br(implode('\n', $core_dos)); ?>';
      if (document.getElementById('coreDos')) {
          document.getElementById('coreDos').value += core_dos;
      }
      const core_tres = '<?php echo nl2br(implode('\n', $core_tres)); ?>';
      if (document.getElementById('coreTres')) {
          document.getElementById('coreTres').value += core_tres;
      }
      const core_cuatro = '<?php echo nl2br(implode('\n', $core_cuatro)); ?>';
      if (document.getElementById('coreCuatro')) {
          document.getElementById('coreCuatro').value += core_cuatro;
      }
      const core_cinco = '<?php echo nl2br(implode('\n', $core_cinco)); ?>';
      if (document.getElementById('coreCinco')) {
          document.getElementById('coreCinco').value += core_cinco;
      }
      const core_seis = '<?php echo nl2br(implode('\n', $core_seis)); ?>';
      if (document.getElementById('coreSeis')) {
          document.getElementById('coreSeis').value += core_seis;
      }
      const core_siete = '<?php echo nl2br(implode('\n', $core_siete)); ?>';
      if (document.getElementById('coreSiete')) {
          document.getElementById('coreSiete').value += core_siete;
      }
    </script>

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

</body>
</html>