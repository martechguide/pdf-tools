    const dragDropArea = document.getElementById('drag-drop-area');
    const fileInput = document.getElementById('file');
    const uploadSuccessMessage = document.getElementById('upload-success-message');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const buttons = document.getElementById('buttons');

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

    function handleFileUpload(event) {
        const file = fileInput.files[0];
        if (file) {
            displayFileName(file);
            uploadSuccessMessage.style.display = 'block';
            buttons.style.display = 'block';
            dragDropArea.style.display = 'none';
        }
    }

    function displayFileName(file) {
        const fileName = file.name ? file.name : "";
        fileNameDisplay.textContent = `Selected File: ${fileName}`;
    }

    function convertToPDF() {
        const file = fileInput.files[0];
        const content = document.getElementById('content').value;

        if (file) {
            const reader = new FileReader();
            reader.readAsText(file);

            reader.onload = function() {
                const documentDefinition = {
                    content: reader.result
                };

                pdfMake.createPdf(documentDefinition).download(file.name.replace(/\.[^/.]+$/, "") + ".pdf");
            };
        } else if (content) {
            const documentDefinition = {
                content: content
            };

            pdfMake.createPdf(documentDefinition).download("converted.pdf");
        }
    }

    function resetForm() {
        fileInput.value = '';
        document.getElementById('content').value = '';
        fileNameDisplay.textContent = '';
        uploadSuccessMessage.style.display = 'none';
        buttons.style.display = 'none';
        dragDropArea.style.display = 'block';
    }