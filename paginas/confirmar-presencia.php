<?php
    // Inicio de la sesión
    session_start();
    // Verificación de que el cliente haya iniciado sesión y su nombre esté almacenado en la variable de sesión
    if (!isset($_SESSION['nombre'])) {
      // Si el nombre del cliente no está almacenado en la variable de sesión, redirige al cliente a la página1.php para iniciar sesión
      header('Location: presente.php');
      exit();
    }
?>

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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                  <li><a class="nav-link" href="reporteAdmin.html">Administradores</a></li>
                  <li><a class="nav-link" href="reporteClientes.php">Clientes</a></li>
                  <li><a class="nav-link" href="pagos.php">Pagos</a></li>
                </ul>
              </li>
              <a class="nav-link active d-none" aria-current="page" href="presente.php">Presente</a>
              <a class="nav-link d-none" aria-current="page" href="#" onclick="cerrarSesion()">Cerrar sesion</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    
    <main class="d-flex align-items-center">
      <div class="container my-3 d-flex justify-content-center">
        <div class="text-center rounded shadow-lg px-5 py-5">

          <h2 class="text-center">
            <?php echo "" . $_SESSION['nombre'] . "";?>, te quedan: 
          </h2>

          <div class="d-flex justify-content-center align-items-center">
            <h1 id="clases-count" class="display-1 fw-bolder" style="margin-bottom: 0px">
              <?php echo "" . $_SESSION['clases'] . "";?>
              <h4 id="clases-message" class="align-self-end mx-3">clases</h4>
            </h1>
          </div>

          <h3 class="my-3">
            De <?php echo "" . $_SESSION['disciplina'] . "";?>
            <?php if (!empty($_SESSION['disciplina_dos'])): ?>
            
              y de <?php echo $_SESSION['disciplina_dos']; ?>
            
            <?php endif; ?>
          </h3>
          

          <form onsubmit="restarClase(event)">
            <button type="submit" class="btn btn-primary mx-1">Presente</button>
            <a href="presente.php" class="btn btn-secondary mx-1 d-none">Volver</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../javascript/cerrarSesion.js"></script>
    <script src="https://kit.fontawesome.com/85a9ee331b.js" crossorigin="anonymous"></script>


    <script>
      function restarClase(event) {
        event.preventDefault(); // Evitar que el formulario se envíe
        var h1Element = document.getElementById("clases-count");
        var valorActual = parseInt(h1Element.innerText);

        // Verificar si el valor actual es mayor que 0 antes de restar
        if (valorActual > 0) {
          var nuevoValor = valorActual - 1;
          h1Element.innerText = nuevoValor;

          // Crear un objeto FormData y agregar el nuevo valor de las clases
          var formData = new FormData();
          formData.append("clases", nuevoValor);

          // Realizar una solicitud AJAX utilizando Fetch API
          fetch("../php/validar_presente.php", {
            method: "POST",
            body: formData
          })
          .then(function(response) {
            // Verificar la respuesta del servidor
            if (response.ok) {
              // Redireccionar al confirmar la presencia
              window.location.href = "presente.php";
            } else {
              // Manejar cualquier error en la respuesta del servidor
              console.log("Error al actualizar las clases");
            }
          })
          .catch(function(error) {
            // Manejar cualquier error de conexión
            console.log("Error de conexión");
          });
        } else {
          // Mostrar un mensaje cuando el valor llega a 0
          var clasesMessage = document.getElementById("clases-message");
          clasesMessage.innerText = "Ya no le quedan clases";

          // Redireccionar a "presente.php" después de 3 segundos
          setTimeout(function() {
            window.location.href = "presente.php";
          }, 5000);
        }
      }
   
      window.addEventListener("DOMContentLoaded", function() {
        var buttonElement = document.querySelector("button[type='submit']");
        buttonElement.focus();
      });
    </script>
    <!-- EL SIGUIENTE SCRIPT COLOCA EL AÑO DE FORMA AUTOMATICA EN EL COPY DEL FOOTER -->
    <script>
      var currentYear = new Date().getFullYear();
      document.getElementById("currentYear").innerHTML = currentYear;
    </script>

  </body>
</html>