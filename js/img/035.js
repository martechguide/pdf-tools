 const apiKey = 'AIzaSyAP8m3Vwt5_5vq8a45AeZ7l2yjdu_dDrxY'; // Replace with your actual API key

        async function downloadChannelLogo() {
            const channelIdInput = document.getElementById('channelId');
            const channelId = channelIdInput.value;

            if (channelId) {
                const apiUrl = `https://www.googleapis.com/youtube/v3/channels?part=snippet&id=${channelId}&key=${apiKey}`;

                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();

                    if (data.items && data.items.length > 0) {
                        const logoUrl = data.items[0].snippet.thumbnails.high.url;
                        displayLogo(logoUrl);
                    } else {
                        alert('Unable to retrieve channel information.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            } else {
                alert('Channel ID is required.');
            }
        }

        function displayLogo(logoUrl) {
            const canvas = document.getElementById('logoCanvas');
            const context = canvas.getContext('2d');
            
            const img = new Image();
            img.crossOrigin = 'anonymous'; // Enable cross-origin resource sharing
            img.onload = function() {
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.drawImage(img, 0, 0, canvas.width, canvas.height);
            };
            img.src = logoUrl;
        }

        function downloadAsPNG() {
            const canvas = document.getElementById('logoCanvas');
            const dataUrl = canvas.toDataURL('image/png');
            
            const a = document.createElement('a');
            a.href = dataUrl;
            a.download = 'channel_logo.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }