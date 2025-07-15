function generateIcon() {
      const inputText = document.getElementById("input-text").value;
      const iconResult = document.getElementById("icon-result");

      // Remove any existing content
      iconResult.innerHTML = "";

      // Create a new SVG element
      const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");

      // Set the attributes and content of the SVG element
      svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
      svg.setAttribute("viewBox", "0 0 24 24");
      svg.innerHTML = inputText;

      // Append the SVG element to the result container
      iconResult.appendChild(svg);
    }

    document.getElementById("generate-button").addEventListener("click", generateIcon);

    function downloadSVG() {
      const svgElement = document.getElementById("icon-result").querySelector("svg");
      const svgCode = new XMLSerializer().serializeToString(svgElement);
      const svgBlob = new Blob([svgCode], { type: "image/svg+xml;charset=utf-8" });
      const svgURL = URL.createObjectURL(svgBlob);
      const downloadLink = document.createElement("a");
      downloadLink.href = svgURL;
      downloadLink.download = "icon.svg";
      downloadLink.click();
    }

    document.getElementById("download-svg").addEventListener("click", downloadSVG);

    function downloadPNG() {
      const svgElement = document.getElementById("icon-result").querySelector("svg");
      const svgCode = new XMLSerializer().serializeToString(svgElement);
      const canvas = document.createElement("canvas");
      const context = canvas.getContext("2d");
      const img = new Image();
      img.onload = function() {
        canvas.width = img.width;
        canvas.height = img.height;
        context.drawImage(img, 0, 0);
        const pngURL = canvas.toDataURL("image/png");
        const downloadLink = document.createElement("a");
        downloadLink.href = pngURL;
        downloadLink.download = "icon.png";
        downloadLink.click();
      };
      img.src = "data:image/svg+xml;charset=utf-8," + encodeURIComponent(svgCode);
    }

    document.getElementById("download-png").addEventListener("click", downloadPNG);