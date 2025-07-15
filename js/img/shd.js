        document.addEventListener("DOMContentLoaded", () => {
            const imageInput = document.getElementById("image-input");
            const imagePreview = document.getElementById("image-preview");
            const shadowOptions = document.getElementById("shadow-options");
            const shadowColorInput = document.getElementById("shadow-color");
            const shadowBlurInput = document.getElementById("shadow-blur");
            const shadowOffsetXInput = document.getElementById("shadow-offset-x");
            const shadowOffsetYInput = document.getElementById("shadow-offset-y");
            const shadowInsetCheckbox = document.getElementById("shadow-inset");
            const applyShadowButton = document.getElementById("apply-shadow");
            const resetShadowButton = document.getElementById("reset-shadow");
            const downloadImageButton = document.getElementById("download-image");

            imageInput.addEventListener("change", () => {
                const file = imageInput.files[0];
                if (!file || !file.type.includes("image/png")) {
                    alert("Please upload a valid PNG image.");
                    return;
                }

                const reader = new FileReader();
                reader.onload = () => {
                    const img = new Image();
                    img.onload = () => {
                        imagePreview.src = img.src;
                        shadowOptions.style.display = "block";
                        resetShadowButton.style.display = "inline-block";
                    };
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });

            applyShadowButton.addEventListener("click", () => {
                const canvas = document.createElement("canvas");
                const ctx = canvas.getContext("2d");
                const { width, height } = imagePreview;

                canvas.width = width;
                canvas.height = height;

                // Clear canvas
                ctx.clearRect(0, 0, width, height);

                // Draw the image onto the canvas
                ctx.drawImage(imagePreview, 0, 0, width, height);

                // Apply shadow effect
                ctx.shadowColor = shadowColorInput.value;
                ctx.shadowBlur = parseInt(shadowBlurInput.value);
                ctx.shadowOffsetX = parseInt(shadowOffsetXInput.value);
                ctx.shadowOffsetY = parseInt(shadowOffsetYInput.value);
                ctx.shadowInset = shadowInsetCheckbox.checked ? "inset" : "outset";

                // Draw the image with shadow onto the canvas
                ctx.drawImage(imagePreview, 0, 0, width, height);

                // Update the image preview with the canvas
                imagePreview.src = canvas.toDataURL("image/png");

                downloadImageButton.style.display = "inline-block";
            });

            resetShadowButton.addEventListener("click", () => {
                shadowOptions.style.display = "none";
                resetShadowButton.style.display = "none";
                downloadImageButton.style.display = "none";
                imagePreview.src = "";
            });

            downloadImageButton.addEventListener("click", () => {
                const url = imagePreview.src;
                const link = document.createElement("a");
                link.href = url;
                link.download = "image_with_shadow.png";
                link.click();
            });
        });