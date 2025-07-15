document.addEventListener("DOMContentLoaded", function() {
    const canvas = document.getElementById("canvas");
    const ctx = canvas.getContext("2d");
    const progressBar = document.getElementById("progressBar");

    // Function to extend the image
    function extendImage(image, newWidth, newHeight) {
        return new Promise((resolve) => {
            canvas.width = newWidth;
            canvas.height = newHeight;

            // Draw the original image
            ctx.drawImage(image, 0, 0, image.width, image.height);

            // Initialize progress
            let totalPixels = image.width * image.height;
            let processedPixels = 0;

            // Function to process a row of pixels
            function processRow(y) {
                for (let x = 0; x < image.width; x++) {
                    const pixelData = ctx.getImageData(x, y, 1, 1).data;
                    ctx.fillStyle = `rgba(${pixelData[0]}, ${pixelData[1]}, ${pixelData[2]}, ${pixelData[3] / 255})`;
                    ctx.fillRect(newWidth - x - 1, y, 1, 1); // Mirror horizontally
                    ctx.fillRect(x, newHeight - y - 1, 1, 1); // Mirror vertically
                    ctx.fillRect(newWidth - x - 1, newHeight - y - 1, 1, 1); // Mirror horizontally and vertically

                    // Update progress
                    processedPixels++;
                }

                let progress = Math.floor((processedPixels / totalPixels) * 100);
                progressBar.value = progress;

                // Process the next row
                if (y < image.height - 1) {
                    requestAnimationFrame(() => processRow(y + 1));
                } else {
                    resolve(); // Resolve the promise when done
                }
            }

            // Start processing the first row
            requestAnimationFrame(() => processRow(0));
        });
    }

    // Handle file input
    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = new Image();
            img.onload = async function() {
                const maxWidth = img.width * 2; // Extend by doubling the original width
                const maxHeight = img.height * 2; // Extend by doubling the original height
                progressBar.style.display = "block"; // Show progress bar
                await extendImage(img, maxWidth, maxHeight);
                progressBar.style.display = "none"; // Hide progress bar after processing
                document.getElementById("downloadBtn").style.display = "block"; // Show download button
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Handle download button click
    document.getElementById("downloadBtn").addEventListener("click", function() {
        const dataURL = canvas.toDataURL("image/png");
        const a = document.createElement("a");
        a.href = dataURL;
        a.download = "extended_image.png";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
});