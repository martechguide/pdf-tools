<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to HTML Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <style>
         .hidden {
            display: none;
        }
        .button {
        
        #successMessage {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
        <div class="drag-drop" id="drag-drop-area">
            <i class="upload-icon">&#x1F4E4;</i>
            <p>Drag & Drop Your PDF File Here</p>
            <label for="pdfFile">or</label>
            <input type="file" id="pdfFile" accept="application/pdf">
        </div>

        <div id="fileInfo" class="hidden">
            <p id="fileName"></p>
            <button class="button" onclick="convertToHTML5()">Convert to HTML5</button>
            <p id="successMessage" class="hidden">Conversion Successful! You can now download the HTML file.</p>
            <div id="html5Output"></div>
            <br>
            <a id="downloadButton" href="#" download="converted.html" class="hidden">Download as HTML</a>
        </div>
   <script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcGh0bWwuanMiIGRlZmVyPSIiPjwvc2NyaXB0Pg=="));</script>
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