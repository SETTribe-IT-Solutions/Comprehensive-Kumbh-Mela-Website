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
                    <li class="nav-item"><a class="nav-link active" id="nav-home" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-travel" href="travel.php">Travel</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-darshan" href="darshan.html">Darshan</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-health-safety" href="health.html">Health & Safety</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-culture" href="under-construction.html?page=Culture">Culture</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-shop" href="under-construction.html?page=Shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-donate" href="under-construction.html?page=Donate">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-sustainability" href="under-construction.html?page=Sustainability">Sustainability</a></li>
                    <li class="nav-item"><a class="nav-link" id="nav-login" href="under-construction.html?page=Login">Login</a></li>
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
}

.main-header {
    z-index: 1030;
}

.navbar {
    background-color: white !important;
}

.nav-link {
    font-weight: bold;
    padding: 0 1.2rem !important;
}

.nav-link.active, .nav-link:hover {
    color: var(--saffron) !important;
}

/* Dropdown styles */
.dropdown .btn {
    border-color: #ddd;
    color: #000;
    background-color: transparent;
}

.dropdown .btn:hover {
    background-color: #f8f9fa;
    border-color: #ccc;
}

.dropdown-menu {
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.dropdown-item {
    color: #000;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
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
</style>