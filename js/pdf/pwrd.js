 // Drag and drop functionality
        document.getElementById('drag-drop-area').addEventListener('dragover', function(event) {
            event.preventDefault();
            event.stopPropagation();
            this.classList.add('active');
        });

        document.getElementById('drag-drop-area').addEventListener('dragleave', function(event) {
            event.preventDefault();
            event.stopPropagation();
            this.classList.remove('active');
        });

        document.getElementById('drag-drop-area').addEventListener('drop', function(event) {
            event.preventDefault();
            event.stopPropagation();
            this.classList.remove('active');
            handleFile(event.dataTransfer.files[0]);
        });

        document.getElementById('pdfFile').addEventListener('change', function() {
            handleFile(this.files[0]);
        });

        function handleFile(file) {
            if (file.type !== 'application/pdf') {
                alert('Please upload a PDF file.');
                return;
            }
            document.getElementById('fileName').innerText = 'Selected PDF: ' + file.name;
            document.getElementById('options').classList.remove('hidden');
            document.getElementById('progressBar').classList.remove('hidden');
            document.getElementById('successMessage').classList.add('hidden');
        }

        function convertToWord() {
            var fileInput = document.getElementById('pdfFile');
            var file = fileInput.files[0];

            if (!file) {
                alert('Please select a PDF file to convert.');
                return;
            }

            var fileReader = new FileReader();
            fileReader.onload = function() {
                var typedArray = new Uint8Array(this.result);

                // Load the PDF document
                pdfjsLib.getDocument(typedArray).promise.then(function(pdf) {
                    var totalPages = pdf.numPages;
                    var wordContent = '';

                    // Convert each page to text
                    var convertPageToText = function(pageNumber) {
                        pdf.getPage(pageNumber).then(function(page) {
                            page.getTextContent().then(function(textContent) {
                                var pageText = '';

                                textContent.items.forEach(function(item) {
                                    pageText += item.str + '\n'; // Add newline for paragraph breaks in Word
                                });

                                // Append the text of the current page to the Word content
                                wordContent += pageText.trim() + '\n\n';

                                // Update progress
                                var progress = (pageNumber / totalPages) * 100;
                                document.getElementById('progress').style.width = progress + '%';
                                document.getElementById('progress').innerText = Math.round(progress) + '%';

                                if (pageNumber === totalPages) {
                                    // Create a temporary link element to download the Word document
                                    var link = document.createElement('a');
                                    link.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent(wordContent);
                                    link.download = 'converted.doc'; // Change the extension to .doc for Word 2003 format
                                    link.click();

                                    // Show success message
                                    document.getElementById('successMessage').style.display = 'block';
                                } else {
                                    convertPageToText(pageNumber + 1);
                                }
                            });
                        });
                    };

                    convertPageToText(1);
                });
            };

            // Show progress bar
            document.getElementById('progressBar').classList.remove('hidden');

            fileReader.readAsArrayBuffer(file);
        }