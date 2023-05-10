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
    <title>Clientes</title>
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
                <a class="navbar-brand" href="" id="text-musculacion">Musculacion</a>
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
                    <h3 class="text-center text-light">Bienvenido(a)
                    <?php echo "" . $_SESSION['nombre'] . "";?> a Juan Aguirre Fitness
                    </h3>
                </div>
            </div>
            <hr style="border: 1px solid #000000;">
            <h6 class="text-center text-dark">
                <?php echo "" . $_SESSION['detalle'] . "";?>
            </h6>
            <?php
                include ("../php/activarMusculos.php");
            ?>
            <div class="row justify-content-center">
                <!-- Menu desplegable de tipos de entrenamiento -->
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 my-2">
                    <label for="validationCustom04" class="form-label text-light">Tipos de Entrenamiento</label>
                    <select class="form-select" id="selectOption" name="tipoEntrenamiento">
                      <option selected disabled value="">Seleccione...</option>
                      <option id="eActivacion" value="eActivacion">Activacion</option>
                      <option id="eCore" value="eCore">Core</option>
                    </select>
                    <hr style="border: 1px solid #000000;">
                </div>
                <!-- ACTIVACION -->
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 py-1" id="eActiv">
                    <h5 class="text-center text-light">Ejercicios de Activacion</h5>
                    <div class="accordion" id="accordionExample">
                        <!-- ACTIVACION 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Ejercicio #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    
                                    <textarea class="form-control border-0" id="brazo" name="brazo" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none" controlsList="nodownload nodoubleplaybackrate" muted>
                                            <source src="../asets/Videos/Trabajos_de_activación_N°_1_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Ejercicio #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="pecho" name="pecho" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_2_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Ejercicio #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="abdominal" name="abdominal" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_3_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Ejercicio #4
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="pierna" name="pierna" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_4_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Ejercicio #5
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_cinco" name="act_cinco" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_5_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Ejercicio #6
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_seis" name="act_seis" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_6_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 7 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Ejercicio #7
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_siete" name="act_siete" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_7_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 8 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Ejercicio #8
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_ocho" name="act_ocho" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_8_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 9 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                Ejercicio #9
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_nueve" name="act_nueve" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_9_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 10 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                Ejercicio #10
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_diez" name="act_diez" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_10_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 11 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                Ejercicio #11
                                </button>
                            </h2>
                            <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_once" name="act_once" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_11_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 12 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                Ejercicio #12
                                </button>
                            </h2>
                            <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_doce" name="act_doce" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_12_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 13 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThirteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                Ejercicio #13
                                </button>
                            </h2>
                            <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_trece" name="act_trece" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_13_MOV_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 14 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFourteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                Ejercicio #14
                                </button>
                            </h2>
                            <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_catorce" name="act_catorce" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_14_MOV_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 15 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFifteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                Ejercicio #15
                                </button>
                            </h2>
                            <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_quince" name="act_quince" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_15_MOV_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ACTIVACION 16 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSixteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                Ejercicio #16
                                </button>
                            </h2>
                            <div id="collapseSixteen" class="accordion-collapse collapse" aria-labelledby="headingSixteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong>
                                    <textarea class="form-control border-0" id="act_dieciseis" name="act_dieciseis" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_activación_N°_16_MOV_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 1px solid #000000;">
                </div>
                <!-- CORE -->
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 py-1" id="eCor">
                    <h5 class="text-center text-light">Ejercicios de Core</h5>
                    <div class="accordion" id="accordionExample">
                        <!-- CORE 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingUno">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUno" aria-expanded="true" aria-controls="collapseUno">
                                Core #1
                                </button>
                            </h2>
                            <div id="collapseUno" class="accordion-collapse collapse show" aria-labelledby="headingUno" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core1" name="core1" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none" controlsList="nodownload nodoubleplaybackrate" muted>
                                            <source src="..\asets\Videos\Trabajos_de_core_°_1_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingDos">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
                                Core #2
                                </button>
                            </h2>
                            <div id="collapseDos" class="accordion-collapse collapse" aria-labelledby="headingDos" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core2" name="core2" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_2_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTres">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
                                Core #3
                                </button>
                            </h2>
                            <div id="collapseTres" class="accordion-collapse collapse" aria-labelledby="headingTres" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core3" name="core3" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_3_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCuatro">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro">
                                Core #4
                                </button>
                            </h2>
                            <div id="collapseCuatro" class="accordion-collapse collapse" aria-labelledby="headingCuatro" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core4" name="core4" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_2_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCinco">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco">
                                Core #5
                                </button>
                            </h2>
                            <div id="collapseCinco" class="accordion-collapse collapse" aria-labelledby="headingCinco" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core5" name="core5" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_5_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeis">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeis" aria-expanded="false" aria-controls="collapseSeis">
                                Core #6
                                </button>
                            </h2>
                            <div id="collapseSeis" class="accordion-collapse collapse" aria-labelledby="headingSeis" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core6" name="core6" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_6_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CORE 7 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSiete">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSiete" aria-expanded="false" aria-controls="collapseSiete">
                                Core #7
                                </button>
                            </h2>
                            <div id="collapseSiete" class="accordion-collapse collapse" aria-labelledby="headingSiete" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Guia de ejercicios.</strong> 
                                    <textarea class="form-control border-0" id="core7" name="core7" rows="8" readonly disabled oncopy="return false;"></textarea>
                                    <div>
                                        <p><strong>Video ejemplo de los ejercicios</strong></p>
                                        <video playsinline class="iframe-clientes my-2 video-player" controls="controls" preload="none">
                                            <source src="..\asets\Videos\Trabajos_de_core_°_7_Full HD 1080p.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 1px solid #000000;">
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
    <script src="../javascript/cerrarSesion.js"></script>
    <!-- El siguiente script usa el select para mostrar los 2 div -->
    <script>
        $(document).ready(function() {
            // ocultar todos los divs de entrenamiento
            $('#eActiv').hide();
            $('#eCor').hide();

            // agregar evento onChange al select
            $('#selectOption').change(function() {
              // obtener el valor seleccionado
              var selectedOption = $(this).children("option:selected").val();
            
              // mostrar el div correspondiente y ocultar los demás
              if (selectedOption === 'eActivacion') {
                $('#eActiv').show();
                $('#eCor').hide();
              } else if (selectedOption === 'eCore') {
                    $('#eActiv').hide();
                    $('#eCor').show();
              } else {
                    $('#eActiv').hide();
                    $('#eCor').hide();
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>

    <!-- Muestra en los text area los datos de los campos de la BBDD -->
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
        var act_cinco = '<?php echo nl2br(implode('\n', $act_cinco)); ?>';
        if (document.getElementById('act_cinco')) {
            document.getElementById('act_cinco').value += act_cinco;
        }
        var act_seis = '<?php echo nl2br(implode('\n', $act_seis)); ?>';
        if (document.getElementById('act_seis')) {
            document.getElementById('act_seis').value += act_seis;
        }
        var act_siete = '<?php echo nl2br(implode('\n', $act_siete)); ?>';
        if (document.getElementById('act_siete')) {
            document.getElementById('act_siete').value += act_siete;
        }
        var act_ocho = '<?php echo nl2br(implode('\n', $act_ocho)); ?>';
        if (document.getElementById('act_ocho')) {
            document.getElementById('act_ocho').value += act_ocho;
        }
        var act_nueve = '<?php echo nl2br(implode('\n', $act_nueve)); ?>';
        if (document.getElementById('act_nueve')) {
            document.getElementById('act_nueve').value += act_nueve;
        }
        var act_diez = '<?php echo nl2br(implode('\n', $act_diez)); ?>';
        if (document.getElementById('act_diez')) {
            document.getElementById('act_diez').value += act_diez;
        }
        var act_once = '<?php echo nl2br(implode('\n', $act_once)); ?>';
        if (document.getElementById('act_once')) {
            document.getElementById('act_once').value += act_once;
        }
        var act_doce = '<?php echo nl2br(implode('\n', $act_doce)); ?>';
        if (document.getElementById('act_doce')) {
            document.getElementById('act_doce').value += act_doce;
        }
        var act_trece = '<?php echo nl2br(implode('\n', $act_trece)); ?>';
        if (document.getElementById('act_trece')) {
            document.getElementById('act_trece').value += act_trece;
        }
        var act_catorce = '<?php echo nl2br(implode('\n', $act_catorce)); ?>';
        if (document.getElementById('act_catorce')) {
            document.getElementById('act_catorce').value += act_catorce;
        }
        var act_quince = '<?php echo nl2br(implode('\n', $act_quince)); ?>';
        if (document.getElementById('act_quince')) {
            document.getElementById('act_quince').value += act_quince;
        }
        var act_dieciseis = '<?php echo nl2br(implode('\n', $act_dieciseis)); ?>';
        if (document.getElementById('act_dieciseis')) {
            document.getElementById('act_dieciseis').value += act_dieciseis;
        }
        var core_uno = '<?php echo nl2br(implode('\n', $core_uno)); ?>';
        if (document.getElementById('core1')) {
            document.getElementById('core1').value += core_uno;
        }
        var core_dos = '<?php echo nl2br(implode('\n', $core_dos)); ?>';
        if (document.getElementById('core2')) {
            document.getElementById('core2').value += core_dos;
        }
        var core_tres = '<?php echo nl2br(implode('\n', $core_tres)); ?>';
        if (document.getElementById('core3')) {
            document.getElementById('core3').value += core_tres;
        }
        var core_cuatro = '<?php echo nl2br(implode('\n', $core_cuatro)); ?>';
        if (document.getElementById('core4')) {
            document.getElementById('core4').value += core_cuatro;
        }
        var core_cinco = '<?php echo nl2br(implode('\n', $core_cinco)); ?>';
        if (document.getElementById('core5')) {
            document.getElementById('core5').value += core_cinco;
        }
        var core_seis = '<?php echo nl2br(implode('\n', $core_seis)); ?>';
        if (document.getElementById('core6')) {
            document.getElementById('core6').value += core_seis;
        }
        var core_siete = '<?php echo nl2br(implode('\n', $core_siete)); ?>';
        if (document.getElementById('core7')) {
            document.getElementById('core7').value += core_siete;
        }
    </script>

    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

</body>


</html>