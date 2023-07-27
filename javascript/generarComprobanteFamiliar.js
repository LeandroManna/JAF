// Declarar las variables logoImage, logoWidthInches y logoHeightInches en el ámbito global
let logoImage;
let logoWidthInches;
let logoHeightInches;
let contenidoComprobante; // Variable para almacenar el contenido del comprobante

function generarComprobanteGrupoFamiliar() {
    // Obtener los valores del grupo familiar
    const grupoFamiliarLabel = document.getElementById('grupoFamiliarLabel');
    const grupoFamiliarValue = grupoFamiliarLabel.textContent.replace('Socios pertenecientes al grupo familiar (', '').replace(')', '');

    // Obtener los datos de los clientes y sus últimos pagos del grupo familiar
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const clientesPagos = JSON.parse(this.responseText);

            // Crear el contenido del comprobante
            contenidoComprobante = "Comprobante de Pago para Grupo Familiar\n";
            contenidoComprobante += "Grupo Familiar: " + grupoFamiliarValue + "\n\n";

            // Inicializar la variable para calcular el total abonado
            let totalAbonado = 0;

            clientesPagos.forEach(function (clientePago) {
                // Obtener los valores del último pago del cliente
                const montoPago = 'Monto: $' + clientePago.monto;
                const fechaPago = 'Fecha de pago: ' + clientePago.fecha_pago;
                const vencimientoPago = 'Fecha de vencimiento: ' + clientePago.fecha_vencimiento;

                // Agregar los valores del cliente y su último pago al contenido del comprobante
                contenidoComprobante += "N° de Socio: " + clientePago.id + "\n";
                contenidoComprobante += "Nombre: " + clientePago.nombre + " " + clientePago.apellido + "\n";
                contenidoComprobante += montoPago + "\n";
                contenidoComprobante += fechaPago + "\n";
                contenidoComprobante += vencimientoPago + "\n\n";

                // Calcular y agregar el monto al total abonado
                totalAbonado += parseFloat(clientePago.monto);
            });

            // Agregar el texto del total abonado al contenido del comprobante
            contenidoComprobante += "\nTotal Abonado: $" + totalAbonado.toFixed(2); // Mostrar el total con dos decimales

            // Crear una instancia de jsPDF para el comprobante del grupo familiar
            const pdfForDownload = new jsPDF({
                format: [4, 6],
                unit: 'in'
            });

            // Precargar la imagen del logo
            logoImage = new Image();
            logoImage.src = "../asets/Img/logo2.jpg";

            // Esperar a que la imagen se cargue completamente
            logoImage.onload = function() {
                // Ajustar el tamaño de fuente para que el contenido quepa en el canvas
                pdfForDownload.setFontSize(8);

                // Agregar el logo de la empresa en la parte superior izquierda del comprobante
                logoWidthInches = 0.75; // Ahora es la mitad del tamaño original (1.5 pulgadas / 2)
                const logoAspectRatio = logoImage.width / logoImage.height; // Relación de aspecto del logo
                logoHeightInches = logoWidthInches / logoAspectRatio;
                pdfForDownload.addImage(logoImage, 'JPG', 0.5, 0.5, logoWidthInches, logoHeightInches);

                // Agregar el texto "Juan Aguirre Fitness" al costado del logo
                pdfForDownload.text(1.75, 0.75, "Juan Aguirre Fitness"); // Ajusta la posición del texto al costado del logo

                // Agregar el contenido real del comprobante con coordenadas ajustadas para que aparezca debajo del logo y texto
                pdfForDownload.text(0.5, 1.5, contenidoComprobante); // Ajusta la posición del contenido debajo del logo y texto

                // Agregar el texto "Valido como Comprobante de Pago para Grupo Familiar" en el pie de la hoja
                pdfForDownload.text(0.5, 5.5, "Valido como Comprobante de Pago para Grupo Familiar");

                // Mostrar el comprobante en el elemento canvas
                const pdfData = pdfForDownload.output('arraybuffer');
                const loadingTask = pdfjsLib.getDocument({ data: pdfData });

                loadingTask.promise.then(function(pdfDocument) {
                    // Obtener la primera página del PDF
                    pdfDocument.getPage(1).then(function(page) {
                        const canvas = document.getElementById("pdfCanvasFam");
                        const context = canvas.getContext("2d");

                        // Establecer el tamaño del canvas para que coincida con el tamaño de la página
                        const viewport = page.getViewport({ scale: 1 });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        // Renderizar el contenido de la página en el canvas
                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        page.render(renderContext);
                    });
                });

                // Mostrar el botón "descargarPdfFam" y ocultar el botón "generarPDFFam"
                document.getElementById("descargarPdfFam").classList.remove("d-none");
                document.getElementById("generarPDFFam").classList.add("d-none");
            };

            // Precargar la imagen del logo antes de generar el comprobante
            const logoPreload = new Image();
            logoPreload.src = "../asets/Img/logo2.jpg";
        }
    };

    xhr.open('GET', `obtenerUltimosPagosGrupoFamiliar.php?grupo_familiar=${grupoFamiliarValue}`, true);
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
    const generarPDFFamButton = document.getElementById('generarPDFFam');
    generarPDFFamButton.addEventListener('click', generarComprobanteGrupoFamiliar);
});

// Función para descargar el PDF cuando se haga clic en el botón "descargarPdfFam"
document.getElementById("descargarPdfFam").addEventListener("click", function() {
    // Crear una instancia de jsPDF para descargar el comprobante del grupo familiar
    const pdfForDownload = new jsPDF({
        format: [5, 7],
        unit: 'in'
    });

    // Agregar el contenido del comprobante al PDF
    pdfForDownload.setFontSize(8);
    pdfForDownload.addImage(logoImage, 'JPG', 0.5, 0.5, logoWidthInches, logoHeightInches);
    pdfForDownload.text(1.75, 0.75, "Juan Aguirre Fitness");
    pdfForDownload.text(0.5, 2, contenidoComprobante);
    pdfForDownload.text(0.5, 6, "Valido como Comprobante de Pago para Grupo Familiar");

    // Descargar el PDF con el nombre "comprobante-grupo-familiar.pdf"
    const fileName = `comprobante-grupo-familiar.pdf`;
    pdfForDownload.save(fileName);
});
