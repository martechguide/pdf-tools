<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Bulk PDF Page Remover Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<style>
  .page-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    width: 90%;
    margin: 10px auto;
  }

  .page-wrapper {
    position: relative;
  }

  .remove-icon {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: #333;
    padding: 5px 10px;
    border-radius: 5%;
    cursor: pointer;
    color: white;
  }

  .options-container {
    display: none; /* Hide initially */
    margin-top: 20px;
  }

  .file-name {
    font-weight: bold;
    margin-top: 10px;
  }
</style>

<div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i>
  <input type="file" id="pdf-upload" accept="application/pdf" multiple /><br/>
  <div id="file-name" class="file-name"></div> <!-- Display file name -->
  <div id="pages" class="page-container"></div>
  <div class="options-container" id="options-container">
    <button id="downloadPdf">Download</button>
  </div>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcmJwLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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