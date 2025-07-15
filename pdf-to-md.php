<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to MD Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
        #successMessage {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
        <div class="drag-drop" id="drag-drop-area">
            <i class="upload-icon">&#x1F4E4;</i>
            <p>Drag & Drop Your PDF File Here</p>
            <label for="pdfFile">or</label>
            <input type="file" id="pdfFile" accept=".pdf" onchange="displayFileName()">
        </div>

        <div id="fileInfo" class="hidden">
            <p id="fileNameDisplay"></p>
            <button class="button" onclick="convertToMarkdown()">Convert to Markdown</button>
            <p id="successMessage" class="hidden">Conversion Successful! The Markdown file is being downloaded.</p>
        </div>
    </section>

    <script>
        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('pdfFile');
        const fileInfo = document.getElementById('fileInfo');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const successMessage = document.getElementById('successMessage');

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
            displayFileName();
        });

        function displayFileName() {
            const file = fileInput.files[0];
            if (file) {
                fileNameDisplay.textContent = `Selected file: ${file.name}`;
                fileInfo.classList.remove('hidden');
            } else {
                alert('Please select a PDF file.');
            }
        }

        function convertToMarkdown() {
            const file = fileInput.files[0];
            if (!file) {
                alert('Please select a PDF file to convert.');
                return;
            }

            const fileReader = new FileReader();
            fileReader.onload = function () {
                const typedArray = new Uint8Array(this.result);

                pdfjsLib.getDocument(typedArray).promise.then(function (pdf) {
                    const totalPages = pdf.numPages;
                    let markdownContent = '';

                    const extractPageText = function (pageNumber) {
                        pdf.getPage(pageNumber).then(function (page) {
                            page.getTextContent().then(function (textContent) {
                                let pageText = '';

                                textContent.items.forEach(function (item) {
                                    pageText += item.str + '\n';
                                });

                                markdownContent += `### Page ${pageNumber}\n\n`;
                                markdownContent += `\`\`\`\n${pageText.trim()}\n\`\`\`\n\n`;

                                if (pageNumber === totalPages) {
                                    const markdownData = new Blob([markdownContent], { type: 'text/markdown' });
                                    const link = document.createElement('a');
                                    link.href = URL.createObjectURL(markdownData);
                                    link.download = 'converted.md';
                                    link.click();

                                    successMessage.classList.remove('hidden');
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
    </script>
  </div> </div> <?php include('admin/ad2.php'); ?> <br><br>
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="text-section">
  <h2 class="section-heading">Lorem Ipsum Title</h2>
  <h3 class="section-subheading">Why Our Online PDF Tools?</h3>
  <p class="section-description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet pulvinar libero. Nullam vehicula orci non eros fringilla, sit amet egestas justo interdum. Suspendisse potenti. Integer vulputate massa vel nulla faucibus pretium. Fusce vehicula nisl neque, at lacinia dolor suscipit eget.
  </p>
</div>

  <!----------------------------------------------------------------> 
 <?php include('admin/calltoaction.php'); ?>
<?php include('admin/abovefooter.php'); ?> 
<?php include('admin/footer.php'); ?> 
<?php include('admin/network.php'); ?>
<button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script>
   // Show the button when the user scrolls down 100px from the top of the document
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
}

// Scroll to the top of the document when the button is clicked
function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}

  </script>
  </body>
</html>