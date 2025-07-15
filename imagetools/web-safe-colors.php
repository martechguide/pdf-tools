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
    <h1>Convert Image to Web Safe Colors Online</h1>
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
    <input type="file" id="file-input" accept="image/*" onchange="processImage(event)">
    <br>
    <canvas id="canvas"></canvas>
    <div class="button-group hidden" id="button-group">
      <button class="download-btn" onclick="downloadImage()">Download</button>
      <button class="reset-btn" onclick="resetCanvas()">Reset</button>
    </div>
  </div>
  <script>
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var buttonGroup = document.getElementById('button-group');
    var webSafeColors = [
      [0, 0, 0],
      [0, 0, 153],
      [0, 0, 255],
      [0, 102, 0],
      [0, 102, 102],
      [0, 153, 0],
      [0, 153, 153],
      [0, 204, 0],
      [0, 255, 0],
      [51, 51, 51],
      [51, 51, 255],
      [51, 102, 0],
      [51, 153, 0],
      [51, 204, 51],
      [51, 204, 255],
      [102, 0, 0],
      [102, 0, 102],
      [102, 51, 0],
      [102, 102, 102],
      [102, 102, 255],
      [102, 204, 204],
      [153, 0, 0],
      [153, 0, 102],
      [153, 51, 51],
      [153, 102, 0],
      [153, 153, 0],
      [153, 204, 153],
      [153, 204, 255],
      [204, 0, 0],
      [204, 0, 153],
      [204, 51, 51],
      [204, 102, 0],
      [204, 102, 255],
      [204, 204, 0],
      [204, 255, 204],
      [255, 0, 0],
      [255, 0, 255],
      [255, 102, 102],
      [255, 102, 255],
      [255, 153, 153],
      [255, 204, 204],
      [255, 255, 0],
      [255, 255, 255]
    ];

    function processImage(event) {
      var file = event.target.files[0];
      var img = new Image();
      img.src = URL.createObjectURL(file);
      img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0);
        convertToWebSafeColors();
        buttonGroup.classList.remove('hidden');
      };
    }

    function convertToWebSafeColors() {
      var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      var data = imageData.data;
      for (var i = 0; i < data.length; i += 4) {
        var nearestColor = findNearestColor(data[i], data[i + 1], data[i + 2]);
        data[i] = nearestColor[0];
        data[i + 1] = nearestColor[1];
        data[i + 2] = nearestColor[2];
      }
      ctx.putImageData(imageData, 0, 0);
    }

    function findNearestColor(red, green, blue) {
      var minDistance = Number.MAX_VALUE;
      var nearestColor = [0, 0, 0];
      for (var i = 0; i < webSafeColors.length; i++) {
        var color = webSafeColors[i];
        var distance = Math.sqrt(Math.pow(red - color[0], 2) + Math.pow(green - color[1], 2) + Math.pow(blue - color[2], 2));
        if (distance < minDistance) {
          minDistance = distance;
          nearestColor = color;
        }
      }
      return nearestColor;
    }

    function downloadImage() {
      var link = document.createElement('a');
      link.download = 'web-safe-image.png';
      link.href = canvas.toDataURL();
      link.click();
    }

    function resetCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      canvas.width = 0;
      canvas.height = 0;
      document.getElementById('file-input').value = '';
      buttonGroup.classList.add('hidden');
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