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

        function convertToWordPad() {
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
                    var wordPadContent = '{\\rtf1\\ansi\\ansicpg1252\\deff0\\nouicompat\\deflang1033{\\fonttbl{\\f0\\fnil\\fcharset0 Calibri;}}\n';

                    // Convert each page to text
                    var convertPageToText = function(pageNumber) {
                        pdf.getPage(pageNumber).then(function(page) {
                            page.getTextContent().then(function(textContent) {
                                var pageText = '';

                                textContent.items.forEach(function(item) {
                                    pageText += item.str + '\\par '; // Add \\par for paragraph breaks in RTF
                                });

                                // Append the text of the current page to the WordPad content
                                wordPadContent += pageText.trim() + '\\par\n';

                                // Update progress
                                var progress = (pageNumber / totalPages) * 100;
                                document.getElementById('progress').style.width = progress + '%';
                                document.getElementById('progress').innerText = Math.round(progress) + '%';

                                if (pageNumber === totalPages) {
                                    // Close RTF formatting
                                    wordPadContent += '}';

                                    // Create a temporary link element to download the WordPad document
                                    var link = document.createElement('a');
                                    link.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent(wordPadContent);
                                    link.download = 'converted.rtf'; // Change the extension to .rtf for Rich Text Format
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