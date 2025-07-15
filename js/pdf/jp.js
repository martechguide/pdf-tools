    let files = [];

    document.getElementById('pdf-upload').addEventListener('change', handleFileSelect);
    document.getElementById('drag-drop-area').addEventListener('dragover', handleDragOver, false);
    document.getElementById('drag-drop-area').addEventListener('drop', handleFileDrop, false);

    function handleFileSelect(event) {
      const selectedFiles = Array.from(event.target.files);
      files = files.concat(selectedFiles);
      displayFiles();
    }

    function handleDragOver(event) {
      event.preventDefault();
      event.stopPropagation();
      document.getElementById('drag-drop-area').style.borderColor = "#aaa";
    }

    function handleFileDrop(event) {
      event.preventDefault();
      event.stopPropagation();
      const droppedFiles = Array.from(event.dataTransfer.files);
      files = files.concat(droppedFiles);
      displayFiles();
      document.getElementById('drag-drop-area').style.borderColor = "#ddd";
    }

    function displayFiles() {
      const fileGrid = document.getElementById('fileGrid');
      fileGrid.innerHTML = "";

      files.forEach((file) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'fileItem';

        const img = document.createElement('img');
        img.src = 'https://e7.pngegg.com/pngimages/599/346/png-clipart-pdf-computer-file-file-format-document-pdf-icon-text-logo.png'; // Replace with your PDF icon URL
        fileItem.appendChild(img);

        const span = document.createElement('span');
        span.textContent = file.name;
        fileItem.appendChild(span);

        fileGrid.appendChild(fileItem);
      });
    }

    async function mergePDFs() {
      const pdfDoc = await PDFLib.PDFDocument.create();

      for (const file of files) {
        const arrayBuffer = await readFileAsync(file);
        const externalDoc = await PDFLib.PDFDocument.load(arrayBuffer);
        const copiedPages = await pdfDoc.copyPages(externalDoc, externalDoc.getPageIndices());
        copiedPages.forEach((page) => pdfDoc.addPage(page));
      }

      downloadPDF(pdfDoc, 'merged.pdf');
    }

    function downloadPDF(pdfDoc, filename) {
      pdfDoc.save().then((data) => {
        const blob = new Blob([data], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = filename;
        link.click();
      });
    }

    function readFileAsync(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = (event) => {
          resolve(event.target.result);
        };

        reader.onerror = (event) => {
          reject(new Error(`Failed to read file: ${event.target.error}`));
        };

        reader.readAsArrayBuffer(file);
      });
    }