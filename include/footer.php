<footer class="kumbh-footer bg-dark text-white pt-5 pb-4">
  <div class="container">
    <div class="row g-4">
      <!-- Contact Info (Full width on mobile, half on larger screens) -->
      <div class="col-lg-3 col-md-6 footer-column">
        <h5 class="footer-heading">
          <i class="bi bi-telephone me-2 text-saffron"></i>Contact Info
        </h5>
        <address class="footer-address">
          <p class="mb-2 d-flex align-items-start">
            <i class="bi bi-building me-2 text-saffron"></i>
            <span>
              Directorate of Tourism, Maharashtra
            </span>
          </p>
          <p class="mb-2 d-flex align-items-start">
            <i class="bi bi-bank me-2 text-saffron"></i>
              <span>Madhya Kshetra, Maharashtra Tourism Development Corporation</span><br>
          </p>
          <p class="mb-2 d-flex align-items-start">
            <i class="bi bi-geo-alt me-2 text-saffron mt-1"></i>
            <span>
              C-20, MIDC, Nashik Road Nashik, Maharashtra 422101<br>
            </span>
          </p>
          <p class="mb-0 d-flex align-items-start">
            <i class="bi bi-envelope me-2 text-saffron mt-1"></i>
            <a href="mailto:info@kumbhmela2027.gov.in" class="text-white">
              info@kumbhmela2027.gov.in
            </a>
          </p>
        </address>
      </div>

      <!-- Quick Links, Share, and Policies Group -->
      <div class="col-lg-9 col-md-6">
        <div class="row g-4">
          <!-- Quick Links -->
          <div class="col-md-4 footer-column">
            <h5 class="footer-heading"><i class="bi bi-lightning-charge me-2 text-saffron"></i>Quick Links</h5>
            <ul class="footer-links">
              <li><a href="travel.php"><i class="bi bi-newspaper me-2"></i>Travel</a></li>
              <li><a href="darshan.php"><i class="bi bi-envelope-paper me-2"></i>Darshan</a></li>
              <li><a href="health.php"><i class="bi bi-map me-2"></i>Health & Safety</a></li>
              <li><a href="culture.php"><i class="bi bi-cloud-sun me-2"></i>Culture</a></li>
              <li><a href="shop.php"><i class="bi bi-file-earmark-pdf me-2"></i>Shop</a></li>
              <li><a href="donate.php"><i class="bi bi-patch-question me-2"></i>Donate</a></li>
              <li><a href="sustainability.php"><i class="bi bi-tree me-2"></i>Sustainability</a></li>
            </ul>
          </div>

          <!-- Share -->
          <div class="col-md-4 footer-column">
            <h5 class="footer-heading"><i class="bi bi-share me-2 text-saffron"></i>Share</h5>
            <ul class="footer-links">
              <li><a href="#"><i class="bi bi-images me-2"></i>Photo Gallery</a></li>
              <li><a href="#"><i class="bi bi-film me-2"></i>Video Gallery</a></li>
              <!-- Social Media Links can be added here
              <li><a href="#"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
              <li><a href="#"><i class="bi bi-twitter me-2"></i>Twitter</a></li>
              <li><a href="#"><i class="bi bi-instagram me-2"></i>Instagram</a></li> -->
            </ul>
          </div>

          <!-- Policies -->
          <div class="col-md-4 footer-column">
            <h5 class="footer-heading"><i class="bi bi-file-earmark-text me-2 text-saffron"></i>Policies</h5>
            <ul class="footer-links">
              <li><a href="#"><i class="bi bi-file-text me-2"></i>Terms & Conditions</a></li>
              <li><a href="#"><i class="bi bi-c-circle me-2"></i>Copyright Policy</a></li>
              <li><a href="#"><i class="bi bi-shield-lock me-2"></i>Privacy Policy</a></li>
              <li><a href="#"><i class="bi bi-people me-2"></i>Accessibility</a></li>
              <li><a href="#"><i class="bi bi-exclamation-triangle me-2"></i>Disclaimer</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <hr class="footer-divider my-4">

    <div class="row">
      <div class="col-md-6 footer-credits-col">
        <div class="credits">
          <p class="mb-1"><i class="bi bi-info-circle me-2 text-sky-blue"></i>This is the official website of Kumbh Mela 2027, Nashik.</p>
          <p class="mb-2 lh-base">
            <i class="bi bi-file-earmark-text me-2 text-sky-blue"></i>Content on this website is published and managed by Directorate of Tourism, Maharashtra.
          </p>
          <p class="mb-0">
            <a href="https://settribe.com/" target="_blank" class="text-decoration-underline text-sky-blue">
              <i class="bi bi-code-square me-2"></i>Developed & Maintained by SETTribe.
            </a>
          </p>
        </div>
      </div>
      <div class="col-md-6 text-md-end footer-visitor-col">
        <div class="d-flex align-items-center h-100 justify-content-md-end visitor-counter-wrapper">
          <p class="mb-0 visitor-counter">
            <i class="bi bi-eye-fill me-2 text-saffron"></i>Visitor No.: <span id="visitor-counter">800,008,358,413</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<!-- STYLES -->
