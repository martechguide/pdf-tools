 function displayImage() {
  const imageFileInput = document.getElementById('imageFileInput');
  const originalImage = document.getElementById('original-image');
  const optionsContainer = document.getElementById('optionsContainer');

  const imageFile = imageFileInput.files[0];
  if (imageFile) {
    const reader = new FileReader();
    reader.onload = function(event) {
      originalImage.src = event.target.result;
      optionsContainer.style.display = 'block'; // Show options and preview
    };
    reader.readAsDataURL(imageFile);
  } else {
    originalImage.src = '';
    optionsContainer.style.display = 'none'; // Hide options and preview
  }
}


    function addGlow() {
      const imageFileInput = document.getElementById('imageFileInput');
      const glowType = document.getElementById('glowTypeSelect').value;
      const applyOutside = document.getElementById('applyOutsideCheckbox').checked;
      const glowColor = document.getElementById('glowColorInput').value;
      const glowWidth = parseInt(document.getElementById('glowWidthInput').value);
      const transparency = parseFloat(document.getElementById('transparencyRangeInput').value);
      const backgroundColor = document.getElementById('backgroundColorInput').value;

      const imageFile = imageFileInput.files[0];
      if (!imageFile) {
        alert('Please select an image.');
        return;
      }

      const reader = new FileReader();
      reader.onload = function(event) {
        const img = new Image();
        img.onload = function() {
          const canvas = document.createElement('canvas');
          const ctx = canvas.getContext('2d');

          canvas.width = img.width;
          canvas.height = img.height;

          // Draw background
          ctx.fillStyle = backgroundColor;
          ctx.fillRect(0, 0, canvas.width, canvas.height);

          // Draw original image
          ctx.drawImage(img, 0, 0);

          // Apply glow effect
          ctx.shadowColor = glowColor;
          ctx.shadowBlur = glowWidth;
          ctx.globalAlpha = transparency;

          if (glowType === 'linear') {
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 0;
          } else if (glowType === 'exponential') {
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 0;
            ctx.shadowBlur *= 2;
          } else if (glowType === 'dropoff') {
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 0;
            ctx.shadowBlur /= 2;
          }

          if (applyOutside) {
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 0;
            ctx.shadowBlur = glowWidth * 2;
          }

          ctx.drawImage(img, 0, 0);

          // Display the modified image
          const modifiedImage = document.getElementById('modified-image');
          modifiedImage.src = canvas.toDataURL('image/png');

          // Show download and clear buttons
          const downloadButton = document.getElementById('downloadButton');
          const clearButton = document.getElementById('clearButton');
          downloadButton.style.display = 'inline-block';
          clearButton.style.display = 'inline-block';
        };
        img.src = event.target.result;
      };
      reader.readAsDataURL(imageFile);
    }

    function downloadImage() {
      const modifiedImage = document.getElementById('modified-image');
      const downloadButton = document.getElementById('downloadButton');

      // Create a temporary anchor element and trigger a download
      const link = document.createElement('a');
      link.href = modifiedImage.src;
      link.download = 'modified_image.png';
      link.click();

      // Hide the download button after download
      downloadButton.style.display = 'none';
    }

    function clearCanvas() {
      const modifiedImage = document.getElementById('modified-image');
      const clearButton = document.getElementById('clearButton');
      const downloadButton = document.getElementById('downloadButton');

      // Clear the modified image
      modifiedImage.src = '';

      // Hide the clear and download buttons
      clearButton.style.display = 'none';
      downloadButton.style.display = 'none';
    }