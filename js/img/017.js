 const canvas = document.getElementById("preview-canvas");
        const ctx = canvas.getContext("2d");
        let imageObj;

        function addBlur() {
            if (!imageObj) return;

            const blurAmount = document.getElementById("blur-amount").value;
            const opacity = document.getElementById("opacity").value;

            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw the original image
            ctx.drawImage(imageObj, 0, 0, canvas.width, canvas.height);

            // Apply blur effect
            ctx.filter = `blur(${blurAmount}px)`;
            ctx.globalAlpha = opacity;
            ctx.drawImage(canvas, 0, 0, canvas.width, canvas.height);
            ctx.globalAlpha = 1;
            ctx.filter = 'none';
        }

        function removeBlur() {
            if (!imageObj) return;

            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw the original image
            ctx.drawImage(imageObj, 0, 0, canvas.width, canvas.height);
        }

        function downloadImage() {
            const link = document.createElement("a");
            link.href = canvas.toDataURL("image/png");
            link.download = "blurred_image.png";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function resetCanvas() {
            const input = document.getElementById("image-input");
            input.value = "";
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        document.getElementById("image-input").addEventListener("change", function (event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                imageObj = new Image();
                imageObj.src = reader.result;

                imageObj.onload = function () {
                    canvas.width = imageObj.width;
                    canvas.height = imageObj.height;
                    ctx.drawImage(imageObj, 0, 0, imageObj.width, imageObj.height);
                };
            };

            reader.readAsDataURL(input.files[0]);
        });

        document.getElementById("blur-form").addEventListener("input", addBlur);