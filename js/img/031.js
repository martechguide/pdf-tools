 function compressImage() {
      const imageInput = document.getElementById('imageInput');

      const img = new Image();
      img.onload = function() {
        const originalSizeElement = document.getElementById('originalSize');
        const compressedSizeElement = document.getElementById('compressedSize');
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const quality = 0.5; // Adjust the quality as needed

        // Get original size
        const originalSizeKB = (imageInput.files[0].size / 1024).toFixed(2);
        originalSizeElement.textContent = originalSizeKB;

        // Resize image to desired quality
        canvas.width = img.width;
        canvas.height = img.height;

        // Draw image on canvas with original background color
        ctx.fillStyle = '#ffffff'; // Set to white as default background color
        ctx.fillRect(0, 0, canvas.width, canvas.height); // Fill canvas with white background
        ctx.drawImage(img, 0, 0);

        // Convert canvas to data URL
        const compressedDataURL = canvas.toDataURL('image/jpeg', quality);

        // Get compressed size
        const compressedSizeKB = (compressedDataURL.length / 1024).toFixed(2);
        compressedSizeElement.textContent = compressedSizeKB;

        // Display original and compressed images
        document.getElementById('original-image').src = img.src;
        document.getElementById('compressed-image').src = compressedDataURL;

        // Show download and clear buttons
        const downloadButton = document.getElementById('downloadButton');
        const clearButton = document.getElementById('clearButton');
        downloadButton.style.display = 'inline-block';
        clearButton.style.display = 'inline-block';
      };

      // Load selected image
      img.src = URL.createObjectURL(imageInput.files[0]);
    }

    function downloadImage() {
      const compressedImage = document.getElementById('compressed-image');
      const downloadButton = document.getElementById('downloadButton');

      // Create a temporary anchor element and trigger a download
      const link = document.createElement('a');
      link.href = compressedImage.src;
      link.download = 'compressed_image.jpg';
      link.click();

      // Hide the download button after download
      downloadButton.style.display = 'none';
    }

    function clearCanvas() {
      const compressedImage = document.getElementById('compressed-image');
      const clearButton = document.getElementById('clearButton');
      const downloadButton = document.getElementById('downloadButton');

      // Clear the compressed image
      compressedImage.src = '';
      document.getElementById('original-image').src = '';

      // Hide the clear and download buttons
      clearButton.style.display = 'none';
      downloadButton.style.display = 'none';

      // Reset original and compressed size display
      document.getElementById('originalSize').textContent = '';
      document.getElementById('compressedSize').textContent = '';
    }