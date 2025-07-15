<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Listen PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
    <center>
        <input accept=".pdf" id="pdfFile" type="file" /><br>
        <button id="loadPdf">Load PDF</button><br><br>
        <button id="speakText">Speak Text</button>
        <button id="stopSpeech">Stop</button>
        <button id="refresh">Refresh</button><br>
        <div id="pdfContainer"></div>
    </center>
    <script>
        let pdfDoc = null;
        let pageNum = 1;
        let textContent = null;
        let synth = window.speechSynthesis;
        let utterance = null;

        document.getElementById('loadPdf').addEventListener('click', loadPdf);
        document.getElementById('speakText').addEventListener('click', speakText);
        document.getElementById('stopSpeech').addEventListener('click', stopSpeech);
        document.getElementById('refresh').addEventListener('click', refresh);

        async function loadPdf() {
            const pdfFileInput = document.getElementById('pdfFile');

            if (!pdfFileInput.files[0]) {
                alert('Please select a PDF file.');
                return;
            }

            const pdfFile = pdfFileInput.files[0];
            const pdfFileUrl = URL.createObjectURL(pdfFile);

            // Load the PDF using PDF.js
            const loadingTask = pdfjsLib.getDocument(pdfFileUrl);
            const pdf = await loadingTask.promise;
            pdfDoc = pdf;

            // Display all pages
            for (let i = 1; i <= pdfDoc.numPages; i++) {
                await displayPage(i);
            }
        }

        async function displayPage(pageNumber) {
            const page = await pdfDoc.getPage(pageNumber);
            const pdfContainer = document.getElementById('pdfContainer');
            const scale = 1.5;
            const viewport = page.getViewport({ scale });

            // Prepare the canvas for rendering
            const canvas = document.createElement('canvas');
            canvas.style.display = 'block';
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            pdfContainer.appendChild(canvas);

            // Render the page on the canvas
            const context = canvas.getContext('2d');
            const renderTask = page.render({ canvasContext: context, viewport });
            await renderTask.promise;

            // Get the text content for the page
            const pageTextContent = await page.getTextContent();
            textContent = textContent ? textContent.concat(pageTextContent.items) : pageTextContent.items;
        }

        function speakText() {
            if (textContent) {
                utterance = new SpeechSynthesisUtterance();
                utterance.text = textContent.map(item => item.str).join(' ');
                synth.speak(utterance);
            } else {
                alert('No text to speak. Load a PDF first.');
            }
        }

        function stopSpeech() {
            if (synth.speaking) {
                synth.cancel();
                if (utterance) utterance = null;
            }
        }

        function refresh() {
            document.getElementById('pdfContainer').innerHTML = '';
            pdfDoc = null;
            pageNum = 1;
            textContent = null;
            stopSpeech();
        }
    </script>
  <style>
        #pdfContainer {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 10px;
            justify-items: center;
        }

        canvas {
            width: 100%;
            height: auto;
            border: 1px solid #ccc; /* Optional: Add border for better visibility */
        }
    </style>



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