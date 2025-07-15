<div class="features-section">
    <div class="container">
        <h2 class="features-title">Our Features</h2>
        <p class="features-description">Discover the powerful features that make our service unique and efficient.</p>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 1" class="feature-icon" />
                    <h3 class="feature-title">No Signup</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 2" class="feature-icon" />
                    <h3 class="feature-title">100% Free</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 3" class="feature-icon" />
                    <h3 class="feature-title">Fast & Secure</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 4" class="feature-icon" />
                    <h3 class="feature-title">High Quality</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 5" class="feature-icon" />
                    <h3 class="feature-title">No Limits</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-box">
                    <img src="images/pdf1.png" alt="Feature 6" class="feature-icon" />
                    <h3 class="feature-title">Support</h3>
                    <p class="feature-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .features-section {
    background: linear-gradient(to right, #fff, #fff);
    padding: 50px 0;
    position: relative;
    overflow: hidden;
}

.features-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: repeating-linear-gradient(45deg, rgba(242, 230, 235, 0.1), rgba(246, 220, 224, 0.1) 10px, transparent 10px, transparent 20px);
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2;
}

.features-title {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-family: "Edu AU VIC WA NT Guides", cursive;
}

.features-description {
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: 40px;
    color: #555;
}

.feature-box {
    background: white;
    border-radius: 0px;
    padding: 30px 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.feature-icon {
    max-width: 80px; /* Adjust the size as needed */
    margin-bottom: 15px;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 10px 0;
    color: #333;
}

.feature-description {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .features-title {
        font-size: 1.5rem;
    }
    
    .features-description {
        font-size: 1rem;
    }
    
    .feature-box {
        padding: 15px;
    }
}

</style>