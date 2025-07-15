    function generateThumbnail() {
        const videoUrl = document.getElementById("videoUrlInput").value;
        const videoId = extractYouTubeVideoId(videoUrl);
        const thumbnailUrl = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;

        // Create an image element for the thumbnail preview
        const thumbnailImage = new Image();
        thumbnailImage.src = thumbnailUrl;

        // Append the image element to the thumbnail preview div
        const thumbnailPreview = document.getElementById("thumbnailPreview");
        thumbnailPreview.innerHTML = '';
        thumbnailPreview.appendChild(thumbnailImage);

        // Show the download button
        const downloadButton = document.getElementById("downloadButton");
        downloadButton.style.display = "block";
    }

    function downloadThumbnail() {
        const thumbnailPreview = document.getElementById("thumbnailPreview");
        html2canvas(thumbnailPreview).then(canvas => {
            canvas.toBlob(blob => {
                saveAs(blob, "thumbnail.png");
            });
        });
    }

    function extractYouTubeVideoId(url) {
        const videoIdRegex = /(?:\?v=|\/embed\/|\/\v=|^v=)([A-Za-z0-9-_]{11})/;
        const match = url.match(videoIdRegex);
        return match ? match[1] : null;
    }