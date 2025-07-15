<footer class="footer-bottom">
    <div class="container">
        <div class="footer-bottom-content">
            <!-- Footer Menu -->
            <div class="footer-menu">
                <ul>
                    <li><a href="https://www.codesterra.com">Developed With 💛 by CodesTerra</a></li>
                    
                </ul>
            </div>
            <!-- Copyright -->
            <div class="copyright">
                <p>&copy; 2024 CodesTerra. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<style>
    .footer-bottom {
    background-color: #2c2c2c;
    padding: 30px 0;
    color: #fff;
    font-family: 'Arial', sans-serif;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.footer-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
}

.footer-menu ul li {
    display: inline-block;
}

.footer-menu ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s ease;
}

.footer-menu ul li a:hover {
    color: #ffbf00;
}

.copyright {
    font-size: 0.9rem;
    text-align: center;
}

@media (max-width: 768px) {
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-menu ul {
        justify-content: center;
        margin-bottom: 10px;
    }
    
    .footer-menu ul li {
        margin-bottom: 10px;
    }
}

</style>