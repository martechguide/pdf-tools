   function loadImage(event) {
        var image = document.getElementById('source-image');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.onload = function() {
            document.getElementById('controls-container').style.display = 'block';
            image.style.display = 'block';
        };
    }

    function expandImage() {
        var container = document.getElementById('canvas-container');
        var spaceInput = document.getElementById('space-input').value;

        // Adjusting padding to expand the image
        container.style.padding = spaceInput + 'px';
    }

    function downloadImage() {
        var image = document.getElementById('source-image');
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');

        var padding = parseInt(document.getElementById('space-input').value);

        canvas.width = image.naturalWidth + 2 * padding;
        canvas.height = image.naturalHeight + 2 * padding;

        // Draw the image onto the canvas with padding
        context.drawImage(image, padding, padding);

        // Create a temporary anchor element to trigger download
        var link = document.createElement('a');
        link.download = 'expanded_image.png';
        link.href = canvas.toDataURL();
        link.click();
    }

    function resetImage() {
        document.getElementById('source-image').style.display = 'none';
        document.getElementById('controls-container').style.display = 'none';
        document.getElementById('upload-container').style.display = 'block';
        document.getElementById('file-input').value = null;
        document.getElementById('canvas-container').style.padding = '0';
    }