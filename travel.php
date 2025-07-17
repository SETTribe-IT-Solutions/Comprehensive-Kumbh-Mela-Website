
<?php include 'include/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel & Stay - Kumbh Mela 2027</title>
    <!-- Links are identical to index.html -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> -->

    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css?v=52"> <!-- Use the same stylesheet -->

</head>
<body>


    <main>
        <!-- ================== TRAVEL HERO BANNER ================== -->
        <section id="travel-hero" class="text-center text-white">
            <div class="hero-overlay"></div>
            <div class="container position-relative">
                <h1 class="hero-title" id="travel-hero-title">Travel & Stay Planner</h1>
                <!-- <p class="hero-announcement" id="travel-hero-subtitle">Your complete guide to reaching and staying at Kumbh Mela 2027.</p> -->
            <div class="underline-wrapper">
      <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
    </div>

            </div>
        </section>

        <!-- ================== MAIN BOOKING SECTION ================== -->
        <div class="container section-padding">
            <div class="row g-5">
                <!-- Left Side: Transport & Accommodation -->
                <div class="col-lg-8 d-flex flex-column">
                    <!-- Transport Booking -->
                    <div class="booking-module">
                        <h2 class="section-title text-start" id="transport-title">Book Your Journey</h2>
                        <ul class="nav nav-tabs" id="transportTabs" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active" id="bus-tab" data-bs-toggle="tab" data-bs-target="#bus-panel" type="button" role="tab"><i class="bi bi-bus-front-fill"></i> <span id="transport-tab-bus">Bus</span></button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="train-tab" data-bs-toggle="tab" data-bs-target="#train-panel" type="button" role="tab"><i class="bi bi-train-front-fill"></i> <span id="transport-tab-train">Train</span></button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="flight-tab" data-bs-toggle="tab" data-bs-target="#flight-panel" type="button" role="tab"><i class="bi bi-airplane-fill"></i> <span id="transport-tab-flight">Flight</span></button></li>
                        </ul>
                        
                        <div class="tab-content p-4 border border-top-0 rounded-bottom">

                          <!-- Bus Panel -->
<div class="tab-pane fade show active" id="bus-panel" role="tabpanel" aria-labelledby="bus-tab">
    <!-- Use a <form> tag and add the `needs-validation` class for Bootstrap styles -->
    <form class="row g-4 needs-validation" id="bus-search-form" novalidate>
        
        <!-- From Field with Suggestions Container -->
        <div class="col-md-6">
            <label for="bus-from" class="form-label" id="form-label-from">From</label>
            <!-- This wrapper is crucial for positioning the suggestions -->
            <div class="position-relative">
                <input type="text" class="form-control" id="bus-from" placeholder="e.g., Mumbai" autocomplete="off" required>
                <!-- This is where suggestions will appear -->
                <div id="from-suggestions" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                <!-- Bootstrap validation message -->
                <div class="invalid-feedback">
                    Please select a valid city from the list.
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <label for="bus-to" class="form-label" id="form-label-to">To</label>
            <input type="text" class="form-control" id="bus-to" value="Nashik" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Date of Journey</label>
            <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center border rounded px-3 py-2 flex-grow-1">
                <i class="bi bi-calendar2-event me-2 text-muted"></i>
                <span id="selected-date-bus" class="fw-semibold">03 Jul, 2025</span>
                <input type="date" class="form-control d-none" id="journey-date-bus" />
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-light border" id="btn-today-bus">Today</button>
                <button type="button" class="btn btn-light border" id="btn-tomorrow-bus">Tomorrow</button>
            </div>
            </div>
        </div>

        <div class="col-md-6 align-self-end">
            <button type="submit" class="btn btn-primary w-100" id="form-btn-search-buses">Search Buses</button>
        </div>
    </form>
