const btnEditar = document.querySelectorAll('#editar');
const btnFamiliar = document.querySelectorAll('#familiar');
const formularioCliente = document.querySelector('#miDiv');
const divFamiliar = document.querySelector('#gFamiliar');
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
const inputClases = document.querySelector('#clases');
const btnGuardar = document.querySelector('#editarCliente');
const inputFamiliar = document.querySelector('#grupoFamiliar');
const boxDisciplinaDos = document.querySelector('#boxDisciplinaDos');
const textSegundoPago = document.querySelector('#textSegundoPago');
const textPrimerPago = document.querySelector('#textPrimerPago');

/* INICIO VARIABLES GLOBALES DEL GRUPO FAMILIAR */
const grupoFamiliarLabel = document.querySelector('#grupoFamiliarLabel');


// Definir la función para mostrar los datos del cliente en el formulario
function mostrarCliente(cliente) {
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
  inputClases.value = cliente.clases;
  inputFamiliar.value = cliente.grupo_familiar;

  textPrimerPago.textContent = "Pago correspondiente a " + inputDisciplina.value;

  if (inputDisciplinaDos.value !== "" && inputDisciplinaDos.value !== " ") {
    boxDisciplinaDos.classList.remove('d-none');
    textSegundoPago.textContent = "Pago correspondiente a " + inputDisciplinaDos.value;
  }
}
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
        //console.log(cliente); //MUESTRA LOS DATOS ALMACENADOS EN cliente
        // Mostrar el formulario y autocompletar los datos del cliente
        mostrarCliente(cliente);
      }
    };
    xhr.send();
  });
});


