document.getElementById('convertBtn').addEventListener('click', function() {
    var fileInput = document.getElementById('pdfInput');
    var file = fileInput.files[0];

    if (file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadstart = function() {
            document.getElementById('progressBar').style.width = '0%';
        };
        reader.onprogress = function(event) {
            if (event.lengthComputable) {
                var progress = (event.loaded / event.total) * 100;
                document.getElementById('progressBar').style.width = progress + '%';
            }
        };
        reader.onload = function() {
            var base64String = reader.result.split(',')[1];
            document.getElementById('base64Output').value = base64String;
            document.getElementById('downloadBtn').setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(base64String));
            document.getElementById('downloadBtn').style.display = 'inline-block';
        };
        reader.onerror = function(error) {
            console.error('Error reading the file: ', error);
        };
    } else {
        console.error('No file selected.');
    }
});

document.getElementById('pdfInput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        document.getElementById('fileName').style.display = 'block';
        document.getElementById('fileNameText').textContent = file.name;
        document.getElementById('convertBtn').style.display = 'inline-block';
        document.getElementById('progress').style.display = 'block';
        document.getElementById('output').style.display = 'block';
        alert('File uploaded successfully!');
    }
});

var dragDropArea = document.getElementById('dragDropArea');

dragDropArea.addEventListener('dragover', function(event) {
    event.preventDefault();
    this.classList.add('active');
});

dragDropArea.addEventListener('dragleave', function() {
    this.classList.remove('active');
});

dragDropArea.addEventListener('drop', function(event) {
    event.preventDefault();
    this.classList.remove('active');
    var file = event.dataTransfer.files[0];
    if (file && file.type === 'application/pdf') {
        document.getElementById('pdfInput').files = event.dataTransfer.files;
        document.getElementById('fileName').style.display = 'block';
        document.getElementById('fileNameText').textContent = file.name;
        document.getElementById('convertBtn').style.display = 'inline-block';
        document.getElementById('progress').style.display = 'block';
        document.getElementById('output').style.display = 'block';
        alert('File uploaded successfully!');
    } else {
        alert('Please upload a PDF file.');
    }
});