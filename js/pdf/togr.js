    function handleFileUpload(file) {
      if (file.type !== "image/png") {
        alert("Please upload a PNG file.");
        return;
      }

      var reader = new FileReader();
      reader.onload = function (event) {
        var canvas = document.getElementById("image-canvas");
        var context = canvas.getContext("2d");
        var img = new Image();
        img.onload = function () {
          canvas.width = img.width;
          canvas.height = img.height;
          context.drawImage(img, 0, 0, canvas.width, canvas.height);
          canvas.style.display = "block";
          document.getElementById("image-section").style.display = "block";
          document.getElementById("refresh-button").style.display = "inline";
        };
        img.src = event.target.result;
      };
      reader.readAsDataURL(file);
    }

    document.getElementById("file-upload").addEventListener("change", function () {
      handleFileUpload(this.files[0]);
    });

    var dragDropArea = document.getElementById("drag-drop-area");
    dragDropArea.addEventListener("dragover", function (event) {
      event.preventDefault();
      this.style.borderColor = "#007bff";
    });
    dragDropArea.addEventListener("dragleave", function () {
      this.style.borderColor = "#ccc";
    });
    dragDropArea.addEventListener("drop", function (event) {
      event.preventDefault();
      this.style.borderColor = "#ccc";
      var file = event.dataTransfer.files[0];
      if (file.type !== "image/png") {
        alert("Please upload a PNG file.");
        return;
      }
      document.getElementById("file-upload").files = event.dataTransfer.files; // Update input file
      handleFileUpload(file);
    });

    document.getElementById("refresh-button").addEventListener("click", function () {
      document.getElementById("file-upload").value = "";
      document.getElementById("image-canvas").style.display = "none";
      document.getElementById("image-section").style.display = "none";
      document.getElementById("progress-fill").style.width = "0%";
      document.getElementById("progress-fill").innerHTML = "0%";
      this.style.display = "none";
    });

    document.getElementById("convert-pdf-button").addEventListener("click", function () {
      var orientation = document.getElementById("orientation").value;
      var padding = parseInt(document.getElementById("padding").value);
      var canvas = document.getElementById("image-canvas");
      var dataUrl = canvas.toDataURL(); // Get data URL of canvas

      var doc = new jsPDF({
        orientation: orientation,
        unit: 'px'
      });

      var img = new Image();
      img.src = dataUrl;

      var progressFill = document.getElementById("progress-fill");
      var progress = 0;
      var interval = setInterval(function () {
        progress += 10;
        progressFill.style.width = progress + "%";
        progressFill.innerHTML = progress + "%";
        if (progress >= 100) {
          clearInterval(interval);
          progressFill.innerHTML = "Conversion complete!";
          document.getElementById("success-message").style.display = "block";
        }
      }, 400);

      img.onload = function () {
        var pageWidth = doc.internal.pageSize.getWidth();
        var pageHeight = doc.internal.pageSize.getHeight();
        var imageWidth, imageHeight, horizontalMargin, verticalMargin;

        if (orientation === 'portrait') {
          imageWidth = pageWidth - (padding * 2);
          imageHeight = (imageWidth * img.height) / img.width;
          horizontalMargin = padding;
          verticalMargin = (pageHeight - imageHeight) / 2;
        } else {
          imageHeight = pageHeight - (padding * 2);
          imageWidth = (imageHeight * img.width) / img.height;
          horizontalMargin = (pageWidth - imageWidth) / 2;
          verticalMargin = padding;
        }

        // Create a grayscale version of the image
        var grayCanvas = document.createElement("canvas");
        var grayContext = grayCanvas.getContext("2d");
        grayCanvas.width = img.width;
        grayCanvas.height = img.height;
        grayContext.drawImage(img, 0, 0);
        var imageData = grayContext.getImageData(0, 0, grayCanvas.width, grayCanvas.height);
        for (var i = 0; i < imageData.data.length; i += 4) {
          var grayValue = imageData.data[i] * 0.3 + imageData.data[i + 1] * 0.59 + imageData.data[i + 2] * 0.11;
          imageData.data[i] = grayValue; // Red channel
          imageData.data[i + 1] = grayValue; // Green channel
          imageData.data[i + 2] = grayValue; // Blue channel
        }
        grayContext.putImageData(imageData, 0, 0);
        var grayDataUrl = grayCanvas.toDataURL("image/jpeg");

        // Add grayscale image to PDF
        var grayImg = new Image();
        grayImg.src = grayDataUrl;
        grayImg.onload = function () {
          doc.addImage(grayImg, "JPEG", horizontalMargin, verticalMargin, imageWidth, imageHeight);
          setTimeout(function () {
            doc.save("converted.pdf");
          }, 4000); // Wait 4 seconds before downloading
        };
      };
    });