 const imageInput = document.getElementById('imageInput');
    const degreeInput = document.getElementById('degreeInput');
    const originalCanvas = document.getElementById('originalCanvas');
    const rotatedCanvas = document.getElementById('rotatedCanvas');
    const options = document.getElementById('options');
    const canvasContainer = document.getElementById('canvasContainer');

    imageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                options.style.display = 'block';
                canvasContainer.style.display = 'flex';
                const img = new Image();
                img.onload = function() {
                    const ctx = originalCanvas.getContext('2d');
                    ctx.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
                    originalCanvas.width = img.width;
                    originalCanvas.height = img.height;
                    ctx.drawImage(img, 0, 0);
                }
                img.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    function changeImageDirection() {
        const ctx = rotatedCanvas.getContext('2d');
        ctx.clearRect(0, 0, rotatedCanvas.width, rotatedCanvas.height);
        const img = new Image();
        img.onload = function() {
            const degree = parseInt(degreeInput.value);
            const radian = degree * Math.PI / 180;
            const cos = Math.cos(radian);
            const sin = Math.sin(radian);
            const newWidth = Math.abs(img.width * cos) + Math.abs(img.height * sin);
            const newHeight = Math.abs(img.width * sin) + Math.abs(img.height * cos);
            rotatedCanvas.width = newWidth;
            rotatedCanvas.height = newHeight;
            ctx.translate(newWidth / 2, newHeight / 2);
            ctx.rotate(radian);
            ctx.drawImage(img, -img.width / 2, -img.height / 2);
        }
        img.src = originalCanvas.toDataURL();
    }

    function downloadRotatedImage() {
        const link = document.createElement('a');
        link.href = rotatedCanvas.toDataURL();
        link.download = 'rotated_image.png';
        link.click();
    }

    function clearCanvas() {
        const ctx1 = originalCanvas.getContext('2d');
        ctx1.clearRect(0, 0, originalCanvas.width, originalCanvas.height);
        const ctx2 = rotatedCanvas.getContext('2d');
        ctx2.clearRect(0, 0, rotatedCanvas.width, rotatedCanvas.height);
        options.style.display = 'none';
        canvasContainer.style.display = 'none';
    }