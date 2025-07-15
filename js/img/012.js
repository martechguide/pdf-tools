 document.addEventListener("DOMContentLoaded", function () {
        const urlInput = document.getElementById('url-input');
        const fileInput = document.getElementById('image-file-input');
        const convertBtn = document.getElementById('convert-btn');
        const refreshBtn = document.getElementById('refresh-btn');
        const canvasContainer = document.getElementById('canvas-container');
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        const progressBar = document.getElementById('progress-bar');
        const progressBarInner = document.getElementById('progress-bar-inner');
        const successMessage = document.getElementById('success-message');

        // Function to load image onto canvas
        function loadImage(src) {
            const img = new Image();
            img.crossOrigin = 'Anonymous';
            img.onload = function () {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                canvasContainer.style.display = 'block';
                convertBtn.style.display = 'block';
            };
            img.src = src;
        }

        // Add event listener for URL input
        urlInput.addEventListener('input', () => {
            loadImage(urlInput.value.trim());
        });

        // Add event listener for file input
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    loadImage(event.target.result);
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        });

        // Add event listener for convert button
        convertBtn.addEventListener('click', () => {
            const imageFormat = 'image/webp'; // WebP format
            const link = document.createElement('a');
            link.href = canvas.toDataURL(imageFormat);
            link.download = 'image.webp'; // WebP extension
            document.body.appendChild(link);
            progressBar.style.display = 'block';
            convertBtn.style.display = 'none';
            const startTime = Date.now();
            const interval = setInterval(() => {
                const elapsedTime = Date.now() - startTime;
                const progress = Math.min((elapsedTime / 3000) * 100, 100); // Progress over 3 seconds
                progressBarInner.style.width = progress + '%';
                if (progress >= 100) {
                    clearInterval(interval);
                    progressBar.style.display = 'none';
                    successMessage.style.display = 'block';
                    link.click();
                    document.body.removeChild(link);
                    refreshBtn.style.display = 'block';
                }
            }, 30);
        });

        // Add event listener for refresh button
        refreshBtn.addEventListener('click', () => {
            window.location.reload();
        });
    });