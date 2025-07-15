<div class="footer-main">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            <!-- Left Column (Logo & About) - 40% -->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0">
                <div class="footer-main__title">Your PDF ToolKit</div>
                <img src="https://bg.codesterra.com/assets/img/ilovepdf.svg" alt="iLovePDF Logo" class="footer-logo" />
                <p class="footer-about">
                    We are an all-in-one solution for all your PDF needs, helping millions of users to manage their documents easily.
                </p>
            </div>
            <!-- Middle Column (Product) - 30% -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="footer-main__title">Pages</div>
                <ul class="footer-main__nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about.php">About Us</a></li>
                    <li><a href="/contact.php">Contact Us</a></li>
                </ul>
            </div>
            <!-- Right Column (Company) - 30% -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="footer-main__title">Legal</div>
                <ul class="footer-main__nav">
                    <li><a href="/terms.php">Terms of Use</a></li>
                    <li><a href="/privacy.php">Privacy Policy</a></li>
                    <li><a href="/disclaimer.php">Disclaimer</a></li>
                    <li><a href="/sitemap.xml">Sitemaps</a></li>
                    
                </ul>
            </div>
        </div>
        
    </div>
</div>

<style>
   .footer-main {
     background-color: #F6DCE0; /* Optional background color */
    background-image: 
        linear-gradient(transparent 95%, rgba(255, 255, 255, 0.2) 5%), 
        linear-gradient(90deg, transparent 95%, rgba(255, 255, 255, 0.2) 5%);
    background-size: 20px 20px; /* Adjusts the size of the grid lines */
    background-position: center;
    padding: 50px 0;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
}

.footer-main__title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    color: #333;
    font-family: "Edu AU VIC WA NT Guides", cursive;
}

.footer-logo {
    max-width: 100px; /* Adjust the size as needed */
    margin-bottom: 15px;
}

.footer-about {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

.footer-main__nav {
    list-style: none;
    padding-left: 0;
}

.footer-main__nav li {
    margin-bottom: 10px;
}

.footer-main__nav a {
    text-decoration: none;
    color: #535252;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.footer-main__nav a:hover {
    color: #0056b3;
}

.separator {
    border-top: 1px solid #ddd;
    margin-top: 30px;
    margin-bottom: 20px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-main {
        text-align: center;
    }
    .footer-main__title {
        font-size: 1.3rem;
    }
    .footer-about {
        margin-bottom: 30px;
    }
}

</style>