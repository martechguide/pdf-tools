    var loadingTask;
    var pdfDoc;
    var scale = 2.0;

    function renderPage(num) {
        pdfDoc.getPage(num).then(function(page) {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var viewport = page.getViewport({scale: scale});
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);
            document.getElementById('pdfViewer').appendChild(canvas);
        });
    }

    function onDocumentLoaded(_pdfDoc) {
        pdfDoc = _pdfDoc;
        document.getElementById('pdfViewer').innerHTML = '';
        for (var num = 1; num <= pdfDoc.numPages; num++) {
            renderPage(num);
        }
        document.getElementById('downloadButton').style.display = 'block';
        document.getElementById('progressBar').style.display = 'none';
    }

    document.getElementById('convertButton').addEventListener('click', function() {
        var base64 = document.getElementById('base64Input').value;
        try {
            var uint8Array = atob(base64).split('').map(function(c) {
                return c.charCodeAt(0);
            });
            document.getElementById('progressBar').style.display = 'block';
            if (loadingTask) {
                loadingTask.destroy().then(function () {
                    loadingTask = pdfjsLib.getDocument({
                        data: uint8Array,
                    });
                    loadingTask.promise.then(onDocumentLoaded, function (reason) {
                        alert('Error: ' + reason);
                    });
                });
            } else {
                loadingTask = pdfjsLib.getDocument({
                    data: uint8Array,
                });
                loadingTask.promise.then(onDocumentLoaded, function (reason) {
                    alert('Error: ' + reason);
                });
            }
        } catch (e) {
            alert('base64 数据异常, 无法转换' + e);
        }
    });

    document.getElementById('downloadButton').addEventListener('click', function() {
        var base64 = document.getElementById('base64Input').value;
        var link = document.createElement('a');
        link.href = 'data:application/pdf;base64,' + base64;
        link.download = 'document.pdf';
        link.click();
    });