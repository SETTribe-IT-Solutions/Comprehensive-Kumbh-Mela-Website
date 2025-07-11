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
                    <li class="nav-item"><a class="nav-link" id="nav-culture" href="under-construction.php">Culture</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-shop" href="under-construction.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-donate" href="under-construction.php">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-sustainability" href="under-construction.php">Sustainability</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-login" href="under-construction.php">Login</a></li>
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
:root {
    --saffron: #FF9933;
    --dark-text: #333;
    --white: #ffffff;
}

.logo img { 
    height: 45px; 
}

.main-header {
    z-index: 1030;
}

.navbar {
    background-color: white !important;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.nav-link {
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
}

/* Dropdown styles */
.dropdown .btn {
    border-color: #ddd;
    color: #000;
    background-color: transparent;
    font-weight: 600;
    padding: 0.375rem 0.75rem;
}

.dropdown .btn:hover {
    background-color: #f8f9fa;
    border-color: #ccc;
}

.dropdown-menu {
    border: 1px solid rgba(0,0,0,0.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    padding: 0.5rem 0;
}

.dropdown-item {
    color: #000;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
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

/* Alert ticker styles */
.alert-ticker-container {
    display: flex;
    align-items: center;
    background-color: #800000;
    color: var(--white);
    font-size: 0.9rem;
}

.helpline { 
    padding: 0.15rem 1rem; 
    background-color: #c00; 
    font-weight: bold; 
    white-space: nowrap; 
}

.helpline i { 
    margin-right: 0.5rem; 
}

.ticker-wrap {
    flex-grow: 1;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.ticker {
    display: inline-block;
    white-space: nowrap;
    animation: ticker-scroll 20s linear infinite;
    display: flex;
    align-items: center;
}

.ticker i { 
    color: #FFD700; 
    margin-right: 0.5rem; 
}

.ticker p {
    margin: 0;
    display: flex;
    align-items: center;
    line-height: 1.5;
}

@keyframes ticker-scroll { 
    0% { transform: translateX(100%); } 
    100% { transform: translateX(-100%); } 
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
}
</style>

<script>
// Activate the current nav link based on current page
document.addEventListener('DOMContentLoaded', function() {
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