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
        <div class="text-center rounded shadow-lg px-5 py-5" id="bg-clases">

          <h3 class="text-center">
            N° de Socio: <strong><?php echo "" . $_SESSION['id'] . "";?></strong>
          </h3>
          <hr>
          <h2 class="text-center">
            <strong><?php echo "" . $_SESSION['apellido'] . " " . $_SESSION['nombre'] . "";?></strong>, te quedan: 
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
          <hr>
          <h3 class="text-center">
            Fecha de vencimiento:
          </h3>
          <h3 class="text-center">
            <strong><?php echo "" . $_SESSION['fecha_vencimiento'] . "";?></strong>
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

    <!-- RESTAR CLASES -->
    <script>
      var isSubmitting = false;

      function restarClase(event) {
        event.preventDefault(); // Evitar que el formulario se envíe

        if (isSubmitting) {
          return; // Si ya se está procesando una solicitud, salir
        }

        isSubmitting = true;

        var buttonElement = document.querySelector("button[type='submit']");
        buttonElement.style.display = "none"; // Ocultar el botón

        var h1Element = document.getElementById("clases-count");
        var valorActual = parseInt(h1Element.innerText);

        // Obtener la fecha de vencimiento almacenada en la sesión (formato yyyy-mm-dd)
        var fechaVencimientoStr = "<?php echo $_SESSION['fecha_vencimiento']; ?>";

        // Dividir la cadena en partes usando el carácter "-" como separador
        var partesFechaVencimiento = fechaVencimientoStr.split("-");
        var añoVencimiento = parseInt(partesFechaVencimiento[0]);
        var mesVencimiento = parseInt(partesFechaVencimiento[1]);
        var diaVencimiento = parseInt(partesFechaVencimiento[2]);

        // Crear un objeto Date con el año, mes y día de la fecha de vencimiento
        var fechaVencimiento = new Date(añoVencimiento, mesVencimiento - 1, diaVencimiento); // Restamos 1 al mes porque JavaScript cuenta los meses desde 0

        // Obtener la fecha y hora actual en la zona horaria de Buenos Aires
        var fechaActual = new Date();
        fechaActual.setTime(fechaActual.getTime() + (3 * 60 * 60 * 1000)); // Ajustar a la zona horaria de Buenos Aires (3 horas de diferencia)

        // Obtener solo el año, mes y día de la fecha actual
        var añoActual = fechaActual.getFullYear();
        var mesActual = fechaActual.getMonth() + 1;
        var diaActual = fechaActual.getDate();

        //console.log ("Fecha Actual: " + añoActual + "-" + mesActual + "-" + diaActual);
        //console.log ("Fecha Vencimiento: " + añoVencimiento + "-" + mesVencimiento + "-" + diaVencimiento);

        var fechaVencimientoCorta = añoVencimiento + "-" + mesVencimiento + "-" + diaVencimiento;
        var fechaActualCorta = añoActual + "-" + mesActual + "-" + diaActual;

        //console.log ("Fecha Actual Corta: " + fechaActualCorta);
        //console.log ("Fecha Vencimiento Corta: " + fechaVencimientoCorta);

        // Verificar si el valor actual es mayor que 0 antes de restar
        if (valorActual > 0 && fechaActualCorta <= fechaVencimientoCorta) {
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
            isSubmitting = false;
            // Verificar la respuesta del servidor
            if (response.ok) {
              // Cambiar el fondo a rojo cuando no quedan clases
              var bgClasesElement = document.getElementById("bg-clases");
              bgClasesElement.classList.add("bg-success");
              // Redireccionar a "presente.php" después de 3 segundos
              setTimeout(function() {
                window.location.href = "presente.php";
              }, 1500);
            } else {
              // Manejar cualquier error en la respuesta del servidor
              console.log("Error al actualizar las clases");
              // Mostrar el botón nuevamente en caso de error
              buttonElement.style.display = "block";
            }
          })
          .catch(function(error) {
            // Manejar cualquier error de conexión
            console.log("Error de conexión");
          });
        } else {
          // Cambiar el fondo a rojo cuando no quedan clases
          var bgClasesElement = document.getElementById("bg-clases");
          bgClasesElement.classList.add("bg-danger");
          // Mostrar un mensaje cuando el valor llega a 0
          var clasesMessage = document.getElementById("clases-message");
          clasesMessage.innerText = " Ya no le quedan clases o Ya paso su fecha de Vencimiento";

          // Redireccionar a "presente.php" después de 3 segundos
          setTimeout(function() {
            window.location.href = "presente.php";
          }, 1500);
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