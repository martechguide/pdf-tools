<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Convert Colored Text to PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <style>
    .select-container {
      margin-bottom: 10px;
    }

    .pre-container {
      
      padding: 20px;
      max-height: 100%;
      overflow: auto;
    }
  </style>
<div class="textarea-container">
  <textarea id="textContent"></textarea>
</div>
<br />
<input type="color" id="textColorPicker" value="#000000" />
<input type="color" id="backgroundColorPicker" value="#ffffff" /><br /><br />
<select id="fontSizeSelector">
  <option value="10" />10px
  <option value="12" />12px
  <option value="14" />14px
  <option value="16" />16px
  <option value="18" />18px
  <option value="20" />20px
</select>
<select id="fontStyleSelector">
  <option value="normal" />Normal
  <option value="italic" />Italic
  <option value="bold" />Bold
</select>
<select id="fontFamilySelector">
  <option value="Arial" />Arial
  <option value="Times New Roman" />Times New Roman
  <option value="Courier New" />Courier New
  <option value="Verdana" />Verdana
  <option value="Georgia" />Georgia
</select>
<select id="textAlignSelector">
  <option value="left" />Left
  <option value="center" />Center
  <option value="right" />Right
</select><br />
<button class="button" onclick="applyStyles()">Apply Styles</button>
<button class="button" onclick="downloadAsPdf()">Download PDF</button>
<br />
<div class="select-container">
  <label for="fileContent">File Content:</label>
  <pre id="fileContent" class="pre-container"></pre>
</div>
<script>document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9wZGYvY3QuanMiIGRlZmVyPSIiPjwvc2NyaXB0Pg=="));</script>
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