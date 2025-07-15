        async function getVideoComments() {
            var videoUrl = document.getElementById('videoUrl').value;
            var videoId = getYouTubeVideoId(videoUrl);

            if (videoId) {
                // Replace 'YOUR_YOUTUBE_API_KEY' with your actual YouTube Data API key
                var apiKey = 'AIzaSyAjtFd3waoyhiIHZixRX2HAeFXWpiRPxCY';
                var commentsUrl = `https://www.googleapis.com/youtube/v3/commentThreads?videoId=${videoId}&key=${apiKey}&part=snippet`;

                var commentsTableBody = document.querySelector('#commentsTable tbody');
                commentsTableBody.innerHTML = '';

                await fetchAndDisplayComments(commentsUrl, commentsTableBody);
            } else {
                alert('Invalid YouTube video URL.');
            }
        }

        async function fetchAndDisplayComments(url, tableBody) {
            var response = await fetch(url);
            var data = await response.json();

            if (data.items && data.items.length > 0) {
                displayComments(data.items, tableBody);

                // Check for pagination
                if (data.nextPageToken) {
                    var nextPageUrl = `${url}&pageToken=${data.nextPageToken}`;
                    await fetchAndDisplayComments(nextPageUrl, tableBody);
                }
            } else {
                alert('No comments found for the video.');
            }
        }

        function getYouTubeVideoId(url) {
            var videoIdMatch = url.match(/[?&]v=([^?&]+)/);
            return videoIdMatch && videoIdMatch[1] ? videoIdMatch[1] : null;
        }

        function displayComments(comments, tableBody) {
            comments.forEach(comment => {
                var author = comment.snippet.topLevelComment.snippet.authorDisplayName;
                var text = comment.snippet.topLevelComment.snippet.textDisplay;
                var publishedAt = comment.snippet.topLevelComment.snippet.publishedAt;

                var row = `
                    <tr>
                        <td>${author}</td>
                        <td>${text}</td>
                        <td>${new Date(publishedAt).toLocaleString()}</td>
                    </tr>
                `;

                tableBody.innerHTML += row;
            });
        }

        function downloadPdf() {
            var commentsTable = document.querySelector('#commentsTable');
            var tableData = [];
            var headers = [];

            for (var i = 0; i < commentsTable.rows[0].cells.length; i++) {
                headers[i] = commentsTable.rows[0].cells[i].innerHTML.toLowerCase();
            }

            for (var i = 1; i < commentsTable.rows.length; i++) {
                var rowData = {};
                for (var j = 0; j < commentsTable.rows[i].cells.length; j++) {
                    rowData[headers[j]] = commentsTable.rows[i].cells[j].innerHTML;
                }
                tableData.push(rowData);
            }

            generatePdf(tableData);
        }

        function generatePdf(data) {
            var docDefinition = {
                content: [
                    { text: 'YouTube Video Comments', style: 'header' },
                    {
                        table: {
                            headerRows: 1,
                            body: buildTableBody(data),
                        },
                    },
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10],
                    },
                },
            };

            pdfMake.createPdf(docDefinition).download('YouTube_Comments.pdf');
        }

        function buildTableBody(data) {
            var body = [];
            var headers = Object.keys(data[0]);

            body.push(headers);

            data.forEach(function (row) {
                var dataRow = [];

                headers.forEach(function (header) {
                    dataRow.push(row[header]);
                });

                body.push(dataRow);
            });

            return body;
        }