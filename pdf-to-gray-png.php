<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert PDF to Gray PNG Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #pdf-upload {
        display: yes;
    }

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
        width: 340px;
        background: white;
        padding: 10px;
        border: 2px dashed gold;
        border-radius: 5px;
    }

    #convert-another-btn {
        display: none;
        width: 100%;
    }

    #file-info {
        margin: 10px 0;
        font-size: 16px;
        padding: 20px;
        background: white;
        border: 2px dashed gold;
        border-radius: 5px;
    }
    </style>
        <div class="drag-drop" id="drag-drop-area">
            <i class="upload-icon">&#x1F4E4;</i>
            <p>Drag & Drop Your PDF File Here</p>
            <label for="pdf-upload">or</label>
            <input type="file" id="pdf-upload" accept="application/pdf">
        </div>
        <div id="file-info"></div>
        <div id="options">
            <button id="convert-btn" class="btn btn-primary">Convert to Gray PNG</button>
            <span id="conversion-message"></span>
            <progress id="conversion-progress" value="0" max="100" style="display: none;"></progress>
            <button id="convert-another-btn" class="btn btn-primary">Convert Another</button>
        </div>

        <div id="pages"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvZ3JhLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));</script>
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