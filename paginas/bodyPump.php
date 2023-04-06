<?php
    // Inicio de la sesión
    session_start();
    // Verificación de que el cliente haya iniciado sesión y su nombre esté almacenado en la variable de sesión
    if (!isset($_SESSION['nombre'])) {
      // Si el nombre del cliente no está almacenado en la variable de sesión, redirige al cliente a la página1.php para iniciar sesión
      header('Location: login.php');
      exit();
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Pump</title>
    <link rel="icon" href="../asets/Img/logo.png" type="image/png">
    <!-- Incluir los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/clientes.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="../asets/Img/logo.png" alt="" width="50" height="50">
                <a class="navbar-brand" href="" id="text-musculacion">Body Pump</a>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container my-3">
            <div class="row">
                <!-- Div del calendario -->
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 py-1 calendario d-none">
                    <label for="calendario" class="label-calendario">Elegi la fecha para ver tu entrenamiento...</label>
                    <?php
                      // Establecer la zona horaria de Argentina
                      date_default_timezone_set('America/Argentina/Buenos_Aires');
                      
                      // Obtener la fecha actual de Argentina
                      $fecha = date('Y-m-d');
                    ?>
                    <input type="date" name="calendario" id="calendario" class="input-calendario" value="<?php echo $fecha; ?>">
                </div>
                <!-- Bienvenida -->
                <div class="col-sm-12 py-1" style="text-align: center;">
                    <!-- Bienvenida al cliente con su nombre almacenado en la variable de sesión -->
                    <h5 class="text-center">Bienvenido(a), 
                    <?php echo "" . $_SESSION['nombre'] . "!!!";?>
                    </h5>
                </div>
            </div>

            <hr style="border: 1px solid #000000;">

            <?php
                include ("../php/activarMusculos.php");
            ?>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 py-1">
                    <div class="accordion" id="accordionExample">

                        <!-- ACTIVAR BRAZOS -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Activar Brazos
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Activar brazos.</strong> 
                                    <p>
                                        <?php echo "" . $_SESSION['detalle'] . "";?>
                                    </p>
                                    <textarea class="form-control border-0" id="brazo" name="brazo" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejmplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="../asets/Videos/Gym-Fitness-Video.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVAR PECHO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Activar Pecho
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Activar pecho.</strong> 
                                    <textarea class="form-control border-0" id="pecho" name="pecho" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejmplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="../asets/Videos/Gym-Fitness-Women.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVAR ABDOMEN -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Activar abdomen
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Activar abdomen.</strong> 
                                <textarea class="form-control border-0" id="abdominal" name="abdominal" rows="8" readonly disabled oncopy="return false;"></textarea>
                                <div>
                                    <p><strong>Video ejmplo de los ejercicios</strong></p>
                                    <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                        <source src="../asets/Videos/MarcAnthony-NadaDeNada.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        </div>

                        <!-- ACTIVAR PIERNAS -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Activar Piernas
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Activar piernas.</strong> 
                                    <textarea class="form-control border-0" id="pierna" name="pierna" rows="8" readonly disabled oncopy="return false;"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Ejercicio #5
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Quinto ejercicio.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="border: 1px solid #000000;">
                </div>
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
    <script src="../javascript/cerrarSesion.js"></script>

    <script>
        var brazos = '<?php echo nl2br(implode('\n', $brazos)); ?>';
if (document.getElementById('brazo')) {
    document.getElementById('brazo').value += brazos;
}
var pechos = '<?php echo nl2br(implode('\n', $pechos)); ?>';
if (document.getElementById('pecho')) {
    document.getElementById('pecho').value += pechos;
}
var abdominales = '<?php echo nl2br(implode('\n', $abdominales)); ?>';
if (document.getElementById('abdominal')) {
    document.getElementById('abdominal').value += abdominales;
}
var piernas = '<?php echo nl2br(implode('\n', $piernas)); ?>';
if (document.getElementById('pierna')) {
    document.getElementById('pierna').value += piernas;
}
    </script>

</body>


</html>