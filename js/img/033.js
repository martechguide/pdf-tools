    const originalCanvas = document.getElementById('originalCanvas');
    const glitchCanvas = document.getElementById('glitchCanvas');
    const ctxOriginal = originalCanvas.getContext('2d');
    const ctxGlitch = glitchCanvas.getContext('2d');

    let originalImage;

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                originalCanvas.width = img.width;
                originalCanvas.height = img.height;
                glitchCanvas.width = img.width;
                glitchCanvas.height = img.height;
                ctxOriginal.drawImage(img, 0, 0);
                originalImage = ctxOriginal.getImageData(0, 0, img.width, img.height);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    function applyGlitchEffect() {
        if (!originalImage) return;

        const glitchStrength = 10; // Strength of glitch effect

        ctxGlitch.clearRect(0, 0, glitchCanvas.width, glitchCanvas.height);

        // Copy original image to glitch canvas
        ctxGlitch.drawImage(originalCanvas, 0, 0);

        // Create glitch effect by randomly shifting pixels horizontally
        for (let i = 0; i < glitchCanvas.height; i++) {
            const offsetX = Math.random() * glitchStrength * 2 - glitchStrength;
            ctxGlitch.drawImage(glitchCanvas, 0, i, glitchCanvas.width, 1, offsetX, i, glitchCanvas.width, 1);
        }
    }

    function downloadImage() {
        const link = document.createElement('a');
        link.href = glitchCanvas.toDataURL('image/png');
        link.download = 'glitched_image.png';
        link.click();
    }

    function resetCanvas() {
        ctxOriginal.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
        ctxGlitch.clearRect(0, 0, glitchCanvas.width, glitchCanvas.height);
        originalImage = null;
        document.getElementById('imageInput').value = ''; // Clear the file input
    }