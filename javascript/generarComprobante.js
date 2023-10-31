// Declarar las variables logoImage, logoWidthInches y logoHeightInches en el ámbito global
let logoImage;
let logoWidthInches;
let logoHeightInches;
let apellidoCliente;
let contenidoComprobante; // Variable para almacenar el contenido del comprobante

document.getElementById("generarPDF").addEventListener("click", function() {
  // Obtener los valores del último pago
  var montoPago = document.querySelector('#ultimoPago p:nth-child(2)').textContent;
  var fechaPago = document.querySelector('#ultimoPago p:nth-child(3)').textContent;
  var vencimientoPago = document.querySelector('#ultimoPago p:nth-child(4)').textContent;

  // Obtener los demás valores del formulario
  var idCliente = document.getElementById("id").value;
  var nombreCliente = document.getElementById("nombre").value;
  apellidoCliente = document.getElementById("apellido").value;
  var clasesCliente = document.getElementById("clases").value;
  var disciplinaCliente = document.getElementById("disciplina").value; // Nueva variable para obtener la disciplina del cliente
  var disciplinaCliente2 = document.getElementById("disciplina_dos").value;
  //console.log('disciplina del comprobante: ', disciplinaCliente);
  //console.log('Segunda disciplina del comprobante: ', disciplinaCliente2);

  // Crear el contenido del comprobante
  contenidoComprobante = "Comprobante de Pago\n";
  contenidoComprobante += "N° de Socio: " + idCliente + "\n";
  contenidoComprobante += "Nombre: " + nombreCliente + " " + apellidoCliente + "\n\n";
  contenidoComprobante += "Disciplina: " + disciplinaCliente + "\n"; // Agregar la disciplina al contenido del comprobante
  //contenidoComprobante += "Segunda Disciplina: " + disciplinaCliente2 + "\n";
  contenidoComprobante += montoPago + "\n";
  contenidoComprobante += fechaPago + "\n";
  contenidoComprobante += vencimientoPago + "\n\n";

  // Verificar si hay datos del segundo pago y agregarlos si existen
  if (disciplinaCliente2 !== "" && disciplinaCliente2 !== " ") {

    var montoPagoDos = document.querySelector('#ultimoPago p:nth-child(6)').textContent;
    var fechaPagoDos = document.querySelector('#ultimoPago p:nth-child(7)').textContent;
    var vencimientoPagoDos = document.querySelector('#ultimoPago p:nth-child(8)').textContent;

    contenidoComprobante += "Segunda disciplina: " + disciplinaCliente2 + "\n";
    contenidoComprobante += montoPagoDos + "\n";
    contenidoComprobante += fechaPagoDos + "\n";
    contenidoComprobante += vencimientoPagoDos + "\n\n";
  }

  contenidoComprobante += "Cantidad de clases: " + clasesCliente + "\n\n\n";
  contenidoComprobante += "Las clases solo se recuperan hasta: " + "\n" + vencimientoPago + "\n" + "SIN EXCEPCIÓN" + "\n\n";
  contenidoComprobante += "Una vez realizado el pago, " + "\n" + "NO SE REALIZAN DEVOLUCIONES";

  // Crear una instancia de jsPDF y establecer el tamaño de hoja a 7x4 pulgadas o 17x10 cm
  const pdf = new jsPDF({
    format: [4, 6], // Tamaño de la hoja en pulgadas (ancho x alto)
    unit: 'in' // Unidad de medida: pulgadas
  });

  // Precargar la imagen del logo
  logoImage = new Image();
  logoImage.src = "../asets/Img/logo2.svg";

  // Esperar a que la imagen se cargue completamente
  logoImage.onload = function() {
    // Ajustar el tamaño de fuente para que el contenido quepa en el canvas
    pdf.setFontSize(8);

    // Agregar el logo de la empresa en la parte superior izquierda del canvas
    logoWidthInches = 0.75; // Ahora es la mitad del tamaño original (1.5 pulgadas / 2)
    const logoAspectRatio = logoImage.width / logoImage.height; // Relación de aspecto del logo
    logoHeightInches = logoWidthInches / logoAspectRatio;
    pdf.addImage(logoImage, 'SVG', 0.5, 0.5, logoWidthInches, logoHeightInches);

    // Agregar el texto "Juan Aguirre Fitness" al costado del logo
    pdf.text(1.75, 0.75, "Juan Aguirre Fitness"); // Ajusta la posición del texto al costado del logo

    // Agregar el contenido real del comprobante con coordenadas ajustadas para que aparezca debajo del logo y texto
    pdf.text(0.5, 1.5, contenidoComprobante); // Ajusta la posición del contenido debajo del logo y texto

    // Agregar el texto "Valido como Comprobante de Pago" en el pie de la hoja
    pdf.text(1, 5.8, "Valido como Comprobante de Pago");

        // Obtener el contenido del PDF como base64
    const pdfBase64 = pdf.output('datauristring');

    // Crear una nueva instancia de PDF.js para renderizar el PDF en el canvas
    const pdfData = atob(pdfBase64.split(',')[1]);
    const loadingTask = pdfjsLib.getDocument({ data: pdfData });

    loadingTask.promise.then(function(pdfDocument) {
      // Obtener la primera página del PDF
      pdfDocument.getPage(1).then(function(page) {
        const canvas = document.getElementById("pdfCanvas");
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

    // Mostrar el botón "descargarPdf" y ocultar el botón "generarPDF"
    document.getElementById("descargarPdf").classList.remove("d-none");
    //document.getElementById("generarPDF").classList.add("d-none");
  };
  
  // Precargar la imagen del logo antes de generar el comprobante
  const logoPreload = new Image();
  logoPreload.src = "../asets/Img/logo2.svg";
});

document.getElementById("descargarPdf").addEventListener("click", function() {
  // Obtener el número de WhatsApp del socio
  const numeroWhatsApp = document.getElementById("celular").value;
  
  // Agregar el código de país "54" al número de WhatsApp
  const numeroConCodigoDePais = `54${numeroWhatsApp}`;
  
  // Crear una instancia de jsPDF para descargar el comprobante
  const pdfForDownload = new jsPDF({
    format: [4, 6],
    unit: 'in'
  });
  
  // Agregar el contenido del comprobante al PDF
  pdfForDownload.setFontSize(10);
  pdfForDownload.addImage(logoImage, 'SVG', 0.5, 0.5, logoWidthInches, logoHeightInches);
  pdfForDownload.text(1.75, 0.75, "Juan Aguirre Fitness");
  pdfForDownload.text(0.5, 1.5, contenidoComprobante);
  pdfForDownload.text(1, 5.8, "Valido como Comprobante de Pago");

  // Obtener la fecha y hora actual para agregar al nombre del PDF
  const currentDate = new Date();
  const day = String(currentDate.getDate()).padStart(2, '0');
  const month = String(currentDate.getMonth() + 1).padStart(2, '0');
  const year = String(currentDate.getFullYear());
  const hours = String(currentDate.getHours()).padStart(2, '0');
  const minutes = String(currentDate.getMinutes()).padStart(2, '0');
  const seconds = String(currentDate.getSeconds()).padStart(2, '0');

  // Formatear la fecha y hora en un solo string sin espacios ni guiones
  const formattedDateTime = `${year}${month}${day}${hours}${minutes}${seconds}`;
  
  // Descargar el PDF con el nombre "comprobante-(apellido).pdf"
  const apellidoClienteForFileName = apellidoCliente.replace(/\s+/g, '-').toLowerCase(); // Reemplazar espacios por guiones y convertir a minúsculas
  const fileName = `comprobanteJAF-${apellidoClienteForFileName}-${formattedDateTime}.pdf`;
  pdfForDownload.save(fileName);
  
    // Abrir WhatsApp con el número del socio al hacer clic en el botón "descargarPdf"
    const urlWhatsApp = `https://wa.me/${numeroConCodigoDePais}`;
    window.open(urlWhatsApp);
  });
