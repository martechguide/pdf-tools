        const { PDFDocument } = PDFLib;

        let pdfFiles = [];

        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('fileInput');
        const fileGrid = document.getElementById('fileGrid');
        const organizeButton = document.getElementById('organizeButton');
        const downloadLink = document.getElementById('downloadLink');

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
            handlePdfSelect({ target: { files: fileInput.files } });
        });

        fileInput.addEventListener('change', handlePdfSelect);

        function handlePdfSelect(event) {
            pdfFiles = Array.from(event.target.files);
            displayFileGrid();
        }

        function displayFileGrid() {
            fileGrid.innerHTML = "";
            fileGrid.classList.remove('hidden');

            pdfFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('draggable', 'file-item');
                fileItem.setAttribute('draggable', 'true');
                fileItem.setAttribute('ondragstart', `drag(event, ${index})`);
                fileItem.setAttribute('ondrop', `drop(event, ${index})`);
                fileItem.setAttribute('ondragover', 'allowDrop(event)');
                fileItem.innerHTML = `
                    <span>${file.name}</span>
                    <select id="orderSelect${index}">
                        ${Array.from({ length: pdfFiles.length }, (_, i) => `<option value="${i + 1}">${i + 1}</option>`).join('')}
                    </select>
                `;
                fileGrid.appendChild(fileItem);
            });

            organizeButton.classList.remove('hidden');
        }

        function drag(ev, index) {
            ev.dataTransfer.setData('text/plain', index);
        }

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drop(ev, dropIndex) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData('text/plain');
            const draggedIndex = parseInt(data);
            const draggedElement = document.querySelector(`#orderSelect${draggedIndex}`).parentNode;

            // Swap the order of dragged and dropped elements in the UI
            const temp = draggedElement.outerHTML;
            draggedElement.outerHTML = document.querySelector(`#orderSelect${dropIndex}`).parentNode.outerHTML;
            document.querySelector(`#orderSelect${dropIndex}`).parentNode.outerHTML = temp;

            // Swap the order of dragged and dropped elements in the array
            [pdfFiles[draggedIndex], pdfFiles[dropIndex]] = [pdfFiles[dropIndex], pdfFiles[draggedIndex]];
        }

        async function organizePages() {
            const orderedPdfFiles = pdfFiles.slice().sort((a, b) => {
                const indexA = parseInt(document.getElementById(`orderSelect${pdfFiles.indexOf(a)}`).value);
                const indexB = parseInt(document.getElementById(`orderSelect${pdfFiles.indexOf(b)}`).value);
                return indexA - indexB;
            });

            const pdfDoc = await PDFDocument.create();

            for (const file of orderedPdfFiles) {
                const arrayBuffer = await readFileAsync(file);
                const externalDoc = await PDFDocument.load(arrayBuffer);
                const copiedPages = await pdfDoc.copyPages(externalDoc, externalDoc.getPageIndices());
                copiedPages.forEach((page) => pdfDoc.addPage(page));
            }

            const organizedPdfBytes = await pdfDoc.save();

            const blob = new Blob([organizedPdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);

            downloadLink.href = url;
            downloadLink.download = 'organized.pdf';
            downloadLink.textContent = 'Download Organized PDF';
            downloadLink.classList.remove('hidden');
        }

        function readFileAsync(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();

                reader.onload = (event) => {
                    resolve(event.target.result);
                };

                reader.onerror = (event) => {
                    reject(new Error(`Failed to read file: ${event.target.error}`));
                };

                reader.readAsArrayBuffer(file);
            });
        }