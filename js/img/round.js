document.addEventListener("DOMContentLoaded", () => {
            const imageInput = document.getElementById("image-input");
            const applyButton = document.getElementById("apply-button");
            const outputCanvas = document.getElementById("output-canvas");
            const downloadButton = document.getElementById("download-button");

            imageInput.addEventListener("change", () => {
                const file = imageInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const img = new Image();
                        img.onload = () => {
                            const ctx = outputCanvas.getContext("2d");
                            ctx.clearRect(0, 0, outputCanvas.width, outputCanvas.height);
                            ctx.drawImage(img, 0, 0, outputCanvas.width, outputCanvas.height);
                            outputCanvas.style.display = "block";
                            downloadButton.style.display = "none"; // Hide download button initially
                        };
                        img.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            applyButton.addEventListener("click", () => {
                const ctx = outputCanvas.getContext("2d");
                const img = new Image();
                img.onload = () => {
                    ctx.clearRect(0, 0, outputCanvas.width, outputCanvas.height);

                    // Convert the image to a round shape
                    ctx.beginPath();
                    ctx.arc(outputCanvas.width / 2, outputCanvas.height / 2, outputCanvas.width / 2, 0, Math.PI * 2);
                    ctx.closePath();
                    ctx.clip();

                    ctx.drawImage(img, 0, 0, outputCanvas.width, outputCanvas.height);

                    downloadButton.style.display = "inline-block"; // Show download button after applying shape
                };
                img.src = outputCanvas.toDataURL(); // Load the current canvas as an image
            });

            downloadButton.addEventListener("click", () => {
                const url = outputCanvas.toDataURL("image/png");
                const link = document.createElement("a");
                link.href = url;
                link.download = "modified_image.png";
                link.click();
            });
        });