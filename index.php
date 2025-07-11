
<?php include 'include/navbar.php'; ?>
    <!-- just a comment -->
    <!-- again a comment -->


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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&family=Signika:wght@300..700&family=Merienda:wght@300..900&family=Russo+One&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Vollkorn:ital,wght@0,400..900;1,400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=92">
</head>
<body> 

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

    <!-- ALERTS TICKER -->
    <div class="alert-ticker-container">
        <div class="helpline">
            <i class="bi bi-telephone-fill"></i>
            <span id="helpline-text">Emergency Helpline: +91-123-456-7890</span>
        </div>
        <div class="ticker-wrap">
            <div class="ticker">
            <span class="ticker-text">
                <i class="bi bi-exclamation-triangle-fill"></i>
                ALERT: Please follow all safety guidelines. Beware of unauthorized agents.
            </span>
            </div>
        </div>
    </div>



    <!-- ================== QUICK ACCESS LINKS ================== -->
        <section id="quick-links" class="section-padding text-center">
            <div class="container">
                <!-- THIS IS THE NEW HEADING -->
                <h2 class="section-title" id="quick-links-title">Essential Services</h2>
                <div class="underline-essential">
                    <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
                </div>

                <div class="row g-4">
                    <div class="col-6 col-md-3">
                        <a href="travel.php?page=Book-Travel" class="quick-link-card">
                            <i class="bi bi-geo-alt-fill"></i>
                            <h3 id="quick-link-travel">Book Travel</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="darshan.php?page=Holy-Dip" class="quick-link-card">
                            <i class="bi bi-flower1"></i>
                            <h3 id="quick-link-dip">Holy Dip</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="travel.php?page=Stay-Options" class="quick-link-card">
                            <i class="bi bi-house-heart-fill"></i>
                            <h3 id="quick-link-stay">Stay Options</h3>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="darshan.php?page=Live-Darshan" class="quick-link-card">
                            <i class="bi bi-eye-fill"></i>
                            <h3 id="quick-link-darshan">Live Darshan</h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>


    <!-- ============ FINAL UNIFIED GALLERY SECTION (Infinite Scroll) ============ -->
    <section id="gallery" class="section-padding bg-light">
    <div class="container text-center">
        <h2 class="section-title" id="gallery-title">Gallery</h2>
        <div class="underline-gallery">
            <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
        </div>
    </div>
    
    <div class="gallery-wrapper">
        <div class="auto-scroll-gallery">
 
        <!-- ========== ORIGINAL MEDIA SET ========== -->
        <!-- Video 1 -->
        <div class="media-card" data-type="video">
            <div class="media-card-img-container">
                <video class="media-card-img" muted>
                <source src="assets/videos/video1.mp4" type="video/mp4">
                </video>
                <div class="media-card-overlay"><i class="bi bi-play-circle-fill"></i></div>
            </div>
            <div class="media-card-body">
                <h3 class="media-card-title">Pooja Procession - Video</h3>
                <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>



        <!-- Local Video 2 -->
       <div class="media-card" data-type="video">
            <div class="media-card-img-container">
                <video class="media-card-img" muted>
                <source src="assets/videos/video2.mp4" type="video/mp4">
                </video>
                <div class="media-card-overlay"><i class="bi bi-play-circle-fill"></i></div>
            </div>
            <div class="media-card-body">
                <h3 class="media-card-title">Heritage Walk - Video</h3>
                <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>


        <!-- Photo 1 to 8 -->
        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery1.jpg" alt="Kumbh River Ghat" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Kumbh River Ghat</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery2.jpg" alt="Sunset over Godavari" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Sunset over Godavari</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery3.jpg" alt="Godavari Bridge View" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Godavari Bridge View</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery4.jpg" alt="Cultural Procession" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Cultural Procession</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery5.jpg" alt="Boating" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Boating</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery6.jpg" alt="Offering lamp" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Offering a lamp</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/new-gallery7.jpg" alt="Devotees Taking Holy Dip" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Devotees Taking Holy Dip</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery8.jpg" alt="Shahi Snan Procession" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Shahi Snan Procession</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>



        <!-- ========== DUPLICATED MEDIA SET (for infinite scroll loop) ========== -->
        <!-- ... Duplicated Cards Start ... -->

        <!-- Video 1 -->
        <div class="media-card" data-type="video">
            <div class="media-card-img-container">
                <video class="media-card-img" muted>
                <source src="assets/videos/video1.mp4" type="video/mp4">
                </video>
                <div class="media-card-overlay"><i class="bi bi-play-circle-fill"></i></div>
            </div>
            <div class="media-card-body">
                <h3 class="media-card-title">Pooja Procession - Video</h3>
                <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <!-- hi -->

        <!-- Local Video 2 -->
       <div class="media-card" data-type="video">
            <div class="media-card-img-container">
                <video class="media-card-img" muted>
                <source src="assets/videos/video2.mp4" type="video/mp4">
                </video>
                <div class="media-card-overlay"><i class="bi bi-play-circle-fill"></i></div>
            </div>
            <div class="media-card-body">
                <h3 class="media-card-title">Heritage Walk - Video</h3>
                <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <!-- Photo 1 to 8 -->
        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery1.jpg" alt="Kumbh River Ghat" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Kumbh River Ghat</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery2.jpg" alt="Sunset over Godavari" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Sunset over Godavari</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery3.jpg" alt="Godavari Bridge View" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Godavari Bridge View</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery4.jpg" alt="Cultural Procession" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Cultural Procession</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery5.jpg" alt="Boating" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Boating</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery6.jpg" alt="Offering lamp" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Offering a lamp</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/new-gallery7.jpg" alt="Devotees Taking Holy Dip" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Devotees Taking Holy Dip</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

        <div class="media-card" data-type="image">
            <div class="media-card-img-container">
            <img src="assets/images/gallery8.jpg" alt="Shahi Snan Procession" class="media-card-img">
            <div class="media-card-overlay"><i class="bi bi-search"></i></div>
            </div>
            <div class="media-card-body">
            <h3 class="media-card-title">Shahi Snan Procession</h3>
            <p class="media-card-link"><i class="bi bi-box-arrow-up-right"></i> Click here for view</p>
            </div>
        </div>

            <!-- ... Duplicated Cards End ... -->

        </div>
    </div>
    </section>

        <!-- ================== TRUSTEES SECTION (FINAL PROFILE CARD) ================== -->
        <section id="trustees" class="section-padding bg-light">
            <div class="container text-center">
                <h2 class="section-title" id="trustees-title">Board of Trustees</h2>
                <div class="underline-trustees">
                    <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
                </div>

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

   <!-- ✅ FIXED: Single Lightbox container -->
    <!-- Lightbox for image and video -->
    <div id="lightbox">
        <img id="lightbox-img" alt="Full Image" style="display: none;">
        <video id="lightbox-video" controls style="display: none; max-width: 90%; max-height: 80vh; border-radius: 8px;"></video>
        <div class="lightbox-close">&times;</div>
    </div>





    <!-- This order is CRITICAL -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js?v=47" defer></script>
</body>
</html>

