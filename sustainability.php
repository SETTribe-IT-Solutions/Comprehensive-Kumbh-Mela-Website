<?php
require_once 'include/connect.php';
include 'include/navbar.php';
?>
<?php

$pageTitle = "Sustainability & Green Services - Kumbh Mela 2027";
$activePage = "sustainability";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&family=Signika:wght@300..700&family=Merienda:wght@300..900&family=Russo+One&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Vollkorn:ital,wght@0,400..900;1,400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css?v=38">
  <link rel="stylesheet" href="css/sustainability.css?v=1">
  <!--  -->
</head>
<body>

<main>

  <!-- HERO SECTION -->
  <section >
    
    <div class="sustainability-section">
      <h1 class="sus-title">Sustainability & Green Services</h1>
        <div class="underline-wrapper">
          <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
        </div>
    </div>
  </section>

  <div class="container section-padding">

    <!-- 3.7.1 Eco-friendly Travel and Stay -->
    <div class="mb-5">
        <h2 class="sus-section text-center">Eco-Friendly Travel & Stay</h2>
        <p class="text-center text-muted mb-4">Choose sustainable options to minimize your environmental impact.</p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 sustainability-card">
                    <div class="card-body">
                        <div class="card-icon"><i class="bi bi-train-front"></i></div>
                        <h5 class="card-title text-center">Use Public Transport</h5>
                        <p class="card-text">Opt for trains and buses dedicated to Kumbh pilgrims to reduce traffic congestion and air pollution.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 sustainability-card">
                     <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                    <h5 class="card-title text-center">Carpooling & Shared Taxis</h5>
                    <p class="card-text">Connect with fellow pilgrims and share rides. This not only saves fuel but also builds community.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 sustainability-card">
                    <div class="card-icon"><i class="bi bi-bicycle"></i></div>
                    <h5 class="card-title text-center">Local Green Transport</h5>
                    <p class="card-text">Once here, use e-rickshaws, bicycle rentals, or walk. Designated pedestrian zones make it safe and easy.</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- 3.8.1 Guide on eco-friendly practices -->
    <div class="mb-5">
        <h2 class="section-title text-center">Guide on Sustainable Pilgrim Practices</h2>
        <p class="text-center text-muted mb-4">Embrace practices that honor both your faith and Mother Nature.</p>
        <div class="accordion" id="sustainablePracticesAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-trash3-fill me-2"></i> Proper Waste Disposal
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#sustainablePracticesAccordion">
              <div class="accordion-body">
                <strong>Segregate Your Waste.</strong> Use the color-coded bins provided across the Mela grounds: Green for wet/organic waste and Blue for dry/recyclable waste. Never litter in the open, especially near the ghats or in the holy river.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="bi bi-droplet-half me-2"></i> Respect the Holy River
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#sustainablePracticesAccordion">
              <div class="accordion-body">
                Do not use soap or detergents when bathing in the river. Avoid releasing any worship materials, flowers, or clothes into the water. Designated immersion spots are provided for these purposes to prevent water pollution.
              </div>
            </div>
          </div>
           <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="bi bi-ban-fill me-2"></i> Embrace the "Zero-Plastic" Mindset
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#sustainablePracticesAccordion">
              <div class="accordion-body">
                Actively refuse single-use plastics. Carry your own reusable water bottle and a cloth bag for shopping. Encourage vendors to use plastic-free alternatives. This simple act has a massive positive impact.
              </div>
            </div>
          </div>
           <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="bi bi-shop me-2"></i> Support Local & Eco-Products
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#sustainablePracticesAccordion">
              <div class="accordion-body">
                When shopping for souvenirs or daily needs, buy from local artisans. Prefer products made from natural, biodegradable materials like clay, jute, and recycled paper over plastic or synthetic ones.
              </div>
            </div>
          </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- 3.7.2 & 3.8.2 Waste Disposal & Donations -->
    <div class="mb-5">
        <div class="row g-5">
            <!-- Zero-waste Donation Guidelines -->
            <div class="col-lg-6">
                <h3 class="section-title text-start h4">Zero-Waste Donation Guidelines</h3>
                <p class="text-muted">Donate responsibly so your charity doesn't harm the environment.</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Contribute to official community kitchens (Anna Kshetras).</li>
                  <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Gift durable items like blankets or steel utensils.</li>
                  <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Use official online portals for digital donations.</li>
                  <li class="list-group-item d-flex align-items-center"><i class="bi bi-x-octagon-fill text-danger me-3 fs-4"></i>Avoid donating plastic-wrapped items or single-use plastics.</li>
                  <li class="list-group-item d-flex align-items-center"><i class="bi bi-x-octagon-fill text-danger me-3 fs-4"></i>Do not leave leftover food in open areas.</li>
                </ul>
            </div>
            <!-- Waste Disposal Maps -->
            <div class="col-lg-6">
                <h3 class="section-title text-start h4">Waste Disposal Maps</h3>
                <p class="text-muted">Find nearby color-coded bins and waste collection centers.</p>
                <div class="map-placeholder">
                    <i class="bi bi-map-fill fs-1 text-muted"></i>
                    <p class="mt-2"><strong>Interactive Map Coming Soon</strong></p>
                    <p class="small">This map will show locations for Green (Organic) and Blue (Dry) waste bins throughout the Mela.</p>
                </div>
              </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- 3.8.3 Zero-plastic campaign info -->
    <div class="mb-5 zero-plastic-campaign">
        <h2 class="section-title text-center">Join the Zero-Plastic Campaign</h2>
        <p class="text-center text-muted mb-4">Be a part of the solution. Let's protect our environment and our sacred river.</p>
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-cup-straw"></i></div>
                <h6>Bring Reusable Bottles</h6>
                <p class="small text-muted">Refill stations are available throughout the Mela.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-bag-check-fill"></i></div>
                <h6>Carry Cloth Bags</h6>
                <p class="small text-muted">Say no to plastic bags when shopping.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-shop"></i></div>
                <h6>Choose Eco-Vendors</h6>
                <p class="small text-muted">Support businesses that use plastic-free packaging.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-megaphone-fill"></i></div>
                <h6>Spread Awareness</h6>
                <p class="small text-muted">Inspire fellow pilgrims to join the cause.</p>
            </div>
        </div>
    </div>

  </div>
</main>

<?php include 'include/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>