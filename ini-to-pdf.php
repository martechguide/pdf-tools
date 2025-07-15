<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert INI to PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

<div class="drag-drop" id="drag-drop-area">
    <i class="upload-icon">&#x1F4E4;</i>
    <p>Drag & Drop Your INI File Here</p>
    <label for="file">or</label>
    <input type="file" id="file" name="file" accept=".ini" onchange="handleFileUpload(event)">
</div>

<div id="upload-success-message" style="display: none;">
    <center>
       <img src="https://img.icons8.com/ios-filled/50/000000/file.png" alt="File Icon">
    </center>
    <div id="fileNameDisplay"></div>
</div>

<label for="content">Or enter ini code here:</label><br>
<textarea id="content" name="content" rows="10" cols="50"></textarea><br>

<div class="buttons" id="buttons" style="display: none;">
    <button type="button" onclick="convertToPDF()">Convert</button>
    <button type="button" onclick="resetForm()">Reset</button>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvZmlsZS5qcyIgZGVmZXI9IiI+PC9zY3JpcHQ+"));</script>

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