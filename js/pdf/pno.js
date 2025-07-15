  const { PDFDocument, rgb } = PDFLib;

  let pdfFile;

  // Handle file selection from the file input
  document.getElementById('pdfInput').addEventListener('change', handlePdfSelect);

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
      pdfFile = file;
      handleFileLoad();
    } else {
      alert('Please drop a valid PDF file.');
    }
  });

  function handlePdfSelect(event) {
    const file = event.target.files[0];
    if (file && file.type === 'application/pdf') {
      pdfFile = file;
      handleFileLoad();
    } else {
      alert('Please select a valid PDF file.');
    }
  }

  function handleFileLoad() {
    document.getElementById('uploadContainer').style.display = 'none';
    document.getElementById('options').style.display = 'block';
    const fileNameDiv = document.getElementById('fileName');
    fileNameDiv.textContent = `Selected File: ${pdfFile.name}`;
    fileNameDiv.style.display = 'block';
  }

  async function addPageNumbers() {
    if (!pdfFile) {
      alert('Please select a PDF file.');
      return;
    }

    const progressBar = document.getElementById('progressBar');
    progressBar.style.display = 'block';
    const progressBarFill = document.getElementById('progressBarFill');

    let progress = 0;
    const interval = setInterval(() => {
      progress += 10;
      progressBarFill.style.width = `${progress}%`;
      if (progress >= 100) {
        clearInterval(interval);
        progressBar.style.display = 'none';
        const successMessage = document.getElementById('successMessage');
        successMessage.style.display = 'block';
        setTimeout(() => {
          successMessage.style.display = 'none';
          addPageNumbersToPdf();
        }, 2000);
      }
    }, 400);
  }

  async function addPageNumbersToPdf() {
    const positionSelect = document.getElementById('positionSelect');
    const selectedPosition = positionSelect.value;

    const existingPdfBytes = await readFileAsync(pdfFile);
    const pdfDoc = await PDFDocument.load(existingPdfBytes);

    pdfDoc.getPages().forEach((page, index) => {
      const { width, height } = page.getSize();
      const text = `Page ${index + 1}`;
      const fontSize = 14;
      let x, y;

      switch (selectedPosition) {
        case 'topleft':
          x = 10;
          y = height - 20;
          break;
        case 'topcenter':
          x = width / 2 - text.length * fontSize / 4;
          y = height - 20;
          break;
        case 'topright':
          x = width - text.length * fontSize - 10;
          y = height - 20;
          break;
        case 'bottomleft':
          x = 10;
          y = 10;
          break;
        case 'bottomcenter':
          x = width / 2 - text.length * fontSize / 4;
          y = 10;
          break;
        case 'bottomright':
          x = width - text.length * fontSize - 10;
          y = 10;
          break;
        default:
          x = 10;
          y = height - 20;
          break;
      }

      page.drawText(text, {
        x: x,
        y: y,
        fontSize: fontSize,
        color: rgb(0, 0, 0),
      });
    });

    const modifiedPdfBytes = await pdfDoc.save();

    const blob = new Blob([modifiedPdfBytes], { type: 'application/pdf' });
    const url = URL.createObjectURL(blob);

    const downloadLink = document.getElementById('downloadLink');
    downloadLink.style.display = 'block';
    downloadLink.href = url;
    downloadLink.download = 'modified.pdf';
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