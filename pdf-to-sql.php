<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to SQL Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 5px;
        }
        textarea {
            width: 100%;
            height: 150px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-family: monospace;
            resize: none;
        }
    </style>
        <div class="drag-drop" id="drag-drop-area">
            <i class="upload-icon">&#x1F4E4;</i>
            <p>Drag & Drop Your PDF File Here</p>
            <label for="pdfFile">or</label>
            <input type="file" id="pdfFile" accept=".pdf" onchange="extractText()">
        </div>

        <div id="fileInfo" class="hidden">
            <button class="button" onclick="extractText()">Convert to SQL</button>
            <button class="button" onclick="resetText()">Reset</button>
            <textarea id="extractedText" readonly></textarea>
            <button class="button" onclick="downloadSQL()">Download SQL</button>
        </div>
    </section>

    <script>
        const dragDropArea = document.getElementById('drag-drop-area');
        const fileInput = document.getElementById('pdfFile');
        const fileInfo = document.getElementById('fileInfo');
        const extractedText = document.getElementById('extractedText');

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
            extractText();
        });

        async function extractText() {
            const file = fileInput.files[0];
            if (!file) {
                alert('Please select a PDF file.');
                return;
            }
            const reader = new FileReader();
            reader.onload = async function () {
                const text = await extractPdfText(reader.result);
                extractedText.value = text;
                fileInfo.classList.remove('hidden');
            };
            reader.readAsArrayBuffer(file);
        }

        async function extractPdfText(data) {
            const pdf = await pdfjsLib.getDocument({ data }).promise;
            const maxPages = pdf.numPages;
            const textContents = [];
            for (let i = 1; i <= maxPages; i++) {
                const page = await pdf.getPage(i);
                const content = await page.getTextContent();
                const strings = content.items.map(item => item.str);
                const text = strings.join('\n');
                textContents.push(text);
            }
            return textContents.join('\n');
        }

        function resetText() {
            extractedText.value = '';
            fileInfo.classList.add('hidden');
        }

        function downloadSQL() {
            const text = extractedText.value;
            const sqlContent = formatToSQL(text);
            saveAsSQL(sqlContent, 'converted_data.sql');
        }

        function formatToSQL(text) {
            const lines = text.split('\n');
            const insertStatements = lines.map(line => {
                const [id, name, age] = line.split(',');
                return `INSERT INTO Data (ID, Name, Age) VALUES (${id}, '${name}', ${age});`;
            });
            return insertStatements.join('\n');
        }

        function saveAsSQL(sqlContent, filename) {
            const blob = new Blob([sqlContent], { type: 'text/sql' });
            const a = document.createElement('a');
            const url = URL.createObjectURL(blob);
            a.href = url;
            a.download = filename;
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