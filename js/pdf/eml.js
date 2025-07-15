        document.getElementById('drag-drop-area').addEventListener('dragover', (event) => {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('drag-drop-area').classList.add('drag-over');
        });

        document.getElementById('drag-drop-area').addEventListener('dragleave', () => {
            document.getElementById('drag-drop-area').classList.remove('drag-over');
        });

        document.getElementById('drag-drop-area').addEventListener('drop', (event) => {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById('drag-drop-area').classList.remove('drag-over');
            document.getElementById('fileInput').files = event.dataTransfer.files;
            handleFileSelect({ target: { files: document.getElementById('fileInput').files } });
        });

        document.getElementById('fileInput').addEventListener('change', handleFileSelect);

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileInfo').classList.remove('hidden');
            }
        }

        document.getElementById('extractButton').addEventListener('click', async () => {
            const pdfInput = document.getElementById('fileInput');
            if (!pdfInput.files || pdfInput.files.length === 0) {
                alert('Please select a PDF file.');
                return;
            }

            const pdfFile = pdfInput.files[0];
            const pdfReader = new FileReader();

            pdfReader.onload = async () => {
                const pdfData = new Uint8Array(pdfReader.result);
                const pdfDoc = await pdfjsLib.getDocument({ data: pdfData }).promise;

                let emailList = '';
                let emailCount = 0;
                for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    const page = await pdfDoc.getPage(pageNum);
                    const textContent = await page.getTextContent();

                    textContent.items.forEach(item => {
                        const text = item.str;
                        const emailRegex = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/g;
                        const emails = text.match(emailRegex);
                        if (emails) {
                            emails.forEach(email => {
                                emailList += `<p>${email}</p>`;
                                emailCount++;
                            });
                        }
                    });
                }

                document.getElementById('emailCount').textContent = emailCount;
                document.getElementById('emailList').innerHTML = emailList;
                document.getElementById('emailSection').classList.remove('hidden');
                document.getElementById('copyButton').classList.remove('hidden');
                document.getElementById('downloadButton').classList.remove('hidden');
            };

            pdfReader.readAsArrayBuffer(pdfFile);
        });

        document.getElementById('copyButton').addEventListener('click', () => {
            const emailListDiv = document.getElementById('emailList');
            const range = document.createRange();
            range.selectNode(emailListDiv);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Emails copied to clipboard!');
        });

        document.getElementById('downloadButton').addEventListener('click', () => {
            const emailListDiv = document.getElementById('emailList');
            const emails = emailListDiv.innerText.replace(/\n/g, '\r\n');
            const blob = new Blob([emails], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'emails.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });