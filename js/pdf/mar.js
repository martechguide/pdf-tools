    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.worker.js';
    var pdf;

    document.querySelector("#pdf-upload").addEventListener("change", handleFileSelect);
    document.querySelector("#drag-drop-area").addEventListener("dragover", handleDragOver);
    document.querySelector("#drag-drop-area").addEventListener("drop", handleFileDrop);

    function handleFileSelect(e) {
      e.preventDefault();
      processFile(e.target.files[0]);
    }

    function handleDragOver(e) {
      e.preventDefault();
      e.stopPropagation();
      e.dataTransfer.dropEffect = 'copy';
    }

    function handleFileDrop(e) {
      e.preventDefault();
      e.stopPropagation();
      processFile(e.dataTransfer.files[0]);
    }

    function processFile(file) {
      if(file.type !== "application/pdf"){
        alert(file.name + " is not a pdf file.");
        return;
      }

      document.querySelector("#pages").innerHTML = "";
      var fileReader = new FileReader();  

      fileReader.onload = function() {
        var typedarray = new Uint8Array(this.result);

        pdfjsLib.getDocument(typedarray).promise.then(function(pdfDoc) {
          pdf = pdfDoc;
          console.log("The pdf has", pdf.numPages, "page(s).");

          for (var i = 0; i < pdf.numPages; i++) {
            (function(pageNum){
              pdf.getPage(pageNum + 1).then(function(page) {
                var viewport = page.getViewport({ scale: 1.0 });
                var canvas = document.createElement("canvas");
                canvas.className = "page";
                canvas.title = "Page " + pageNum;
                var pageWrapper = document.createElement("div");
                pageWrapper.className = "page-wrapper";
                var marginInputs = document.createElement("div");
                marginInputs.className = "margin-inputs";
                marginInputs.innerHTML = `
                  <label for="topMargin${pageNum}">Top (mm) </label>
                  <input type="number" id="topMargin${pageNum}" value="20">
                  <label for="bottomMargin${pageNum}">Bottom (mm) </label>
                  <input type="number" id="bottomMargin${pageNum}" value="20">
                  <label for="leftMargin${pageNum}">Left (mm) </label>
                  <input type="number" id="leftMargin${pageNum}" value="20">
                  <label for="rightMargin${pageNum}">Right (mm) </label>
                  <input type="number" id="rightMargin${pageNum}" value="20">
                  <div class="apply-btn" onclick="applyMargin(${pageNum})">Apply & Download</div>
                `;
                pageWrapper.appendChild(canvas);
                pageWrapper.appendChild(marginInputs);
                document.querySelector("#pages").appendChild(pageWrapper);
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                page.render({
                  canvasContext: canvas.getContext('2d'),
                  viewport: viewport
                }).promise.then(function(){
                  console.log('Page rendered');
                });
              });
            })(i);
          }
        });
      };

      fileReader.readAsArrayBuffer(file);
    }

    function applyMargin(pageNum) {
      var topMargin = parseFloat(document.getElementById(`topMargin${pageNum}`).value) || 0;
      var bottomMargin = parseFloat(document.getElementById(`bottomMargin${pageNum}`).value) || 0;
      var leftMargin = parseFloat(document.getElementById(`leftMargin${pageNum}`).value) || 0;
      var rightMargin = parseFloat(document.getElementById(`rightMargin${pageNum}`).value) || 0;

      var pdfDoc = new jsPDF('p', 'mm', 'a4');
      pdf.getPage(pageNum + 1).then(function(page) {
        var viewport = page.getViewport({ scale: 1 });
        var canvas = document.createElement("canvas");
        canvas.width = viewport.width;
        canvas.height = viewport.height;
        var ctx = canvas.getContext('2d');

        page.render({
          canvasContext: ctx,
          viewport: viewport
        }).promise.then(function(){
          var imgData = canvas.toDataURL('image/jpeg', 1.0);

          var pdfWidth = pdfDoc.internal.pageSize.width;
          var pdfHeight = pdfDoc.internal.pageSize.height;

          pdfDoc.addImage(imgData, 'JPEG', leftMargin, topMargin, pdfWidth - leftMargin - rightMargin, pdfHeight - topMargin - bottomMargin);

          var pdfName = "page_" + (pageNum + 1) + "_with_margin.pdf";
          pdfDoc.save(pdfName);
          alert("Margin applied successfully. Downloading modified page...");
        });
      });
    }