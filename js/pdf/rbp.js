  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.2/pdf.worker.js';

  let pdfs = [];
  let removedPages = [];

  document.querySelector("#pdf-upload").addEventListener("change", function(e){
    document.querySelector("#pages").innerHTML = "";
    pdfs = [];
    removedPages = [];

    // Show file name
    const fileName = e.target.files[0].name;
    document.querySelector("#file-name").textContent = "Uploaded file: " + fileName;

    // Show options container
    document.querySelector("#options-container").style.display = "block";

    var files = e.target.files;
    for (var i = 0; i < files.length; i++) {
      loadPdf(files[i]);
    }
  });

  function loadPdf(file) {
    var fileReader = new FileReader();  

    fileReader.onload = function() {
      var typedarray = new Uint8Array(this.result);

      pdfjsLib.getDocument(typedarray).promise.then(function(pdfDoc) {
        pdfs.push(pdfDoc);
        console.log("The pdf has", pdfDoc.numPages, "page(s).");
        for (var i = 0; i < pdfDoc.numPages; i++) {
          (function(pageNum){
            displayPage(pdfDoc, pageNum + 1);
          })(i);
        }
      });
    };

    fileReader.readAsArrayBuffer(file);
  }

  function removePage(pageNum){
    removedPages.push(pageNum);
    document.querySelector("#pages").innerHTML = "";
    pdfs.forEach(function(pdfDoc) {
      for (let i = 1; i <= pdfDoc.numPages; i++) {
        if (!removedPages.includes(i)) {
          displayPage(pdfDoc, i);
        }
      }
    });
  }

  function displayPage(pdfDoc, pageNumber){
    pdfDoc.getPage(pageNumber).then(function(page) {
      var viewport = page.getViewport(2.0);
      var pageWrapper = document.createElement("div");
      pageWrapper.className = "page-wrapper";
      var pageNumDiv = document.createElement("div");
      pageNumDiv.className = "pageNumber";
      pageNumDiv.innerHTML = "Page " + pageNumber;
      var canvas = document.createElement("canvas");
      canvas.className = "page";
      canvas.title = "Page " + pageNumber;
      pageWrapper.appendChild(pageNumDiv);
      pageWrapper.appendChild(canvas);
      document.querySelector("#pages").appendChild(pageWrapper);
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      page.render({
        canvasContext: canvas.getContext('2d'),
        viewport: viewport
      }).promise.then(function(){
        console.log('Page rendered');
      });

      var removeIcon = document.createElement("div");
      removeIcon.className = "remove-icon";
      removeIcon.innerHTML = "&#10005;";
      removeIcon.onclick = function(){
        removePage(pageNumber);
      };
      pageWrapper.appendChild(removeIcon);
    });
  }

  document.querySelector("#downloadPdf").addEventListener("click", function(){
    var remainingPdf = new jsPDF('p', 'mm', 'a4');
    pdfs.forEach(function(pdfDoc) {
      for (let i = 1; i <= pdfDoc.numPages; i++) {
        if (!removedPages.includes(i)) {
          pdfDoc.getPage(i).then(function(page) {
            var viewport = page.getViewport(1);
            var canvas = document.createElement("canvas");
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            var ctx = canvas.getContext('2d');

            page.render({
              canvasContext: ctx,
              viewport: viewport
            }).promise.then(function(){
              var imgData = canvas.toDataURL('image/jpeg', 1.0);
              remainingPdf.addImage(imgData, 'JPEG', 0, 0, remainingPdf.internal.pageSize.width, remainingPdf.internal.pageSize.height);
              if (i < pdfDoc.numPages) {
                remainingPdf.addPage();
              } else if (pdfDoc === pdfs[pdfs.length - 1]) {
                remainingPdf.save("remaining_pages.pdf");
              }
            });
          });
        }
      }
    });
  });