</div>

                            <!-- Train Panel -->
                            <div class="tab-pane fade" id="train-panel" role="tabpanel" aria-labelledby="train-tab">
                                <form class="row g-4">
                                    <div class="col-md-6">
                                        <label for="train-from" class="form-label" id="form-label-from-train">From</label>
                                        <input type="text" class="form-control" id="train-from" placeholder="e.g., Delhi">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="train-to" class="form-label" id="form-label-to-train">To</label>
                                        <input type="text" class="form-control" id="train-to" value="Nashik Road (NK)" disabled>
                                    </div>
                                   <div class="col-md-6">
                                        <label class="form-label">Date of Journey</label>
                                        <div class="d-flex align-items-center gap-3">
                                          <div class="d-flex align-items-center border rounded px-3 py-2 flex-grow-1">
                                            <i class="bi bi-calendar2-event me-2 text-muted"></i>
                                            <span id="selected-date-train" class="fw-semibold">03 Jul, 2025</span>
                                            <input type="date" class="form-control d-none" id="journey-date-train" />
                                          </div>
                                          <div class="btn-group">
                                            <button type="button" class="btn btn-light border" id="btn-today-train">Today</button>
                                            <button type="button" class="btn btn-light border" id="btn-tomorrow-train">Tomorrow</button>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-end">
                                        <button type="submit" class="btn btn-primary w-100" id="form-btn-search-trains">Search Trains</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Flight Panel -->
                            <div class="tab-pane fade" id="flight-panel" role="tabpanel" aria-labelledby="flight-tab">
                                <form class="row g-4">
                                    <div class="col-md-6">
                                        <label for="flight-from" class="form-label" id="form-label-from-flight">From</label>
                                        <input type="text" class="form-control" id="flight-from" placeholder="e.g., Bengaluru">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="flight-to" class="form-label" id="form-label-to-flight">To</label>
                                        <input type="text" class="form-control" id="flight-to" value="Nashik (ISK)" disabled>
                                    </div>
                                   <div class="col-md-6">
                                        <label class="form-label">Date of Journey</label>
                                        <div class="d-flex align-items-center gap-3">
                                          <div class="d-flex align-items-center border rounded px-3 py-2 flex-grow-1">
                                            <i class="bi bi-calendar2-event me-2 text-muted"></i>
                                            <span id="selected-date-flight" class="fw-semibold">03 Jul, 2025</span>
                                            <input type="date" class="form-control d-none" id="journey-date-flight" />
                                          </div>
                                          <div class="btn-group">
                                            <button type="button" class="btn btn-light border" id="btn-today-flight">Today</button>
                                            <button type="button" class="btn btn-light border" id="btn-tomorrow-flight">Tomorrow</button>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-end">
                                        <button type="submit" class="btn btn-primary w-100" id="form-btn-search-flights">Search Flights</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                                       <!-- Accommodation Booking -->
                    <div class="booking-module mt-4">
                        <h2 class="section-title text-start" id="accommodation-title">Find Your Stay</h2>
                        <div class="p-4 border rounded">
                            <form class="row g-4">
                                <!-- START: Changed Accommodation Type Dropdown -->
                                <div class="col-md-12">
                                    <label class="form-label" id="form-label-stay-type">Accommodation Type</label>
                                    <div class="dropdown">
                                        <button class="btn btn-light border dropdown-toggle w-100 text-start" type="button" id="accommodation-type-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            All Types
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="accommodation-type-dropdown">
                                            <li class="px-3 py-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="hotels" id="check-hotels" name="accommodation_type[]">
                                                    <label class="form-check-label" for="check-hotels">Hotels</label>
                                                </div>
                                            </li>
                                            <li class="px-3 py-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="dharamshalas" id="check-dharamshalas" name="accommodation_type[]">
                                                    <label class="form-check-label" for="check-dharamshalas">Dharamshalas</label>
                                                </div>
                                            </li>
                                            <li class="px-3 py-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="tents" id="check-tents" name="accommodation_type[]">
                                                    <label class="form-check-label" for="check-tents">Tents</label>
                                                </div>
                                            </li>
                                            <li class="px-3 py-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="homestays" id="check-homestays" name="accommodation_type[]">
                                                    <label class="form-check-label" for="check-homestays">Homestays</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END: Changed Accommodation Type Dropdown -->

                                <div class="col-md-6"><label class="form-label" id="form-label-checkin">Check-in</label>
                                    <input type="date" class="form-control" id="checkin-date">
                                </div>
                                <div class="col-md-6"><label class="form-label" id="form-label-checkout">Check-out</label>
                                    <input type="date" class="form-control" id="checkout-date">
                                </div>
                                <div class="col-12"><button type="submit" class="btn btn-primary w-100" id="form-btn-search-stays">Search Stays</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Right Side: AI Planner & More -->
                <!-- ================== CHANGED LINE BELOW ================== -->
                <div class="col-lg-4 d-flex flex-column justify-content-start gap-4">
                    <!-- AI Travel Planner -->
                    <div class="feature-card">
                        <i class="bi bi-magic"></i>
                        <h4 id="ai-planner-title">AI Travel Planner</h4>
                        <p id="ai-planner-desc">Get a personalized itinerary based on your preferences and budget.</p>
                        <button class="btn btn-secondary" id="btn-plan-trip">Plan My Trip</button>
                    </div>
                    <!-- Shared Travel -->
                    <!-- ================== REMOVED mt-4 FROM LINE BELOW ================== -->
                     <div class="feature-card">
                        <i class="bi bi-people-fill"></i>
                        <h4 id="shared-travel-title">Shared Travel Planner</h4>
                        <p id="shared-travel-desc">Connect with fellow pilgrims on similar routes to share costs and experiences.</p>
                        <button class="btn btn-secondary" id="btn-find-group">Find a Group</button>
                    </div>
                     <!-- Local Rentals -->
                     <!-- ================== REMOVED mt-4 FROM LINE BELOW ================== -->
                     <div class="feature-card">
                        <i class="bi bi-scooter"></i>
                        <h4 id="local-rentals-title">Local Vehicle Rentals</h4>
                        <p id="local-rentals-desc">Book e-rickshaws, two-wheelers, and cars for easy local travel.</p>
                        <button class="btn btn-secondary" id="btn-rent-vehicle">Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ================== FOOTER ================== -->
    <!-- <footer class="bg-dark text-white text-center py-4">
        <div class="container"><p class="mb-0" id="footer-text">© 2025 Ministry of Culture. Govt of India. All Rights Reserved.</p></div>
    </footer> -->
    <?php include 'include/footer.php'; ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/main2.js?v=4" defer></script> -->




</body>
</html>

