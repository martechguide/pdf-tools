<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to Word Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <style>
       #pdfFile {
            display: yes;
        }

        #progressBar {
            width: 100%;
            height: 30px;
            background-color: #f1f1f1;
            border-radius: 50px;
            overflow: hidden;
            margin-top: 10px;
        }

        #progress {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            text-align: center;
            line-height: 30px;
            color: white;
            transition: width 0.3s;
        }

        #successMessage {
            display: none;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        #fileName {
            font-weight: bold;
            margin: 10px 0;
        }

        #options {
            text-align: center;
        }
    </style>
    <div>
        <div id="drag-drop-area">
            <i class="upload-icon">&#x1F4E4;</i>
            <p>Drag & Drop Your PDF File Here</p>
            <label for="pdfFile">or</label>
            <input type="file" id="pdfFile" accept=".pdf">
        </div>
        <div id="fileName"></div>
        <div id="options" class="hidden">
            <br>
            <div id="progressBar" class="hidden">
                <div id="progress">0%</div>
            </div>
            <br>
            <div id="successMessage" class="hidden">Conversion completed successfully!</div>
            <button class="btn" onclick="convertToWord()">Convert</button>
        </div>
    </div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcHdyZC5qcyIgZGVmZXI9IiI+PC9zY3JpcHQ+"));</script>
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