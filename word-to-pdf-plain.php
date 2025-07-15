<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert Word to Plain PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
      <style>
          #downloadPDF{
              width:100%;
          }
      </style>
<div id="options" style="display: none;">
    <div id="progress-bar">
        <div id="progress-fill">0%</div>
    </div>

    <div id="success-message" style="display: none;">Conversion to PDF successful!</div>

    <div id="file-icon-name">
        <center><img src="https://img.icons8.com/ios-filled/50/000000/ms-word.png" alt="Word Icon" id="word-icon" style="display:none;"></center>
        <div id="fileNameDisplay"></div>
    </div>

    <div class="buttons">
        <div id="upload-success-message" style="display: none;">File uploaded successfully!</div>
        
            <button id="downloadPDF" style="display: none;" onclick="downloadPDF()">Download PDF</button>
            <button id="reset-button" onclick="resetForm()">Convert More</button>
    </div>
</div>

<div class="drag-drop" id="drag-drop-area">
    <i class="upload-icon">&#x1F4E4;</i>
    <p>Drag & Drop Your Word File Here</p>
    <label for="file-upload">or</label>
    <input type="file" id="file-upload" accept=".docx" onchange="handleFileUpload(event)">
</div>
<textarea id="convertedContent" rows="10" cols="50" readonly style="display:none;"></textarea>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.3/mammoth.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvd3JkLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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