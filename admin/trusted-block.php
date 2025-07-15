
        
        <div class="cta-section1">
    <div class="container">
        <h2 class="cta-title">The PDF Software Trusted by Millions of Users</h2>
        <p class="cta-description1">iLovePDF is your number one web app for editing PDF with ease.
                        Enjoy all the tools you need to work efficiently with your digital documents while keeping your
                        data safe and secure.</p>
        
    </div>
</div>
<style>
    .cta-section1 {
    background: linear-gradient(135deg, #94D5F6, #FFBF00);
    color: white;
    padding: 60px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section1::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('path/to/overlay-pattern.png'); /* Optional: Add an overlay pattern */
    opacity: 0.1;
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 40px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    font-family: "Edu AU VIC WA NT Guides", cursive;
}

.cta-description1 {
    font-size: 1.25rem;
    margin-bottom: 30px;
    max-width: 950px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 50px;
}

.cta-button {
    background-color: #ffffff;
    color: #E5322D;
    padding: 15px 30px;
    border: none;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

.cta-button:hover {
    background-color: #E5322D;
    color: white;
    transform: scale(1.05);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .cta-title {
        font-size: 1rem;
    }
    
    .cta-description1 {
        font-size: 0.7rem;
    }

    .cta-button {
        padding: 12px 24px;
        font-size: 1rem;
    }
}

</style>