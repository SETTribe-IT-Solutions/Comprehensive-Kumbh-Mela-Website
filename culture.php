<?php require_once 'include/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture & Learning - Kumbh Mela 2027</title>
    
    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- ✅ The crucial link to your master stylesheet, with a new version number -->
    <link rel="stylesheet" href="css/style.css?v=201"> 

</head>
<body>

    <!-- The navbar is already included by the PHP line at the very top -->

    <main>
        <!-- CULTURE HERO BANNER -->
        <section id="culture-hero" class="text-center text-white">
            <div class="hero-overlay"></div>
            <div class="container position-relative">
                <h1 class="hero-title" id="culture-hero-title">Culture & Learning</h1>
                <p class="hero-announcement" id="culture-hero-subtitle">Immerse yourself in the rich history and spiritual wisdom of the Kumbh Mela.</p>
            </div>
        </section>

        <!-- MAIN CONTENT SECTION -->
        <div class="container section-padding">
            <div class="row g-5">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">
                    <!-- Featured Video Module -->
                    <div class="booking-module">
                        <h2 class="section-title text-start" id="history-video-title">The History of Kumbh Mela</h2>
                        <div class="ratio ratio-16x9 rounded shadow-sm">
                            <video controls poster="assets/images/video1-thumbnail.jpg" preload="metadata">
                                <source src="assets/videos/video1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <p class="text-muted mt-3" id="history-video-desc">Discover the ancient origins and mythological significance...</p>
                    </div>
                    <!-- Online Courses Module -->
                    <div class="booking-module mt-5">
                        <h2 class="section-title text-start" id="courses-title">Online Spiritual Courses</h2>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div><h5 class="mb-1" id="course-1-title">Introduction to Vedic Philosophy</h5><p class="mb-1 text-muted" id="course-1-desc">A 10-part series...</p></div>
                                <span class="badge bg-primary rounded-pill" id="course-1-btn">Enroll Now</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div><h5 class="mb-1" id="course-2-title">The Art of Meditation</h5><p class="mb-1 text-muted" id="course-2-desc">Learn practical techniques...</p></div>
                                <span class="badge bg-primary rounded-pill" id="course-2-btn">Enroll Now</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div><h5 class="mb-1" id="course-3-title">Understanding Hindu Mythology</h5><p class="mb-1 text-muted" id="course-3-desc">Explore the stories of deities...</p></div>
                                <span class="badge bg-primary rounded-pill" id="course-3-btn">Enroll Now</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">
                    <div class="booking-module">
                        <h2 class="section-title text-start" id="saints-directory-title">Directory of Saints</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><h6 class="mb-1" id="saint-1-name">Swami Avdheshanand Giri</h6><small class="text-muted" id="saint-1-desc">Session on: The Path of Jnana Yoga...</small></li>
                            <li class="list-group-item"><h6 class="mb-1" id="saint-2-name">Pujya Swami Chidanand Saraswati</h6><small class="text-muted" id="saint-2-desc">Session on: Karma and Dharma...</small></li>
                            <li class="list-group-item"><h6 class="mb-1" id="saint-3-name">Devi Chitralekha</h6><small class="text-muted" id="saint-3-desc">Discourse on Shrimad Bhagwatam...</small></li>
                            <li class="list-group-item"><h6 class="mb-1" id="saint-4-name">Swami Ramdev</h6><small class="text-muted" id="saint-4-desc">Yoga and Pranayama Workshop...</small></li>
                            <li class="list-group-item"><h6 class="mb-1" id="saint-5-name">Sadhguru Jaggi Vasudev</h6><small class="text-muted" id="saint-5-desc">Talk on Inner Engineering...</small></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>
</html>