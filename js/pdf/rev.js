let originalPdfBytes;

        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('file');
        const uploadMessage = document.getElementById('upload-message');

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
            loadPDF({ target: { files: fileInput.files } });
        });

        async function loadPDF(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                originalPdfBytes = new Uint8Array(e.target.result);
                uploadMessage.style.display = 'block';
            };
            reader.readAsArrayBuffer(file);
        }

        async function reversePDF() {
            if (!originalPdfBytes) {
                alert("Please upload a PDF first.");
                return;
            }

            const originalPdfDoc = await PDFLib.PDFDocument.load(originalPdfBytes);
            const reversedPdfDoc = await PDFLib.PDFDocument.create();

            for (let i = originalPdfDoc.getPageCount() - 1; i >= 0; i--) {
                const [originalPage] = originalPdfDoc.getPages(i);
                const [newPage] = await reversedPdfDoc.copyPages(originalPdfDoc, [i]);
                reversedPdfDoc.addPage(newPage);
            }

            const reversedPdfBytes = await reversedPdfDoc.save();

            const blob = new Blob([reversedPdfBytes], { type: 'application/pdf' });

            const downloadLink = document.createElement('a');
            downloadLink.href = URL.createObjectURL(blob);
            downloadLink.download = 'reversed_output.pdf';
            downloadLink.click();

            alert("Reversing completed.");
        }