btnFamiliar.forEach(btn => {
  btn.addEventListener('click', () => {
    const id2 = btn.getAttribute('data-id');
    const xhr2 = new XMLHttpRequest();
    xhr2.open('GET', `../php/obtenerClientesPorGrupoFamiliar.php?id=${id2}`, true); // Archivo PHP para obtener clientes por grupo familiar
    xhr2.onload = function () {
      if (this.status === 200) {
        const clientes = JSON.parse(this.responseText);

        // Mostrar el div de grupo familiar y ocultar el div de tabla
        divTabla.classList.add('d-none');
        formularioCliente.classList.add('d-none');
        divFamiliar.classList.remove('d-none');
        // Mostrar el nombre del grupo familiar en el label del div "gFamiliar"
        grupoFamiliarLabel.textContent = `Socios pertenecientes al grupo familiar (${clientes[0].grupo_familiar})`;

        // Limpiar el formulario para agregar nuevos campos
        document.getElementById('formFam').innerHTML = '';

        // Recorrer los clientes y crear los campos del formulario para cada uno
        clientes.forEach(clienteData => {
          cliente = clienteData; // Asignar el objeto cliente en el contexto actual del forEach

          const formFam = document.getElementById('formFam');

          // Crear un nuevo div para agrupar cada conjunto de input con su label y otro para flexbox
          const divClienteContainer = document.createElement('div');
          divClienteContainer.classList.add('d-flex', 'flex-column', 'border', 'border-2', 'pt-2', 'rounded-3', 'mb-3');

          // Crear un div para agrupar los datos del cliente
          const divDatosCliente = document.createElement('div');
          divDatosCliente.classList.add('mb-2');

          // Mostrar los datos del cliente en un label
          const datosClienteLabel = document.createElement('label');
          datosClienteLabel.classList.add('form-label');
          datosClienteLabel.textContent = `Datos del cliente - N° de Socio: ${cliente.id} - ${cliente.apellido} ${cliente.nombre} - Disciplina: ${cliente.disciplina} - Segunda disciplina: ${cliente.disciplina_dos}`;
          divDatosCliente.appendChild(datosClienteLabel);

          // Agregar el div de datos del cliente al div contenedor
          divClienteContainer.appendChild(divDatosCliente);

          // Crear un div para agrupar los campos de entrada (inputs)
          const divInputs = document.createElement('div');
          divInputs.classList.add('d-flex', 'flex-wrap', 'justify-content-center'); // Flexbox para acomodar los inputs

          // Crear el div y el label para el campo Cantidad de clases
          const divClases = createInputDiv('clases', 'number', cliente.clases, false, 'mb-1', 'col-md-2', 'mx-1');
          divInputs.appendChild(divClases);
          divClases.lastChild.setAttribute('id', cliente.id); // Añadir el atributo al input

          // Crear el div y el label para el campo Monto
          const divMonto = createInputDiv(`monto`, 'number', '', false, 'mb-1', 'col-md-2', 'mx-1');
          divInputs.appendChild(divMonto);
          divMonto.lastChild.setAttribute('id', cliente.id); // Añadir el atributo al input

          // Crear el div y el label para el campo Fecha de pago
          const divFechaPago = createInputDiv(`fecha_pago`, 'date', '', false, 'mb-1', 'col-md-2', 'mx-1');
          divInputs.appendChild(divFechaPago);
          divFechaPago.lastChild.setAttribute('id', cliente.id); // Añadir el atributo al input

          // Crear el div y el label para el campo Fecha de vencimiento
          const divFechaVencimiento = createInputDiv(`fecha_vencimiento`, 'date', '', false, 'mb-1', 'col-md-2', 'mx-1');
          divInputs.appendChild(divFechaVencimiento);
          divFechaVencimiento.lastChild.setAttribute('id', cliente.id); // Añadir el atributo al input

          // Crear el div y el label para el campo Forma de pago
          const divFormaPago = createInputDiv(`forma_pago`, 'text', '', false, 'mb-1', 'col-md-2', 'mx-1');
          divInputs.appendChild(divFormaPago);
          divFormaPago.lastChild.setAttribute('id', cliente.id); // Añadir el atributo al input

          // Agregar el div de inputs al div contenedor
          divClienteContainer.appendChild(divInputs);

          // Agregar el div del cliente al formulario
          formFam.appendChild(divClienteContainer);

          // Función para crear un div con un input y su respectivo label
          function createInputDiv(labelText, inputType, inputValue, readOnly, ...divClasses) {
            const divInput = document.createElement('div');
            divClasses.forEach(className => divInput.classList.add(className));

            const input = document.createElement('input');
            input.type = inputType;
            input.classList.add('form-control');
            input.name = labelText; // El nombre específico que proporcionaste
            input.value = inputValue;
            input.readOnly = readOnly;
            input.setAttribute('id', cliente.id);

            const label = document.createElement('label');
            label.classList.add('form-label');
            label.textContent = labelText;

            divInput.appendChild(label);
            divInput.appendChild(input);

            return divInput;
          }
        });

        // Crear el div para los botones
        const divBotones = document.createElement('div');
        divBotones.classList.add('d-flex', 'justify-content-center', 'btn-group', 'my-3');

        // Crear el botón "Guardar Pago"
        const btnGuardarPago = document.createElement('button');
        btnGuardarPago.type = 'button'; // Cambiar el tipo de botón a "button" para evitar que envíe el formulario
        btnGuardarPago.name = 'button';
        btnGuardarPago.classList.add('btn', 'btn-success', 'mx-1', 'rounded-3');
        btnGuardarPago.textContent = 'Guardar Pago';

        function guardarPago(clienteId, clasesValue) {
          // Crear una nueva instancia de XMLHttpRequest
          const xhr = new XMLHttpRequest();

          // Especificar el método y la URL para la petición
          xhr.open('POST', '../php/actualizarClasesCliente.php', true);

          // Establecer el tipo de contenido de la solicitud
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

          // Definir la función que se ejecutará cuando la solicitud finalice
          xhr.onload = function () {
            if (xhr.status === 200) {
              // La solicitud se completó con éxito
              console.log('Clases actualizadas correctamente');
              // Aquí puedes realizar acciones adicionales después de actualizar las clases, si es necesario
            } else {
              // La solicitud falló con algún error
              console.error('Error al actualizar las clases');
              // Aquí puedes manejar el error de acuerdo a tus necesidades
            }
          };

          // Definir los datos que se enviarán en la solicitud (clienteId y clasesValue)
          const data = `id=${clienteId}&clases=${clasesValue}`;

          // Enviar la solicitud al servidor con los datos
          xhr.send(data);
        }


// Agregar evento al botón "Guardar Pago"
btnGuardarPago.addEventListener('click', () => {
  // Obtener todos los conjuntos de inputs de pagos
  const pagosInputs = document.querySelectorAll('.d-flex.flex-wrap.justify-content-center');

  // Recorrer todos los conjuntos de inputs y guardar los pagos
  pagosInputs.forEach(pagosInput => {
    const clienteId = pagosInput.querySelector('[name="clases"]').getAttribute('id');
    const clasesValue = pagosInput.querySelector('[name="clases"]').value;
    const montoValue = pagosInput.querySelector('[name="monto"]').value;
    const fechaPagoValue = pagosInput.querySelector('[name="fecha_pago"]').value;
    const fechaVencimientoValue = pagosInput.querySelector('[name="fecha_vencimiento"]').value;
    const formaPagoValue = pagosInput.querySelector('[name="forma_pago"]').value;

    // Si el cliente tiene clases, actualizamos el campo clases en la tabla clientes
    if (clasesValue !== '') {
      guardarPago(clienteId, clasesValue);
    }

    // Si se ingresaron datos de pago, realizamos el INSERT INTO en la tabla pagos
    if (montoValue !== '' && fechaPagoValue !== '' && fechaVencimientoValue !== '' && formaPagoValue !== '') {
      // Crear un objeto con los datos del pago del cliente actual
      const pagoData = {
        id: clienteId,
        monto: montoValue,
        fecha_pago: fechaPagoValue,
        fecha_vencimiento: fechaVencimientoValue,
        forma_pago: formaPagoValue,
      };

      // Enviar los datos de pago al servidor mediante una petición AJAX para realizar el INSERT INTO
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../php/insertarPago.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function () {
        if (xhr.status === 200) {
          // La solicitud se completó con éxito
          console.log('Pago insertado correctamente');
          // Aquí puedes realizar acciones adicionales después de insertar el pago, si es necesario
          //alert('Pago generado correctamente');
        } else {
          // La solicitud falló con algún error
          console.error('Error al insertar el pago');
          // Aquí puedes manejar el error de acuerdo a tus necesidades
        }
      };

      // Definir los datos que se enviarán en la solicitud (pagoData)
      const data = `id=${pagoData.id}&monto=${pagoData.monto}&fecha_pago=${pagoData.fecha_pago}&fecha_vencimiento=${pagoData.fecha_vencimiento}&forma_pago=${pagoData.forma_pago}`;

      // Enviar la solicitud al servidor con los datos
      xhr.send(data);
    }
  });
  Swal.fire({
    icon: 'success',
    title: '¡Datos actualizados correctamente!',
    text: 'Todos los datos han sido actualizados exitosamente.',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Aceptar'
  });
});

        // Crear el botón "Volver"
        const btnVolver = document.createElement('a');
        btnVolver.href = 'admin-clientes.php';
        btnVolver.classList.add('btn', 'btn-info', 'mx-1', 'rounded-3');
        btnVolver.textContent = 'Volver';

        // Agregar los botones al div de botones
        divBotones.appendChild(btnGuardarPago);
        divBotones.appendChild(btnVolver);

        // Agregar el div de botones al formulario
        document.getElementById('formFam').appendChild(divBotones);
      }
    };
    xhr2.send();
  });
});


