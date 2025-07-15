 // Reference the container div
  const iframeContainer = document.getElementById('iframe-container');

  // Create the iframe element
  const iframe = document.createElement('iframe');
  iframe.src = 'https://diffusionart.co/editor/?ez_iframe=1';  // Set the source URL
  iframe.style.width = '100%';  // Set iframe width
  iframe.style.height = '1240px';  // Set iframe height
  iframe.setAttribute('scrolling', 'yes');  // Enable scrolling
  iframe.setAttribute('class', 'iframe-class');  // Add the class
  iframe.setAttribute('frameborder', '0');  // Remove the border

  // Append the iframe to the container
  iframeContainer.appendChild(iframe);