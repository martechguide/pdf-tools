    var pdf;
    var zip = new JSZip();
    var currentPage = 0;
    var totalPages = 0;

    function convertToTIFF() {
        for (var i = 1; i <= totalPages; i++) {
            downloadImage(i);
        }
    }

    function downloadImage(pageNum) {
        pdf.getPage(pageNum).then(function (page) {
            var viewport = page.getViewport({ scale: 2 });
            var canvas = document.createElement("canvas");
            var context = canvas.getContext("2d");

            canvas.height = viewport.height;
            canvas.width = viewport.width;

            page.render({
                canvasContext: context,
                viewport: viewport,
            }).promise.then(function () {
                canvas.toBlob(function (blob) {
                    zip.file("page_" + pageNum + ".tif", blob);
                    currentPage++;
                    updateProgress((currentPage / totalPages) * 100);

                    if (currentPage === totalPages) {
                        zip.generateAsync({ type: "blob" }).then(function (content) {
                            var link = document.createElement("a");
                            link.href = URL.createObjectURL(content);
                            link.download = "converted_images.zip";
                            link.click();
                            hideProgress();
                            showConvertAnotherButton();
                        });
                    }
                }, "image/tiff");
            });
        });
    }

    function updateProgress(progress) {
        var progressBar = document.getElementById("conversion-progress");
        progressBar.style.display = "block";
        progressBar.value = progress;
    }

    function hideProgress() {
        var progressBar = document.getElementById("conversion-progress");
        progressBar.style.display = "none";
    }

    function showConvertAnotherButton() {
        document.getElementById("convert-another-btn").style.display = "block";
    }

    document.querySelector("#pdf-upload").addEventListener("change", function (e) {
        document.querySelector("#pages").innerHTML = "";
        var file = e.target.files[0];

        // Display file info
        var fileInfo = document.getElementById("file-info");
        fileInfo.innerHTML = "<strong>File Name:</strong> " + file.name + "<br>" +
                             "<strong>File Size:</strong> " + (file.size / 1024).toFixed(2) + " KB";
        
        if (file.type != "application/pdf") {
            alert(file.name + " is not a PDF file.");
            return;
        }

        var fileReader = new FileReader();

        fileReader.onload = function () {
            var typedarray = new Uint8Array(this.result);

            pdfjsLib.getDocument(typedarray).promise.then(function (pdfDocument) {
                pdf = pdfDocument;
                totalPages = pdf.numPages;
                console.log("The PDF has", totalPages, "page(s).");

                for (var i = 0; i < totalPages; i++) {
                    (function (pageNum) {
                        pdf.getPage(i + 1).then(function (page) {
                            var viewport = page.getViewport(2.0);
                            var pageContainer = document.createElement("div");
                            pageContainer.className = "page-container";
                            var pageNumDiv = document.createElement("div");
                            pageNumDiv.className = "pageNumber";
                            pageNumDiv.innerHTML = "Page " + pageNum;

                            document.querySelector("#pages").appendChild(pageContainer);
                            pageContainer.appendChild(pageNumDiv);

                            var canvas = document.createElement("canvas");
                            canvas.id = "page-" + pageNum;
                            canvas.className = "page";
                            canvas.title = "Page " + pageNum;
                            pageContainer.appendChild(canvas);

                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            page.render({
                                canvasContext: canvas.getContext("2d"),
                                viewport: viewport,
                            }).promise.then(function () {
                                console.log("Page rendered");
                            });
                        });
                    })(i + 1);
                }

                document.querySelector("#options").style.display = "block";
            });
        };

        fileReader.readAsArrayBuffer(file);
    });

    document.querySelector("#convert-btn").addEventListener("click", function () {
        convertToTIFF();
    });

    document.querySelector("#convert-another-btn").addEventListener("click", function () {
        location.reload();
    });

    var dragDropArea = document.getElementById("drag-drop-area");

    dragDropArea.addEventListener("dragover", function (event) {
        event.preventDefault();
        this.classList.add("active");
    });

    dragDropArea.addEventListener("dragleave", function () {
        this.classList.remove("active");
    });

    dragDropArea.addEventListener("drop", function (event) {
        event.preventDefault();
        this.classList.remove("active");
        var file = event.dataTransfer.files[0];
        if (file.type !== "application/pdf") {
            alert("Please upload a PDF file.");
            return;
        }
        document.querySelector("#pdf-upload").files = event.dataTransfer.files;
        document.querySelector("#pdf-upload").dispatchEvent(new Event('change'));
    });