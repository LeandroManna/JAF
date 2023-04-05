// Espera a que se cargue el documento antes de asignar eventos a los botones
document.addEventListener("DOMContentLoaded", function() {
    // Busca todos los botones de eliminar y les asigna un evento
    var botonesEliminar = document.querySelectorAll("#eliminar");
    botonesEliminar.forEach(function(botonEliminar) {
      botonEliminar.addEventListener("click", function() {
        // Obtiene el ID del cliente que se va a eliminar
        var clienteID = botonEliminar.dataset.clienteId;
        
        // Envía una petición AJAX para eliminar el cliente
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/eliminar-cliente.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Elimina la fila de la tabla correspondiente al cliente eliminado
            var filaEliminar = botonEliminar.closest("tr");
            filaEliminar.parentNode.removeChild(filaEliminar);
            
            // Muestra un mensaje de éxito
            /* var mensajeExito = document.createElement("div");
            mensajeExito.classList.add("alert", "alert-success");
            mensajeExito.textContent = "Cliente eliminado correctamente";
            document.querySelector("#mensaje-exito").appendChild(mensajeExito); */
          }
        };
        xhr.send("cliente_id=" + encodeURIComponent(clienteID));
      });
    });
  });