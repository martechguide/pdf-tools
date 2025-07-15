<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Analyze PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<style>
  
  #text-display, #analysis-results, button {
    display: none;
  }

  #text-display {
    max-height: 200px;
    overflow-y: auto;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    margin-bottom: 10px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }
</style>

<div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i>
  <p>Drag & Drop Your PDF File Here</p>
  <label for="pdf-upload">or</label>
  <input type="file" id="pdf-upload" accept=".pdf">
</div>

<div id="text-display">
  <h2>Text Content:</h2>
  <pre id="text-content"></pre>
</div>

<div id="analysis-results">
  <h2>Analysis Results:</h2>
  <table>
    <tr>
      <th>Category</th>
      <th>Total</th>
    </tr>
    <tr>
      <td>Total Characters</td>
      <td><span id="total-characters">0</span></td>
    </tr>
    <tr>
      <td>Total Words</td>
      <td><span id="total-words">0</span></td>
    </tr>
    <tr>
      <td>Total Lines</td>
      <td><span id="total-lines">0</span></td>
    </tr>
    <tr>
      <td>Total Paragraphs</td>
      <td><span id="total-paragraphs">0</span></td>
    </tr>
  </table>
</div>

<button onclick="copyText()">Copy Text</button>
<button onclick="downloadText()">Download Text</button>
<button onclick="resetOptions()">Reset Options</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
<script>  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.worker.js';

  const dragDropArea = document.getElementById("drag-drop-area");
  const fileInput = document.getElementById("pdf-upload");

  dragDropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = "#666";
  });

  dragDropArea.addEventListener("dragleave", () => {
    dragDropArea.style.borderColor = "#ccc";
  });

  dragDropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = "#ccc";
    const files = e.dataTransfer.files;
    handleFileUpload(files[0]);
  });

  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    handleFileUpload(file);
  });

  function handleFileUpload(file) {
    if (file.type !== "application/pdf") {
      alert(file.name + " is not a PDF file.");
      return;
    }

    document.getElementById("text-display").style.display = "block";
    document.getElementById("analysis-results").style.display = "block";
    document.querySelectorAll("button").forEach(btn => btn.style.display = "inline-block");

    const fileReader = new FileReader();

    fileReader.onload = function() {
      const typedarray = new Uint8Array(this.result);

      pdfjsLib.getDocument(typedarray).promise.then(function(pdfDoc) {
        console.log("The PDF has", pdfDoc.numPages, "page(s).");

        let textContent = '';
        let totalCharacters = 0;
        let totalWords = 0;
        let totalLines = 0;
        let totalParagraphs = 0;

        const promises = [];

        for (let i = 0; i < pdfDoc.numPages; i++) {
          promises.push(pdfDoc.getPage(i + 1).then(function(page) {
            return page.getTextContent().then(function(pageTextContent) {
              pageTextContent.items.forEach(function(item) {
                textContent += item.str + '\n';
                totalCharacters += item.str.length;
                totalWords += item.str.split(/\s+/).length;
              });

              totalLines += pageTextContent.items.length;
              totalParagraphs += textContent.split('\n\n').length;
            });
          }));
        }

        Promise.all(promises).then(function() {
          document.getElementById("text-content").innerText = textContent;
          document.getElementById("total-characters").innerText = totalCharacters;
          document.getElementById("total-words").innerText = totalWords;
          document.getElementById("total-lines").innerText = totalLines;
          document.getElementById("total-paragraphs").innerText = totalParagraphs;
        });
      });
    };

    fileReader.readAsArrayBuffer(file);
  }

  function copyText() {
    const text = document.getElementById("text-content").innerText;
    navigator.clipboard.writeText(text).then(() => {
      alert("Text copied to clipboard!");
    }, (err) => {
      console.error('Could not copy text: ', err);
    });
  }

  function downloadText() {
    const text = document.getElementById("text-content").innerText;
    const blob = new Blob([text], { type: "text/plain;charset=utf-8" });
    const anchor = document.createElement('a');
    anchor.href = URL.createObjectURL(blob);
    anchor.download = "text_content.txt";
    anchor.click();
  }

  function resetOptions() {
    document.getElementById("text-content").innerText = "";
    document.getElementById("total-characters").innerText = "0";
    document.getElementById("total-words").innerText = "0";
    document.getElementById("total-lines").innerText = "0";
    document.getElementById("total-paragraphs").innerText = "0";
    document.getElementById("pdf-upload").value = "";
    document.getElementById("text-display").style.display = "none";
    document.getElementById("analysis-results").style.display = "none";
    document.querySelectorAll("button").forEach(btn => btn.style.display = "none");
  }</script>
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