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
    <h1>Flip & Rotate Image Online</h1>
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
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <div class="container disable">
      <div class="wrapper">
        <div class="editor-panel">
          <div class="filter">
            <label class="title">Filters</label>
            <div class="options">
              <button id="brightness" class="active">Brightness</button>
              <button id="saturation">Saturation</button>
              <button id="inversion">Inversion</button>
              <button id="grayscale">Grayscale</button>
            </div>
            <div class="slider">
              <div class="filter-info">
                <p class="name">Brighteness</p>
                <p class="value">100%</p>
              </div>
              <input type="range" value="100" min="0" max="200">
            </div>
          </div>
          <div class="rotate">
            <label class="title">Rotate & Flip</label>
            <div class="options">
              <button id="left">
                <i class="fa-solid fa-rotate-left"></i>
              </button>
              <button id="right">
                <i class="fa-solid fa-rotate-right"></i>
              </button>
              <button id="horizontal">
                <i class='bx bx-reflect-vertical'></i>
              </button>
              <button id="vertical">
                <i class='bx bx-reflect-horizontal'></i>
              </button>
            </div>
          </div>
        </div>
        <div class="preview-img">
          <img src="https://rwu.edu.pk/wp-content/uploads/2022/09/man-dummy.jpg" alt="preview-img">
        </div>
      </div>
      <div class="controls">
        <button class="reset-filter">Reset Filters</button>
        <div class="row">
          <input type="file" class="file-input" accept="image/*" hidden>
          <button class="choose-img">Choose Image</button>
          <button class="save-img">Save Image</button>
        </div>
      </div>
    </div>
    <script>
      document.write(atob("IDxzY3JpcHQgc3JjPSJqcy9pbWcvMDI2LmpzIiBkZWZlcj0iIj48L3NjcmlwdD4="));
    </script>
    <style>
      /* Import Google font - Poppins */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

      .container .wrapper {
        display: flex;
        margin: 20px 0;
        min-height: 435px;
      }

      .wrapper .editor-panel {
        padding: 15px 20px;
        width: 400px;
        border-radius: 5px;
        border: 1px solid #ccc;
      }

      .editor-panel .title {
        display: block;
        font-size: 16px;
        margin-bottom: 12px;
      }

      .editor-panel .options,
      .controls {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .editor-panel button {
        outline: none;
        height: 40px;
        font-size: 14px;
        color: #6C757D;
        background: #fff;
        border-radius: 3px;
        margin-bottom: 8px;
        border: 1px solid #aaa;
        width: 100%;
      }

      .editor-panel .filter button {
        width: 100%;
      }

      .editor-panel button:hover {
        background: #f5f5f5;
      }

      .filter button.active {
        color: #fff;
        border-color: #5372F0;
        background: #5372F0;
      }

      .filter .slider {
        margin-top: 12px;
      }

      .filter .slider .filter-info {
        display: flex;
        color: #464646;
        font-size: 14px;
        justify-content: space-between;
      }

      .filter .slider input {
        width: 100%;
        height: 5px;
        accent-color: #5372F0;
      }

      .editor-panel .rotate {
        margin-top: 17px;
      }

      .editor-panel .rotate button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% / 5 - 0px);
      }

      .rotate .options button:nth-child(3),
      .rotate .options button:nth-child(4) {
        font-size: 18px;
      }

      .rotate .options button:active {
        color: #fff;
        background: #5372F0;
        border-color: #5372F0;
      }

      .wrapper .preview-img {
        flex-grow: 1;
        display: flex;
        overflow: hidden;
        margin-left: 20px;
        border-radius: 5px;
        align-items: center;
        justify-content: center;
      }

      .preview-img img {
        max-width: 490px;
        max-height: 335px;
        width: 100%;
        height: 100%;
        object-fit: contain;
      }

      .controls button {
        padding: 11px 20px;
        font-size: 14px;
        border-radius: 3px;
        outline: none;
        color: #fff;
        cursor: pointer;
        background: none;
        transition: all 0.3s ease;
        text-transform: uppercase;
      }

      .controls .reset-filter {
        color: #6C757D;
        border: 1px solid #6C757D;
        margin-right: 5px;
      }

      .controls .reset-filter:hover {
        color: #fff;
        background: #6C757D;
      }

      .controls .choose-img {
        background: #6C757D;
        border: 1px solid #6C757D;
        margin-left: 5px;
      }

      .controls .save-img {
        margin-left: 5px;
        background: #5372F0;
        border: 1px solid #5372F0;
      }

      @media screen and (max-width: 760px) {
        .container {
          padding: 25px;
        }

        .container .wrapper {
          flex-wrap: wrap-reverse;
        }

        .wrapper .editor-panel {
          width: 100%;
        }

        .wrapper .preview-img {
          width: 100%;
          margin: 0 0 15px;
        }
      }

      @media screen and (max-width: 500px) {
        .controls button {
          width: 100%;
          margin-bottom: 10px;
        }

        .controls .row {
          width: 100%;
        }

        .controls .row .save-img {
          margin-left: 0px;
        }
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