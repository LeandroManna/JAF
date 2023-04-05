
$(document).ready(function() {
  // ocultar todos los divs de entrenamiento
  $('#entrenamientoBasico').hide();
  $('#entrenamientoIntermedio').hide();
  $('#entrenamientoAvanzado').hide();
  $('#entrenamientoPiernas').hide();

  // agregar evento onChange al select
  $('#selectOption').change(function() {
    // obtener el valor seleccionado
    var selectedOption = $(this).children("option:selected").val();
  
    // mostrar el div correspondiente y ocultar los demás
    if (selectedOption === 'eBasico') {
      $('#entrenamientoBasico').show();
      $('#entrenamientoIntermedio').hide();
      $('#entrenamientoAvanzado').hide();
      $('#entrenamientoPiernas').hide();
    } else if (selectedOption === 'eIntermedio') {
      $('#entrenamientoBasico').hide();
      $('#entrenamientoIntermedio').show();
      $('#entrenamientoAvanzado').hide();
      $('#entrenamientoPiernas').hide();
    } else if (selectedOption === 'eAvanzado') {
      $('#entrenamientoBasico').hide();
      $('#entrenamientoIntermedio').hide();
      $('#entrenamientoAvanzado').show();
      $('#entrenamientoPiernas').hide();
    } else if (selectedOption === 'ePiernas') {
      $('#entrenamientoBasico').hide();
      $('#entrenamientoIntermedio').hide();
      $('#entrenamientoAvanzado').hide();
      $('#entrenamientoPiernas').show();
    } else {
      $('#entrenamientoBasico').hide();
      $('#entrenamientoIntermedio').hide();
      $('#entrenamientoAvanzado').hide();
      $('#entrenamientoPiernas').hide();
    } 
  });
});
