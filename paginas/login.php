<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="../asets/Img/logo.png" type="image/png">
  <!-- Incluir los archivos CSS de Bootstrap 5 -->
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
              <img src="../asets/Img/logo.png" alt="" width="50" height="50">
              <a class="navbar-brand" href="" id="text-musculacion">Iniciar Sesion</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="nav-link" href="../index.html">Inicio</a>
                <a class="nav-link" href="sobreNosotros.html">Nosotros</a>
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </div>
            </div>
          </div>
      </nav>
    </header>

    <main>
      <div class="container my-3 py-4">
          <div class="row justify-content-center">
            <div class="col-md-6">
    
              <h2 class="text-center mb-4">Iniciar sesión</h2>
    
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                  <label for="username" class="form-label">N° de Socio</label>
                  <input type="number" class="form-control" name="username" id="username" required autofocus placeholder="N° de Socio">
                </div>
                <!-- <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="text" class="form-control" id="password" name="password" required placeholder="Contraseña">
                </div> -->
                <div class="d-grid gap-2 mb-3">
                  <input type="submit" class="btn btn-primary" value="Iniciar Sesion" name="submit">
                    <?php
                        include ("../php/validar_login.php");
                    ?>
                </div>
                <!-- <p class="text-center mb-0">¿No tienes cuenta? <a href="#">Regístrate</a></p> -->
              </form>
    
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

    <!-- Incluir los archivos JavaScript de Bootstrap 5 -->
    <script src="../javascript/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
  
</body>

</html>