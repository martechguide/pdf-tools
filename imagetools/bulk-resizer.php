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
    <h1>Crop Image Online</h1>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <div id="section-tool">
      <label>
        <input type="file" id="fileInput" accept="image/jpeg,image/png,image/webp,image/svg+xml,image/x-icon">
      </label>
      <button onclick="cropImage()" class="button">Crop Image</button>
      <br>
      <br>
      <button onclick="downloadCroppedImage()" class="button" id="downloadButton" style="display: none;">Download Cropped Image</button>
      <button onclick="clearCanvas()" class="button" id="clearButton" style="display: none;">Clear</button>
      <canvas id="originalCanvas"></canvas>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
      let cropper;
      document.getElementById("fileInput").addEventListener("change", function(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        if (!file) {
          return;
        }
        const reader = new FileReader();
        reader.onload = function(event) {
          const img = new Image();
          img.onload = function() {
            if (cropper) {
              cropper.destroy();
            }
            originalCanvas.width = img.width;
            originalCanvas.height = img.height;
            originalCanvas.getContext('2d').drawImage(img, 0, 0, img.width, img.height);
            cropper = new Cropper(originalCanvas, {
              aspectRatio: 1, // Aspect ratio (square in this case)
              viewMode: 1, // Restricts the crop box to be within the canvas
            });
          };
          img.src = event.target.result;
        };
        reader.readAsDataURL(file);
      });

      function cropImage() {
        if (!cropper) return;
        // Get the cropped canvas
        const croppedCanvas = cropper.getCroppedCanvas();
        // Show the download button
        document.getElementById('downloadButton').style.display = 'inline-block';
      }

      function downloadCroppedImage() {
        if (!cropper) return;
        // Get the cropped canvas data URL
        const croppedCanvas = cropper.getCroppedCanvas();
        const dataURL = croppedCanvas.toDataURL('image/png');
        // Create a temporary anchor element and trigger a download
        const link = document.createElement('a');
        link.href = dataURL;
        link.download = 'cropped_image.png';
        link.click();
      }

      function clearCanvas() {
        if (!cropper) return;
        // Clear the cropper instance
        cropper.destroy();
        cropper = null;
        // Clear the original canvas
        const originalCanvas = document.getElementById('originalCanvas');
        const originalCtx = originalCanvas.getContext('2d');
        originalCtx.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
        // Hide the download button
        document.getElementById('downloadButton').style.display = 'none';
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