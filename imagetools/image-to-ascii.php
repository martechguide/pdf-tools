<!DOCTYPE html>
<html lang="en"> <?php include('admin/head.php'); ?> <?php include('admin/header.php'); ?> <?php include('admin/user.php'); ?> <div id="post-header" class="post-header">
    <div class="color-stripe row w-100 no-margin">
      <div class="bg-main-1"></div>
      <div class="bg-main-2"></div>
      <div class="bg-main-3"></div>
      <div class="bg-main-4"></div>
      <div class="bg-main-5"></div>
      <div class="bg-main-6"></div>
      <div class="bg-main-7"></div>
      <div class="bg-main-8"></div>
    </div>
  </div>
  <div class="bg-tool">
    <h1>Convert Image to ASCII Art Online</h1>
    <strong>Easily convert, resize, compress, edit, upscale and remove background for your images online.</strong>
  </div>
  <div class="color-stripe row w-100 no-margin">
    <div class="bg-main-1"></div>
    <div class="bg-main-2"></div>
    <div class="bg-main-3"></div>
    <div class="bg-main-4"></div>
    <div class="bg-main-5"></div>
    <div class="bg-main-6"></div>
    <div class="bg-main-7"></div>
    <div class="bg-main-8"></div>
  </div>
  <div id="ads"> <?php include('admin/ad1.php'); ?> </div>
  <div class="container-toolarea">
    <div class="text-center container pt-3">
      <svg width="64px" height="64px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <defs>
            <style>
              .cls-1 {
                fill: #0074ff;
              }
            </style>
          </defs>
          <title></title>
          <path class="cls-1" d="M32,41.5a6,6,0,0,1-1.78-.27l-22.5-7a6,6,0,1,1,3.56-11.46L32,29.22l7.52-2.34A2,2,0,1,1,40.7,30.7l-8.11,2.52a2,2,0,0,1-1.18,0L10.09,26.59a2,2,0,0,0-1.52.14,2,2,0,0,0-1,1.18,2,2,0,0,0,1.32,2.5l22.5,7a2,2,0,0,0,1.18,0l22.5-7a2,2,0,0,0-1.18-3.82L49.44,28a2,2,0,1,1-1.19-3.82l4.47-1.39a6,6,0,1,1,3.56,11.46l-22.5,7A6,6,0,0,1,32,41.5Z"></path>
        </g>
      </svg>
    </div>
  </div>
  <div class="toolarea">
    <div>
      <label for="txtMessage">Message:</label>
      <div>
        <input id="txtMessage" type="text" value="01" placeholder="01" />
      </div>
    </div>
    <div>
      <label for="inputColor">Color:</label>
      <div>
        <input id="inputColor" type="color" value="#000" />
      </div>
    </div>
    <div>
      <label for="inputColor">Alpha:</label>
      <div>
        <input id="inputAlpha" type="range" min="0" max="1" value="1" step="0.05" />
      </div>
    </div>
    <div>
      <label for="inputFontSize">Font Size:</label>
      <div>
        <input id="inputFontSize" type="range" min="5" max="20" step="1" value="10" />
      </div>
    </div>
    <div>
      <label for="inputSquish">Squish Text:</label>
      <div>
        <input id="inputSquish" type="checkbox" checked />
      </div>
    </div>
    <div>
      <input id="fileImage" type="file" accept="image/png, image/jpeg" />
    </div>
    <div>
      <button id="copyButton">Copy Image</button>
      <button id="downloadButton">Download Image</button>
      <button id="resetButton">Reset</button>
    </div>
    <div id="imagePlaceholder"></div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('fileImage').addEventListener('change', updateImage);
      document.getElementById('txtMessage').addEventListener('input', updateImage);
      document.getElementById('inputColor').addEventListener('input', updateImage);
      document.getElementById('inputFontSize').addEventListener('input', updateImage);
      document.getElementById('inputAlpha').addEventListener('input', updateImage);
      document.getElementById('inputSquish').addEventListener('change', updateImage);
      document.getElementById('copyButton').addEventListener('click', copyImage);
      document.getElementById('downloadButton').addEventListener('click', downloadImage);
      document.getElementById('resetButton').addEventListener('click', resetImage);
    });

    function updateImage() {
      var file = document.getElementById('fileImage').files[0];
      var reader = new FileReader();
      reader.addEventListener('load', function() {
        var parent = document.getElementById('imagePlaceholder');
        parent.innerHTML = '';
        parent.appendChild(createTextImageCanvas(reader.result, document.getElementById('inputColor').value.slice(1).replace(/../g, function(m, i) {
          return (i ? '' : 'rgba(') + parseInt(m, 16) + (i == 4 ? ',' + document.getElementById('inputAlpha').value + ')' : ',');
        }), +document.getElementById('inputFontSize').value || 10, document.getElementById('inputSquish').checked, function() {
          return document.getElementById('txtMessage').value || document.getElementById('txtMessage').placeholder;
        }));
      }, false);
      if (file) {
        reader.readAsDataURL(file);
      }
    }

    function createTextImageCanvas(url, bgColor, fontSize, squishText, getMoreText) {
      var canvas = document.createElement('canvas');
      canvas.addEventListener('click', function() {
        var a = document.createElement('a');
        a.href = canvas.toDataURL();
        a.target = '_blank';
        a.click();
      });
      var ctx = canvas.getContext('2d');
      var img = new Image();
      img.onload = function() {
        var w = canvas.width = img.width;
        var h = canvas.height = img.height;
        var x = 0;
        var textHeight = fontSize;
        var y = textHeight;
        if (squishText) {
          y = Math.ceil(y - textHeight * 0.3);
          textHeight *= 0.7;
        }
        ctx.fillStyle = ctx.createPattern(img, 'no-repeat');
        ctx.fillRect(0, 0, w, h);
        ctx.fillStyle = bgColor;
        ctx.fillRect(0, 0, w, h);
        ctx.rect(0, 0, w, h);
        ctx.fillStyle = ctx.createPattern(img, 'no-repeat');
        ctx.font = 'bold ' + fontSize + 'px "monospace", "courier", "courier new"';
        var text, textWidth, skipGetText = false;
        do {
          if (!skipGetText) {
            text = getMoreText();
          }
          ctx.fillText(text, x, y);
          textWidth = ctx.measureText(text).width;
          x += textWidth;
          if (skipGetText = (x > w)) {
            x -= textWidth + w;
            y = Math.ceil(y + textHeight);
          }
        } while (y - textHeight <= h);
      };
      img.src = url;
      return canvas;
    }

    function copyImage() {
      var canvas = document.querySelector('canvas');
      var imgData = canvas.toDataURL('image/png');
      var input = document.createElement('input');
      input.value = imgData;
      document.body.appendChild(input);
      input.select();
      document.execCommand('copy');
      document.body.removeChild(input);
      alert('Image copied to clipboard!');
    }

    function downloadImage() {
      var canvas = document.querySelector('canvas');
      var a = document.createElement('a');
      a.href = canvas.toDataURL('image/png');
      a.download = 'text_image.png';
      a.click();
    }

    function resetImage() {
      document.getElementById('fileImage').value = '';
      document.getElementById('txtMessage').value = '01';
      document.getElementById('inputColor').value = '#000';
      document.getElementById('inputAlpha').value = 1;
      document.getElementById('inputFontSize').value = 10;
      document.getElementById('inputSquish').checked = true;
      updateImage();
    }
  </script>
  </div> <?php include('admin/ad2.php'); ?> <br>
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="styled-section2">
    <h2>AI-Based Online Image Tools</h2>
    <p> With the rapid advancements in artificial intelligence, managing and enhancing images has never been easier. AI-based online image tools empower users to perform complex tasks with just a few clicks. Whether you're looking to convert images into various formats, resize them to fit specific dimensions, compress large files for quicker loading times, AI tools have got you covered. </p>
    <br>
    <h3>Need a higher resolution?</h3>
    <p> AI upscaling can enhance your image's clarity without losing quality. For those working with product photos, portraits, or any visuals requiring a clean background, AI-driven background removal offers precision that was once only achievable through professional software. </p>
  </div>
  <!---------------------------------------------------------------->
  <!--FAQs Section-->
  <!----------------------------------------------------------------> <?php include('admin/social.php'); ?> <?php include('admin/calltoaction.php'); ?> <?php include('admin/footer.php'); ?> <button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script src="js/img/01.js" defer=""></script>
  <script>
    // Get the button
    var backToTopBtn = document.getElementById("backToTopBtn");
    // Show the button when scrolling down 20px from the top
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    }
    // Scroll to the top when the user clicks the button
    function scrollToTop() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    }
  </script>
  <style>
    h1 {
      color: white;
      font-size: 34px;
    }
  </style>
  </body>
</html>