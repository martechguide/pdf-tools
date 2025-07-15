 function findImages() {
            var API_KEY = '8989418-894ffe1845b8c491405d5fe26';
            var searchQuery = encodeURIComponent(document.getElementById('searchInput').value);
            var URL = "https://pixabay.com/api/?key=" + API_KEY + "&q=" + searchQuery;

            // Show loader
            $('.custom-loader').show();

            // Make API call
            $.getJSON(URL, function (data) {
                // Hide loader
                $('.custom-loader').hide();

                // Display results
                var resultsContainer = $('#results');
                resultsContainer.empty();

                if (parseInt(data.totalHits) > 0) {
                    $.each(data.hits.slice(0, 28), function (i, hit) {
                        var resultHtml = '<div class="result">';
                        resultHtml += '<img src="' + hit.previewURL + '" alt="Image">';
                        resultHtml += '<a href="' + hit.largeImageURL + '" class="download-button" download="' + hit.user + '_' + hit.id + '">Download Image</a>';
                        resultHtml += '</div>';
                        resultsContainer.append(resultHtml);
                    });
                } else {
                    resultsContainer.text('No hits');
                }
            });
        }