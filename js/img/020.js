 const fileInput = document.getElementById("fileInput");
const canvas = document.getElementById("canvas");
const colorPicker = document.getElementById("colorPicker");
const downloadButton = document.getElementById("downloadButton");
const ctx = canvas.getContext("2d");

let img = new Image();
let bgColor = "#ffffff"; // Default background color

fileInput.addEventListener("change", handleFileSelect);
colorPicker.addEventListener("input", handleColorChange);
downloadButton.addEventListener("click", downloadImage);

function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function(event) {
        img.onload = function() {
            drawImageWithBackgroundColor();
            downloadButton.disabled = false;
        }
        img.src = event.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    }
}

function handleColorChange() {
    bgColor = colorPicker.value;
    drawImageWithBackgroundColor();
}

function drawImageWithBackgroundColor() {
    canvas.width = img.width;
    canvas.height = img.height;
    ctx.fillStyle = bgColor;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(img, 0, 0);
}

function downloadImage() {
    const downloadLink = document.createElement("a");
    downloadLink.download = "modified_image.png";
    downloadLink.href = canvas.toDataURL("image/png");
    downloadLink.click();
}
