<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Merge Text & PDFs Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
  <script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.16.0/dist/pdf-lib.js"></script>
  <style>

    #fileGrid {
      display: none;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 10px;
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
    }

    .fileItem span {
      margin-top: 10px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin: 5px;
      display: none;
    }

    #downloadLink {
      display: none;
      margin-top: 20px;
      font-size: 16px;
    }
    #pdf-upload{display:yes;}
  </style>

    <div class="drag-drop" id="drag-drop-area">
      <i class="upload-icon">&#x1F4E4;</i>
      <p>Drag & Drop Your PDF or Text Files Here</p>
      <label for="pdf-upload">or</label>
      <input type="file" id="pdf-upload" accept=".pdf, .txt" multiple>
    </div>

    <div id="fileGrid"></div>

    <button id="mergeButton" onclick="mergePDFsAndText()">Merge Files</button>
    <button id="resetButton" onclick="resetFiles()">Reset</button>
    <a id="downloadLink">Download</a>
  </div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvbXB0LmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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