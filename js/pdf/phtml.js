        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('pdfFile');
        const fileInfo = document.getElementById('fileInfo');
        const fileNameDisplay = document.getElementById('fileName');
        const successMessage = document.getElementById('successMessage');
        const downloadButton = document.getElementById('downloadButton');
        const html5Output = document.getElementById('html5Output');

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
                fileNameDisplay.textContent = `Uploaded File: ${file.name}`;
                fileInfo.classList.remove('hidden');
            }
        }

        function convertToHTML5() {
            const file = fileInput.files[0];
            const fileReader = new FileReader();
            fileReader.onload = function () {
                const typedArray = new Uint8Array(this.result);
                pdfjsLib.getDocument(typedArray).promise.then(function (pdf) {
                    let html5 = "";
                    for (let i = 1; i <= pdf.numPages; i++) {
                        (function (pageNumber) {
                            pdf.getPage(pageNumber).then(function (page) {
                                const viewport = page.getViewport({ scale: 1 });
                                const canvas = document.createElement("canvas");
                                const canvasContext = canvas.getContext("2d");
                                canvas.height = viewport.height;
                                canvas.width = viewport.width;
                                const renderContext = {
                                    canvasContext,
                                    viewport,
                                };
                                page.render(renderContext).promise.then(function () {
                                    const imgData = canvas.toDataURL("image/png");
                                    const imgTag = `<img src="${imgData}">`;
                                    html5 += `<div>${imgTag}</div>`;
                                    if (pageNumber === pdf.numPages) {
                                        html5Output.innerHTML = html5;
                                        downloadButton.href = "data:text/html;charset=utf-8," + encodeURIComponent(html5);
                                        successMessage.classList.remove('hidden');
                                        downloadButton.classList.remove('hidden');
                                    }
                                });
                            });
                        })(i);
                    }
                });
            };
            fileReader.readAsArrayBuffer(file);
        }