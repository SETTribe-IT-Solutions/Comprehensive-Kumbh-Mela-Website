<?php
require_once 'include/connect.php';
include 'include/navbar.php'; 
?>

<?php
$pageTitle = "Health & Safety - Kumbh Mela 2027";
$activePage = "health";
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

  <link rel="stylesheet" href="css/health.css?v=251">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div id="sos-status" class="alert alert-dismissible fade show">
  <button type="button" class="btn-close" onclick="hideStatus()"></button>
  <span id="sos-status-message"></span>
</div>

<main>
  <!-- Helpline Ticker -->
  <div class="alert-ticker-container">
    <div class="helpline">
      <i class="bi bi-telephone-fill"></i>
      <span>Medical Helpline:</span>
    </div>
    <div class="ticker-wrap">
      <div class="ticker" onmouseover="this.style.animationPlayState='paused'" onmouseout="this.style.animationPlayState='running'">
        <p> <i class="bi bi-exclamation-triangle-fill"></i> Emergency: 108 | Ambulance: 102 | Police: 100 | Women's Helpline: 1091 | Mental Health: 1800-599-0019</p>
      </div>
    </div>
  </div>


  <div class="health-section">
    <h1 class="health-title">Health & Safety</h1>
    <div class="underline-wrapper">
      <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
    </div>
  </div>

  
  <div class="container section-padding">
    <!-- SOS BUTTON -->
    <div class="row mb-5 sos-row">
      <div class="col-12 text-center">
        <button class="btn btn-danger btn-sos" id="sos-button">
          <i class="bi bi-bell-fill"></i>
          <span id="sos-button-text">EMERGENCY SOS</span>
          <small id="sos-button-desc">Press in case of a medical or safety emergency</small>
        </button>
      </div>
    </div>

    <!-- Grid -->
    <div class="row g-4">
      <!-- LEFT SIDE -->
      <div class="col-lg-7">
        <!-- Doctor Consultation -->
        <div class="booking-module health-card">
          <h2 class="section-title text-start">24x7 Online Doctor Consultation</h2>
          <form id="doctorForm" novalidate>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" required>
              <div class="invalid-feedback" id="name-error">Please enter a valid name (min 3 letters).</div>
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile Number</label>
              <input type="tel" class="form-control" id="mobile" required>
              <div class="invalid-feedback" id="mobile-error">Please enter a valid 10-digit mobile number.</div>
            </div>
            <div class="mb-3">
              <label for="symptoms" class="form-label">Describe your symptoms (optional)</label>
              <textarea class="form-control" id="symptoms" rows="4" maxlength="500"></textarea>
              <div class="invalid-feedback" id="symptoms-error">Symptoms should not exceed 500 characters.</div>
            </div>
            <button type="submit" class="btn btn-primary w-100" id="btn-consult-doctor">Connect to a Doctor Now</button>
          </form>
        </div>

        <!-- Wearables -->
        <div class="booking-module health-card mt-4">
          <h2 class="section-title text-start">Wearable Device Support</h2>
          <p class="text-muted">Connect a GPS wearable to track children or elderly family members.</p>
          <form class="row g-3">
            <div class="col-md-8">
              <label for="wearable-id" class="form-label">Enter Wearable Device ID</label>
              <input type="text" class="form-control" id="wearable-id" placeholder="e.g., 987-654-3210">
            </div>
            <div class="col-md-4 align-self-end">
              <button type="submit" class="btn btn-secondary w-100" id="btn-register-device">Register Device</button>
            </div>
          </form>
        </div>
      </div>

      <!-- RIGHT SIDE MAP -->
      <div class="col-lg-5">
        <div class="booking-module health-card healthfind">
          <h2 class="section-title text-start">Nearby Medical Help</h2>
          <p class="text-muted">Find the closest first-aid posts, clinics, and hospitals on the map.</p>
          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'include/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
// SOS Functionality
function showStatus(message, type = 'info') {
  const statusEl = document.getElementById('sos-status');
  statusEl.style.display = 'block';
  statusEl.className = `alert alert-${type} alert-dismissible fade show`;
  document.getElementById('sos-status-message').innerHTML = message;
}

function hideStatus() {
  document.getElementById('sos-status').style.display = 'none';
}

