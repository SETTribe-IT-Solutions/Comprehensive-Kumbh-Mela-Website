<?php
// header.php - Merged header and navbar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumbh Mela 2027 - Nashik</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
    :root {
        --saffron: #FF9933;
        --sky-blue: #87CEEB;
        --white: #FFFFFF;
        --dark-text: #333333;
        --font-heading: 'Montserrat', sans-serif;
        --font-body: 'Poppins', sans-serif;
    }
    
    body {
        font-family: var(--font-body);
        color: var(--dark-text);
        padding-top: 80px; /* For fixed navbar */
        margin: 0;
  padding: 0;
  
    }
    
    /* ========== NAVBAR STYLES ========== */
    .main-header {
        z-index: 1030;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .custom-navbar {
        padding: 0.5rem 0;
    }
    
    .logo img {
        height: 50px;
        transition: transform 0.3s ease;
    }
    
    .logo:hover img {
        transform: scale(1.05);
    }
    
    .nav-link {
        font-family: var(--font-heading);
        font-weight: 700 !important; /* Made text bold */
        padding: 0.5rem 1.2rem !important;
        position: relative;
        color: var(--dark-text) !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .nav-link.active {
        color: var(--saffron) !important;
    }
    
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1.2rem;
        width: calc(100% - 2.4rem);
        height: 3px;
        background: var(--saffron);
    }
    
    .nav-link:hover {
        color: var(--saffron) !important;
    }
    
    /* Dropdown styles */
    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .dropdown-item.active {
        background-color: rgba(255, 153, 51, 0.1);
        color: var(--saffron) !important;
        font-weight: 600;
    }
    
    @media (max-width: 991.98px) {
        .navbar-collapse {
            padding: 1rem 0;
        }
        .nav-link {
            padding: 0.5rem 1rem !important;
        }
    }
    </style>
</head>
<body>

<header class="main-header sticky-top">
    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-navbar">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <img src="assets/images/logo.png" alt="Kumbh Mela 2027 Logo" class="img-fluid">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                    $nav_links = [
                        'index.php' => 'Home',
                        'travel.php' => 'Travel',
                        'darshan.php' => 'Darshan',
                        'health.php' => 'Health & Safety',
                        'culture.php' => 'Culture',
                        'shop.php' => 'Shop',
                        'donate.php' => 'Donate',
                        'sustainability.php' => 'Sustainability'
                    ];
                    
                    foreach ($nav_links as $url => $title) {
                        $active_class = ($current_page === $url) ? 'active' : '';
                        echo '<li class="nav-item">
                                <a class="nav-link '.$active_class.'" href="'.$url.'">'.$title.'</a>
                              </li>';
                    }
                    ?>
                </ul>
                
                <div class="dropdown ms-lg-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-translate"></i> Language
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item lang-option <?= ($_SESSION['lang'] ?? 'en') === 'en' ? 'active' : '' ?>" href="#" data-lang="en">English</a></li>
                        <li><a class="dropdown-item lang-option <?= ($_SESSION['lang'] ?? 'en') === 'hi' ? 'active' : '' ?>" href="#" data-lang="hi">हिन्दी</a></li>
                        <li><a class="dropdown-item lang-option <?= ($_SESSION['lang'] ?? 'en') === 'mr' ? 'active' : '' ?>" href="#" data-lang="mr">मराठी</a></li>
                        <li><a class="dropdown-item lang-option <?= ($_SESSION['lang'] ?? 'en') === 'sa' ? 'active' : '' ?>" href="#" data-lang="sa">संस्कृत</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- JavaScript for active link and language switcher -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Language switcher
    document.querySelectorAll('.lang-option').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            fetch('set_language.php?lang=' + lang)
                .then(() => window.location.reload());
        });
    });
    
    // Mobile menu collapse after click
    const navLinks = document.querySelectorAll('.nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });
                bsCollapse.hide();
            }
        });
    });
});
</script>