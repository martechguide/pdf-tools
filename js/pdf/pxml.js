    function handleFileUpload(file) {
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }

        // Show file name and hide upload section
        document.getElementById('fileName').innerText = 'File Name: ' + file.name;
        document.getElementById('fileDetails').style.display = 'block';
        document.getElementById('drag-drop-area').style.display = 'none';
    }

    document.getElementById("pdfFile").addEventListener("change", function () {
        handleFileUpload(this.files[0]);
    });

    var dragDropArea = document.getElementById("drag-drop-area");
    dragDropArea.addEventListener("dragover", function (event) {
        event.preventDefault();
        this.style.borderColor = "#0056b3";
    });
    dragDropArea.addEventListener("dragleave", function () {
        this.style.borderColor = "#007bff";
    });
    dragDropArea.addEventListener("drop", function (event) {
        event.preventDefault();
        this.style.borderColor = "#007bff";
        var file = event.dataTransfer.files[0];
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }
        document.getElementById("pdfFile").files = event.dataTransfer.files;
        handleFileUpload(file);
    });

    document.getElementById("convertButton").addEventListener("click", function () {
        convertToXML();
    });

    function convertToXML() {
        var fileInput = document.getElementById('pdfFile');
        var file = fileInput.files[0];

        if (!file) {
            alert('Please select a PDF file to convert.');
            return;
        }

        // Initialize progress bar
        const progressBar = document.getElementById('progressBar');
        const progressBarFill = document.getElementById('progressBarFill');
        progressBar.style.display = 'block';
        progressBarFill.style.width = '0%';
        progressBar.setAttribute('data-progress', '0');

        var fileReader = new FileReader();
        fileReader.onload = function () {
            var typedArray = new Uint8Array(this.result);

            pdfjsLib.getDocument(typedArray)
                .promise.then(function (pdf) {
                    var totalPages = pdf.numPages;
                    var xmlContent = '<pages>'; // Start XML content without specifying the XML version
                    var pagesProcessed = 0;

                    var convertPageToXML = function (pageNumber) {
                        pdf.getPage(pageNumber).then(function (page) {
                            page.getTextContent().then(function (textContent) {
                                var pageText = '';

                                textContent.items.forEach(function (item) {
                                    // Escape special XML characters
                                    var escapedText = escapeXml(item.str);
                                    pageText += escapedText + ' ';
                                });

                                // Create an XML element for the page
                                xmlContent += '<page number="' + pageNumber + '">' + pageText.trim() + '</page>';

                                // Update progress bar
                                var progress = Math.round((pagesProcessed / totalPages) * 100);
                                progressBarFill.style.width = progress + '%';
                                progressBar.setAttribute('data-progress', progress);

                                if (pageNumber === totalPages) {
                                    xmlContent += '</pages>';

                                    // Create a temporary link element to download the XML
                                    var link = document.getElementById('downloadLink');
                                    link.href = 'data:text/xml;charset=utf-8,' + encodeURIComponent(xmlContent);
                                    document.getElementById('successMessage').style.display = 'block';
                                } else {
                                    convertPageToXML(pageNumber + 1);
                                }
                                pagesProcessed++;
                            });
                        });
                    };

                    convertPageToXML(1);
                });
        };
        fileReader.readAsArrayBuffer(file);
    }

    // Function to escape special XML characters
    function escapeXml(unsafe) {
        return unsafe.replace(/[<>&'"]/g, function (c) {
            switch (c) {
                case '<': return '&lt;';
                case '>': return '&gt;';
                case '&': return '&amp;';
                case '\'': return '&apos;';
                case '"': return '&quot;';
            }
        });
    }