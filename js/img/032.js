 function displayImage() {
        const imageFileInput = document.getElementById('imageFileInput');
        const originalImage = document.getElementById('original-image');
        const options = document.getElementById('options');

        const imageFile = imageFileInput.files[0];
        if (imageFile) {
            const reader = new FileReader();
            reader.onload = function(event) {
                originalImage.src = event.target.result;
                options.style.display = 'block';
            };
            reader.readAsDataURL(imageFile);
        } else {
            originalImage.src = '';
            options.style.display = 'none';
        }
    }

    function addPadding() {
        const imageFileInput = document.getElementById('imageFileInput');
        const leftPadding = parseInt(document.getElementById('leftPaddingInput').value);
        const rightPadding = parseInt(document.getElementById('rightPaddingInput').value);
        const topPadding = parseInt(document.getElementById('topPaddingInput').value);
        const bottomPadding = parseInt(document.getElementById('bottomPaddingInput').value);
        const paddingColor = document.getElementById('paddingColorInput').value;

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

                canvas.width = img.width + leftPadding + rightPadding;
                canvas.height = img.height + topPadding + bottomPadding;

                ctx.fillStyle = paddingColor;
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.drawImage(img, leftPadding, topPadding);

                const modifiedImage = document.getElementById('modified-image');
                modifiedImage.src = canvas.toDataURL('image/png');

                document.getElementById('downloadButton').style.display = 'inline-block';
                document.getElementById('clearButton').style.display = 'inline-block';
            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(imageFile);
    }

    function downloadImage() {
        const modifiedImage = document.getElementById('modified-image');
        const link = document.createElement('a');
        link.href = modifiedImage.src;
        link.download = 'modified_image.png';
        link.click();
        document.getElementById('downloadButton').style.display = 'none';
    }

    function clearCanvas() {
        document.getElementById('modified-image').src = '';
        document.getElementById('clearButton').style.display = 'none';
        document.getElementById('downloadButton').style.display = 'none';
    }