document.getElementById('sos-button').addEventListener('click', async function () {
  const sosButton = this;
  const originalHTML = sosButton.innerHTML;

  const result = await Swal.fire({
    title: 'Send Emergency Alert?',
    text: "Your location will be shared with help centers.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Send Alert',
    cancelButtonText: 'Cancel'
  });

  if (!result.isConfirmed) return;

  sosButton.innerHTML = '<i class="bi bi-arrow-repeat sos-spinner"></i> Locating...';
  sosButton.disabled = true;
  
  try {
    const position = await getLocation({ enableHighAccuracy: true, timeout: 10000 });
    sosButton.innerHTML = '<i class="bi bi-arrow-repeat sos-spinner"></i> Sending...';
    const result = await sendSOSAlert(sosButton, originalHTML, {
      latitude: position.coords.latitude,
      longitude: position.coords.longitude,
      accuracy: position.coords.accuracy
    });

    Swal.fire('Success', 'Alert sent! Help is on the way.', 'success');
  } catch (error) {
    console.error('Location Error:', error);
    Swal.fire('Warning', 'Could not get precise location. Trying approximate...', 'warning');

    try {
      const position = await getLocation({ enableHighAccuracy: false, timeout: 5000 });
      showStatus('Sending alert with approximate location...', 'info');
      sosButton.innerHTML = '<i class="bi bi-arrow-repeat sos-spinner"></i> Sending...';
      await sendSOSAlert(sosButton, originalHTML, {
        latitude: position.coords.latitude,
        longitude: position.coords.longitude,
        accuracy: position.coords.accuracy
      });
      Swal.fire('Success', 'Alert sent with approximate location.', 'success');
    } catch (fallbackError) {
      console.error('Fallback Location Error:', fallbackError);
      Swal.fire('Error', 'Could not get location. Sending alert anyway.', 'error');
      sosButton.innerHTML = '<i class="bi bi-arrow-repeat sos-spinner"></i> Sending...';
      await sendSOSAlert(sosButton, originalHTML, {
        latitude: null,
        longitude: null,
        accuracy: null
      });
      Swal.fire('Success', 'Alert sent without location.', 'success');
    }
  } finally {
    sosButton.innerHTML = originalHTML;
    sosButton.disabled = false;
    setTimeout(hideStatus, 5000);
  }
});

function getLocation(options) {
  return new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject, options);
  });
}

async function sendSOSAlert(button, originalHTML, locationData) {
  try {
    const formData = new FormData();
    formData.append('sos_alert', 'true');
    if (locationData.latitude && locationData.longitude) {
      formData.append('latitude', locationData.latitude);
      formData.append('longitude', locationData.longitude);
      formData.append('accuracy', locationData.accuracy || 0);
    }

    const response = await fetch('sos_handler.php', {
      method: 'POST',
      body: formData
    });

    if (!response.ok) throw new Error('Network response was not ok');
    return await response.json();
  } catch (error) {
    console.error('Error:', error);
    Swal.fire('Error', 'Failed to send alert. Please try again or call directly.', 'error');
    throw error;
  }
}

// Doctor Consultation Form
document.getElementById('doctorForm').addEventListener('submit', function (e) {
  e.preventDefault();
  document.querySelectorAll('.form-control').forEach(input => input.classList.remove('is-invalid'));

  const name = document.getElementById('name').value.trim();
  const mobile = document.getElementById('mobile').value.trim();
  const symptoms = document.getElementById('symptoms').value.trim();

  const isValidIndianMobile = (number) => {
    return /^[6-9]\d{9}$/.test(number) && !/^(\d)\1{9}$/.test(number);
  };

  let valid = true;

  if (!/^[a-zA-Z\s]{3,}$/.test(name)) {
    document.getElementById('name').classList.add('is-invalid');
    valid = false;
  }

  if (!isValidIndianMobile(mobile)) {
    document.getElementById('mobile').classList.add('is-invalid');
    valid = false;
  }

  if (symptoms.length > 500) {
    document.getElementById('symptoms').classList.add('is-invalid');
    valid = false;
  }

  if (!valid) return;

  fetch('submit_consultation.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, mobile, symptoms })
  })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        Swal.fire('Success', 'Your request has been submitted!', 'success');
        document.getElementById('doctorForm').reset();
      } else {
        Swal.fire('Error', data.message || 'Something went wrong.', 'error');
      }
    })
    .catch(err => {
      Swal.fire('Error', 'Server connection failed.', 'error');
      console.error(err);
    });
});

// Map Initialization
const map = L.map('map').setView([25.45, 81.85], 14);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(async (position) => {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;

    map.setView([lat, lon], 16);
    L.marker([lat, lon]).addTo(map).bindPopup("You are here").openPopup();

    const query = `
      [out:json];
      (
        node["amenity"="hospital"](around:2000,${lat},${lon});
        node["amenity"="clinic"](around:2000,${lat},${lon});
        node["emergency"="yes"](around:2000,${lat},${lon});
      );
      out body;
    `;

    const url = 'https://overpass-api.de/api/interpreter?data=' + encodeURIComponent(query);

    try {
      const res = await fetch(url);
      const data = await res.json();

      data.elements.forEach(el => {
        if (el.lat && el.lon) {
          const name = el.tags.name || "Unnamed Medical Facility";
          const type = el.tags.amenity || "Help Point";
          L.marker([el.lat, el.lon], {
            icon: L.icon({
              iconUrl: 'https://www.nicepng.com/png/full/87-874647_red-cross-hospital-logo-hospital-logo-red-cross.png',
              iconSize: [32, 32]
            })
          }).addTo(map).bindPopup(`<strong>${name}</strong><br>Type: ${type}`);
        }
      });
    } catch (err) {
      console.error("Overpass fetch failed", err);
      Swal.fire('Error', 'Unable to load nearby medical help.', 'error');
    }
  }, () => {
    Swal.fire('Permission Denied', 'Location access denied. Cannot show nearby help.', 'warning');
  });
} else {
  Swal.fire('Unsupported', 'Geolocation not supported by your browser.', 'error');
}
</script>
</body>
</html>