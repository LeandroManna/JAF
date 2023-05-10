const btnEditar = document.querySelectorAll('#editar');
const formularioCliente = document.querySelector('#miDiv');
const divTabla = document.querySelector('#tabla');
const clienteId = document.querySelector('#id');
const inputNombre = document.querySelector('#nombre');
const inputApellido = document.querySelector('#apellido');
const inputDni = document.querySelector('#dni');
const inputFechaNacimiento = document.querySelector('#fecha_nacimiento');
const inputCelular = document.querySelector('#celular');
const inputDetalle = document.querySelector('#detalle');
const inputDisciplina = document.querySelector('#disciplina');
const inputDisciplinaDos = document.querySelector('#disciplina_dos');
const btnGuardar = document.querySelector('#editarCliente');

btnEditar.forEach(btn => {
  btn.addEventListener('click', () => {
    // Obtener el id del cliente a editar desde el atributo data-id
    const id = btn.getAttribute('data-id');
    // Obtener los datos del cliente desde la base de datos usando una petición AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `../php/obtenerCliente.php?id=${id}`, true);
    xhr.onload = function() {
      if (this.status === 200) {
        const cliente = JSON.parse(this.responseText);
        // Mostrar el formulario y autocompletar los datos del cliente
        divTabla.classList.add('d-none');
        formularioCliente.classList.remove('d-none');
        
        clienteId.value = cliente.id;
        inputNombre.value = cliente.nombre;
        inputApellido.value = cliente.apellido;
        inputDni.value = cliente.dni;
        inputFechaNacimiento.value = cliente.fecha_nacimiento;
        inputCelular.value = cliente.celular;
        inputDisciplina.value = cliente.disciplina;
        inputDisciplinaDos.value = cliente.disciplina_dos;
        inputDetalle.value = cliente.detalle;
      }
    }
    xhr.send();
  });
}); 

btnGuardar.addEventListener('click', () => {
  const id = clienteId.value;
  const nombre = inputNombre.value;
  const apellido = inputApellido.value;
  const dni = inputDni.value;
  const fechaNacimiento = inputFechaNacimiento.value;
  const celular = inputCelular.value;
  const detalle = inputDetalle.value;
  
  // Obtener el valor seleccionado del select "changeDisciplina"
  const nuevaDisciplina = document.getElementById('changeDisciplina').value;
  const segundaDisciplina = document.getElementById('addDisciplina').value;

  // Actualizar los datos del cliente en la base de datos usando una petición AJAX
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../php/editarCliente.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (this.status === 200) {
      // Ocultar el formulario y recargar la página
      formularioCliente.classList.add('d-none');
      divTabla.classList.remove('d-none');
      window.location.reload();
    }
  }
  xhr.send(`id=${id}&nombre=${nombre}&apellido=${apellido}&dni=${dni}&fecha_nacimiento=${fechaNacimiento}&celular=${celular}&detalle=${detalle}&disciplina=${nuevaDisciplina}&disciplina_dos=${segundaDisciplina}`);
});


