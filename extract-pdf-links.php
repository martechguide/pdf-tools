<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Extract URLs From PDFs</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
        .stylish-section {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            background-color: #f9f9f9;
        }
    </style>

    <div class="drag-drop" id="drag-drop-area">
        <i class="upload-icon">&#x1F4E4;</i>
        <p>Drag & Drop Your PDF File Here</p>
        <label for="fileInput">or</label>
        <input type="file" id="fileInput" accept=".pdf">
    </div>
    
    <div id="fileInfo" class="hidden">
        <p>File Name: <span id="fileName"></span></p>
        <p>Link Count: <span id="linkCount">0</span></p>
        <button id="extractButton" class="button">Extract Links</button>
    </div>
    
    <div id="linkSection" class="hidden stylish-section">
        <h3>Extracted Links</h3>
        <div id="linkList"></div>
        <button id="copyButton" class="button copy hidden">Copy Links</button>
        <button id="downloadButton" class="button download hidden">Download Links</button>
    </div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvZXhsLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
  </div></div> <?php include('admin/ad2.php'); ?> <br><br>
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