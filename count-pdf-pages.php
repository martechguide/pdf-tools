<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Count PDF Pages Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">

<style>
    #fileInfo {
        margin-top: 20px;
    }

    #progressBar {
        margin-top: 10px;
        width: 100%;
        height: 10px;
        background-color: #ddd;
        border-radius: 5px;
        overflow: hidden;
        display: none;
    }

    #uploadProgress {
        width: 0;
        height: 100%;
        background-color: #4caf50;
        text-align: center;
        line-height: 10px;
        color: #fff;
        transition: width 0.3s ease;
    }

    #thumbnailContainer {
        display: none;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 20px;
    }

    .thumbnail-card {
        position: relative;
        width: 100px;
        height: 120px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
        margin: 5px;
    }

    .pdf-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background: url('http://editpdf.in/wp-content/uploads/2023/11/pdf.png') center/contain no-repeat;
    }

    .download-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 80px;
        background: url('http://editpdf.in/wp-content/uploads/2023/11/download-4.png') center/contain no-repeat;
        opacity: 0;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .thumbnail-card:hover .download-icon {
        opacity: 1;
    }

    .highlight {
        border-color: #0056b3;
    }

    .download-link {
        display: block;
        margin-top: 10px;
    }
    .button {
            
            display: none;
        }
</style>

<div id="drop-area">
    <i class="upload-icon">&#x1F4E4;</i>
    <p>Drag & Drop Your PDF File Here</p>
    <label for="pdfInput">or click here to select one</label>
    <input type="file" id="pdfInput" accept=".pdf" onchange="displayFileInfo(this)">
</div>
<div id="fileInfo"></div>
<div id="progressBar">
    <div id="uploadProgress"></div>
</div>
<button class="button" onclick="splitPDF()">Split PDF</button>
<div id="thumbnailContainer"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.15.0/dist/pdf-lib.js"></script>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvY291bnR6aXAuanMiIGRlZmVyPSIiPjwvc2NyaXB0Pg=="));</script>
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