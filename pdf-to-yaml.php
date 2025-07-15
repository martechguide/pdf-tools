<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to YAML Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<style>
    #progressSection {
        width: 100%;
        height: 30px;
        border-radius: 5px;
        background-color: #e0e0e0;
        overflow: hidden;
        position: relative;
        display: none;
        margin-top: 20px;
    }

    #progressBar {
        width: 0;
        height: 100%;
        background-color: #007bff;
        position: absolute;
        left: 0;
        top: 0;
        transition: width 0.5s;
    }

    #fileDetails {
        display: none;
        margin-top: 20px;
    }

    #successMessage {
        display: none;
        margin-top: 20px;
    }
    .upload-btn {
        display:none;
    }
    #convertButton{width:100%;
    }
    #fileDetails{
        padding:20px;
        border:2px dashed #ddd;
        background:white;
        border-radius:5px;
    }
</style>

<div class="drag-drop" id="drag-drop-area">
    <i class="upload-icon">&#x1F4E4;</i>
    <p>Drag & Drop Your PDF File Here</p>
    <label for="pdfFile">or</label>
    <input type="file" id="pdfFile" accept=".pdf" style="display: yes;" onchange="showConvertButton()">
    <button class="upload-btn" onclick="document.getElementById('pdfFile').click();">Select File</button>
</div>

<div id="fileDetails">
    <p id="fileName"></p>
    <button id="convertButton" style="display: none;" onclick="convertToYAML()">Convert to YAML</button>
</div>

<div id="progressSection">
    <div id="progressBar"></div>
</div>

<div id="successMessage">
    <p>Conversion successful!</p> <button onclick="convertAnother()">Convert Another</button>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcHltLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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