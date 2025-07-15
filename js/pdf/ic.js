  function handleFileUpload(file) {
    if (file.name.toLowerCase().endsWith('.ico')) {
      var reader = new FileReader();
      reader.onload = function (event) {
        var canvas = document.getElementById("image-canvas");
        var context = canvas.getContext("2d");
        var img = new Image();
        img.onload = function () {
          canvas.width = img.width;
          canvas.height = img.height;
          context.drawImage(img, 0, 0, canvas.width, canvas.height);
          document.getElementById("image-section").style.display = "block";
          document.getElementById("refresh-button").style.display = "inline";
        };
        img.src = event.target.result;
      };
      reader.readAsDataURL(file);
    } else {
      alert("Please upload an ICO file.");
    }
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
    if (file.name.toLowerCase().endsWith('.ico')) {
      document.getElementById("file-upload").files = event.dataTransfer.files;
      handleFileUpload(file);
    } else {
      alert("Please upload an ICO file.");
    }
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
    var dataUrl = canvas.toDataURL();

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
    }, 4000);
  });