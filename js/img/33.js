    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var imageLoaded = false;
    var img = new Image();
    var originalImageData = null;

    function loadImage(event) {
        img.src = URL.createObjectURL(event.target.files[0]);
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            imageLoaded = true;

            // Store the original image data for reset
            originalImageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

            // Show the options and canvas
            document.getElementById('options').style.display = 'block';
            document.getElementById('canvas-container').style.display = 'block';
        };
    }

    function shiftImage(direction) {
        if (!imageLoaded) return;

        var shiftAmount = parseInt(document.getElementById('shift-input').value);
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

        ctx.clearRect(0, 0, canvas.width, canvas.height);

        if (direction === 'left') {
            ctx.putImageData(imageData, -shiftAmount, 0);
        } else if (direction === 'right') {
            ctx.putImageData(imageData, shiftAmount, 0);
        }
    }

    function resetCanvas() {
        if (originalImageData) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.putImageData(originalImageData, 0, 0);
        }
    }

    function downloadImage() {
        const dataUrl = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.href = dataUrl;
        link.download = 'shifted_image.png';
        link.click();
    }