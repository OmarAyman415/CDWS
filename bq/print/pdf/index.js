window.onload = function () {
  document.getElementById("download").addEventListener("click", () => {
    const invoice = this.document.getElementById("test");
    console.log(invoice);
    console.log(window);
    var opt = {
      margin: 1,
      filename: "myfile.pdf",
      image: { type: "jpeg", quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: "in", format: "A3", orientation: "landscape" },
    };
    html2pdf().from(invoice).set(opt).save();
  });
};
