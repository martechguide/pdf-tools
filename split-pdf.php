<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Split PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<style>
  #progressBarContainer {
    width: 50%;
    margin: 20px auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
  }

  #progressBar {
    height: 20px;
    background-color: #4caf50;
    width: 0;
    transition: width 0.5s ease;
  }
  #splitButton{
      width:50%;
      margin:20px auto;
  }
</style>
<div id="dragDropArea">
  <i class="upload-icon">&#x1F4E4;</i>
  <p>Drag & Drop Your PDF File Here</p>
  <input type="file" accept=".pdf" id="pdfInput" style="display: yes;" onchange="loadPDF(event)">
</div>
<div id="fileInfo" style="display: none;"></div>
<button id="splitButton" style="display: none;" onclick="splitPDF()">Split PDF</button>
<div id="progressBarContainer" style="display: none;">
  <div id="progressBar"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.16.0/pdf-lib.js"></script>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvc3BsaXQuanMiIGRlZmVyPSIiPjwvc2NyaXB0Pg=="));</script>
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