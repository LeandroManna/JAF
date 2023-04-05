<?php
if (isset($_POST['agregarEnt'])) {
  // Conectar a la base de datos usando el archivo "conexion.php"
  include "conexion.php";

  // Verificar si el checkbox "eBasSuperior" ha sido seleccionado
  if (isset($_POST['eBasSuperior'])) {
      // Guardar el valor deseado en la base de datos
      $detalle = 'Este es un texto del entrenamiento basico superior';
      $qery = mysqli_query($conn, "INSERT INTO entrenamientobasico (detalle) VALUES ('$detalle')");
      // Ejecutar la consulta SQL
      $res = mysqli_query($conn, $qery);
  }

  // Verificar si el checkbox "eBasMedio" ha sido seleccionado
  if (isset($_POST['eBasMedio'])) {
      // Guardar el valor deseado en la base de datos
      $detalle = 'Este es un texto del entrenamiento basico medio';
      $qery = mysqli_query($conn, "INSERT INTO entrenamientobasico (detalle) VALUES ('$detalle')");
      // Ejecutar la consulta SQL
      $res = mysqli_query($conn, $qery);
  }

  // Verificar si el checkbox "eBasInferior" ha sido seleccionado
  if (isset($_POST['eBasInferior'])) {
      // Guardar el valor deseado en la base de datos
      $detalle = 'Este es un texto del entrenamiento basico inferior';
      $qery = mysqli_query($conn, "INSERT INTO entrenamientobasico (detalle) VALUES ('$detalle')");
      // Ejecutar la consulta SQL
      $res = mysqli_query($conn, $qery);
  }

  // Cerrar la conexión a la base de datos
  //mysqli_close($conn);
}
?>