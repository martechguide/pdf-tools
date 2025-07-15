        // JavaScript code goes here
        const imageInput = document.getElementById('imageInput');
        const imageCanvas = document.getElementById('imageCanvas');
        const sizeSelect = document.getElementById('sizeSelect');
        const shapeSelect = document.getElementById('shapeSelect');
        const generateButton = document.getElementById('generateButton');
        const faviconImage = document.getElementById('faviconImage');
        const downloadLink = document.getElementById('downloadLink');

        let selectedSize = '16x16';
        let selectedShape = 'square';

        imageInput.addEventListener('change', () => {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = new Image();
                    img.src = e.target.result;
                    img.onload = function () {
                        const ctx = imageCanvas.getContext('2d');
                        ctx.clearRect(0, 0, imageCanvas.width, imageCanvas.height);
                        ctx.drawImage(img, 0, 0, imageCanvas.width, imageCanvas.height);
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        sizeSelect.addEventListener('change', () => {
            selectedSize = sizeSelect.value;
        });

        shapeSelect.addEventListener('change', () => {
            selectedShape = shapeSelect.value;
        });

        generateButton.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            canvas.width = parseInt(selectedSize);
            canvas.height = parseInt(selectedSize);
            const ctx = canvas.getContext('2d');

            if (selectedShape === 'circle') {
                ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, 0, 2 * Math.PI);
                ctx.clip();
            }

            ctx.drawImage(imageCanvas, 0, 0, canvas.width, canvas.height);

            const faviconURL = canvas.toDataURL('image/png');
            faviconImage.src = faviconURL;
            downloadLink.href = faviconURL;
            downloadLink.download = 'favicon.png';
            downloadLink.style.display = 'block';
        });