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
        <h1>Download Image From URL Online</h1>
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


  <div>
		<label for="url-input">Enter Image URL:</label>
		<input id="url-input" placeholder="https://example.com/image.jpg" type="text" />
	</div>
	<div>
		<label for="format-select">Choose Image Format:</label>
		<select id="format-select">
			<option value="jpg">JPG</option>
			<option value="png">PNG</option>
			<option value="webp">WEBP</option>
			<option value="svg">SVG</option>
			<option value="ico">ICO</option>
		</select>
	</div>
	<div>
		<button id="convert-btn">Convert &amp; Download</button><br /><br />
		<button disabled="" id="download-btn">Download</button>
	</div>
	<canvas id="canvas"></canvas>
	<script src="script.js"></script>
</body>
</html>


<style>
  #download-btn{display:none}
</style>

<script>

// Get DOM elements
const urlInput = document.getElementById('url-input');
const formatSelect = document.getElementById('format-select');
const convertBtn = document.getElementById('convert-btn');
const downloadBtn = document.getElementById('download-btn');
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

// Add click event listener to convert button
convertBtn.addEventListener('click', () => {
	// Get image URL and format
	const imageUrl = urlInput.value.trim();
	const imageFormat = formatSelect.value;

	// Validate URL and format
	if (!imageUrl || !imageFormat) {
		alert('Please enter a URL and choose a format.');
		return;
	}

	// Create image element and set src attribute
	const img = new Image();
	img.crossOrigin = 'Anonymous'; // allows the image to be loaded from another domain
	img.onload = () => {
		// Set canvas size and draw image
		canvas.width = img.width;
		canvas.height = img.height;
		ctx.drawImage(img, 0, 0);

		// Get canvas data and create download link
		const canvasData = canvas.toDataURL(`image/${imageFormat}`);
		const downloadLink = document.createElement('a');
		downloadLink.href = canvasData;
		downloadLink.download = `image.${imageFormat}`;

		// Append download link to document and click it
		document.body.appendChild(downloadLink);
		downloadLink.click();
		document.body.removeChild(downloadLink);
		
		// Enable download button
		downloadBtn.disabled = false;
	};
	img.onerror = () => {
		alert('Unable to load image from URL.');
	};
	img.src = imageUrl;
});

// Add click event listener to download button
downloadBtn.addEventListener('click', () => {
	// Get canvas data and create download link
	const canvasData = canvas.toDataURL(`image/${formatSelect.value}`);
	const downloadLink = document.createElement('a');
	downloadLink.href = canvasData;
	downloadLink.download = `image.${formatSelect.value}`;

	// Append download link to document and click it
	document.body.appendChild(downloadLink);
	downloadLink.click();
	document.body.removeChild(downloadLink);
});


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