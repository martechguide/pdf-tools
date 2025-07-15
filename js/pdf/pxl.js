function handleFileUpload(file) {
    if (file.type !== "application/pdf") {
      alert("Please upload a PDF file.");
      return;
    }

    document.getElementById('fileName').textContent += file.name;
    document.getElementById("conversion-section").style.display = "block";
    document.getElementById("refresh-button").style.display = "inline";
  }

  document.getElementById("pdfFile").addEventListener("change", function () {
    handleFileUpload(this.files[0]);
  });

  var dragDropArea = document.getElementById("drag-drop-area");
  dragDropArea.addEventListener("dragover", function (event) {
    event.preventDefault();
    this.style.borderColor = "#007bff";
  });
  dragDropArea.addEventListener("dragleave", function () {
    this.style.borderColor = "#ccc";
  });
  dragDropArea.addEventListener("drop", function (event) {
    event.preventDefault();
    this.style.borderColor = "#ccc";
    var file = event.dataTransfer.files[0];
    if (file.type !== "application/pdf") {
      alert("Please upload a PDF file.");
      return;
    }
    document.getElementById("pdfFile").files = event.dataTransfer.files;
    handleFileUpload(file);
  });

  document.getElementById("convert-button").addEventListener("click", async function () {
    const file = document.getElementById('pdfFile').files[0];
    if (!file) {
      alert('Please select a PDF file.');
      return;
    }

    const progressBar = document.getElementById('progressBar');
    progressBar.style.display = 'block';
    const progressBarFill = document.getElementById('progressBarFill');

    const reader = new FileReader();
    reader.onload = async function() {
      const typedArray = new Uint8Array(reader.result);
      const pdf = await pdfjsLib.getDocument(typedArray).promise;

      const workbook = XLSX.utils.book_new();
      for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
        const page = await pdf.getPage(pageNum);
        const textContent = await page.getTextContent();
        const pageText = textContent.items.map(item => item.str);

        const worksheetData = pageText.map(text => ({ Text: text }));
        const worksheet = XLSX.utils.json_to_sheet(worksheetData);
        XLSX.utils.book_append_sheet(workbook, worksheet, `Page_${pageNum}`);

        const progress = Math.round((pageNum / pdf.numPages) * 100);
        progressBarFill.value = progress;
        progressBarFill.textContent = progress + '%';
      }

      const excelBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
      saveAsExcel(excelBuffer, 'converted_data.xlsx');

      progressBarFill.value = 100;
      progressBarFill.textContent = 'Conversion complete!';
    };
    reader.readAsArrayBuffer(file);
  });

  function saveAsExcel(buffer, filename) {
    const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
    const a = document.createElement('a');
    const url = URL.createObjectURL(blob);
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    setTimeout(() => {
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
    }, 0);
  }

  function resetForm() {
    document.getElementById('pdfFile').value = '';
    document.getElementById('fileName').textContent = '';
    document.getElementById("conversion-section").style.display = "none";
    document.getElementById("progressBar").style.display = "none";
    document.getElementById("refresh-button").style.display = "none";
  }

  document.getElementById("refresh-button").addEventListener("click", function () {
    resetForm();
  });