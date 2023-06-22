document.getElementById("paymentForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que se envíe el formulario de manera convencional

    // Obtener los datos del formulario
    var nombre = document.getElementsByName("nombre")[0].value;
    var monto = document.getElementsByName("monto")[0].value;

    // Realizar una solicitud POST al archivo PHP para guardar los datos en la base de datos
    axios.post("guardar_pago.php", { nombre: nombre, monto: monto })
        .then(function(response) {
            // Si se guardan los datos correctamente, generar el PDF y enviarlo por WhatsApp
            if (response.data === "Pago registrado correctamente") {
                // Aquí puedes usar una biblioteca para generar el PDF, como jsPDF o PDFKit
                // Después de generar el PDF, puedes utilizar una biblioteca o API de WhatsApp para enviarlo
                // (es importante tener en cuenta las políticas de privacidad y uso de WhatsApp en tu región)
            }
        })
        .catch(function(error) {
            console.log(error);
        });
});
