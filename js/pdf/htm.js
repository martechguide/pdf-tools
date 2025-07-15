    function handleFileUpload() {
        const htmlFileInput = document.getElementById('htmlFileInput').files[0];
        const uploadMessage = document.getElementById('upload-message');
        const fileNameDisplay = document.getElementById('fileNameDisplay');

        if (htmlFileInput) {
            uploadMessage.style.display = 'block';
            fileNameDisplay.style.display = 'block';
            fileNameDisplay.textContent = `Uploaded File: ${htmlFileInput.name}`;
        } else {
            uploadMessage.style.display = 'none';
            fileNameDisplay.style.display = 'none';
            fileNameDisplay.textContent = '';
        }
    }

    function generatePDF() {
        const pdfHtmlInput = document.getElementById('pdfHtmlInput').value.trim();
        const htmlFileInput = document.getElementById('htmlFileInput').files[0];

        if (!pdfHtmlInput && !htmlFileInput) {
            alert('Please enter HTML code or upload an HTML file.');
            return;
        }

        if (pdfHtmlInput && htmlFileInput) {
            alert('Please choose only one option: either enter HTML code or upload an HTML file.');
            return;
        }

        if (htmlFileInput) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const htmlContent = event.target.result;

                // Open the generated HTML in a new window
                const newWindow = window.open();
                newWindow.document.write(htmlContent);
                newWindow.document.close();

                // Automatically trigger print dialog to save as PDF
                newWindow.print();
            };
            reader.readAsText(htmlFileInput);
        } else {
            // Open the entered HTML in a new window
            const newWindow = window.open();
            newWindow.document.write(pdfHtmlInput);
            newWindow.document.close();

            // Automatically trigger print dialog to save as PDF
            newWindow.print();
        }
    }