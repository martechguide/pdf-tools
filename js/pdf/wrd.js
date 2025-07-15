    const dragDropArea = document.getElementById('drag-drop-area');
    const fileInput = document.getElementById('file-upload');
    const options = document.getElementById('options');
    const progressBar = document.getElementById('progress-bar');
    const progressFill = document.getElementById('progress-fill');
    const successMessage = document.getElementById('success-message');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const wordIcon = document.getElementById('word-icon');
    const uploadSuccessMessage = document.getElementById('upload-success-message');

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
            uploadSuccessMessage.style.display = 'block';
            progressBar.style.display = 'block';
            options.style.display = 'block';
            successMessage.style.display = 'none';
            wordIcon.style.display = 'block';
            dragDropArea.style.display = 'none';

            convertToPDF(file);
        }
    }

    function displayFileName(file) {
        const fileName = file ? file.name : "";
        fileNameDisplay.textContent = `Selected File: ${fileName}`;
    }

    function convertToPDF(file) {
        const reader = new FileReader();
        reader.readAsArrayBuffer(file);

        reader.onload = function () {
            const wordArrayBuffer = reader.result;

            mammoth.extractRawText({ arrayBuffer: wordArrayBuffer })
                .then(displayWordContent)
                .catch(handleError);
        };
    }

    function displayWordContent(result) {
        const content = result.value;
        document.getElementById('convertedContent').value = content;

        // Simulate conversion progress
        let progress = 0;
        const interval = setInterval(function () {
            progress += 10;
            progressFill.style.width = progress + '%';
            progressFill.textContent = progress + '%';

            if (progress >= 100) {
                clearInterval(interval);
                // Hide progress bar and show success message and download button
                progressBar.style.display = 'none';
                successMessage.style.display = 'block';
                document.getElementById('downloadPDF').style.display = 'block';
            }
        }, 500);
    }

    function downloadPDF() {
        const content = document.getElementById('convertedContent').value;
        const documentDefinition = { content: content };
        pdfMake.createPdf(documentDefinition).download("converted.pdf");
    }

    function handleError(err) {
        console.error("Error converting Word to PDF:", err);
        alert("Error converting Word to PDF. Please try again.");
    }

    function resetForm() {
        fileInput.value = '';
        fileNameDisplay.textContent = '';
        wordIcon.style.display = 'none';
        successMessage.style.display = 'none';
        uploadSuccessMessage.style.display = 'none';
        progressBar.style.display = 'none';
        progressFill.style.width = '0%';
        progressFill.textContent = '0%';
        options.style.display = 'none';
        dragDropArea.style.display = 'block';
    }