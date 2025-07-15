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
    <h1>PNG Image Padding Adder Online</h1>
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
    <input type="file" id="imageFileInput" accept="image/png" onchange="displayImage()">
    <div class="container">
      <div class="left-section">
        <div id="options" style="display: none;">
          <label> Left Padding (pixels): <input type="number" id="leftPaddingInput" value="0">
          </label>
          <label> Right Padding (pixels): <input type="number" id="rightPaddingInput" value="0">
          </label>
          <label> Top Padding (pixels): <input type="number" id="topPaddingInput" value="0">
          </label>
          <label> Bottom Padding (pixels): <input type="number" id="bottomPaddingInput" value="0">
          </label>
          <label> Color: <input type="color" id="paddingColorInput" value="#ffffff">
          </label>
          <button onclick="addPadding()" class="button">Add Padding</button>
          <button onclick="downloadImage()" class="button" id="downloadButton" style="display: none;">Download Image</button>
          <button onclick="clearCanvas()" class="button" id="clearButton" style="display: none;">Clear</button>
        </div>
      </div>
      <div class="right-section">
        <div class="preview-container">
          <div>
            <b>Original Image</b>
            <br>
            <img alt="Original Image" class="preview" id="original-image" src="https://rwu.edu.pk/wp-content/uploads/2022/09/man-dummy.jpg">
          </div>
          <hr>
          <div>
            <b>Modified Image</b>
            <br>
            <img alt="Modified Image" class="preview" id="modified-image" src="https://rwu.edu.pk/wp-content/uploads/2022/09/man-dummy.jpg">
          </div>
          <hr>
        </div>
      </div>
    </div>
    <script>
      document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9pbWcvMDMyLmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));
    </script>
    <style>
      .container {
        display: flex;
        align-items: flex-start;
      }

      .left-section {
        width: 28%;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
      }

      .right-section {
        width: 68%;
        padding: 20px;
      }

      .preview-container {
        display: flex;
        justify-content: space-around;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
      }

      .preview {
        width: 100%;
        max-width: 400px;
        border: 1px solid #ddd;
      }
    </style>
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