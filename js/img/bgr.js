 // Reference the container div
      const iframeContainer = document.getElementById('iframe-container');
      // Create the iframe element
      const iframe = document.createElement('iframe');
      iframe.src = 'https://mrbeliever-background-remover.hf.space/?__theme=light'; // Set the source URL
      iframe.ariaLabel = 'Space app'; // Set the aria-label attribute
      iframe.className = 'space-iframe flex-grow overflow-hidden bg-white p-0 outline-none dark:bg-white'; // Add the class name
      iframe.style.border = '0'; // Set the border to 0
      iframe.allow = 'accelerometer; ambient-light-sensor; autoplay; battery; camera; clipboard-read; clipboard-write; display-capture; document-domain; encrypted-media; fullscreen; geolocation; gyroscope; layout-animations; legacy-image-formats; magnetometer; microphone; midi; oversized-images; payment; picture-in-picture; publickey-credentials-get; sync-xhr; usb; vr ; wake-lock; xr-spatial-tracking'; // Set the allow attribute
      iframe.sandbox = 'allow-downloads allow-forms allow-modals allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-storage-access-by-user-activation'; // Set the sandbox attribute
      iframe.scrolling = 'no'; // Disable scrolling
      iframe.style.width = '100%'; // Set iframe width
      iframe.style.height = '1000px'; // Set iframe height
      // Append the iframe to the container
      iframeContainer.appendChild(iframe);