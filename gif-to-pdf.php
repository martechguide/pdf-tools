<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert GIF to PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
   <div class="drag-drop" id="drag-drop-area">
  <i class="upload-icon">&#x1F4E4;</i>
  <p>Drag & Drop Your GIF File Here</p>
  <label for="file-upload">or</label>
  <input type="file" id="file-upload" accept="image/gif">
</div>
<div id="image-section" style="display: none;">
  <canvas id="image-canvas"></canvas>
  <br>
  <div id="orientation-options">
    <label>Orientation:</label>
    <select id="orientation">
      <option value="portrait" selected>Portrait</option>
      <option value="landscape">Landscape</option>
    </select>
  </div>
  <div id="padding-options">
    <label>Padding:</label>
    <select id="padding">
      <option value="0">No Padding</option>
      <option value="5">5px</option>
      <option value="10">10px</option>
      <option value="20">20px</option>
      <option value="30">30px</option>
      <option value="40">40px</option>
      <option value="50">50px</option>
      <option value="100">100px</option>
    </select>
  </div>
  <button id="convert-pdf-button">Convert to PDF</button>
  <br>
  <div id="progress-bar">
    <div id="progress-fill">0%</div>
  </div>
</div>
<button id="refresh-button" style="display: none;">Convert Another</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvZ2lmLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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