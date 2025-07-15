<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to PSD Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #options {
            display: none;
        }

        #conversion-progress {
            width: 100%;
            height: 20px;
            margin-top: 10px;
        }

        .page-container {
            position: relative;
            display: inline-block;
            margin: 10px;
            width: 360px;
            background: white;
            padding: 10px;
            border: 1px dashed lime;
            border-radius: 5px;
        }

        #success-message {
            display: none;
            margin-top: 20px;
        }
    </style>
    <div class="drag-drop" id="drag-drop-area">
        <i class="upload-icon">&#x1F4E4;</i>
        <p>Drag & Drop Your PDF File Here</p>
        <label for="pdfFile">or</label>
        <input type="file" id="pdfFile" accept=".pdf">
    </div>
    <div id="options">
        <button id="convert-btn">Convert to PSD</button>
        <span id="conversion-message"></span>
        <progress id="conversion-progress" value="0" max="100" style="display: none;"></progress>
        <button id="convert-another-btn" style="display: yes;">Convert Another</button>
    </div>
    <div id="pages"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
  <script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvcGRwcy5qcyIgZGVmZXI9IiI+PC9zY3JpcHQ+"));</script>
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