  let originalPdfBytes;

  // Handle file drag-and-drop
  const dragDropArea = document.getElementById('dragDropArea');
  dragDropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = '#666';
  });

  dragDropArea.addEventListener('dragleave', () => {
    dragDropArea.style.borderColor = '#ccc';
  });

  dragDropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = '#ccc';
    const file = e.dataTransfer.files[0];
    if (file && file.type === 'application/pdf') {
      handleFile(file);
    } else {
      alert('Please drop a valid PDF file.');
    }
  });

  function handleFile(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      originalPdfBytes = new Uint8Array(e.target.result);
      document.getElementById('fileInfo').textContent = `File name: ${file.name}`;
      document.getElementById('fileInfo').style.display = 'block';
      document.getElementById('splitButton').style.display = 'block';
      document.getElementById('progressBarContainer').style.display = 'none'; // Hide progress bar initially
    };
    reader.readAsArrayBuffer(file);
  }

  // Handle file selection from the file input
  document.getElementById('pdfInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file && file.type === 'application/pdf') {
      handleFile(file);
    } else {
      alert('Please select a valid PDF file.');
    }
  });

  async function splitPDF() {
    if (!originalPdfBytes) {
      alert("Please upload a PDF first.");
      return;
    }

    const originalPdfDoc = await PDFLib.PDFDocument.load(originalPdfBytes);
    const progressBarContainer = document.getElementById('progressBarContainer');
    const progressBar = document.getElementById('progressBar');
    
    progressBarContainer.style.display = 'block'; // Show progress bar

    for (let i = 0; i < originalPdfDoc.getPageCount(); i++) {
      const newPdfDoc = await PDFLib.PDFDocument.create();
      const [originalPage] = originalPdfDoc.getPages(i);
      const [newPage] = await newPdfDoc.copyPages(originalPdfDoc, [i]);
      newPdfDoc.addPage(newPage);

      const newPdfBytes = await newPdfDoc.save();
      const blob = new Blob([newPdfBytes], { type: 'application/pdf' });

      const downloadLink = document.createElement('a');
      downloadLink.href = URL.createObjectURL(blob);
      downloadLink.download = `page_${i + 1}.pdf`;
      document.body.appendChild(downloadLink);
      downloadLink.click();
      document.body.removeChild(downloadLink);

      // Update progress bar
      const progress = ((i + 1) / originalPdfDoc.getPageCount()) * 100;
      progressBar.style.width = `${progress}%`;
    }

    alert("Splitting completed.");
    // Hide progress bar after completion
    progressBarContainer.style.display = 'none';
  }