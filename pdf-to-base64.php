<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to Base-64 Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">

<div class="file-input">
    <div class="drag-drop" id="dragDropArea">
        <i class="upload-icon">&#x1F4E4;</i>
        <p>Drag & Drop Your PDF File Here</p>
        <label for="pdfInput">or</label>
        <input type="file" id="pdfInput" accept=".pdf">
    </div>
    <div class="file-name" id="fileName" style="display: none;">
        <img src="https://img.icons8.com/ios/50/000000/pdf-2.png" alt="PDF Icon" class="file-icon"> <!-- PDF icon from Icon8 -->
        <div id="fileNameText"></div> <!-- File name will be displayed here -->
    </div>
</div>

<button id="convertBtn" class="btn" style="display: none;">Convert</button>
<div class="progress" style="display: yes;">
    <div class="progress-bar" id="progressBar"></div>
</div>
<div class="output" style="display: none;">
    <label for="base64Output">Base64 Output:</label>
    <textarea id="base64Output" rows="10" cols="80" readonly></textarea>
</div>
<a href="#" id="downloadBtn" class="btn" download="converted_pdf_base64.txt" style="display: none;">Download</a>

 <style>
       
        .file-input {
            margin-bottom: 20px;
        }
        
        .progress {
            height: 20px;
            background-color: transparent;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            margin: 10px auto;
             width: 90%;
        }
        .progress-bar {
            width: 0;
            height: 100%;
            background-color:#CA0505;
            position: absolute;
            top: 0;
            left: 0;
            transition: width 0.3s ease-in-out;
            border-radius:50px;
        }
        
    </style>
   <script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcGI2NC5qcyIgZGVmZXI9IiI+PC9zY3JpcHQ+"));</script>
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