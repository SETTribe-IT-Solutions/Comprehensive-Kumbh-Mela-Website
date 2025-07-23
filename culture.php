<?php require_once 'include/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture & Learning - Kumbh Mela 2027</title>
    <!-- Your CSS links -->
    <link rel="stylesheet" href="css/style.css?v=...">
    <!-- ... other links ... -->
</head>
<body>
    
<main>
    <!-- ================== CULTURE HERO BANNER ================== -->
     <section class="page-title-section">
        <div class="container text-center">
            <h1 class="page-main-title" id="culture-hero-title">Culture & Learning</h1>
            <div class="underline-wrapper">
                <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
            </div>
        </div>
    </section>

    <!-- ================== MAIN CONTENT SECTION ================== -->
    <div class="container section-padding">
        <!-- Featured Video Module -->
        <div class="booking-module video-module-padding">
            <h2 class="section-title text-center" id="history-video-title">The History of Kumbh Mela</h2>
            <div class="ratio ratio-16x9 rounded shadow-sm">
                <video controls poster="assets/images/video1-thumbnail.jpg" preload="metadata">
                    <source src="assets/videos/video1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <p class="text-muted mt-3" id="history-video-desc">Discover the ancient origins and mythological significance of this grand spiritual gathering.</p>
        </div>

        <!-- Online Spiritual Courses Module -->
        <div class="booking-module mt-5 mb-5">
            <h2 class="section-title text-start" id="courses-title">Online Spiritual Courses</h2>
            <div class="list-group">
                <!-- Course 1 -->
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div><h5 class="mb-1" id="course-1-title">Introduction to Vedic Philosophy</h5><p class="mb-1 text-muted" id="course-1-desc">A 10-part series...</p></div>
                    <button class="btn btn-sm btn-saffron" data-bs-toggle="modal" data-bs-target="#enrollModal" id="course-1-btn">Enroll Now</button>
                </div>
                <!-- Course 2 -->
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div><h5 class="mb-1" id="course-2-title">The Art of Meditation</h5><p class="mb-1 text-muted" id="course-2-desc">Learn practical techniques...</p></div>
                    <button class="btn btn-sm btn-saffron" data-bs-toggle="modal" data-bs-target="#enrollModal" id="course-2-btn">Enroll Now</button>
                </div>
                <!-- Course 3 -->
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div><h5 class="mb-1" id="course-3-title">Understanding Hindu Mythology</h5><p class="mb-1 text-muted" id="course-3-desc">Explore the stories of deities...</p></div>
                    <button class="btn btn-sm btn-saffron" data-bs-toggle="modal" data-bs-target="#enrollModal" id="course-3-btn">Enroll Now</button>
                </div>
            </div>
        </div>

       <!-- Directory of Saints Module -->
<div class="booking-module">
    <h2 class="section-title text-start" id="saints-directory-title">Directory of Saints</h2>
    <div class="list-group list-group-flush saints-directory">
        
        <!-- Saint 1 Card -->
        <div class="saint-card">
            <img src="assets/images/saint1.jpg" alt="Swami Avdheshanand Giri" class="saint-photo">
            <div class="saint-info">
                <h5 class="saint-name" id="saint-1-name">Swami Avdheshanand Giri</h5>
                <p class="saint-akhara" id="saint-1-akhara">Juna Akhara</p>
                <p class="saint-session" id="saint-1-desc"><i class="bi bi-calendar3-event"></i> Session on: The Path of Jnana Yoga - Daily at 4 PM</p>
            </div>
            <!-- ✅ UPDATED BUTTON -->
            <button class="btn btn-sm btn-outline-saffron ms-auto view-schedule-btn" data-bs-toggle="modal" data-bs-target="#scheduleModal" data-saint-id="saint-1">View Schedule</button>
        </div>
        
        <!-- Saint 2 Card -->
        <div class="saint-card">
            <img src="assets/images/saint2.jpg" alt="Pujya Swami Chidanand Saraswati" class="saint-photo">
            <div class="saint-info">
                <h5 class="saint-name" id="saint-2-name">Pujya Swami Chidanand Saraswati</h5>
                <p class="saint-akhara" id="saint-2-akhara">Parmarth Niketan</p>
                <p class="saint-session" id="saint-2-desc"><i class="bi bi-calendar3-event"></i> Session on: Karma and Dharma - Daily at 5 PM</p>
            </div>
            <!-- ✅ UPDATED BUTTON -->
            <button class="btn btn-sm btn-outline-saffron ms-auto view-schedule-btn" data-bs-toggle="modal" data-bs-target="#scheduleModal" data-saint-id="saint-2">View Schedule</button>
        </div>

        <!-- Saint 3 Card -->
        <div class="saint-card">
            <img src="assets/images/saint3.jpg" alt="Devi Chitralekha" class="saint-photo">
            <div class="saint-info">
                <h5 class="saint-name" id="saint-3-name">Devi Chitralekha</h5>
                <p class="saint-akhara" id="saint-3-akhara">World Sankirtan Tour Trust</p>
                <p class="saint-session" id="saint-3-desc"><i class="bi bi-calendar3-event"></i> Discourse on Shrimad Bhagwatam - Daily at 6 PM</p>
            </div>
            <!-- ✅ UPDATED BUTTON -->
            <button class="btn btn-sm btn-outline-saffron ms-auto view-schedule-btn" data-bs-toggle="modal" data-bs-target="#scheduleModal" data-saint-id="saint-3">View Schedule</button>
        </div>
        
    </div>
