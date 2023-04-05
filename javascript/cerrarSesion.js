function cerrarSesion() {
    // Eliminamos todas las cookies relacionadas con la sesión
    document.cookie.split(";").forEach(function(cookie) {
      document.cookie = cookie.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
    });
  
    // Redirigimos al usuario a la página de inicio de sesión
    window.location.href = "login.php";
  }