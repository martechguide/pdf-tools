 const originalCanvas = document.getElementById('originalCanvas');
    const convertedCanvas = document.getElementById('convertedCanvas');
    const ctxOriginal = originalCanvas.getContext('2d');
    const ctxConverted = convertedCanvas.getContext('2d');

    let originalImage;

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                originalCanvas.width = img.width;
                originalCanvas.height = img.height;
                convertedCanvas.width = img.width;
                convertedCanvas.height = img.height;
                ctxOriginal.drawImage(img, 0, 0);
                originalImage = ctxOriginal.getImageData(0, 0, img.width, img.height);
                displayOptions();
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    function displayOptions() {
        document.getElementById('optionsSection').style.display = 'block';
    }

    function convertToGrayscale() {
        if (!originalImage) return;

        const imageData = ctxOriginal.getImageData(0, 0, originalCanvas.width, originalCanvas.height);
        const data = imageData.data;

        for (let i = 0; i < data.length; i += 4) {
            const brightness = (data[i] + data[i + 1] + data[i + 2]) / 3;
            if (i / 4 % originalCanvas.width < originalCanvas.width / 2) {
                data[i] = data[i + 1] = data[i + 2] = brightness;
            }
        }

        ctxConverted.putImageData(imageData, 0, 0);
    }

    function downloadImage() {
        const link = document.createElement('a');
        link.href = convertedCanvas.toDataURL();
        link.download = 'converted_image.png';
        link.click();
    }

    function resetCanvas() {
        ctxOriginal.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
        ctxConverted.clearRect(0, 0, convertedCanvas.width, convertedCanvas.height);
        document.getElementById('optionsSection').style.display = 'none';
    }