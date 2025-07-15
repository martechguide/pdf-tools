        function convertToPDF() {
            const spreadsheetUrl = document.getElementById('spreadsheetUrl').value.trim();
            if (!spreadsheetUrl) {
                alert('Please enter a valid Google Spreadsheet URL.');
                return;
            }

            // Extract Spreadsheet ID from URL
            const spreadsheetId = extractSpreadsheetId(spreadsheetUrl);
            if (!spreadsheetId) {
                alert('Invalid Google Spreadsheet URL.');
                return;
            }

            // Fetch PDF file
            const pdfUrl = `https://docs.google.com/spreadsheets/d/${spreadsheetId}/export?format=pdf`;
            
            // Open PDF in new tab
            window.open(pdfUrl, '_blank');
        }

        function extractSpreadsheetId(url) {
            const match = url.match(/[-\w]{25,}/);
            return match ? match[0] : null;
        }