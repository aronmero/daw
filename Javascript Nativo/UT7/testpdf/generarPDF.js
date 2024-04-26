export function convertHTMLtoPDF() {
    const { jsPDF } = window.jspdf;

    let doc = new jsPDF("l", "mm", [500, 500]);
    let pdfjs = document.querySelector("#containerBebidas");

    doc.html(pdfjs, {
      callback: function (doc) {
        doc.save("newpdf.pdf");
      },
      x: 12,
      y: 12,
    });
  }