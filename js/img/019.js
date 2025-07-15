 const widthInput = document.getElementById('width');
        const heightInput = document.getElementById('height');
        const backgroundTypeSelect = document.getElementById('backgroundType');
        const colorOptions = document.getElementById('colorOptions');
        const colorInput = document.getElementById('color');
        const textInput = document.getElementById('text');
        const fontFamilySelect = document.getElementById('fontFamily');
        const textColorInput = document.getElementById('textColor');
        const borderSizeInput = document.getElementById('borderSize');
        const borderStyleSelect = document.getElementById('borderStyle');
        const borderColorInput = document.getElementById('borderColor');
        const textPositionSelect = document.getElementById('textPosition');
        const resultCanvas = document.getElementById('resultImage');
        const ctx = resultCanvas.getContext('2d');

        function generateImage() {
            const width = parseInt(widthInput.value) || 400;
            const height = parseInt(heightInput.value) || 200;

            resultCanvas.width = width;
            resultCanvas.height = height;

            // Draw background
            if (backgroundTypeSelect.value === 'singleColor') {
                ctx.fillStyle = colorInput.value;
                ctx.fillRect(0, 0, width, height);
            } else {
                // Load your pattern image here
                const patternImage = new Image();
                patternImage.src = 'https://img.freepik.com/free-vector/diagonal-lines-vector-background-design_1017-12303.jpg'; // Replace with your pattern image URL
                patternImage.onload = function () {
                    const pattern = ctx.createPattern(patternImage, 'repeat');
                    ctx.fillStyle = pattern;
                    ctx.fillRect(0, 0, width, height);
                };
            }

            // Apply border
            const borderSize = parseInt(borderSizeInput.value) || 0;
            const borderStyle = borderStyleSelect.value;
            const borderColor = borderColorInput.value;
            drawBorder(borderSize, borderStyle, borderColor, width, height);

            // Draw text
            const text = textInput.value;
            const fontFamily = fontFamilySelect.value;
            const textColor = textColorInput.value;
            const textPosition = textPositionSelect.value;

            ctx.font = `20px ${fontFamily}`;
            ctx.fillStyle = textColor;

            const textWidth = ctx.measureText(text).width;

            let x, y;

            switch (textPosition) {
                case 'topLeft':
                    x = 10;
                    y = 30;
                    break;
                case 'topCenter':
                    x = (width - textWidth) / 2;
                    y = 30;
                    break;
                case 'topRight':
                    x = width - textWidth - 10;
                    y = 30;
                    break;
                case 'middleLeft':
                    x = 10;
                    y = height / 2;
                    break;
                case 'middleCenter':
                    x = (width - textWidth) / 2;
                    y = height / 2;
                    break;
                case 'middleRight':
                    x = width - textWidth - 10;
                    y = height / 2;
                    break;
                case 'bottomLeft':
                    x = 10;
                    y = height - 10;
                    break;
                case 'bottomCenter':
                    x = (width - textWidth) / 2;
                    y = height - 10;
                    break;
                case 'bottomRight':
                    x = width - textWidth - 10;
                    y = height - 10;
                    break;
                default:
                    x = 10;
                    y = 30;
            }

            ctx.fillText(text, x, y);
        }

        function drawBorder(size, style, color, width, height) {
            ctx.lineWidth = size;
            ctx.strokeStyle = color;
            ctx.strokeRect(size / 2, size / 2, width - size, height - size);
        }

        function downloadImage() {
            const dataUrl = resultCanvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.href = dataUrl;
            link.download = 'placeholder_image.png';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function resetOptions() {
            widthInput.value = '';
            heightInput.value = '';
            backgroundTypeSelect.value = 'singleColor';
            colorOptions.style.display = 'block';
            colorInput.value = '#ffffff';
            textInput.value = '';
            fontFamilySelect.value = 'Arial, sans-serif';
            textColorInput.value = '#000000';
            borderSizeInput.value = '';
            borderStyleSelect.value = 'solid';
            borderColorInput.value = '#000000';
            textPositionSelect.value = 'topLeft';

            // Clear canvas
            ctx.clearRect(0, 0, resultCanvas.width, resultCanvas.height);
        }

        // Show/hide color options based on background type
        backgroundTypeSelect.addEventListener('change', function () {
            if (this.value === 'singleColor') {
                colorOptions.style.display = 'block';
            } else {
                colorOptions.style.display = 'none';
            }
        });

        // Initial color options state
        colorOptions.style.display = 'block';