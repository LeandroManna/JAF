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
                <!-- Bienvenida -->
                <div class="col-sm-12 py-1" style="text-align: center;">
                    <!-- Bienvenida al cliente con su nombre almacenado en la variable de sesión -->
                    <h5 class="text-center text-info">Bienvenido(a), 
                    <?php echo "" . $_SESSION['nombre'] . "!!!";?>
                    </h5>
                </div>
            </div>

            <hr style="border: 1px solid #000000;">

            <div class="row justify-content-center">
                <div class="col-md-8 text-center text-light">
                    <h2>Lo sentimos, esta página está en construcción</h2>
                    <p>Estamos trabajando arduamente para crear una experiencia en línea increíble para nuestros socios. Lamentablemente, todavía no hemos terminado de construir esta página. Pero no se preocupe, ¡estamos trabajando en ella!</p>
                    <p>Le recomendamos que visite nuestro sitio web nuevamente en unas semanas para ver si la página ha sido actualizada. Si tiene alguna pregunta, no dude en ponerse en contacto con nuestro equipo de soporte.</p>
                    <p>¡Gracias por su comprensión y paciencia!</p>
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

</body>


</html>