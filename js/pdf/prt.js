  const dragDropArea = document.getElementById("drag-drop-area");
  const fileInput = document.getElementById("fileInput");
  const fileInfo = document.getElementById("fileInfo");
  const numPartsInput = document.getElementById("numParts");
  const splitButton = document.getElementById("splitButton");
  const progressBarContainer = document.getElementById("progressBarContainer");
  const progressBar = document.getElementById("progressBar");

  dragDropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = "#666";
  });

  dragDropArea.addEventListener("dragleave", () => {
    dragDropArea.style.borderColor = "#ccc";
  });

  dragDropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = "#ccc";
    fileInput.files = e.dataTransfer.files;
    handleFileSelect({ target: { files: e.dataTransfer.files } });
  });

  fileInput.addEventListener('change', handleFileSelect);

  function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        originalPdfBytes = new Uint8Array(e.target.result);
        fileInfo.textContent = `File name: ${file.name}`;
        fileInfo.style.display = 'block';
        numPartsInput.style.display = 'inline-block';
        splitButton.style.display = 'inline-block';
      };
      reader.readAsArrayBuffer(file);
    }
  }

  async function splitPDF() {
    if (!originalPdfBytes) {
      alert("Please upload a PDF first.");
      return;
    }

    const originalPdfDoc = await PDFLib.PDFDocument.load(originalPdfBytes);
    const numParts = parseInt(numPartsInput.value, 10);

    if (numParts < 1) {
      alert("Number of parts must be at least 1.");
      return;
    }

    const partSize = Math.ceil(originalPdfDoc.getPageCount() / numParts);
    progressBarContainer.style.display = 'block';

    for (let i = 0; i < numParts; i++) {
      const startIndex = i * partSize;
      const endIndex = Math.min((i + 1) * partSize, originalPdfDoc.getPageCount());

      const newPdfDoc = await PDFLib.PDFDocument.create();
      for (let j = startIndex; j < endIndex; j++) {
        const [originalPage] = originalPdfDoc.getPages(j);
        const [newPage] = await newPdfDoc.copyPages(originalPdfDoc, [j]);
        newPdfDoc.addPage(newPage);
      }

      const newPdfBytes = await newPdfDoc.save();
      const blob = new Blob([newPdfBytes], { type: 'application/pdf' });

      const downloadLink = document.createElement('a');
      downloadLink.href = URL.createObjectURL(blob);
      downloadLink.download = `part_${i + 1}.pdf`;
      document.body.appendChild(downloadLink);
      downloadLink.click();
      document.body.removeChild(downloadLink);

      // Update progress bar
      const progress = ((i + 1) / numParts) * 100;
      progressBar.style.width = `${progress}%`;
    }

    alert("Splitting completed.");
    progressBarContainer.style.display = 'none';
  }