</div>


    </div>
</main>

<!-- ================== ENROLLMENT MODAL FORM ================== -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollModalLabel">Course Enrollment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Bootstrap's validation requires the 'needs-validation' class and 'novalidate' attribute -->
                <form id="enrollment-form" class="row g-3 needs-validation" novalidate>
                    <!-- Full Name -->
                    <div class="col-12">
                        <label for="enroll-name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="enroll-name" required>
                        <div class="invalid-feedback">Please enter your full name.</div>
                    </div>
                    <!-- Email -->
                    <div class="col-12">
                        <label for="enroll-email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="enroll-email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <!-- Phone Number -->
                    <div class="col-12">
                        <label for="enroll-phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="enroll-phone" pattern="[6-9][0-9]{9}" required>
                        <div class="invalid-feedback">Please enter a valid 10-digit phone number starting with 6, 7, 8, or 9.</div>
                    </div>

                        <!-- ... (Phone Number div is above this) ... -->
                        <!-- ================== NEW FIELDS START HERE ================== -->

                        <!-- Age Group -->
                        <div class="col-md-6">
                            <label for="enroll-age" class="form-label">Age Group</label>
                            <select class="form-select" id="enroll-age" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="below-18">Below 18</option>
                                <option value="18-30">18–30</option>
                                <option value="31-50">31–50</option>
                                <option value="50+">50+</option>
                            </select>
                            <div class="invalid-feedback">Please select your age group.</div>
                        </div>

                        <!-- Preferred Language -->
                        <div class="col-md-6">
                            <label for="enroll-language" class="form-label">Preferred Language</label>
                            <select class="form-select" id="enroll-language" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="hindi">Hindi</option>
                                <option value="english">English</option>
                                <option value="marathi">Marathi</option>
                            </select>
                            <div class="invalid-feedback">Please select a language.</div>
                        </div>

                        <!-- State -->
                        <div class="col-12">
                            <label for="enroll-state" class="form-label">State</label>
                            <select class="form-select" id="enroll-state" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <div class="invalid-feedback">Please select your state.</div>
                        </div>
                        
                        <!-- Preferred Mode -->
                        <div class="col-md-6">
                            <label for="enroll-mode" class="form-label">Preferred Mode</label>
                            <select class="form-select" id="enroll-mode" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="online">Online</option>
                                <option value="in-person">In-person</option>
                            </select>
                            <div class="invalid-feedback">Please select a mode.</div>
                        </div>

                        <!-- Availability -->
                        <div class="col-md-6">
                            <label for="enroll-availability" class="form-label">Availability</label>
                            <select class="form-select" id="enroll-availability" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="weekends">Weekends</option>
                                <option value="weekdays">Weekdays</option>
                                <option value="evenings">Evenings</option>
                                <option value="any">Any</option>
                            </select>
                            <div class="invalid-feedback">Please select your availability.</div>
                        </div>

                        <!-- ================== NEW FIELDS END HERE ================== -->

                    <!-- Terms and Conditions div is below this -->
                    <!-- Terms and Conditions -->
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="enroll-terms" required>
                            <label class="form-check-label" for="enroll-terms">
                                I agree to the terms and conditions
                            </label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="enrollment-form" class="btn btn-primary">Submit Enrollment</button>
            </div>
        </div>
    </div>
</div>


<!-- ... your main content ends here ... -->
</main>

<!-- ================== SCHEDULE MODAL ================== -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="scheduleModalBody">
        <!-- Schedule content will be injected here by JavaScript -->
        <p>Loading schedule...</p>
      </div>
    </div>
  </div>
</div>

   <!-- ================== PAGE-SPECIFIC SCRIPTS ================== -->
    <!-- This block makes the modal and form on THIS page work -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/main.js?v=51" defer></script> 

</body>
</html>

<?php require_once 'include/footer.php'; ?>