        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('pdfInput');
        const fileInfo = document.getElementById('fileInfo');
        const pdfInfo = document.getElementById('pdfInfo');
        const splitButton = document.getElementById('splitButton');

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
            handleFileSelect({ target: { files: fileInput.files } });
        });

        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('pdfInfo').textContent = `Uploaded PDF: ${file.name}`;
                fileInfo.classList.remove('hidden');
            }
        }

        splitButton.addEventListener('click', async () => {
            const pdfFile = fileInput.files[0];
            if (!pdfFile) {
                alert('Please select a PDF file.');
                return;
            }

            const pdfReader = new FileReader();

            pdfReader.onload = async () => {
                const pdfData = new Uint8Array(pdfReader.result);
                const pdfDoc = await pdfjsLib.getDocument({ data: pdfData }).promise;

                // Show page count
                pdfInfo.textContent += ` (${pdfDoc.numPages} pages)`;

                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const page = await pdfDoc.getPage(pageNum);
                    const textContent = await page.getTextContent();
                    const textItems = textContent.items.map(item => item.str);
                    const text = textItems.join('\n');

                    const blob = new Blob([text], { type: 'text/plain' });
                    const downloadLink = document.createElement('a');
                    downloadLink.href = URL.createObjectURL(blob);
                    downloadLink.download = `page_${pageNum}_text.txt`;
                    downloadLink.textContent = `Download Page ${pageNum} Text`;
                    document.body.appendChild(downloadLink);
                    downloadLink.click();
                    document.body.removeChild(downloadLink);
                }
            };

            pdfReader.readAsArrayBuffer(pdfFile);
        });