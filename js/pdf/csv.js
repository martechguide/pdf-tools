  const dragDropArea = document.getElementById('drag-drop-area');
  const fileInput = document.getElementById('file-upload');
  const options = document.getElementById('options');
  const progressBar = document.getElementById('progress-bar');
  const progressFill = document.getElementById('progress-fill');
  const successMessage = document.getElementById('success-message');
  const fileNameDisplay = document.getElementById('fileNameDisplay');
  const csvIcon = document.getElementById('csv-icon');

  dragDropArea.addEventListener('dragover', (event) => {
    event.preventDefault();
    dragDropArea.classList.add('drag-over');
  });

  dragDropArea.addEventListener('dragleave', () => {
    dragDropArea.classList.remove('drag-over');
  });

  dragDropArea.addEventListener('drop', (event) => {
    event.preventDefault();
    dragDropArea.classList.remove('drag-over');
    fileInput.files = event.dataTransfer.files;
    handleFileUpload();
  });

  function handleFileUpload() {
    const file = fileInput.files[0];
    if (file) {
      displayFileName(file);
      successMessage.style.display = 'block';
      progressBar.style.display = 'block';
      options.style.display = 'block';
      progressFill.style.width = '100%';
      progressFill.textContent = 'Upload complete!';
      csvIcon.style.display = 'block';
      dragDropArea.style.display = 'none';
    }
  }

  function displayFileName(file) {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const fileName = file ? file.name : "";
    fileNameDisplay.textContent = `Selected File: ${fileName}`;
  }

  function convertToPDF() {
    const file = fileInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.readAsText(file);
      
      reader.onload = function() {
        const csvData = reader.result;
        const rows = csvData.split('\n');
        const table = [];
        for (let i = 0; i < rows.length; i++) {
          table.push(rows[i].split(','));
        }
        
        const documentDefinition = {
          content: [
            {
              table: {
                headerRows: 1,
                body: table
              }
            }
          ]
        };
        
        pdfMake.createPdf(documentDefinition).download(file.name.replace(/\.[^/.]+$/, "") + ".pdf");
      };
    }
  }

  function resetForm() {
    fileInput.value = '';
    fileNameDisplay.textContent = '';
    csvIcon.style.display = 'none';
    successMessage.style.display = 'none';
    progressBar.style.display = 'none';
    progressFill.style.width = '0%';
    progressFill.textContent = '0%';
    options.style.display = 'none';
    dragDropArea.style.display = 'block';
  }