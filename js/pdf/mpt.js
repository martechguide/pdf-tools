    let files = [];

    const fileInput = document.getElementById('pdf-upload');
    const dragDropArea = document.getElementById('drag-drop-area');

    fileInput.addEventListener('change', handleFileSelect);
    dragDropArea.addEventListener('click', () => fileInput.click());
    dragDropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      dragDropArea.style.background = '#e2eefd';
    });
    dragDropArea.addEventListener('dragleave', () => {
      dragDropArea.style.background = '#f9f9f9';
    });
    dragDropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      dragDropArea.style.background = '#f9f9f9';
      const newFiles = Array.from(e.dataTransfer.files);
      files.push(...newFiles);
      displayFiles();
    });

    function handleFileSelect(event) {
      const newFiles = Array.from(event.target.files);
      files.push(...newFiles);
      displayFiles();
    }

    function displayFiles() {
      const fileGrid = document.getElementById('fileGrid');
      fileGrid.style.display = 'grid';
      fileGrid.innerHTML = "";

      files.forEach((file, index) => {
        const fileItem = document.createElement('div');
        fileItem.className = 'fileItem';

        const span = document.createElement('span');
        span.textContent = file.name;
        fileItem.appendChild(span);

        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', () => removeFile(index));
        fileItem.appendChild(removeButton);

        fileGrid.appendChild(fileItem);
      });

      document.getElementById('mergeButton').style.display = 'inline-block';
      document.getElementById('resetButton').style.display = 'inline-block';
    }

    function removeFile(index) {
      files.splice(index, 1);
      displayFiles();
    }

    async function mergePDFsAndText() {
      const pdfDoc = await PDFLib.PDFDocument.create();

      for (const file of files) {
        if (file.type === 'application/pdf') {
          const arrayBuffer = await readFileAsync(file);
          const externalDoc = await PDFLib.PDFDocument.load(arrayBuffer);
          const copiedPages = await pdfDoc.copyPages(externalDoc, externalDoc.getPageIndices());
          copiedPages.forEach((page) => pdfDoc.addPage(page));
        } else if (file.type === 'text/plain') {
          const text = await readFileAsync(file);
          const page = pdfDoc.addPage();
          page.drawText(text, {
            x: 50,
            y: 750,
            size: 12,
          });
        }
      }

      const mergedPdfBytes = await pdfDoc.save();

      const blob = new Blob([mergedPdfBytes], { type: 'application/pdf' });
      const url = URL.createObjectURL(blob);

      const downloadLink = document.getElementById('downloadLink');
      downloadLink.href = url;
      downloadLink.download = 'merged.pdf';
      downloadLink.style.display = 'inline-block';
    }

    function resetFiles() {
      fileInput.value = "";
      files = [];
      document.getElementById('fileGrid').style.display = 'none';
      document.getElementById('mergeButton').style.display = 'none';
      document.getElementById('resetButton').style.display = 'none';
      document.getElementById('downloadLink').style.display = 'none';
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

        if (file.type === 'text/plain') {
          reader.readAsText(file);
        } else {
          reader.readAsArrayBuffer(file);
        }
      });
    }