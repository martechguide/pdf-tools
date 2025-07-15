    function loadImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.getElementById('originalCanvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);

                    // Hide upload button and show editor
                    document.getElementById('uploadContainer').style.display = 'none';
                    document.getElementById('editorContainer').style.display = 'flex';
                    document.getElementById('originalCanvas').style.display = 'block';
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function addStroke() {
        const canvas = document.getElementById('originalCanvas');
        const ctx = canvas.getContext('2d');
        const strokeColor = document.getElementById('strokeColorPicker').value;
        const strokeWidth = parseInt(document.getElementById('strokeWidth').value);

        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = strokeWidth;

        // Draw a rectangle around the entire canvas to create a stroke effect
        ctx.strokeRect(0, 0, canvas.width, canvas.height);
    }

    function downloadImage() {
        const canvas = document.getElementById('originalCanvas');
        const link = document.createElement('a');
        link.download = 'image_with_stroke.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    }