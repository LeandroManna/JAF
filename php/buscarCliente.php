<?php
include "conexion.php";
// Obtener la cadena de búsqueda (si no se especifica, se asume una cadena vacía)
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
// Obtener las filas de la página actual que coinciden con la cadena de búsqueda
$sql = "SELECT * FROM clientes WHERE id LIKE '%$buscar%'";
$resultado = mysqli_query($conn, $sql);
// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
