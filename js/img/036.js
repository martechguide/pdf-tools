 const inputImage = document.getElementById('inputImage');
        const scaleFactorSelect = document.getElementById('scaleFactor');
        const upscaleButton = document.getElementById('upscaleButton');
        const uploadProgressBarContainer = document.getElementById('uploadProgressBarContainer');
        const uploadProgressBar = document.getElementById('uploadProgressBar');
        const outputImage = document.getElementById('output');
        const downloadLink = document.getElementById('downloadLink');

        function displayUploadProgress() {
            uploadProgressBarContainer.style.display = 'block';

            // Simulate a delay for demonstration purposes
            let progress = 0;
            const interval = setInterval(() => {
                progress += 0.1;
                uploadProgressBar.style.width = `${Math.min(progress * 10, 100).toFixed(0)}%`;

                if (progress >= 1) {
                    clearInterval(interval);
                    uploadProgressBarContainer.style.display = 'none';
                }
            }, 200);
        }

        function upscaleImage() {
            uploadProgressBarContainer.style.display = 'block';

            const scaleFactor = parseInt(scaleFactorSelect.value, 10);
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = new Image();

                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = img.width * scaleFactor;
                    canvas.height = img.height * scaleFactor;

                    // Draw the image on the canvas
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    // Set the data URL of the upscaled image to the output image element
                    outputImage.src = canvas.toDataURL('image/png');
                    outputImage.style.display = 'block';

                    // Hide the progress bar
                    uploadProgressBarContainer.style.display = 'none';

                    // Show the download link
                    downloadLink.style.display = 'block';
                    downloadLink.href = outputImage.src;
                };

                img.src = e.target.result;
            };

            reader.readAsDataURL(inputImage.files[0]);
        }