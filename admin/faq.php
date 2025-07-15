<div class="faq-section">
    <h2 class="faq-heading">Frequently Asked Questions</h2>
    
    <div class="faq-item">
        <button class="faq-question">What is CodesTerra?</button>
        <div class="faq-answer">
            <p>CodesTerra is the world's No.1 web and app development firm, delivering innovative digital solutions.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">What services does CodesTerra offer?</button>
        <div class="faq-answer">
            <p>We specialize in web development, app development, AI-powered tools, eCommerce solutions, and more.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">How can I contact CodesTerra?</button>
        <div class="faq-answer">
            <p>You can contact us through our website or by emailing us directly at support@codesterra.com.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">Do you provide custom solutions?</button>
        <div class="faq-answer">
            <p>Yes, we offer tailored solutions to meet the specific needs of our clients across various industries.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">What is your project delivery time?</button>
        <div class="faq-answer">
            <p>Our delivery time varies depending on the project’s complexity, but we aim for the fastest turnaround possible.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">Do you offer maintenance services?</button>
        <div class="faq-answer">
            <p>Yes, we provide ongoing support and maintenance to ensure your project continues to function optimally.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">Can I get a free consultation?</button>
        <div class="faq-answer">
            <p>We offer a free initial consultation to discuss your project requirements and how we can assist you.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">What industries do you serve?</button>
        <div class="faq-answer">
            <p>We serve clients in various industries including tech, healthcare, finance, education, and retail.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">What technologies do you specialize in?</button>
        <div class="faq-answer">
            <p>We specialize in a wide range of technologies including PHP, JavaScript, Python, AI, and WordPress.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">How do I start a project with CodesTerra?</button>
        <div class="faq-answer">
            <p>You can start by reaching out through our website, providing details about your project, and we'll guide you from there.</p>
        </div>
    </div>
</div>
<style>
  /* FAQ Section Styles */
.faq-section {
    max-width: 100%;
    margin: 0 auto;
    padding: 50px 120px;
    background-color: #f9f9f9;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

.faq-heading {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-family: "Edu AU VIC WA NT Guides", cursive;
}

.faq-item {
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
    position: relative;
}

.faq-question {
    background-color: transparent;
    border: none;
    font-size: 1.2rem;
    font-weight: 600;
    text-align: left;
    color: #535252;
    cursor: pointer;
    padding: 10px;
    width: 100%;
    transition: all 0.3s;
    outline: none;
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-question::after {
    content: '+';
    font-size: 1.5rem;
    color: #007bff;
    transition: transform 0.3s;
}

.faq-question.active::after {
    content: '-';
    color: #0056b3;
}

.faq-question:hover {
    color: #0056b3;
}

.faq-answer {
    display: none;
    font-size: 1rem;
    color: #555;
    padding: 10px;
    line-height: 1.6;
}

.faq-answer p {
    margin: 0;
}

.faq-question.active + .faq-answer {
    display: block;
}

@media (max-width: 768px) {
    .faq-section {
        padding: 15px;
    }
    
    .faq-heading {
        font-size: 1.8rem;
    }
    
    .faq-question {
        font-size: 1.1rem;
    }
}

</style>

<script>
   const faqQuestions = document.querySelectorAll('.faq-question');

faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
        const isActive = question.classList.contains('active');
        
        // Close all other open FAQ items
        faqQuestions.forEach(q => q.classList.remove('active'));
        document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
        
        // Toggle the clicked item
        if (!isActive) {
            question.classList.add('active');
            question.nextElementSibling.style.display = 'block';
        }
    });
});


</script>