 const originalCanvas = document.getElementById('originalCanvas');
    const brokenMirrorCanvas = document.getElementById('brokenMirrorCanvas');
    const ctxOriginal = originalCanvas.getContext('2d');
    const ctxBrokenMirror = brokenMirrorCanvas.getContext('2d');

    let originalImage;

    document.getElementById('imageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                originalCanvas.width = img.width;
                originalCanvas.height = img.height;
                brokenMirrorCanvas.width = img.width;
                brokenMirrorCanvas.height = img.height;
                ctxOriginal.drawImage(img, 0, 0);
                originalImage = ctxOriginal.getImageData(0, 0, img.width, img.height);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    function applyBrokenMirrorEffect() {
        if (!originalImage) return;

        const numPieces = 10; // Number of pieces to break the image into

        const pieceWidth = originalCanvas.width / numPieces;
        const pieceHeight = originalCanvas.height / numPieces;

        ctxBrokenMirror.clearRect(0, 0, brokenMirrorCanvas.width, brokenMirrorCanvas.height);

        for (let i = 0; i < numPieces; i++) {
            for (let j = 0; j < numPieces; j++) {
                const sx = i * pieceWidth;
                const sy = j * pieceHeight;
                const dx = sx + Math.random() * pieceWidth * 0.5; // Add randomness to position
                const dy = sy + Math.random() * pieceHeight * 0.5;
                const swidth = Math.random() * pieceWidth * 1.5; // Add randomness to width and height
                const sheight = Math.random() * pieceHeight * 1.5;
                const dwidth = pieceWidth;
                const dheight = pieceHeight;
                ctxBrokenMirror.drawImage(originalCanvas, sx, sy, swidth, sheight, dx, dy, dwidth, dheight);
            }
        }
        
        // Show the download button after the effect is applied
        document.getElementById('downloadButton').style.display = 'inline';
    }

    function downloadImage() {
        const link = document.createElement('a');
        link.href = brokenMirrorCanvas.toDataURL();
        link.download = 'modified_image.png';
        link.click();
    }