<style>
  .kumbh-footer {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
    url('assets/images/footer-bg2.png') no-repeat center center/cover !important;
    background-attachment: fixed;
    font-family: 'Poppins', sans-serif;
  }

  .footer-heading {
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    margin-bottom: 1.2rem;
    color: #FF9933;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
  }

  .text-saffron { color: #FF9933; }
  .text-sky-blue { color: #87CEEB; }

  .footer-links {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
  }

  .footer-links li {
    margin-bottom: 0.6rem;
  }

  .footer-links a {
    color: #d1d1d1 !important;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.95rem;
  }

  .footer-links a i {
    min-width: 20px;
    transition: all 0.3s ease;
  }

  .footer-links a:hover {
    color: #FF9933 !important;
    transform: translateX(5px);
  }

  .footer-links a:hover i {
    color: #FF9933;
  }

  .footer-address {
    font-style: normal;
    line-height: 1.6;
    color: #d1d1d1;
    font-size: 0.95rem;
  }

  .footer-address a {
    color: #87CEEB !important;
    text-decoration: underline;
    transition: all 0.3s ease;
  }

  .footer-address a:hover {
    color: #FF9933 !important;
    text-decoration: none;
  }

  .address-indent {
    margin-left: 1.75rem;
    display: inline-block;
  }

  .visitor-counter {
    font-size: 1.1rem;
    font-weight: 500;
    color: #d1d1d1;
  }

  #visitor-counter {
    font-weight: 700;
    color: #FF9933;
    letter-spacing: 0.5px;
  }

  .credits {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #d1d1d1;
  }

  .credits a {
    transition: all 0.3s ease;
  }

  .credits a:hover {
    color: #FF9933 !important;
  }

  .footer-divider {
    border-color: rgba(255, 153, 51, 0.2);
  }

  /* ========== RESPONSIVE STYLES ========== */
  @media (max-width: 991.98px) {
    .footer-column {
      margin-bottom: 1.5rem;
    }
    
    .footer-heading {
      margin-bottom: 1rem;
    }
  }

  @media (max-width: 767.98px) {
    .kumbh-footer {
      background-attachment: scroll !important;
      padding-top: 3rem !important;
      padding-bottom: 2rem !important;
    }
    
    /* Stack the link groups on mobile */
    .col-lg-9 > .row > [class^="col-"] {
      width: 100%;
      max-width: 100%;
      flex: 0 0 100%;
    }
    
    .footer-heading {
      justify-content: flex-start;
      margin-top: 1rem;
    }

    .footer-links a {
      justify-content: flex-start;
    }

    .footer-address p {
      justify-content: flex-start !important;
      text-align: left;
    }
    
    .visitor-counter-wrapper {
      justify-content: flex-start !important;
      margin-top: 1rem;
    }
  }

  @media (max-width: 575.98px) {
    .footer-heading {
      font-size: 1rem;
    }
    
    .footer-links a,
    .footer-address {
      font-size: 0.9rem;
    }
    
    .visitor-counter {
      font-size: 1rem;
    }
    
    .credits {
      font-size: 0.85rem;
    }
  }
</style>

<!-- SCRIPT -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Visitor counter animation

    const counter = document.getElementById('visitor-counter');
    if (counter) {
      let current = parseInt(counter.textContent.replace(/,/g, ''));
      const target = current + Math.floor(Math.random() * 1000);
      const increment = Math.ceil((target - current) / 100);

      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          clearInterval(timer);
          counter.textContent = target.toLocaleString();
        } else {
          counter.textContent = current.toLocaleString();
        }
      }, 50);
    }
  });
</script>
<!-- ... your entire existing <footer> code is above this ... -->

