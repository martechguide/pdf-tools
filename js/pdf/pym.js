    function showConvertButton() {
        var fileInput = document.getElementById('pdfFile');
        var fileNameDisplay = document.getElementById('fileName');
        var convertButton = document.getElementById('convertButton');

        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
            convertButton.style.display = 'block';
        } else {
            fileNameDisplay.textContent = '';
            convertButton.style.display = 'none';
        }
    }

    function handleFileUpload(file) {
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }

        // Show file name and hide upload section
        document.getElementById('fileName').textContent = 'File Name: ' + file.name;
        document.getElementById('fileDetails').style.display = 'block';
        document.getElementById('drag-drop-area').style.display = 'none';
        document.getElementById('progressSection').style.display = 'block';
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

    function convertToYAML() {
        var fileInput = document.getElementById('pdfFile');
        var file = fileInput.files[0];

        if (!file) {
            alert('Please select a PDF file to convert.');
            return;
        }

        var fileReader = new FileReader();
        fileReader.onload = function() {
            var typedArray = new Uint8Array(this.result);

            pdfjsLib.getDocument(typedArray)
                .promise.then(function(pdf) {
                    var totalPages = pdf.numPages;
                    var yamlContent = '';

                    var extractPageText = function(pageNumber) {
                        pdf.getPage(pageNumber).then(function(page) {
                            page.getTextContent().then(function(textContent) {
                                var pageText = '';

                                textContent.items.forEach(function(item) {
                                    pageText += item.str + '\n'; // Add newline for each item
                                });

                                yamlContent += 'page_' + pageNumber + ':\n';
                                yamlContent += '  text: |\n'; // Use YAML multiline string format
                                yamlContent += pageText.trim().split('\n').map(line => '    ' + line).join('\n'); // Indent each line
                                yamlContent += '\n\n';

                                // Update progress bar
                                var progress = Math.round((pageNumber / totalPages) * 100);
                                document.getElementById('progressBar').style.width = progress + '%';

                                if (pageNumber === totalPages) {
                                    var yamlData = new Blob([yamlContent], { type: 'text/yaml' });
                                    var link = document.createElement('a');
                                    link.href = URL.createObjectURL(yamlData);
                                    link.download = 'converted.yaml';
                                    link.click();

                                    // Use setTimeout to ensure the download initiates before displaying success message
                                    setTimeout(function() {
                                        document.getElementById('progressSection').style.display = 'none';
                                        document.getElementById('successMessage').style.display = 'block';
                                    }, 100); // Adjust delay if needed
                                } else {
                                    extractPageText(pageNumber + 1);
                                }
                            });
                        });
                    };

                    extractPageText(1);
                });
        };
        fileReader.readAsArrayBuffer(file);
    }

    function convertAnother() {
        document.getElementById('pdfFile').value = '';
        document.getElementById('fileName').textContent = '';
        document.getElementById('convertButton').style.display = 'none';
        document.getElementById('drag-drop-area').style.display = 'block';
        document.getElementById('progressSection').style.display = 'none';
        document.getElementById('successMessage').style.display = 'none';
    }