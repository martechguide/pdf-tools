<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF into Parts Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.16.0/pdf-lib.js"></script>
  <style>
    #fileInput {
      display: block;
      margin: 0 auto;
    }

    #fileInfo {
      display: none;
      margin-top: 10px;
    }

    #numParts {
      display: none;
      margin-top: 10px;
    }

    #splitButton {
      display: none;
      margin-top: 10px;
    }

    #progressBarContainer {
      display: none;
      margin-top: 10px;
    }
    #progressBar {
      width: 0;
      height: 20px;
      background-color: #4CAF50;
      border-radius: 5px;
      transition: width 0.5s;
    }
    #fileInfo{
        padding:20px;
        border:2px dashed gold;
        background:white;
        border-radius:10px;
    }
  </style>
<div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i>
  <p>Drag & Drop Your PDF File Here</p>
  <input type="file" id="fileInput" accept=".pdf">
</div>

<div id="fileInfo"></div>
<input type="number" id="numParts" min="1" value="1"><br>
<button id="splitButton" onclick="splitPDF()">Convert</button>
<div id="progressBarContainer">
  <div id="progressBar"></div>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcHJ0LmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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