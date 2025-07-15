<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?> 
<?php include('admin/user.php'); ?> 
<div id="post-header" class="post-header">
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
        <h1>Convert Image to Pixel Image Online</h1>
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
      <svg width="64px" height="64px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#0074ff;}</style></defs><title></title><path class="cls-1" d="M32,41.5a6,6,0,0,1-1.78-.27l-22.5-7a6,6,0,1,1,3.56-11.46L32,29.22l7.52-2.34A2,2,0,1,1,40.7,30.7l-8.11,2.52a2,2,0,0,1-1.18,0L10.09,26.59a2,2,0,0,0-1.52.14,2,2,0,0,0-1,1.18,2,2,0,0,0,1.32,2.5l22.5,7a2,2,0,0,0,1.18,0l22.5-7a2,2,0,0,0-1.18-3.82L49.44,28a2,2,0,1,1-1.19-3.82l4.47-1.39a6,6,0,1,1,3.56,11.46l-22.5,7A6,6,0,0,1,32,41.5Z"></path></g></svg>
  </div>
</div>
<div class="toolarea">


 <input type="file" accept="image/*" onchange="loadImage(event)"><br>
    <canvas id="originalCanvas"></canvas><br>
    <label for="pixelStrength">Pixelation Strength:</label>
    <input type="range" id="pixelStrength" min="1" max="20" value="5" onchange="updatePixelStrength()"><br>
    <label for="pixelRectangle">Pixelation Rectangle:</label>
    <input type="checkbox" id="pixelRectangle" onchange="updatePixelationMode()"><br>
    <canvas id="modifiedCanvas"></canvas><br>
    <button onclick="pixelateImage()">Pixelate</button>
    <button onclick="downloadImage()">Download</button>

    <script>
        let originalImage = null;
        let pixelStrength = 5;
        let pixelRectangle = false;

        function loadImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.getElementById('originalCanvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);
                        originalImage = img;
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function updatePixelStrength() {
            pixelStrength = parseInt(document.getElementById('pixelStrength').value);
        }

        function updatePixelationMode() {
            pixelRectangle = document.getElementById('pixelRectangle').checked;
        }

        function pixelateImage() {
            if (!originalImage) return;

            const originalCanvas = document.getElementById('originalCanvas');
            const originalCtx = originalCanvas.getContext('2d');

            const modifiedCanvas = document.getElementById('modifiedCanvas');
            const modifiedCtx = modifiedCanvas.getContext('2d');

            const imgWidth = originalCanvas.width;
            const imgHeight = originalCanvas.height;
            const blockSize = pixelStrength;

            modifiedCanvas.width = imgWidth;
            modifiedCanvas.height = imgHeight;

            for (let x = 0; x < imgWidth; x += blockSize) {
                for (let y = 0; y < imgHeight; y += blockSize) {
                    const pixelData = originalCtx.getImageData(x, y, blockSize, blockSize).data;
                    const rgba = getAverageRGB(pixelData);
                    modifiedCtx.fillStyle = `rgba(${rgba.r}, ${rgba.g}, ${rgba.b}, ${rgba.a})`;

                    if (pixelRectangle) {
                        modifiedCtx.fillRect(x, y, blockSize, blockSize);
                    } else {
                        modifiedCtx.fillRect(x, y, blockSize, blockSize);
                    }
                }
            }
        }

        function getAverageRGB(pixels) {
            let r = 0, g = 0, b = 0, a = 0;
            const len = pixels.length;
            for (let i = 0; i < len; i += 4) {
                r += pixels[i];
                g += pixels[i + 1];
                b += pixels[i + 2];
                a += pixels[i + 3];
            }
            return {
                r: r / (len / 4),
                g: g / (len / 4),
                b: b / (len / 4),
                a: a / (len / 4)
            };
        }

        function downloadImage() {
            const modifiedCanvas = document.getElementById('modifiedCanvas');
            const link = document.createElement('a');
            link.download = 'pixelated_image.png';
            link.href = modifiedCanvas.toDataURL('image/png');
            link.click();
        }
    </script>
</div>
<?php include('admin/ad2.php'); ?><br>
<!---------------------------------------------------------------->

<!--Content Section-->

<div class="styled-section2">
    
        <h2>AI-Based Online Image Tools</h2>
        <p>
            With the rapid advancements in artificial intelligence, managing and enhancing images has never been easier. AI-based online image tools empower users to perform complex tasks with just a few clicks. Whether you're looking to convert images into various formats, resize them to fit specific dimensions, compress large files for quicker loading times, AI tools have got you covered.
        </p>
        <br>
        <h3>Need a higher resolution?</h3>
        <p>
            AI upscaling can enhance your image's clarity without losing quality. For those working with product photos, portraits, or any visuals requiring a clean background, AI-driven background removal offers precision that was once only achievable through professional software.
        </p>
    </div>




<!---------------------------------------------------------------->

<!--FAQs Section-->

<!---------------------------------------------------------------->

<?php include('admin/social.php'); ?> 
<?php include('admin/calltoaction.php'); ?> 
<?php include('admin/footer.php'); ?> 
<button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
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
h1{
    color:white;
    font-size:34px;
}
</style>
  </body>
</html>