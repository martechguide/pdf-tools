<div id="post-header" class="post-header"></div>

<div class="bg-main-1 text-white">
    <div class="container col-xxl-8 pt-0 pt-sm-0 pb-0 pb-sm-0 hero-small">
        <div class="row align-items-center">
            <!-- Left Side (Text) - 60% -->
            <div class="col-12 col-md-6 text-section">
                <h1 class="display-5 fw-bold lh-1 mb-3 text-white" style="line-height:1.25em">All-in-One <br><span>Online PDF Tools</span></h1>
                <p class="lead mb-0 pt-100">Every tool you need to use PDFs, at your fingertips. All are 100% FREE and easy to use! Merge, split, compress, convert, rotate, unlock and watermark PDFs with just a few clicks.</p>
            </div>

            <!-- Right Side (Image) - 40% -->
            <div class="col-12 col-md-6 image-section">
                <img src="images/101.png" alt="Online PDF Tools" class="img-fluid" />
            </div>
        </div>
    </div>
</div>

<style>
    /* General Styles */
.bg-main-1 {
    padding: 5rem 0 2rem 0;
    background-color: #E5322D; /* Optional background color */
    background-image: 
        linear-gradient(transparent 95%, rgba(255, 255, 255, 0.2) 5%), 
        linear-gradient(90deg, transparent 95%, rgba(255, 255, 255, 0.2) 5%);
    background-size: 20px 20px; /* Adjusts the size of the grid lines */
    background-position: center;
}


/* General Styles for H1 */
.text-section h1 {
    font-family: "Caveat", cursive;
    font-weight: 700; /* Bold font for main title */
    font-size: 2.5rem; /* Adjust as needed for overall heading */
    line-height: 1.55em;
    color:white;
}

/* Styling for Span within H1 */
.text-section h1 span {
    color: #f1f1f1; /* Highlight color */
    font-family: "Archivo", sans-serif;
    font-size: 50px; /* Font size as requested */
    font-weight: 500; /* Bold weight for emphasis */
    font-family: "Edu AU VIC WA NT Guides", cursive;
    font-style: normal;
}


.text-section {
    padding-right: 2rem; /* Adds spacing for text */
}

.lead {
    font-size: 1.125rem;
    margin-top: 1rem;
    color:white;
    font-family: "Archivo", sans-serif;
}

/* Ensure image scales properly */
.image-section img {
    width: 100%;
    height: auto;
    max-height: 400px; /* Optional to limit image height */
    object-fit: cover;
}

/* 60/40 Split Layout */
@media (min-width: 768px) {
    .text-section {
        flex: 0 0 60%;
        max-width: 60%;
    }

    .image-section {
        flex: 0 0 40%;
        max-width: 40%;
    }
}

/* Responsive Styles */
@media (max-width: 768px) {
    .text-section, .image-section {
        flex: 0 0 100%;
        max-width: 100%;
        text-align: center; /* Center text for smaller screens */
    }

    .image-section {
        margin-top: 2rem;
    }

    .lead {
        font-size: 1rem;
    }

    h1.display-5 {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    h1.display-5 {
        font-size: 1.75rem;
    }

    .lead {
        font-size: 0.9rem;
    }
}

</style>