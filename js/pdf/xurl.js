 function convertToPDF() {
            const excelUrl = document.getElementById('excelUrl').value.trim();
            if (!excelUrl) {
                alert('Please enter a valid Excel file URL.');
                return;
            }

            // Construct PDF export URL
            const pdfUrl = `${excelUrl.replace('/edit', '/export')}&format=pdf`;

            // Open PDF in new tab
            window.open(pdfUrl, '_blank');
        }