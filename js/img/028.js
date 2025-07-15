 const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const imageInput = document.getElementById('imageInput');
    const downloadBtn = document.getElementById('downloadBtn');
    const addLinesBtn = document.getElementById('addLinesBtn');
    const undoBtn = document.getElementById('undoBtn');
    const refreshBtn = document.getElementById('refreshBtn');
    const lineColorInput = document.getElementById('lineColor');
    const optionsContainer = document.getElementById('optionsContainer');
    let image;
    let lastImageData;

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(event) {
            image = new Image();
            image.onload = function() {
                canvas.width = image.width;
                canvas.height = image.height;
                ctx.drawImage(image, 0, 0);

                // Show options after image is uploaded
                optionsContainer.style.display = 'block';
                downloadBtn.style.display = 'inline-block';
                refreshBtn.style.display = 'inline-block';
            };
            image.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });

    addLinesBtn.addEventListener('click', function() {
        const lineType = document.getElementById('lineType').value;
        const lineColor = lineColorInput.value;

        // Save the current canvas state for undo functionality
        lastImageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

        switch (lineType) {
            case 'horizontal':
                addHorizontalLines(lineColor);
                break;
            case 'vertical':
                addVerticalLines(lineColor);
                break;
            case 'diagonal':
                addDiagonalLines(lineColor);
                break;
        }

        // Show undo button after adding lines
        undoBtn.style.display = 'inline-block';
    });

    function addHorizontalLines(lineColor) {
        const lineHeight = 20; // Adjust line height as needed
        for (let y = 0; y < canvas.height; y += lineHeight) {
            drawLine(0, y, canvas.width, y, lineColor);
        }
    }

    function addVerticalLines(lineColor) {
        const lineWidth = 20; // Adjust line width as needed
        for (let x = 0; x < canvas.width; x += lineWidth) {
            drawLine(x, 0, x, canvas.height, lineColor);
        }
    }

    function addDiagonalLines(lineColor) {
        const step = 20; // Adjust step size as needed
        for (let i = 0; i < canvas.width + canvas.height; i += step) {
            drawLine(i, 0, 0, i, lineColor);
        }
    }

    function drawLine(x1, y1, x2, y2, color) {
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.strokeStyle = color; // Use selected color
        ctx.lineWidth = 2; // Change line width here
        ctx.stroke();
        ctx.closePath();
    }

    downloadBtn.addEventListener('click', function() {
        const dataUrl = canvas.toDataURL('image/png');
        const a = document.createElement('a');
        a.href = dataUrl;
        a.download = 'edited_image.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });

    undoBtn.addEventListener('click', function() {
        if (lastImageData) {
            ctx.putImageData(lastImageData, 0, 0);
            lastImageData = null; // Clear undo state
            undoBtn.style.display = 'none'; // Hide undo button if no more actions to undo
        }
    });

    refreshBtn.addEventListener('click', function() {
        if (image) {
            ctx.drawImage(image, 0, 0);
        }
    });