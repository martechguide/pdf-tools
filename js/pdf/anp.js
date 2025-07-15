  let files = [];

  const dragDropArea = document.getElementById("drag-drop-area");
  const fileInput = document.getElementById("fileInput");
  const fileGrid = document.getElementById("fileGrid");

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
    const droppedFiles = e.dataTransfer.files;
    handleFileSelect({ target: { files: droppedFiles } });
  });

  fileInput.addEventListener('change', handleFileSelect);

  function handleFileSelect(event) {
    files = Array.from(event.target.files);
    displayFiles();
  }

  function displayFiles() {
    fileGrid.innerHTML = "";

    files.forEach((file, index) => {
      const fileItem = document.createElement('div');
      fileItem.className = 'fileItem';
      
      const span = document.createElement('span');
      span.textContent = file.name;
      fileItem.appendChild(span);

      const pageOrderInput = document.createElement('input');
      pageOrderInput.type = 'text';
      pageOrderInput.className = 'pageOrderInput';
      pageOrderInput.placeholder = 'Page Order';
      fileItem.appendChild(pageOrderInput);

      fileGrid.appendChild(fileItem);
    });
  }

  async function rearrangePDFPages() {
    const mergedPdfDoc = await PDFLib.PDFDocument.create();
    const pageOrderInputs = document.querySelectorAll('.pageOrderInput');

    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const pageOrder = parseInt(pageOrderInputs[i].value, 10);

      if (isNaN(pageOrder) || pageOrder <= 0) {
        alert('Please enter a valid page order number for ' + file.name);
        return;
      }

      const arrayBuffer = await readFileAsync(file);
      const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);

      const copiedPage = await mergedPdfDoc.copyPages(pdfDoc, [pageOrder - 1]);
      copiedPage.forEach((page) => mergedPdfDoc.addPage(page));
    }

    const mergedPdfBytes = await mergedPdfDoc.save();
    const blob = new Blob([mergedPdfBytes], { type: 'application/pdf' });
    const url = URL.createObjectURL(blob);

    const downloadLink = document.getElementById('downloadLink');
    downloadLink.href = url;
    downloadLink.download = 'rearranged.pdf';
    downloadLink.style.display = 'inline-block';
  }

  function resetFiles() {
    document.getElementById('fileInput').value = "";
    files = [];
    displayFiles();
    document.getElementById('downloadLink').style.display = 'none';
  }

  function readFileAsync(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.onload = (event) => resolve(event.target.result);
      reader.onerror = (event) => reject(new Error(`Failed to read file: ${event.target.error}`));
      reader.readAsArrayBuffer(file);
    });
  }