<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to JSON Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<div class="drag-drop" id="drag-drop-area">
    <i class="upload-icon">&#x1F4E4;</i>
    <p>Drag & Drop Your PDF File Here</p>
    <label for="pdfFile">or</label>
    <input type="file" id="pdfFile" accept=".pdf">
</div>
<div id="fileDetails" style="display: none;">
    <p id="fileName"></p>
    <button id="convertButton">Convert to JSON</button>
</div>
<div id="progressBar" style="display: none;">
    <progress id="progressBarFill" max="100">0%</progress>
</div>
<div id="successMessage" style="display: none;">
    <p>Conversion successful! Click below to download the JSON file.</p>
    <a id="downloadLink" href="#" download="converted.json">Download JSON</a>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcGpzbi5qcyIgZGVmZXI9IiI+PC9zY3JpcHQ+"));</script>
<style>
#fileDetails{
    padding:11px;
    border:2px dashed #ddd;
    background:white;
    border-radius:5px;
}
  #progressBar {
    width: 100%;
    margin-top: 20px;
    text-align: center;
  }

  #progressBarFill {
    width: 100%;
    height: 30px;
    -webkit-appearance: none;
    appearance: none;
    border-radius: 50px;
    background-color: #ff0000;
    overflow: hidden;
    position: relative;
  }

  #progressBarFill::-webkit-progress-bar {
    background-color: #e0e0e0;
  }

  #progressBarFill::-webkit-progress-value {
    background-color: #ff0000;
  }

  #progressBarFill::-moz-progress-bar {
    background-color: #979398;
  }

  #progressBarFill::-ms-fill {
    background-color: #fff;
  }

  #progressBarFill::after {
    content: attr(value) "%";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 14px;
    color: #fff;
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