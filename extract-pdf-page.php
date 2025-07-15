<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Extract Any Page From PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
  <script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.16.0/dist/pdf-lib.js"></script>
  <style>
    #fileGrid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 10px;
      border: 2px dashed #ddd;
      margin: 11px auto;
      background: #f2f2f2;
      padding: 22px;
    }

    .fileItem {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      border: 1px solid #ddd;
      background-color: #fff;
      border-radius: 5px;
     
    }

    .fileItem span {
      margin-top: 10px;
      word-wrap: break-word;
      text-align: center;
    }

    .pageOrderInput {
      width: 50px;
      margin-top: 5px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }

    #downloadLink {
      display: none;
      text-decoration: none;
      color: white;
      background-color: #4CAF50;
      padding: 10px 20px;
      border-radius: 5px;
    }
  </style>
<div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i>
  <p>Drag & Drop Your PDF Files Here</p>
  <label for="fileInput">or</label>
  <input type="file" id="fileInput" accept=".pdf" multiple>
</div>
<div id="fileGrid"></div>
<button onclick="rearrangePDFPages()">Extract</button>
<button onclick="resetFiles()">Reset</button>
<a id="downloadLink">Download</a>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvYW5wLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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