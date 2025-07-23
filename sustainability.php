<?php
require_once 'include/connect.php';
include 'include/navbar.php';

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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/sustainability.css?v=45">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>

<main>
  <!-- HERO SECTION -->
  <section>
    <div class="sustainability-section">
      <h1 class="sus-title">Sustainability & Green Services</h1>
      <div class="underline-wrapper">
        <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
      </div>
    </div>
  </section>

  <div class="container">
    <!-- Eco-Friendly Travel & Stay -->
    <div class="mb-5">
      <h3 class="sus-section text-center">Eco-Friendly Travel & Stay</h3>
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

    <!-- Sustainable Practices -->
    <div class="mb-5">
        <h3 class="text-center">Guide on Sustainable Pilgrim Practices</h3>
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

    <!-- Donation Guidelines and Map -->
    <div class="mb-5">
      <div class="row g-5">
        <div class="col-lg-6">
          <h3 class=>Zero-Waste Donation Guidelines</h3>
          <p class="text-muted">Donate responsibly so your charity doesn't harm the environment.</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Contribute to official community kitchens (Anna Kshetras).</li>
            <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Gift durable items like blankets or steel utensils.</li>
            <li class="list-group-item d-flex align-items-center"><i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>Use official online portals for digital donations.</li>
            <li class="list-group-item d-flex align-items-center"><i class="bi bi-x-octagon-fill text-danger me-3 fs-4"></i>Avoid donating plastic-wrapped items or single-use plastics.</li>
            <li class="list-group-item d-flex align-items-center"><i class="bi bi-x-octagon-fill text-danger me-3 fs-4"></i>Do not leave leftover food in open areas.</li>
          </ul>
        </div>

        <div class="col-lg-6">
          <h3 class=>Waste Disposal Maps</h3>
          <p class="text-muted">Find nearby color-coded bins and waste collection centers.</p>
          <div id="wasteMap" style="height: 400px; border-radius: 10px; overflow: hidden;"></div>

          <!-- Legend -->
          <div class="mt-3">
            <h6>Legend:</h6>
            <ul class="list-unstyled d-flex flex-wrap align-items-center gap-4 mt-2">
              <li><img src="assets/images/bluebin.jpg" alt="Blue Bin" style="height:30px;"> - Wet Waste (Organic)</li>
              <li><img src="assets/images/redbin.webp" alt="Red Bin" style="height:30px;"> - Dry Waste (Recyclable)</li>

            </ul>
          </div>
        </div>
      </div>
    </div>

    <hr class="my-5">

    <!-- Zero Plastic Campaign -->
    <div class="mb-5 zero-plastic-campaign">
        <h3 class="text-center">Join the Zero-Plastic Campaign</h3>
        <p class="text-center text-muted mb-4">Be a part of the solution. Let's protect our environment and our sacred river.</p>
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-cup-straw"></i></div>
                <h6>Bring Reusable Bottles</h6>
                <p class="small card-text">Refill stations are available throughout the Mela.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-bag-check-fill"></i></div>
                <h6>Carry Cloth Bags</h6>
                <p class="small card-text">Say no to plastic bags when shopping.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-shop"></i></div>
                <h6>Choose Eco-Vendors</h6>
                <p class="small card-text">Support businesses that use plastic-free packaging.</p>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-icon"><i class="bi bi-megaphone-fill"></i></div>
                <h6>Spread Awareness</h6>
                <p class="small card-text">Inspire fellow pilgrims to join the cause.</p>
            </div>
        </div>
    </div>

  </div>
</main>

<?php include 'include/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const map = L.map('wasteMap').setView([25.43, 81.85], 13); // Prayagraj

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // User's Current Location
  map.locate({ setView: true, maxZoom: 16 });
  map.on('locationfound', function (e) {
    L.marker(e.latlng).addTo(map).bindPopup("You are here").openPopup();
    L.circle(e.latlng, { radius: e.accuracy / 2, color: '#3388ff', fillColor: '#3388ff', fillOpacity: 0.2 }).addTo(map);
  });

  // Blue Bin Marker
  L.marker([25.434, 81.85], {
    icon: L.icon({
      iconUrl: 'assets/images/bluebin.jpg',
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -30]
    })
  }).addTo(map).bindPopup("<b>Blue Bin</b><br>Wet Waste (Organic)");

  // Red Bin Marker
  L.marker([25.432, 81.853], {
    icon: L.icon({
      iconUrl: 'assets/images/redbin.webp',
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -30]
    })
  }).addTo(map).bindPopup("<b>Red Bin</b><br>Dry Waste (Recyclable)");
});
</script>

</body>
</html>
