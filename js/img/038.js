  // Reference the container div
  const iframeContainer = document.getElementById('iframe-container');

  // Create the iframe element
  const iframe = document.createElement('iframe');
  iframe.src = 'https://modelscope-old-photo-restoration.hf.space';  // Set the source URL
  iframe.setAttribute('frameborder', '0');  // Remove default border
  iframe.style.width = '100%';  // Set iframe width
  iframe.style.height = '620px';  // Set iframe height
  iframe.setAttribute('scrolling', 'yes');
  // Append the iframe to the container
  iframeContainer.appendChild(iframe);