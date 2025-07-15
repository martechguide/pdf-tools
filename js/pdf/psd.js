 document.getElementById("file-upload").addEventListener("change", function () {
      var fileInput = this.files[0];
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
        };
        img.src = event.target.result;
      };
      reader.readAsDataURL(fileInput);
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

        doc.addImage(img, "JPEG", horizontalMargin, verticalMargin, imageWidth, imageHeight);
      };

      setTimeout(function () {
        doc.save("converted.pdf");
      }, 4000); // Wait 4 seconds before downloading
    });