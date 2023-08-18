<?php
include "conexion.php";

// Definir cuántas filas se mostrarán por página
$filasPorPagina = 10;

// Obtener el número total de filas
$sqlTotalFilas = "SELECT COUNT(*) as totalFilas FROM clientes";
$resultadoTotalFilas = mysqli_query($conn, $sqlTotalFilas);
$totalFilas = mysqli_fetch_assoc($resultadoTotalFilas)['totalFilas'];

// Obtener el número de páginas
$numPaginas = ceil($totalFilas / $filasPorPagina);

// Obtener la página actual (si no se especifica, se asume la primera página)
$paginaActual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

// Obtener la cadena de búsqueda (si no se especifica, se asume una cadena vacía)
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Calcular el desplazamiento
$offset = ($paginaActual - 1) * $filasPorPagina;

// Obtener las filas de la página actual que coinciden con la cadena de búsqueda
$sql = "SELECT * FROM clientes WHERE id LIKE '%$buscar%' OR apellido LIKE '%$buscar%' OR nombre LIKE '%$buscar%' OR dni LIKE '%$buscar%' OR disciplina LIKE '%$buscar%' LIMIT $filasPorPagina OFFSET $offset";

$resultado = mysqli_query($conn, $sql);


// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {

    //Boton de Busqueda
    echo "<form action='' method='GET'>
            <div class='input-group mb-3'>
              <input type='text' name='buscar' class='form-control form-control-sm' placeholder='Buscar' aria-label='Buscar' aria-describedby='basic-addon2' value='$buscar'>
              <div class='input-group-append'>
                <button class='btn btn-outline-secondary' name='buscar-btn' type='submit'><i class='fa fa-search'></i></button>
              </div>
            </div>
          </form>";
          
    // Crear la tabla HTML
    echo "<table class='table table-info table-striped centrado'>";
    echo "<tr>
              <th>N° de Socio</th>
              <th>1° Disciplina</th>
              <th>2° Disciplina</th>
              <th>Apellido</th>
              <th>Nombre</th>
              <th>Acciones</th>
          </tr>";

    // Recorrer los resultados y agregar cada fila a la tabla HTML
    while($fila = mysqli_fetch_assoc($resultado)) {
                
          echo "<tr data-id='" . $fila['id'] . "-" . $fila['id'] . "'>
                <td>" . $fila['id'] . "</td>
                <td>" . ucfirst($fila['disciplina']) . "</td>
                <td>" . ucfirst($fila['disciplina_dos']) . "</td>
                <td>" . $fila['apellido'] . "</td>
                <td>" . $fila['nombre'] . "</td>
                <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                      <button type='button' class='btn btn-success editar' name='editar' id='editar' data-id='" . $fila["id"] . "'><i class='fa-solid fa-user-pen'></i></button>
                      <button type='button' class='btn btn-info' name='eliminar' id='familiar' data-id='" . $fila["id"] . "'><i class='fa-solid fa-people-group'></i></button>
                      <button type='button' class='btn btn-danger' name='eliminar' id='eliminar' data-cliente-id='" . $fila["id"] . "'><i class='fa-solid fa-trash'></i></button>
                    </div>
                </td>
            </tr>";
    }
    // Cerrar la tabla HTML
    echo "</table>";

    // Mostrar botones de paginación
    echo "<div class='d-flex justify-content-center'>";
    if ($paginaActual > 1) {
        echo "<a href='?pagina=".($paginaActual-1)."' class='btn btn-secondary me-2'><i class='fa-solid fa-arrow-left'></i> Anterior</a>";
    }
    if ($paginaActual < $numPaginas) {
        echo "<a href='?pagina=".($paginaActual+1)."' class='btn btn-secondary'><i class='fa-solid fa-arrow-right'></i> Siguiente</a>";
    }
    echo "</div>";
    
} else {
  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
  echo "<script>
          Swal.fire({
            icon: 'info',
            title: 'No se encontraron clientes.',
            showConfirmButton: false,
            timer: 1500,
            didClose: () => {
                window.location.href = 'admin-clientes.php';
            }
          });
        </script>";
  exit();
}
?>