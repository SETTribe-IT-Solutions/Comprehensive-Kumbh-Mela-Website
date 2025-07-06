<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; ?>

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
    <!-- This new link imports Montserrat (for headings) and Poppins (for body) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=71">
</head>
<body>

    

    <!-- ALERTS TICKER -->
    <div class="alert-ticker-container">
        <div class="helpline"><i class="bi bi-telephone-fill"></i> <span id="helpline-text">Emergency Helpline: +91-123-456-7890</span></div>
        <div class="ticker-wrap"><div class="ticker"><p><i class="bi bi-exclamation-triangle-fill"></i> <span id="alert-text">ALERT: Please follow all safety guidelines. Beware of unauthorized agents.</span></p></div></div>
    </div>

    <main>
        <!-- HERO BANNER -->
        <section id="hero">
            <div class="hero-overlay"></div>
            <div class="hero-content text-center text-white">
                <h1 class="hero-title" id="hero-title">Kumbh Mela 2027, Nashik</h1>
                <p class="hero-announcement" id="hero-announcement">The sacred confluence awaits. Official dates for the Shahi Snan are 18th March 2027 to 20th March 2027.</p>
                <div id="countdown-timer" class="d-flex justify-content-center gap-3">
                    <div class="time-unit"><span id="days">000</span><label>Days</label></div>
                    <div class="time-unit"><span id="hours">00</span><label>Hours</label></div>
                    <div class="time-unit"><span id="minutes">00</span><label>Minutes</label></div>
                    <div class="time-unit"><span id="seconds">00</span><label>Seconds</label></div>
                </div>
            </div>

        </section>

        <!-- ================== QUICK ACCESS LINKS ================== -->
        <section id="quick-links" class="section-padding text-center">
            <div class="container">
                <!-- THIS IS THE NEW HEADING -->
                <h2 class="section-title" id="quick-links-title">Essential Services</h2>

                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <a href="under-construction.html?page=Book-Travel" class="quick-link-card">
                            <i class="bi bi-geo-alt-fill"></i>
                            <h3 id="quick-link-travel">Book Travel</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="under-construction.html?page=Holy-Dip" class="quick-link-card">
                            <i class="bi bi-flower1"></i>
                            <h3 id="quick-link-dip">Holy Dip</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="under-construction.html?page=Stay-Options" class="quick-link-card">
                            <i class="bi bi-house-heart-fill"></i>
                            <h3 id="quick-link-stay">Stay Options</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="under-construction.html?page=Live-Darshan" class="quick-link-card">
                            <i class="bi bi-eye-fill"></i>
                            <h3 id="quick-link-darshan">Live Darshan</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================== PHOTO GALLERY (SCROLLABLE) ================== -->
<!-- ================== SCROLLING PHOTO & VIDEO GALLERY ================== -->
<section id="gallery" class="section-padding">
    <div class="container-fluid text-center">
        <h2 class="section-title" id="gallery-title">Gallery</h2>
        
        <div class="gallery-scroll-container">
            <div class="gallery-track">
                <!-- PRIMARY SET: VIDEOS FIRST, THEN PHOTOS -->
                <!-- Video 1 -->
                <div class="gallery-item" data-type="video" data-video-id="a2TewFBa_yw">
                    <img src="https://img.youtube.com/vi/a2TewFBa_yw/hqdefault.jpg" alt="Kumbh Video 1">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Video 2 -->
                <div class="gallery-item" data-type="video" data-video-id="y1EIDpLLahA">
                    <img src="https://img.youtube.com/vi/y1EIDpLLahA/hqdefault.jpg" alt="Kumbh Video 2">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Photo 1 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery1.jpg" alt="Kumbh Photo 1">
                </div>
                <!-- Photo 2 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery2.jpg" alt="Kumbh Photo 2">
                </div>
                 <!-- Video 3 -->
                <div class="gallery-item" data-type="video" data-video-id="cEcc7_BIh4Q">
                    <img src="https://img.youtube.com/vi/cEcc7_BIh4Q/hqdefault.jpg" alt="Kumbh Video 3">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Photo 3 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery3.jpg" alt="Kumbh Photo 3">
                </div>
                <!-- Photo 4 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery4.jpg" alt="Kumbh Photo 4">
                </div>


                <!-- DUPLICATE SET FOR INFINITE SCROLL EFFECT -->
                <!-- Video 1 -->
                <div class="gallery-item" data-type="video" data-video-id="a2TewFBa_yw">
                    <img src="https://img.youtube.com/vi/a2TewFBa_yw/hqdefault.jpg" alt="Kumbh Video 1">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Video 2 -->
                <div class="gallery-item" data-type="video" data-video-id="y1EIDpLLahA">
                    <img src="https://img.youtube.com/vi/y1EIDpLLahA/hqdefault.jpg" alt="Kumbh Video 2">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Photo 1 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery1.jpg" alt="Kumbh Photo 1">
                </div>
                <!-- Photo 2 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery2.jpg" alt="Kumbh Photo 2">
                </div>
                 <!-- Video 3 -->
                <div class="gallery-item" data-type="video" data-videoYou are absolutely right. I am so sorry. I completely misunderstood your request and went in the wrong direction. You want a **single, continuous scrolling gallery** that contains both videos and photos, exactly like the design in the reference image you provided.

My apologies for the confusion. Let's build that precise design now. We will abandon the tabs and create the seamless scrolling experience you want.

This will require restoring a similar HTML structure to the original scrolling gallery, but-id="cEcc7_BIh4Q">
                    <img src="https://img.youtube.com/vi/cEcc7_BIh4Q/hqdefault.jpg" alt="Kumbh Video 3">
                    <div class="play-button-overlay"><i class="bi bi-play-circle-fill"></i></div>
                </div>
                <!-- Photo 3 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery3.jpg" alt="Kumbh Photo 3">
                </div>
                <!-- Photo 4 -->
                <div class="gallery-item" data-type="photo">
                    <img src="assets/images/gallery4.jpg" alt="Kumbh Photo 4">
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- ================== TRUSTEES SECTION (FINAL PROFILE CARD) ================== -->
        <section id="trustees" class="section-padding bg-light">
            <div class="container text-center">
                <h2 class="section-title" id="trustees-title">Board of Trustees</h2>

                <div class="row justify-content-center g-4">

                    <!-- Trustee 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="profile-card">
                            <img src="assets/images/trustee1.png" alt="Photo of Devendra Fadnavis" class="profile-card-img">
                            <div class="profile-card-body">
                                <p class="profile-card-role" id="trustee-1-role">Chairman</p>
                                <h3 class="profile-card-name" id="trustee-1-name">Shri. Devendra Fadnavis</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Trustee 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="profile-card">
                            <img src="assets/images/trustee2.png" alt="Photo of Eknath Shinde" class="profile-card-img">
                            <div class="profile-card-body">
                                <p class="profile-card-role" id="trustee-2-role">Member</p>
                                <h3 class="profile-card-name" id="trustee-2-name">Shri. Eknath Shinde</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trustee 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="profile-card">
                            <img src="assets/images/trustee3.png" alt="Photo of Ajit Pawar" class="profile-card-img">
                            <div class="profile-card-body">
                                <p class="profile-card-role" id="trustee-3-role">Secretary</p>
                                <h3 class="profile-card-name" id="trustee-3-name">Shri. Ajit Pawar</h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>


    </main>

    <?php include 'include/footer.php'; ?>

    <div id="lightbox">
        <span class="lightbox-close">×</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>

    <!-- This order is CRITICAL -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js?v=42" defer></script>
</body>
</html>

