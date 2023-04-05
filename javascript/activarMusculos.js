
/* ESTE CODIGO SE DEBE REUTILIZAR EN UN ARCHIVO.PHP PARA QEU NO GENERE ERRORES
ESTA DISEÑADO PARA TRAER LOS DATOS DE LA TABLA ACTIVACIONMUSCULAR */


var brazos = '<?php echo nl2br(implode('\n', $brazos)); ?>';
if (document.getElementById('brazo')) {
    document.getElementById('brazo').value += brazos;
}
var pechos = '<?php echo nl2br(implode('\n', $pechos)); ?>';
if (document.getElementById('pecho')) {
    document.getElementById('pecho').value += pechos;
}
var abdominales = '<?php echo nl2br(implode('\n', $abdominales)); ?>';
if (document.getElementById('abdominal')) {
    document.getElementById('abdominal').value += abdominales;
}
var piernas = '<?php echo nl2br(implode('\n', $piernas)); ?>';
if (document.getElementById('pierna')) {
    document.getElementById('pierna').value += piernas;
}