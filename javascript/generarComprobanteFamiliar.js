/* Declarar las variables en el ámbito global */
let logoImage2;
let logoAnchoPulgadas;
let logoAlturaPulgadas;
let vencimientoPago;
let grupoFamiliarValue;
let cantidadClases;
let contenidoComprobante2; // Variable para almacenar el contenido del comprobante

function generarComprobanteGrupoFamiliar() {
    // Obtener los valores del grupo familiar
    const grupoFamiliarLabel = document.getElementById('grupoFamiliarLabel');
    grupoFamiliarValue = grupoFamiliarLabel.textContent.replace('Socios pertenecientes al grupo familiar (', '').replace(')', '');

    // Obtener los datos de los clientes y sus últimos pagos del grupo familiar
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const clientesPagos = JSON.parse(this.responseText);

            // Crear el contenido del comprobante
            contenidoComprobante2 = "Comprobante de Pago para Grupo Familiar\n";
            contenidoComprobante2 += "Grupo Familiar: " + grupoFamiliarValue + "\n\n";

            // Inicializar la variable para calcular el total abonado
            let totalAbonado = 0;

            clientesPagos.forEach(function (clientePago) {
                // Obtener los valores del último pago del cliente
                const montoPago = 'Monto: $' + clientePago.monto;
                const fechaPago = 'Fecha de pago: ' + clientePago.fecha_pago;
                vencimientoPago = 'Fecha de vencimiento: ' + clientePago.fecha_vencimiento;
                clases = 'Clases: ' + clientePago.clases;

                // Agregar los valores del cliente y su último pago al contenido del comprobante
                contenidoComprobante2 += "N° de Socio: " + clientePago.id + "\n";
                contenidoComprobante2 += "Nombre: " + clientePago.nombre + " " + clientePago.apellido + "\n";
                //.log('disciplina: ', clientePago.disciplina_dos);
                contenidoComprobante2 += "Disciplina: " + clientePago.disciplina + "\n";
                //contenidoComprobante2 += "Segunda disciplina: " + clientePago.disciplina_dos + "\n";
                contenidoComprobante2 += montoPago + "\n";
                contenidoComprobante2 += fechaPago + "\n";
                contenidoComprobante2 += vencimientoPago + "\n";
                contenidoComprobante2 += clases + "\n\n";

                // Calcular y agregar el monto al total abonado
                totalAbonado += parseFloat(clientePago.monto);
            });

            // Agregar el texto del total abonado al contenido del comprobante
            contenidoComprobante2 += "\nTotal Abonado: $" + totalAbonado.toFixed(2) + "\n\n\n\n"; // Mostrar el total con dos decimales

            contenidoComprobante2 += "Las clases solo se recuperan hasta: " + "\n" + vencimientoPago + "\n" + "SIN EXCEPCIÓN" + "\n\n";
            contenidoComprobante2 += "Una vez realizado el pago, " + "\n" + "NO SE REALIZAN DEVOLUCIONES";

            // Crear una instancia de jsPDF para el comprobante del grupo familiar
            const pdfForDownload = new jsPDF({
                format: [4, 8],
                unit: 'in'
            });

            // Precargar la imagen del logo
            logoImage2 = new Image();
            logoImage2.src = "../asets/Img/logo2.svg";

            // Esperar a que la imagen se cargue completamente
            logoImage2.onload = function() {
                // Ajustar el tamaño de fuente para que el contenido quepa en el canvas
                pdfForDownload.setFontSize(7);

                // Agregar el logo de la empresa en la parte superior izquierda del comprobante
                logoAnchoPulgadas = 0.75; // Ahora es la mitad del tamaño original (1.5 pulgadas / 2)
                const logoAspectRatio = logoImage2.width / logoImage2.height; // Relación de aspecto del logo
                logoAlturaPulgadas = logoAnchoPulgadas / logoAspectRatio;
                pdfForDownload.addImage(logoImage2, 'SVG', 0.5, 0.5, logoAnchoPulgadas, logoAlturaPulgadas);

                // Agregar el texto "Juan Aguirre Fitness" al costado del logo
                pdfForDownload.text(1.75, 0.75, "Juan Aguirre Fitness"); // Ajusta la posición del texto al costado del logo

                // Agregar el contenido real del comprobante con coordenadas ajustadas para que aparezca debajo del logo y texto
                pdfForDownload.text(0.5, 1.5, contenidoComprobante2); // Ajusta la posición del contenido debajo del logo y texto

                // Agregar el texto "Valido como Comprobante de Pago para Grupo Familiar" en el pie de la hoja
                pdfForDownload.text(0.5, 7.5, "Valido como Comprobante de Pago para Grupo Familiar");

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
                //document.getElementById("generarPDFFam").classList.add("d-none");
            };

            // Precargar la imagen del logo antes de generar el comprobante
            const logoPreload = new Image();
            logoPreload.src = "../asets/Img/logo2.svg";
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
        format: [4, 8],
        unit: 'in'
    });

    // Agregar el contenido del comprobante al PDF
    pdfForDownload.setFontSize(7);
    pdfForDownload.addImage(logoImage2, 'SVG', 0.5, 0.5, logoAnchoPulgadas, logoAlturaPulgadas);
    pdfForDownload.text(1.75, 0.75, "Juan Aguirre Fitness");
    pdfForDownload.text(0.5, 1.5, contenidoComprobante2);
    pdfForDownload.text(0.5, 7.5, "Valido como Comprobante de Pago para Grupo Familiar");

    const currentDate = new Date();
    const day = String(currentDate.getDate()).padStart(2, '0');
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const year = String(currentDate.getFullYear());
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');
  
    // Formatear la fecha y hora en un solo string sin espacios ni guiones
    const formattedDateTime = `${year}${month}${day}${hours}${minutes}${seconds}`;

    // Descargar el PDF con el nombre "comprobante-grupo-familiar.pdf"
    const grupoFamiliarForFileName = grupoFamiliarValue.replace(/\s+/g, '-').toLowerCase(); // Reemplazar espacios por guiones y convertir a minúsculas
    const fileName = `comprobanteJAF-grupofamiliar-${grupoFamiliarForFileName}-${formattedDateTime}.pdf`;
    pdfForDownload.save(fileName);
});
