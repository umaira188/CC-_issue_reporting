<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Complaint Management System</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-container">
        <img src="{{ asset('Images/CMC-Logo.png') }}" alt="CMC Logo" class="logo">
            <h1 class="title">Colombo Municipal Council</h1>
        </div>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
            </ul>
        </nav>
        <div class="language-selector">
            <span class="language">English</span>
            <span class="language">සිංහල</span>
            <span class="language">தமிழ்</span>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="main-content">
        <h2 class="hero-title">Complaint Management System</h2>
        <p class="hero-description">
            <span class="highlight">E</span>fficient . 
            <span class="highlight">E</span>asy . 
            <span class="highlight">E</span>ffortless
        </p>
        <div class="button-container">
            <a href="{{ route('register') }}" class="btn">Lodge a Complaint</a> 
            <a href="{{ route('complaint.track.form') }}" class="btn">Track a Complaint</a>

        </div>
    </main>

    <!-- Steps to Report an Issue -->
    <section class="steps-section">
        <h2 class="steps-title">How to Report an Issue</h2>
        <div class="steps-container">
            <div class="step-card hidden-content">
                <i class="fas fa-user-circle step-icon"></i>
                <h3 class="step-title">Step 1</h3>
                <p>Sign-in</p>
            </div>
            <div class="step-card hidden-content">
                <i class="fas fa-pencil-alt step-icon"></i>
                <h3 class="step-title">Step 2</h3>
                <p>Describe the issue and provide location details.</p>
            </div>
            <div class="step-card hidden-content">
                <i class="fas fa-upload step-icon"></i>
                <h3 class="step-title">Step 3</h3>
                <p>Upload images for better clarity.</p>
            </div>
            <div class="step-card hidden-content">
                <i class="fas fa-search step-icon"></i>
                <h3 class="step-title">Step 4</h3>
                <p>Track the progress of your complaint.</p>
            </div>
            <div class="step-card hidden-content">
                <i class="fas fa-comments step-icon"></i>
                <h3 class="step-title">Step 5</h3>
                <p>Provide Feedback</p>
            </div>
        </div>
    </section>


    <!-- Footer -->
 <footer class="footer">
    <div class="footer-container">
        <div class="footer-links">
            <h4>Quick Links</h4>
            <a href="#" class="footer-link">Dashboard</a>
            <a href="#" class="footer-link">Lodge a Complaint</a>
            <a href="#" class="footer-link">Track a Complaint</a>
            <a href="#" class="footer-link">Login</a>
        </div>

        <div class="contact-info">
            <h4>Contact Us</h4>
            <p>Email: <a href="mailto:info@cmc.lk" class="footer-link">info@cmc.lk</a></p>
            <p>Phone: <a href="tel:+94112345678" class="footer-link">+94 11 234 5678</a></p>
            <p>Address: Colombo Municipal Council, Colombo 07, Sri Lanka</p>
        </div>

        <div class="social-media-icons">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="#" aria-label="Facebook" class="social-icon">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="#" aria-label="Twitter" class="social-icon">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#" aria-label="LinkedIn" class="social-icon">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="#" aria-label="YouTube" class="social-icon">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <p class="footer-text">&copy; 2025 Colombo Municipal Council. All rights reserved.</p>
</footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hiddenElements = document.querySelectorAll('.hidden-content');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible-content');
                    }
                });
            }, { threshold: 0.1 });
            
            hiddenElements.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>