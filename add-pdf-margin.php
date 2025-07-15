<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Add Margin to PDF Pages Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div id="ads"> <?php include('admin/ad1.php'); ?> </div>
  <div class="toolarea-pdf">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <style>

    #pdf-upload {
      display: yes; /* Hide the actual file input */
    }

    .page-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      background: transparent;
      width: 100%;
      margin: 10px auto;
      border: 2px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .page-wrapper {
      width: calc(33.33% - 20px); /* Three pages in one row */
      margin-bottom: 20px;
      padding: 5px;
      border: 2px solid #ccc;
      border-radius: 5px;
      background: #fff;
    }

    .page {
      margin: 10px;
      box-shadow: 0px 0px 5px #000;
      background: #f2f2f2;
    }

    .margin-inputs {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .margin-inputs label,
    .margin-inputs input {
      margin-right: 10px;
      margin-bottom: 10px;
      flex: 0 0 calc(20% - 10px); /* Two options in one row with 10px margin between them */
    }

    .apply-btn {
      margin: 10px auto;
      cursor: pointer;
      color: white;
      background: #D50E0F;
      padding: 8px 22px;
      border-radius: 50px;
      text-align: center;
      display: inline-block;
    }

    input[type="number"] {
      height: 35px;
      width: 80px;
      padding: 5px;
      font-size: 16px;
      font-family: Arial, sans-serif;
      background: #F9F9F9;
      border-radius: 5px;
      border: 1px solid #ccc;
      transition: all 0.2s ease-in-out;
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .page-wrapper img {
      max-width: 100%;
      height: auto;
    }
  </style>
    <div class="drag-drop" id="drag-drop-area">
      <i class="upload-icon">&#x1F4E4;</i>
      <p>Drag & Drop Your PDF File Here</p>
      <label for="pdf-upload">or</label>
      <input type="file" id="pdf-upload" accept=".pdf">
    </div>
    <div id="pages" class="page-container"></div>
  </div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvbWFyLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
  </div> <?php include('admin/ad2.php'); ?> <br><br>
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="text-section">
  <h2 class="section-heading">Our Unique Approach</h2>
  <h3 class="section-subheading">Why Choose Us</h3>
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