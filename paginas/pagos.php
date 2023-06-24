<?php
include "../php/conexion.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $monto = $_POST['monto'];
    $disciplina = $_POST['disciplina'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $clases = $_POST['clases'];


    // Depurar los valores de $_POST
    //echo "Nombre: " . $nombre . "<br>";
    //echo "Monto: " . $monto . "<br>";

    // Insertar el nuevo pago en la base de datos
    $query = mysqli_query($conn, "INSERT INTO pagos (id_cliente, nombre, apellido, monto, disciplina, fecha_vencimiento) 
    VALUES ('$id_cliente', '$nombre', '$apellido', '$monto', '$disciplina', '$fecha_vencimiento')");

    if ($query) {
      // Redirigir
      header("Location: pagos.php");
    } else {
      echo "Error al registrar el pago: " . mysqli_error($conn);
    }
}
// Actualizar los datos del cliente en la base de datos
$sql = "UPDATE clientes SET clases=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $clases, $id_cliente);
$stmt->execute();
$stmt->close();
$conn->close();
?>

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
        <h1 class="text-center card-subtitle text-dark py-3">Registro de Pagos de Socios</h1>
        <form id="" name="pagoCliente" method="POST" class="row border border-2 pt-2 rounded-3">
          <!-- Campos del formulario -->
          <div class="mb-3 col-md-4">
            <label for="id_cliente" class="form-label">N° de Socio: *</label>
            <input type="number" class="form-control bg-color" name="id_cliente" id="id_cliente" placeholder="N° de Socio">
          </div>
          <div class="mb-3 col-md-4">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" >
          </div>
          <div class="mb-3 col-md-4">
            <label for="apellido" class="form-label">Apellido *</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" >
          </div>
          <div class="mb-3 col-md-4">
            <label for="disciplina" class="form-label">Disciplina *</label>
            <select class="form-select" name="disciplina" id="disciplina" required>
              <option selected disabled value="">Seleccione...</option>
              <option value="Musculacion">Musculacion</option>
              <option value="Body_Pump">Body Pump</option>
              <option value="body_Combat">Body Combat</option>
              <option value="Funcional">Funcional</option>
              <option value="URKU">URKU</option>
              <option value="Especifico">Especifico</option>
              <option value="Everlast_Boxing">Everlast Boxing</option>
              <option value="Ritmos_Flow">Ritmos Flow</option>
              <option value="Mini_Voley">Mini Voley</option>
              <option value="Taekwondo">Taekwondo</option>
              <option value="Futbol_Infantil">Futbol Infantil</option>
            </select>
          </div>
          <div class="mb-3 col-md-4">
            <label for="monto" class="form-label">Monto *</label>
            <input type="number" class="form-control" name="monto" placeholder="Monto del pago" required>
          </div>
          <div class="mb-3 col-md-4">
            <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento *</label>
            <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" >
          </div>
          <div class="mb-1 col-md-2">
            <label for="clases" class="form-label">Cantidad de clases:</label>
            <input type="number" class="form-control" name="clases" id="clases" >
          </div>
          <div class="d-grid gap-2 my-3">
            <button type="submit" class="btn btn-success" name="submit">Guardar Pago</button>
          </div>
        </form>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="enviar_pdf.js"></script>


</body>
</html>