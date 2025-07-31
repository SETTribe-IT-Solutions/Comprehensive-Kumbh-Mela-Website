<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumbh Mela 2027 - Nashik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css?v=215">
    
    <script src="js/main.js?v=209"></script>

    <style>
    /* ================== GLOBAL VARIABLES & FONT LOADING ================== */
    :root {
        --saffron: #FF9933;
        --sky-blue: #87CEEB;
        --white: #FFFFFF;
        --dark-text: #333333;
        --light-bg: #eef5f9;
        --font-heading: 'Montserrat', sans-serif;
        --font-body: 'Poppins', sans-serif;
    }
    
    /* Font face definitions to prevent FOUT (Flash of Unstyled Text) */
    body { 
        font-family: var(--font-body);
        color: var(--dark-text);
        /* Fallback font while Poppins loads */
        font-display: swap;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-heading);
        font-display: swap;
    }
    </style>
</head>
<body>
<header class="main-header sticky-top shadow-sm">
    <nav class="navbar navbar-expand-lg bg-white custom-navbar">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <img src="assets/images/logo.png" alt="Kumbh Mela 2027 Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" id="nav-home" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-travel" href="travel.php">Travel</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-darshan" href="darshan.php">Darshan</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-health-safety" href="health.php">Health & Safety</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-culture" href="culture.php?v=1">Culture</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-shop" href="shop.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-donate" href="donate.php">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-sustainability" href="sustainability.php">Sustainability</a></li>

                    <?php if (isset($_SESSION['user'])): ?>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="bi bi-person-circle me-2"></i>
      Hi, <?= htmlspecialchars($_SESSION['user']['fullname']) ?>
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
    </ul>
  </li>
<?php else: ?>
  <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
<?php endif; ?>

                </ul>

                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Choose Language
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item lang-option active" href="#" data-lang="en">English</a></li>
                        <li><a class="dropdown-item lang-option" href="#" data-lang="hi">हिन्दी</a></li>
                        <li><a class="dropdown-item lang-option" href="#" data-lang="mr">मराठी</a></li>
                        <li><a class="dropdown-item lang-option" href="#" data-lang="sa">संस्कृत</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    
</header>

<style>
/* ================== NAVBAR STYLES ================== */
.logo img { 
    height: 45px; 
    transition: transform 0.3s ease;
}

.logo:hover img {
    transform: scale(1.05);
}

.main-header {
    z-index: 1030;
}

.navbar {
    background-color: white !important;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.nav-link {
    font-family: var(--font-body);
    font-weight: 600;
    padding: 0.5rem 1.2rem !important;
    color: var(--dark-text) !important;
    position: relative;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: var(--saffron) !important;
}

.nav-link.active {
    color: var(--saffron) !important;
    font-weight: 700;
}

.nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 1.2rem;
    right: 1.2rem;
    height: 2px;
    background-color: var(--saffron);
    border-radius: 2px;
    transition: all 0.3s ease;
}

/* Dropdown styles */
.dropdown .btn {
    font-family: var(--font-body);
    border-color: #ddd;
    color: #000;
    background-color: transparent;
    font-weight: 600;
    padding: 0.375rem 0.75rem;
    transition: all 0.3s ease;
}

.dropdown .btn:hover {
    background-color: #f8f9fa;
    border-color: #ccc;
}

.dropdown-menu {
    font-family: var(--font-body);
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    padding: 0.5rem 0;
}

.dropdown-item {
    font-family: var(--font-body);
    color: #000;
    transition: all 0.2s ease-in-out;
    padding: 0.5rem 1.5rem;
    font-weight: 500;
}

.dropdown-item:hover {
    background-color: #FFF8E1;
    color: var(--dark-text);
}

.dropdown-item.active {
    font-weight: 700;
    color: var(--saffron) !important;
    background-color: transparent;
}

.dropdown-item.active::before {
    content: '\F26E';
    font-family: 'bootstrap-icons';
    margin-right: 0.5rem;
    color: var(--saffron);
}


/* Responsive adjustments */
@media (max-width: 991.98px) {
    .navbar-collapse {
        padding-top: 1rem;
    }
    
    .nav-link {
        padding: 0.5rem 1rem !important;
    }
    
    .nav-link.active::after {
        left: 1rem;
        right: 1rem;
    }
    
    .dropdown {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    
    .alert-ticker-container {
        flex-direction: column;
    }
    
    .helpline {
        width: 100%;
        text-align: center;
    }
}
</style>

<script>
// Activate the current nav link based on current page
document.addEventListener('DOMContentLoaded', function() {
    // Preload fonts to prevent FOUT
    if (typeof FontFaceObserver !== 'undefined') {
        const poppins = new FontFaceObserver('Poppins');
        const montserrat = new FontFaceObserver('Montserrat');
        
        Promise.all([
            poppins.load(),
            montserrat.load()
        ]).then(function() {
            document.documentElement.classList.add('fonts-loaded');
        });
    }
    
    // Get current page URL
    const currentUrl = window.location.pathname.split('/').pop() || 'index.php';
    
    // Remove 'active' class from all nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    
    // Add 'active' class to current page nav link
    let currentLink = document.querySelector(`.nav-link[href="${currentUrl}"]`);
    
    // For pages with query parameters
    if (!currentLink && window.location.search) {
        const pageParam = new URLSearchParams(window.location.search).get('page');
        if (pageParam) {
            currentLink = document.querySelector(`.nav-link[href*="page=${pageParam}"]`);
        }
    }
    
    // Fallback for home page
    if (!currentLink && (currentUrl === '' || currentUrl === 'index.php' || currentUrl === 'index.html')) {
        currentLink = document.querySelector('.nav-link[href="index.php"]');
    }
    
    if (currentLink) {
        currentLink.classList.add('active');
    }
});
</script>
