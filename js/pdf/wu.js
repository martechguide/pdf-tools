  function convertToPDF() {
            const wordUrl = document.getElementById('wordUrl').value.trim();
            if (!wordUrl) {
                alert('Please enter a valid Word document URL.');
                return;
            }

            // Construct PDF export URL
            const pdfUrl = `${wordUrl.replace('/edit', '/export')}?format=pdf`;

            // Open PDF in new tab
            window.open(pdfUrl, '_blank');
        }