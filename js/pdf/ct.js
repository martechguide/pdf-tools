  function applyStyles() {
    const textContent = document.getElementById('textContent').value;
    const textColor = document.getElementById('textColorPicker').value;
    const backgroundColor = document.getElementById('backgroundColorPicker').value;
    const fontSize = document.getElementById('fontSizeSelector').value + 'px';
    const fontStyle = document.getElementById('fontStyleSelector').value;
    const fontFamily = document.getElementById('fontFamilySelector').value;
    const textAlign = document.getElementById('textAlignSelector').value;

    const fileContent = document.getElementById('fileContent');

    // Apply styles
    fileContent.style.color = textColor;
    fileContent.style.backgroundColor = backgroundColor;
    fileContent.style.fontSize = fontSize;
    fileContent.style.fontStyle = fontStyle;
    fileContent.style.fontFamily = fontFamily;
    fileContent.style.textAlign = textAlign;

    // Add text content
    fileContent.innerText = textContent;
  }

  function downloadAsPdf() {
    const fileContent = document.getElementById('fileContent');

    // Set options for PDF generation
    const options = {
      margin: 10,
      filename: 'text_document.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Generate PDF
    html2pdf().from(fileContent).set(options).save();
  }