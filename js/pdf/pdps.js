        var pdf;
        var zip = new JSZip();
        var currentPage = 0;
        var totalPages = 0;

        function convertToPSD() {
            for (var i = 1; i <= totalPages; i++) {
                downloadImage(i, "psd");
            }
        }

        function downloadImage(pageNum, format) {
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
                        zip.file("page_" + pageNum + "." + format, blob);
                        currentPage++;
                        updateProgress((currentPage / totalPages) * 100);

                        if (currentPage === totalPages) {
                            zip.generateAsync({ type: "blob" }).then(function (content) {
                                var link = document.createElement("a");
                                link.href = URL.createObjectURL(content);
                                link.download = "converted_images.zip";
                                link.click();
                                showSuccessMessage();
                            });
                        }
                    }, "image/" + format);
                });
            });
        }

        function updateProgress(progress) {
            var progressBar = document.getElementById("conversion-progress");
            progressBar.style.display = "block";
            progressBar.value = progress;
        }

        function showSuccessMessage() {
            document.getElementById("success-message").style.display = "block";
            document.getElementById("convert-another-btn").style.display = "block";
            hideProgress();
        }

        function hideProgress() {
            var progressBar = document.getElementById("conversion-progress");
            progressBar.style.display = "none";
        }

        document.querySelector("#pdfFile").addEventListener("change", function (e) {
            handleFileUpload(e.target.files[0]);
        });

        document.querySelector("#convert-btn").addEventListener("click", function () {
            convertToPSD();
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
            handleFileUpload(file);
        });

        function handleFileUpload(file) {
            if (file.type !== "application/pdf") {
                alert("Please upload a PDF file.");
                return;
            }

            var fileReader = new FileReader();
            fileReader.onload = function () {
                var typedarray = new Uint8Array(this.result);
                pdfjsLib.getDocument(typedarray).promise.then(function (pdfDocument) {
                    pdf = pdfDocument;
                    totalPages = pdf.numPages;
                    console.log("The PDF has", totalPages, "page(s).");

                    document.querySelector("#pages").innerHTML = "";
                    for (var i = 0; i < totalPages; i++) {
                        (function (pageNum) {
                            pdf.getPage(i + 1).then(function (page) {
                                var viewport = page.getViewport(2.0);
                                var pageContainer = document.createElement("div");
                                pageContainer.className = "page-container";
                                var pageNumDiv = document.createElement("div");
                                pageNumDiv.className = "pageNumber";
                                pageNumDiv.innerHTML = "Page " + pageNum;
                                var canvas = document.createElement("canvas");
                                canvas.id = "page-" + pageNum;
                                canvas.className = "page";
                                canvas.title = "Page " + pageNum;

                                document.querySelector("#pages").appendChild(pageContainer);
                                pageContainer.appendChild(pageNumDiv);
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
        }