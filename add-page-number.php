<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Add Page Number to PDF</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div id="ads"> <?php include('admin/ad1.php'); ?> </div>
  <div class="toolarea-pdf">
  <style>
    #options {
      display: none;
      text-align: center;
    }

    #downloadLink {
      padding: 10px 22px;
      border-radius: 50px;
      color: white;
      background: #CA0505;
      cursor: pointer;
      max-width: 50%;
      margin: 11px auto;
      display: block;
      text-align: center;
      text-decoration: none;
    }

    #progressBar {
      width: 90%;
      height: 30px;
      background-color: transparent;
      margin: 11px auto;
      display: none;
    }

    #progressBarFill {
      height: 80%;
      background-color: #CA0505;
      border-radius: 50px;
      margin-top: 5px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.16.0/dist/pdf-lib.js"></script>
 <center>
  <div id="uploadContainer">
    <div id="dragDropArea">
      <i class="upload-icon">&#x1F4E4;</i>
      <p>Drag & Drop Your PDF File Here</p>
      <input type="file" id="pdfInput" accept=".pdf">
    </div>
  </div>

  <div id="options">
    <div id="fileName" style="display: none;"></div>
    <button onclick="addPageNumbers()">Add Page Numbers</button>
    <div>
      <label>Position</label>
      <select id="positionSelect">
        <option value="topleft">Top Left</option>
        <option value="topcenter">Top Center</option>
        <option value="topright">Top Right</option>
        <option value="bottomleft">Bottom Left</option>
        <option value="bottomcenter">Bottom Center</option>
        <option value="bottomright">Bottom Right</option>
      </select>
    </div>
    <div id="progressBar">
      <div id="progressBarFill"></div>
    </div>
    <div id="successMessage" style="display: none;">Page numbers added successfully!</div>
    <a id="downloadLink" style="display: none;">Download PDF</a>
  </div>
</center>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcG5vLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
  </div> <?php include('admin/ad2.php'); ?> <br><br>
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