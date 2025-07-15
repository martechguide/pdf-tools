 const fileInput = document.getElementById('fileInput');
  const canvas = document.getElementById('canvas');
  const ctx = canvas.getContext('2d');
  const optionsSection = document.getElementById('optionsSection');
  const widthHeightOptions = document.getElementById('widthHeightOptions');
  const percentageOptions = document.getElementById('percentageOptions');
  const widthInput = document.getElementById('widthInput');
  const heightInput = document.getElementById('heightInput');
  const percentageInput = document.getElementById('percentageInput');
  const qualityInput = document.getElementById('qualityInput');
  const bgColorInput = document.getElementById('bgColorInput');
  const topPaddingInput = document.getElementById('topPaddingInput');
  const bottomPaddingInput = document.getElementById('bottomPaddingInput');
  const leftPaddingInput = document.getElementById('leftPaddingInput');
  const rightPaddingInput = document.getElementById('rightPaddingInput');
  const formatSelect = document.getElementById('formatSelect');
  const percentageValue = document.getElementById('percentageValue');
  const qualityValue = document.getElementById('qualityValue');

  fileInput.addEventListener('change', handleFileSelect);

  function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(event) {
      const img = new Image();
      img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.fillStyle = bgColorInput.value;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(img, 0, 0);
        canvas.style.display = 'block'; // Show the canvas after uploading
        optionsSection.style.display = 'block';
      };
      img.src = event.target.result;
    };
    reader.readAsDataURL(file);
  }

  document.getElementById('resizeSelect').addEventListener('change', function() {
    const resizeOption = this.value;
    if (resizeOption === 'percentage') {
      percentageOptions.style.display = 'block';
      widthHeightOptions.style.display = 'none';
    } else if (resizeOption === 'widthHeight') {
      percentageOptions.style.display = 'none';
      widthHeightOptions.style.display = 'flex'; // Change to flex to show both inputs in one row
    } else {
      percentageOptions.style.display = 'none';
      widthHeightOptions.style.display = 'none';
    }
  });

  percentageInput.addEventListener('input', function() {
    percentageValue.textContent = `${this.value}%`;
  });

  qualityInput.addEventListener('input', function() {
    qualityValue.textContent = `${this.value}%`;
  });

  function convertImage() {
    const resizeOption = document.getElementById('resizeSelect').value;
    const width = parseInt(widthInput.value);
    const height = parseInt(heightInput.value);
    const percentage = parseInt(percentageInput.value);
    const quality = parseFloat(qualityInput.value) / 100;
    const bgColor = bgColorInput.value;
    const topPadding = parseInt(topPaddingInput.value);
    const bottomPadding = parseInt(bottomPaddingInput.value);
    const leftPadding = parseInt(leftPaddingInput.value);
    const rightPadding = parseInt(rightPaddingInput.value);
    const format = formatSelect.value;

    const img = new Image();
    img.onload = function() {
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      let newWidth, newHeight;
      if (resizeOption === 'widthHeight') {
        newWidth = width;
        newHeight = height;
      } else if (resizeOption === 'percentage') {
        newWidth = img.width * (percentage / 100);
        newHeight = img.height * (percentage / 100);
      } else {
        newWidth = img.width;
        newHeight = img.height;
      }
      canvas.width = newWidth + leftPadding + rightPadding;
      canvas.height = newHeight + topPadding + bottomPadding;
      ctx.fillStyle = bgColor;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(img, leftPadding, topPadding, newWidth, newHeight);
      
      const resizedDataURL = canvas.toDataURL(format, quality);
      const link = document.createElement('a');
      link.href = resizedDataURL;
      link.download = 'resized_image.' + format.split('/')[1];
      link.click();
    };
    const source = URL.createObjectURL(fileInput.files[0]);
    img.src = source;
  }