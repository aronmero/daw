/**
 * Description placeholder
 * @date 1/7/2024 - 8:14:14 PM
 * @author Aarón Medina Rodríguez
 *
 * @export
 * @param {Array} aFactura
 */
export function crearFactura(aFactura) {
  const { jsPDF } = window.jspdf;
  const currentDate = new Date();
  const pdfName = `factura_${currentDate.toISOString()}.pdf`;

  let doc = new jsPDF({
    orientation: "p",
    unit: "mm",
    format: [80, 150],
  });
  doc.setFontSize(16);
  doc.text(10, 10, "Factura");

  doc.text(10, 20, `Fecha: ${currentDate.toLocaleDateString()}`);
  let altura = 25;
  aFactura.forEach((element) => {
    doc.setFontSize(12);
    altura = altura + 5;

    if (altura > 150) {
      doc.addPage();
      altura = 20;
    }
    doc.text(10, altura, element.cantidad + " " + element.coctel.nombre);
  });

  doc.save(pdfName);
}
