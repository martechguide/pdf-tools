        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('fileInput');
        const fileInfo = document.getElementById('fileInfo');
        const linkSection = document.getElementById('linkSection');
        const fileNameElement = document.getElementById('fileName');
        const linkCountElement = document.getElementById('linkCount');
        const linkList = document.getElementById('linkList');
        const extractButton = document.getElementById('extractButton');
        const copyButton = document.getElementById('copyButton');
        const downloadButton = document.getElementById('downloadButton');

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
                fileNameElement.textContent = file.name;
                fileInfo.classList.remove('hidden');
            }
        }

        extractButton.addEventListener('click', async () => {
            if (!fileInput.files || fileInput.files.length === 0) {
                alert('Please select a PDF file.');
                return;
            }

            const pdfFile = fileInput.files[0];
            const pdfReader = new FileReader();

            pdfReader.onload = async () => {
                const pdfData = new Uint8Array(pdfReader.result);
                const pdfDoc = await pdfjsLib.getDocument({ data: pdfData }).promise;

                let linkListHtml = '';
                let linkCount = 0;
                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const page = await pdfDoc.getPage(pageNum);
                    const annotations = await page.getAnnotations();

                    annotations.forEach(annotation => {
                        if (annotation.subtype === 'Link') {
                            const linkText = annotation.url || annotation.dest || '';
                            linkListHtml += `<p><a href="${linkText}" target="_blank">${linkText}</a></p>`;
                            linkCount++;
                        }
                    });
                }

                linkCountElement.textContent = linkCount;
                linkList.innerHTML = linkListHtml;
                linkSection.classList.remove('hidden');
                copyButton.classList.remove('hidden');
                downloadButton.classList.remove('hidden');
            };

            pdfReader.readAsArrayBuffer(pdfFile);
        });

        copyButton.addEventListener('click', () => {
            const range = document.createRange();
            range.selectNode(linkList);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Links copied to clipboard!');
        });

        downloadButton.addEventListener('click', () => {
            const linkText = linkList.innerText.replace(/\n/g, '\r\n');
            const blob = new Blob([linkText], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'links.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });