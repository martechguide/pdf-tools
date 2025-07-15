<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to Excel Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i> <!-- Upload icon -->
  <p>Drag & Drop Your PDF File Here</p>
  <label for="pdfFile">or</label>
  <input type="file" id="pdfFile" accept=".pdf">
</div>
<div id="conversion-section" style="display: none;">
  <span id="fileName">
      <img src="https://resulta.co.za/wp-content/uploads/2021/02/png-clipart-pdf-computer-file-file-format-document-pdf-icon-text-logo-thumbnail.png" alt="PDF Icon" style="width: 20px;">Name: </span><br><br>
  <button type="button" id="convert-button">Convert to Excel</button>
  <br><br>
  <div id="progressBar" style="display: none;">
    <progress id="progressBarFill" max="100">0%</progress>
  </div>
</div>
<button id="refresh-button" style="display: none;">Convert Another</button>
<style>
#conversion-section{
    padding:11px;
    border:2px dashed #ddd;
    border-radius:5px;
    background:#fff;
    width:100%;
    margin:15px auto;
}
    #progressBar {
    width: 100%;
    background-color: transparent;
    border: 0px solid #ccc;
    border-radius: 50px;
    margin: 10px 0;
    padding: 5px;
}

#progressBarFill {
    width: 100%;
    height: 20px;
    border-radius: 50px;
    background-color: #E5322D;
    color: white;
    text-align: center;
    line-height: 20px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

#progressBarFill::-webkit-progress-bar {
    background-color: transparent;
    border-radius: 5px;
}

#progressBarFill::-webkit-progress-value {
    background-color: #007bff;
    border-radius: 5px;
}

#progressBarFill::-moz-progress-bar {
    background-color: #007bff;
    border-radius: 5px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcHhsLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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