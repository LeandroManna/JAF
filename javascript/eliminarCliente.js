document.addEventListener("DOMContentLoaded", function() {
  var botonesEliminar = document.querySelectorAll("#eliminar");
  botonesEliminar.forEach(function(botonEliminar) {
      botonEliminar.addEventListener("click", function() {
          var clienteID = botonEliminar.dataset.clienteId;

          // Muestra un SweetAlert para confirmar la eliminación
          Swal.fire({
              title: '¿Estás seguro?',
              text: 'Esta acción eliminará al cliente permanentemente.',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Sí, eliminar',
              cancelButtonText: 'Cancelar'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Envía una petición AJAX para eliminar el cliente
                  var xhr = new XMLHttpRequest();
                  xhr.open("POST", "../php/eliminar-cliente.php", true);
                  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                          // Elimina la fila de la tabla correspondiente al cliente eliminado
                          var filaEliminar = botonEliminar.closest("tr");
                          filaEliminar.parentNode.removeChild(filaEliminar);

                          // Muestra un mensaje de éxito utilizando SweetAlert
                          Swal.fire({
                              icon: 'success',
                              title: 'Cliente eliminado correctamente',
                              showConfirmButton: false,
                              timer: 2000,
                              didClose: () => {
                                window.location.href = 'admin-clientes.php';
                            }
                          });
                      }
                  };
                  xhr.send("cliente_id=" + encodeURIComponent(clienteID));
              }
          });
      });
  });
});