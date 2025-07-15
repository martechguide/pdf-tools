<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>Generate PDF Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and merge for your PDFs online.</strong>
  </div>
  <div class="toolarea-pdf">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

  <label for="colorPicker">Select Background Color:</label>
  <input type="color" id="colorPicker" value="#ffffff">
<br>
  <button onclick="generatePdf()">Generate PDF</button>

  <div id="pdf-preview"></div>

  <script>
    function generatePdf() {
      var selectedColor = document.getElementById('colorPicker').value;

      var docDefinition = {
        content: [
          { text: '', style: 'header' },
          { text: '.', style: 'subheader' }
        ],
        styles: {
          header: {
            fontSize: 22,
            bold: true,
            margin: [0, 0, 0, 20],
            color: '#333' // Text color
          },
          subheader: {
            fontSize: 16,
            bold: true,
            margin: [0, 10, 0, 5],
            color: '#666' // Text color
          }
        },
        background: function () {
          return {
            canvas: [
              {
                type: 'rect',
                x: 0,
                y: 0,
                w: 600,
                h: 840, // A4 size: 595 x 842 points
                color: selectedColor
              }
            ]
          };
        }
      };

      var pdfContainer = document.getElementById('pdf-preview');
      pdfContainer.innerHTML = '';

      pdfMake.createPdf(docDefinition).getDataUrl(function (dataUrl) {
        var iframe = document.createElement('iframe');
        iframe.src = dataUrl;
        iframe.width = '100%';
        iframe.height = '600px';
        pdfContainer.appendChild(iframe);
      });
    }
  </script>


  </div></div> <?php include('admin/ad2.php'); ?> <br><br>
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