// Capture the "Guardar" button click event
btnGuardar.addEventListener('click', () => {

  event.preventDefault(); // Evita el comportamiento predeterminado del botón

  const id = clienteId.value;
  const nombre = inputNombre.value;
  const apellido = inputApellido.value;
  const dni = inputDni.value;
  const fechaNacimiento = inputFechaNacimiento.value;
  const celular = inputCelular.value;
  const detalle = inputDetalle.value;
  const grupoFamiliar = inputFamiliar.value;
  const clases = inputClases.value;

  // Obtener el valor seleccionado del select "changeDisciplina"
  const nuevaDisciplina = document.getElementById('changeDisciplina').value;
  const segundaDisciplina = document.getElementById('addDisciplina').value;

  // Check which select options are selected and send the appropriate data in the AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../php/editarCliente.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (this.status === 200) {
      // Mostrar SweetAlert de éxito
      Swal.fire({
          icon: 'success',
          title: 'Datos modificados con éxito',
          showConfirmButton: false,
          timer: 3000, // Tiempo en milisegundos antes de que la ventana se cierre automáticamente
          didClose: () => {
            // Luego de cerrar el SweetAlert, redirige o actualiza la página si es necesario
            window.location.href = 'admin-clientes.php';
          }
      });
  }  
  }

  // Send the appropriate data based on the selected options
  if (nuevaDisciplina !== '' && segundaDisciplina !== '') {
    // Se han seleccionado ambos select, se modifican ambos campos
    xhr.send(`id=${id}&nombre=${nombre}&apellido=${apellido}&dni=${dni}&fecha_nacimiento=${fechaNacimiento}&celular=${celular}&detalle=${detalle}&disciplina=${nuevaDisciplina}&disciplina_dos=${segundaDisciplina}&clases=${clases}&grupo_familiar=${grupoFamiliar}`);
  } else if (nuevaDisciplina !== '') {
    // Solo se ha seleccionado el primer select, se modifica solo el primer campo
    xhr.send(`id=${id}&nombre=${nombre}&apellido=${apellido}&dni=${dni}&fecha_nacimiento=${fechaNacimiento}&celular=${celular}&detalle=${detalle}&disciplina=${nuevaDisciplina}&disciplina_dos=${inputDisciplinaDos.value}&clases=${clases}&grupo_familiar=${grupoFamiliar}`);
  } else if (segundaDisciplina !== '') {
    // Solo se ha seleccionado el segundo select, se modifica solo el segundo campo
    xhr.send(`id=${id}&nombre=${nombre}&apellido=${apellido}&dni=${dni}&fecha_nacimiento=${fechaNacimiento}&celular=${celular}&detalle=${detalle}&disciplina=${inputDisciplina.value}&disciplina_dos=${segundaDisciplina}&clases=${clases}&grupo_familiar=${grupoFamiliar}`);
  } else {
    // No se ha seleccionado ninguna disciplina, se mantienen los campos como están
    xhr.send(`id=${id}&nombre=${nombre}&apellido=${apellido}&dni=${dni}&fecha_nacimiento=${fechaNacimiento}&celular=${celular}&detalle=${detalle}&disciplina=${inputDisciplina.value}&disciplina_dos=${inputDisciplinaDos.value}&clases=${clases}&grupo_familiar=${grupoFamiliar}`);
  }
});

