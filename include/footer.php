<footer class="kumbh-footer bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <!-- Column 1: Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading"><i class="bi bi-telephone me-2"></i>Contact Info</h5>
                <address class="footer-address">
                    <p class="mb-2">
                        <i class="bi bi-building me-2 text-saffron"></i>Directorate of Tourism, Maharashtra<br>
                        <span class="ms-4">Madhya Kshetra, Maharashtra Tourism</span><br>
                        <span class="ms-4">Development Corporation</span>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-geo-alt me-2 text-saffron"></i>C-20, MIDC, Nashik Road<br>
                        <span class="ms-4">Nashik, Maharashtra 422101</span>
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-envelope me-2 text-saffron"></i>
                        <a href="mailto:info@kumbhmela2027.gov.in" class="text-white">info@kumbhmela2027.gov.in</a>
                    </p>
                </address>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading"><i class="bi bi-lightning-charge me-2"></i>Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="travel.php" class="text-white"><i class="bi bi-newspaper me-2"></i>Travel</a></li>
                    <li><a href="darshan.php" class="text-white"><i class="bi bi-envelope-paper me-2"></i>Darshan</a></li>
                    <li><a href="health.php" class="text-white"><i class="bi bi-map me-2"></i>Health & Safety</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-cloud-sun me-2"></i>Culture</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-file-earmark-pdf me-2"></i>Shop</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-patch-question me-2"></i>Donate</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-tree me-2"></i>Sustainability</a></li>
                </ul>
            </div>

            <!-- Column 3: Share -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading"><i class="bi bi-share me-2"></i>Share</h5>
                <ul class="footer-links">
                    <li><a href="#" class="text-white"><i class="bi bi-images me-2"></i>Photo Gallery</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-film me-2"></i>Video Gallery</a></li>
                </ul>
            </div>

            <!-- Column 4: Policies -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading"><i class="bi bi-file-earmark-text me-2"></i>Policies</h5>
                <ul class="footer-links">
                    <li><a href="#" class="text-white"><i class="bi bi-file-text me-2"></i>Terms & Conditions</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-c-circle me-2"></i>Copyright Policy</a></li>
                    <li><a href="#" class="text-white"><i class="bi bi-shield-lock me-2"></i>Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider my-4">

        <div class="row">
            <!-- CREDITS SECTION NOW IN FIRST COLUMN -->
            <div class="col-md-6">
                <div class="credits">
                    <p class="mb-1"><i class="bi bi-info-circle me-2 text-sky-blue"></i>This is the official website of Kumbh Mela 2027, Nashik.</p>
                    </p>
                        <p class="mb-2 lh-base">
                            <i class="bi bi-file-earmark-text me-2 text-sky-blue"></i>Content on this website is published and managed by Directorate of Tourism, Maharashtra.
                        </p>
                    <p class="mb-0">
                        <a href="https://settribe.com/" target="_blank" class="text-decoration-underline text-sky-blue">
                            <i class="bi bi-code-square me-2"></i>Developed & Maintained by SETTribe
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- VISITOR COUNTER NOW IN SECOND COLUMN -->
            <div class="col-md-6 text-md-end">
                <div class="d-flex align-items-center h-100 justify-content-md-end">
                    <p class="mb-0 visitor-counter">
                        <i class="bi bi-eye-fill me-2 text-saffron"></i>Visitor No.: <span id="visitor-counter">800,008,358,413</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* ================== FOOTER STYLES ================== */
    .kumbh-footer {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
            url('assets/images/footer-bg2.png') no-repeat center center/cover !important;
        font-family: 'Poppins', sans-serif;
        background-attachment: fixed;
    }
    
    /* VISITOR COUNTER STYLING */
    .visitor-counter {
        font-size: 1.1rem;
        font-weight: 500;
    }
    
    #visitor-counter {
        font-weight: 700;
        color: #FF9933;
        letter-spacing: 0.5px;
    }
    
    /* CREDITS SECTION */
    .credits {
        font-size: 0.95rem;
        line-height: 1.6;
    }
    
    
    /* REST OF YOUR STYLES REMAIN THE SAME */
    .text-saffron { color: #FF9933; }
    .text-sky-blue { color: #87CEEB; }
    
    .footer-heading {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        margin-bottom: 1.2rem;
        color: #FF9933;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .footer-links {
        list-style: none;
        padding-left: 0;
    }
    
    .footer-links li {
        margin-bottom: 0.6rem;
    }
    
    .footer-links a {
        color: #d1d1d1 !important;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }
    
    .footer-links a:hover {
        color: #FF9933 !important;
        padding-left: 5px;
    }
    
    .footer-address {
        font-style: normal;
        line-height: 1.6;
        color: #d1d1d1;
    }
    
    .footer-address a {
        color: #87CEEB !important;
        text-decoration: underline;
    }
    
    @media (max-width: 992px) {
        /* Adjusted spacing for tablet view */
        .footer-links li {
            margin-bottom: 0.5rem;
        }
    }
    
    @media (max-width: 768px) {
        /* Mobile adjustments */
        .footer-heading {
            margin-top: 1.25rem;
            font-size: 1.1rem;
        }
        
        .footer-links a {
            padding-left: 0 !important;
            font-size: 0.9rem;
        }
    }
    </style>

    <script>
    // Visitor counter animation
    document.addEventListener('DOMContentLoaded', function() {
        const counter = document.getElementById('visitor-counter');
        let current = parseInt(counter.textContent.replace(/,/g, ''));
        const target = current + Math.floor(Math.random() * 1000);
        const increment = Math.floor((target - current) / 100);
        
        const timer = setInterval(() => {
            current += increment;
            counter.textContent = current.toLocaleString();
            if (current >= target) {
                clearInterval(timer);
                counter.textContent = target.toLocaleString();
            }
        }, 50);
    });
    </script>
</footer>


<!-- ... your entire existing <footer> code is above this ... -->
</footer>

<!-- ================== LIGHTBOX & SCRIPT TAGS (Loaded on every page) ================== -->

<div id="lightbox">
    <span class="lightbox-close">×</span>
    <img class="lightbox-content" id="lightbox-img">
    <div class="lightbox-video-container" id="lightbox-video"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js?" defer></script> <!-- Use your latest version number -->

</body>
</html>