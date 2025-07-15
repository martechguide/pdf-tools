<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert HTML to PDF Preview Style</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdn.rawgit.com/eKoopmans/html2pdf/0.9.2/dist/html2pdf.bundle.js"></script>
<textarea id="html-input" placeholder="Enter HTML code here"></textarea>
<br><br>
<input type="file" id="uploadFile" accept=".html">
<p id="fileName"></p>
<br><br>
<button id="download-pdf-button">Download PDF</button>
<script>
  document.getElementById("uploadFile").addEventListener("change", function() {
    var fileInput = document.getElementById("uploadFile");
    var fileNameDisplay = document.getElementById("fileName");

    if (fileInput.files.length > 0) {
      var fileName = fileInput.files[0].name;
      fileNameDisplay.textContent = "Selected File: " + fileName;
    } else {
      fileNameDisplay.textContent = "";
    }
  });

  document.getElementById("download-pdf-button").addEventListener("click", function() {
    var htmlContent = document.getElementById("html-input").value;

    if (!htmlContent) {
      var fileInput = document.getElementById("uploadFile");

      if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
          var fileContent = e.target.result;
          convertToPdf(fileContent);
        };

        reader.readAsText(file);
      }
    } else {
      convertToPdf(htmlContent);
    }
  });

  function convertToPdf(html) {
    var element = document.createElement('div');
    element.innerHTML = html;

    var pdfWidth = 210; // Set the width in mm

    html2pdf(element, {
      margin: 10,
      filename: 'html-to-pdf.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2, useCORS: true },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait', width: pdfWidth },
      pagebreak: { avoid: '.pagebreak' },
    });
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