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
        this.style.borderColor = "#007bff";
    });
    dragDropArea.addEventListener("dragleave", function () {
        this.style.borderColor = "#ccc";
    });
    dragDropArea.addEventListener("drop", function (event) {
        event.preventDefault();
        this.style.borderColor = "#ccc";
        var file = event.dataTransfer.files[0];
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }
        document.getElementById("pdfFile").files = event.dataTransfer.files;
        handleFileUpload(file);
    });

    document.getElementById("convertButton").addEventListener("click", function () {
        convertToJSON();
    });

    function convertToJSON() {
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
        progressBarFill.value = 0;
        progressBarFill.textContent = `0%`;

        var fileReader = new FileReader();
        fileReader.onload = function () {
            var typedArray = new Uint8Array(this.result);

            pdfjsLib.getDocument(typedArray)
                .promise.then(function (pdf) {
                    var totalPages = pdf.numPages;
                    var jsonContent = [];
                    var pagesProcessed = 0;

                    var convertPageToJSON = function (pageNumber) {
                        pdf.getPage(pageNumber).then(function (page) {
                            page.getTextContent().then(function (textContent) {
                                var pageText = '';

                                textContent.items.forEach(function (item) {
                                    pageText += item.str + ' ';
                                });

                                var pageObj = {
                                    page: pageNumber,
                                    content: pageText.trim()
                                };

                                jsonContent.push(pageObj);
                                pagesProcessed++;

                                // Update progress bar
                                var progress = Math.round((pagesProcessed / totalPages) * 100);
                                progressBarFill.value = progress;
                                progressBarFill.textContent = `${progress}%`;

                                if (pageNumber === totalPages) {
                                    // Conversion complete
                                    var jsonData = JSON.stringify(jsonContent, null, 2);
                                    var link = document.getElementById('downloadLink');
                                    link.href = 'data:application/json;charset=utf-8,' + encodeURIComponent(jsonData);
                                    document.getElementById('successMessage').style.display = 'block';
                                } else {
                                    convertPageToJSON(pageNumber + 1);
                                }
                            });
                        });
                    };

                    convertPageToJSON(1);
                });
        };
        fileReader.readAsArrayBuffer(file);
    }