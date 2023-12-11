export function convertHTMLtoPDF() {
  const { jsPDF } = window.jspdf;
  const currentDate = new Date();
  const pdfName = `factura_${currentDate.toISOString()}.pdf`;

  let doc = new jsPDF({
    orientation: "p",
    unit: "mm",
    format: [80,150],
  });
  let pdfjs = document.querySelector("#containerPDF");

  doc.html(pdfjs, {
    callback: function (doc) {
      doc.save(pdfName);
    },
    x: 0,
    y: 0,
  });
}
