<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        
        
        
        #upload-success-message {
            display: none;
            text-align: center;
        }
        #extractedText {
            display: none;
            width: 100%;
            box-sizing: border-box;
        }
        .buttons {
            display: none;
        }
    </style>
    <div class="drag-drop" id="drag-drop-area">
        <i class="upload-icon">&#x1F4E4;</i>
        <p>Drag & Drop Your PDF File Here</p>
        <label for="file">or</label>
       <center> <input type="file" id="file" name="file" accept=".pdf" onchange="handleFileUpload(event)"></center>
    </div>

    <div id="upload-success-message">
        <center>
            <img src="https://img.icons8.com/ios-filled/50/000000/pdf.png" alt="PDF Icon" id="pdf-icon">
        </center>
        <div id="fileNameDisplay"></div>
    </div>

    <textarea id="extractedText" rows="10" cols="50" readonly></textarea><br>
    <div class="buttons" id="buttons">
        <button type="button" onclick="extractText()">Extract Text</button>
        <button type="button" onclick="resetForm()">Reset</button>
    </div>
    <button type="button" id="copyTextButton" style="display: none;" onclick="copyText()">Copy Text</button>
    <button type="button" id="downloadTextButton" style="display: none;" onclick="downloadText()">Download Text</button>

    <script>
        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('file');
        const uploadSuccessMessage = document.getElementById('upload-success-message');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        const buttons = document.getElementById('buttons');
        const extractedTextArea = document.getElementById('extractedText');
        const copyTextButton = document.getElementById('copyTextButton');
        const downloadTextButton = document.getElementById('downloadTextButton');

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
            handleFileUpload();
        });

        function handleFileUpload(event) {
            const file = fileInput.files[0];
            if (file && file.type === 'application/pdf') {
                displayFileName(file);
                uploadSuccessMessage.style.display = 'block';
                buttons.style.display = 'block';
                dragDropArea.style.display = 'none';
                extractedTextArea.style.display = 'block'; // Make textarea visible
                copyTextButton.style.display = 'none';
                downloadTextButton.style.display = 'none';
            }
        }

        function displayFileName(file) {
            const fileName = file.name ? file.name : "";
            fileNameDisplay.textContent = `Selected File: ${fileName}`;
        }

        async function extractText() {
            const file = fileInput.files[0];
            if (!file) {
                alert('Please select a PDF file.');
                return;
            }
            const reader = new FileReader();
            reader.readAsArrayBuffer(file);

            reader.onload = async function() {
                const pdfData = new Uint8Array(reader.result);
                const pdf = await pdfjsLib.getDocument({ data: pdfData }).promise;
                const numPages = pdf.numPages;
                let fullText = '';
                
                for (let i = 1; i <= numPages; i++) {
                    const page = await pdf.getPage(i);
                    const textContent = await page.getTextContent();
                    const text = textContent.items.map(item => item.str).join(' ');
                    fullText += text + '\n\n';
                }

                extractedTextArea.value = fullText;
                copyTextButton.style.display = 'inline-block';
                downloadTextButton.style.display = 'inline-block';
            };
        }

        function resetForm() {
            fileInput.value = '';
            extractedTextArea.value = '';
            fileNameDisplay.textContent = '';
            uploadSuccessMessage.style.display = 'none';
            buttons.style.display = 'none';
            dragDropArea.style.display = 'block';
            extractedTextArea.style.display = 'none';
            copyTextButton.style.display = 'none';
            downloadTextButton.style.display = 'none';
        }

        function copyText() {
            navigator.clipboard.writeText(extractedTextArea.value).then(() => {
                alert('Text copied to clipboard.');
            }).catch(() => {
                alert('Failed to copy text to clipboard.');
            });
        }

        function downloadText() {
            const text = extractedTextArea.value;
            const blob = new Blob([text], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'extracted_text.txt';
            document.body.appendChild(a);
            a.click();
            setTimeout(() => {
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }, 0);
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