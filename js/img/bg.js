(function() {
        var iframe = document.createElement('iframe');
        iframe.id = "backgroundEraserIframe"; // Assign an ID to the iframe
        iframe.src = "https://yufistudio-backgrounderaser.hf.space/?__theme=light";
        iframe.width = "100%"; // Set the desired width
        iframe.height = "1200px"; // Set the desired height
        iframe.ariaLabel = "Space app";
        iframe.className = "space-iframe flex-grow overflow-hidden bg-white p-0 outline-none dark:bg-white";
        iframe.style.border = "0px solid #ccc"; // Add border style
        iframe.allow = "accelerometer; ambient-light-sensor; autoplay; battery; camera; clipboard-read; clipboard-write; display-capture; document-domain; encrypted-media; fullscreen; geolocation; gyroscope; layout-animations; legacy-image-formats; magnetometer; microphone; midi; oversized-images; payment; picture-in-picture; publickey-credentials-get; sync-xhr; usb; vr ; wake-lock; xr-spatial-tracking";
        iframe.sandbox = "allow-downloads allow-forms allow-modals allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-storage-access-by-user-activation";
        iframe.scrolling = "no";

        // Append the iframe to a specific container
        document.getElementById('iframe-container').appendChild(iframe);
    })();