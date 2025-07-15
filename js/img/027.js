  const canvas = document.getElementById('canvas');
  const ctx = canvas.getContext('2d');
  const uploadInput = document.getElementById('uploadInput');
  const optionsDiv = document.getElementById('options');
  const progressBar = document.getElementById('progressBar');
  const successMessage = document.getElementById('successMessage');

  let image;

  uploadInput.addEventListener('change', handleFile);

  function handleFile(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const img = new Image();
        img.onload = function() {
          canvas.width = img.width;
          canvas.height = img.height;
          ctx.drawImage(img, 0, 0);
          image = ctx.getImageData(0, 0, canvas.width, canvas.height);
          optionsDiv.style.display = 'block';
        }
        img.src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }

  function invertImage() {
    progressBar.style.display = 'block';
    let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    let data = imageData.data;
    let length = data.length;
    let i = 0;
    function process() {
      for (; i < length; i += 4) {
        data[i] = 255 - data[i];
        data[i + 1] = 255 - data[i + 1];
        data[i + 2] = 255 - data[i + 2];
      }
      ctx.putImageData(imageData, 0, 0);
      if (i < length) {
        progressBar.value = (i / length) * 100;
        setTimeout(process, 0);
      } else {
        progressBar.value = 100;
        successMessage.style.display = 'block';
      }
    }
    process();
  }

  function downloadImage() {
    const downloadLink = document.createElement('a');
    downloadLink.href = canvas.toDataURL();
    downloadLink.download = 'inverted_image.png';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  }