  const video = document.getElementById('webcam');
  const captureButton = document.getElementById('capture-button');

  // Ensure that the browser supports getUserMedia
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(function (stream) {
        video.srcObject = stream;
      })
      .catch(function (error) {
        console.error('Error accessing webcam:', error);
      });
  } else {
    alert('Webcam access not supported in this browser.');
  }

  captureButton.addEventListener('click', function () {
    captureWebcam();
  });

  function captureWebcam() {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    // Set canvas dimensions to match the video stream
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Draw the current frame of the video onto the canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the canvas content to a data URL
    const imageDataUrl = canvas.toDataURL('image/jpeg');

    // Create a PDF using jsPDF and add the webcam capture as an image
    const doc = new jsPDF();
    doc.addImage(imageDataUrl, 'JPEG', 5, 50, 200, 170); // Adjust dimensions as needed

    // Save the PDF
    doc.save('webcam-to-pdf.pdf');
  }