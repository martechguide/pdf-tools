    function displayFileInfo(input) {
        const pdfFile = input.files[0];
        const fileInfo = document.getElementById('fileInfo');
        fileInfo.innerHTML = `<p>File Name: ${pdfFile.name}</p><p>Total Pages: Loading...</p>`;
        document.getElementById('progressBar').style.display = 'block';

        // Show the split button
        document.querySelector('.button').style.display = 'block';

        setTimeout(() => splitPDF(), 50);
    }

    async function splitPDF() {
        const pdfInput = document.getElementById('pdfInput');

        if (pdfInput.files.length === 0) {
            alert('Please select a PDF file.');
            return;
        }

        const pdfFile = pdfInput.files[0];
        const pdfBytes = await pdfFile.arrayBuffer();
        const pdfDoc = await PDFLib.PDFDocument.load(pdfBytes);

        const fileInfo = document.getElementById('fileInfo');
        fileInfo.innerHTML = `<p>File Name: ${pdfFile.name}</p><p>Total Pages: ${pdfDoc.getPageCount()}</p>`;

        const progressBar = document.getElementById('progressBar');
        const uploadProgress = document.getElementById('uploadProgress');
        uploadProgress.style.width = '0';
        progressBar.style.display = 'block';

        const thumbnailContainer = document.getElementById('thumbnailContainer');
        thumbnailContainer.innerHTML = ''; // Clear existing thumbnails

        const zip = new JSZip();

        for (let i = 0; i < pdfDoc.getPageCount(); i++) {
            const newDoc = await PDFLib.PDFDocument.create();
            const [copiedPage] = await newDoc.copyPages(pdfDoc, [i]);
            newDoc.addPage(copiedPage);

            const newPdfBytes = await newDoc.save();
            const blob = new Blob([newPdfBytes], { type: 'application/pdf' });

            // Add each page to the zip file
            zip.file(`page_${i + 1}.pdf`, blob);

            // Create PDF icon and download icon
            const thumbnailCard = document.createElement('div');
            thumbnailCard.classList.add('thumbnail-card');
            thumbnailCard.onclick = () => downloadPage(i + 1, blob);

            const pdfIcon = document.createElement('div');
            pdfIcon.classList.add('pdf-icon');

            const downloadIcon = document.createElement('div');
            downloadIcon.classList.add('download-icon');
            downloadIcon.onclick = () => downloadPage(i + 1, blob);

            thumbnailCard.appendChild(pdfIcon);
            thumbnailCard.appendChild(downloadIcon); // Add the download icon
            thumbnailContainer.appendChild(thumbnailCard);

            // Update upload progress in real-time
            const progressPercentage = ((i + 1) / pdfDoc.getPageCount()) * 100;
            uploadProgress.style.width = `${progressPercentage}%`;
        }

        console.log('PDF successfully split into individual pages.');
        progressBar.style.display = 'none';

        // Change the button text to "Download All"
        const downloadAllButton = document.querySelector('.button');
        downloadAllButton.innerText = 'Download Zip';
        downloadAllButton.onclick = () => downloadAll(zip);
    }

    function downloadPage(pageNumber, blob) {
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `page_${pageNumber}.pdf`;
        link.click();
    }

    function downloadAll(zip) {
        zip.generateAsync({ type: 'blob' })
            .then((blob) => {
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'all_pages.zip';
                link.click();
            });
    }

    // Drag and drop functionality
    const dropArea = document.getElementById('drop-area');
    const pdfInput = document.getElementById('pdfInput');

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('highlight');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('highlight');
    });

    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dropArea.classList.remove('highlight');
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            pdfInput.files = files;
            displayFileInfo(pdfInput);
        }
    });