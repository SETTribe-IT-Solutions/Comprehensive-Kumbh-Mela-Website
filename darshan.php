<?php
require_once 'include/connect.php';
include 'include/header.php';
include 'include/navbar.php';
$message = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_type'])) {
        $formType = $_POST['form_type'];

        try {
            switch ($formType) {
                case 'snan':
                    $ghat = $_POST['ghat'] ?? '';
                    $count = $_POST['devotee_count'] ?? 0;
                    $date = $_POST['snan_date'] ?? '';
                    $startTime = $_POST['start_time'] ?? '';
                    $endTime = $_POST['end_time'] ?? '';

                    $stmt = $pdo->prepare("INSERT INTO snan_booking (ghat_name, devotee_count, snan_date, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$ghat, $count, $date, $startTime, $endTime]);
                    $bookingId = $pdo->lastInsertId();

                    for ($i = 1; $i <= $count; $i++) {
                        $name = $_POST["devotee_name_$i"] ?? '';
                        $gotra = $_POST["gotra_$i"] ?? '';
                        $stmt = $pdo->prepare("INSERT INTO snan_devotees (snan_booking_id, devotee_name, gotra) VALUES (?, ?, ?)");
                        $stmt->execute([$bookingId, $name, $gotra]);
                    }
                    $message = 'Holy Dip (Snan) slot booked successfully! You will receive a QR code shortly.';
                    $status = 'success';
                    break;

                case 'epandit':
                    $poojaType = $_POST['pooja_type'] ?? '';
                    $language = $_POST['language'] ?? '';
                    $date = $_POST['pooja_date'] ?? '';
                    $stmt = $pdo->prepare("INSERT INTO epandit_booking (pooja_type, language, pooja_date) VALUES (?, ?, ?)");
                    $stmt->execute([$poojaType, $language, $date]);
                    $message = 'E-Pandit booking request submitted successfully! We will connect you with a Pandit soon.';
                    $status = 'success';
                    break;

                case 'prasad':
                    $name = $_POST['devotee_name'] ?? '';
                    $address = $_POST['address'] ?? '';
                    $pincode = $_POST['pincode'] ?? '';
                    $district = $_POST['district'] ?? '';
                    $taluka = $_POST['taluka'] ?? '';
                    $mapLink = $_POST['map_link'] ?? '';
                    $qty = $_POST['quantity'] ?? 1;
                    $totalPrice = $qty * 100;
                    $stmt = $pdo->prepare("INSERT INTO prasad_order (devotee_name, address, pincode, district, taluka, map_link, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $address, $pincode, $district, $taluka, $mapLink, $qty, $totalPrice]);
                    $message = 'Prasad order placed successfully! It will be delivered to your address.';
                    $status = 'success';
                    break;

                case 'donation':
                    $name = $_POST['devotee_name'] ?? '';
                    $amount = $_POST['amount'] ?? 0;
                    $address = $_POST['address'] ?? '';
                    $stmt = $pdo->prepare("INSERT INTO donation_sankalp (devotee_name, donation_amount, address) VALUES (?, ?, ?)");
                    $stmt->execute([$name, $amount, $address]);
                    $message = 'Thank you for your generous donation! Your Sankalp has been registered.';
                    $status = 'success';
                    break;

                default:
                    $message = 'Invalid form submission.';
                    $status = 'error';
                    break;
            }
        } catch (PDOException $e) {
            $message = 'Database error: ' . $e->getMessage();
            $status = 'error';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rituals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=33">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .feature-video { background: #f9f9f9; padding: 30px; border-radius: 10px; text-align: center; }
        .feature-video iframe { width: 100%; height: 300px; border: none; border-radius: 8px; }
    </style>
</head>
<body>

<main>
    <section id="darshan-hero" class="text-center text-white">
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <h1 class="hero-title">Rituals & Darshan Services</h1>
            <p class="hero-announcement">Connect with the divine. Book your sacred services online.</p>
        </div>
    </section>

    <div class="container section-padding">
        <div class="feature-video mb-5">
            <h2 class="mb-3">Live Darshan & Virtual Pooja</h2>
            <iframe width="560" height="560" src="https://www.youtube.com/embed/vJY1Nn9xc-U?si=uQYWgLqc_5S50Cqa&controls=0&start=36" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p class="mt-3">Watch the sacred rituals live and feel spiritually connected.</p>
        </div>

        <div class="booking-module">
            <h2 class="section-title text-start">Holy Dip (Snan) Slot Booking</h2>
            <form class="row g-3" method="POST">
                <input type="hidden" name="form_type" value="snan">
                <div class="col-md-6">
                    <label class="form-label">Select Ghat</label>
                    <select class="form-select" id="ghat-select" name="ghat" required>
                        <option disabled selected value="">Select a Ghat</option>
                        <option value="Ramkund">Ramkund</option>
                        <option value="Trimbakeshwar">Kushavarta Tirtha (Trimbakeshwar)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Number of Devotees</label>
                    <input type="number" class="form-control" id="devotee-count" name="devotee_count" min="1" required>
                </div>
                <div class="col-12" id="devotee-names-container"></div>
                <div class="col-md-6">
                    <label class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="snan-date" name="snan_date" required>
                </div>
               <div class="col-md-6">
  <label class="form-label">Select Time Slot</label>
  <div class="d-flex gap-2">
    <select class="form-select" id="start-time">
      <option disabled selected>Start Time</option>
    </select>
    <span class="align-self-center">to</span>
    <select class="form-select" id="end-time">
      <option disabled selected>End Time</option>
    </select>
  </div>
</div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Book Slot & Get QR Code</button>
                </div>
            </form>
        </div>

        <div class="booking-module mt-5">
            <h2 class="section-title text-start">E-Pandit Booking</h2>
            <form class="row g-3" method="POST">
                <input type="hidden" name="form_type" value="epandit">
                <div class="col-md-6">
                    <label class="form-label">Type of Pooja</label>
                    <input list="pooja-types" class="form-control" placeholder="Search Pooja" name="pooja_type" required>
                    <datalist id="pooja-types">
                        <option value="Kalsarpa Shanti">
                        <option value="Narayan Nagbali">
                        <option value="Tripindi Shraddha">
                        <option value="General Sankalp">
                    </datalist>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pandit's Language</label>
                    <select class="form-select" name="language" required>
                        <option disabled selected value="">Select Language</option>
                        <option>Marathi</option>
                        <option>Hindi</option>
                        <option>English</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date for Pooja</label>
                    <input type="date" class="form-control" id="pooja-date-input" name="pooja_date" required>
                </div>
                <div class="col-md-6 align-self-end">
                    <button type="submit" class="btn btn-primary w-100">Search for Pandits</button>
                </div>
            </form>
        </div>

        <div class="booking-module mt-5">
            <h2 class="section-title text-start">Prasad Delivery</h2>
            <form class="row g-3" method="POST">
                <input type="hidden" name="form_type" value="prasad">
                <div class="col-md-6"><label class="form-label">Devotee Name</label><input type="text" class="form-control" name="devotee_name" required></div>
                <div class="col-md-6"><label class="form-label">Address</label><input type="text" class="form-control" name="address" required></div>
                <div class="col-md-4"><label class="form-label">Pincode</label><input type="text" class="form-control" id="pincode" name="pincode" required></div>
                <div class="col-md-4"><label class="form-label">District</label><input type="text" class="form-control" id="district" name="district" required></div>
                <div class="col-md-4"><label class="form-label">Taluka</label><input type="text" class="form-control" id="taluka" name="taluka" required></div>
                <div class="col-md-12"><label class="form-label">Google Map Link(Paste Your URL)</label><input type="url" class="form-control" name="map_link"></div>
                <div class="col-md-6"><label class="form-label">Quantity (Boxes)</label><input type="number" class="form-control" id="box-count" name="quantity" min="1" value="1" required></div>
                <div class="col-md-6"><label class="form-label">Total Price (₹)</label><input type="text" class="form-control" id="total-price" readonly name="total_price"></div>
                <div class="col-12"><button class="btn btn-primary w-100" type="submit">Order Prasad</button></div>
            </form>
        </div>

       <!-- Sankalp & Donation -->
<div class="booking-module mt-5">
  <h2 class="section-title text-start">Sankalp & Donation Seva</h2>
  <form class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Devotee Name</label>
      <input type="text" class="form-control" name="devotee_name">
    </div>
    <div class="col-md-6">
      <label class="form-label">Donation Amount (₹)</label>
      <input type="number" class="form-control" name="amount">
    </div>
    <div class="col-12">
      <label class="form-label">Address</label>
      <input type="text" class="form-control" name="address">
    </div>
    
    <div class="col-md-6">
      <button class="btn btn-primary w-100">Submit</button>
    </div>

    <!-- ✅ QR Code Section -->
    <div class="col-md-6 text-center">
      
      <img src="https://api.qrserver.com/v1/create-qr-code/?data=upi://pay?pa=donate@upi&pn=KumbhMelaDonation&am=500&cu=INR&size=150x150" 
           alt="QR Code for Donation" 
           class="img-fluid rounded shadow" 
           style="max-width: 180px;">
      <p class="mt-2 small text-muted">Scan with any UPI App</p>
    </div>
  </form>
</div>

</main>

<?php include 'include/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const countInput = document.getElementById('devotee-count');
    const container = document.getElementById('devotee-names-container');
    const snanDateInput = document.getElementById('snan-date');
    const poojaDateInput = document.getElementById('pooja-date-input');
    const boxCount = document.getElementById('box-count');
    const totalPrice = document.getElementById('total-price');

    // Dynamically add devotee name/gotra fields for Snan booking
    countInput?.addEventListener('input', () => {
        container.innerHTML = ''; // Clear previous
        const count = parseInt(countInput.value);

        if (!isNaN(count) && count > 0) {
            for (let i = 1; i <= count; i++) {
                const row = document.createElement('div');
                row.className = 'row g-2 mb-2';

                row.innerHTML = `
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Devotee ${i} Name" name="devotee_name_${i}" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Gotra of Devotee ${i}" name="gotra_${i}" required>
                    </div>
                `;
                container.appendChild(row);
            }
        }
    });

    // Set minimum date for date inputs to today
    const today = new Date().toISOString().split("T")[0];
    if (snanDateInput) snanDateInput.min = today;
    if (poojaDateInput) poojaDateInput.min = today;

    // Calculate total price for Prasad delivery
    if (boxCount && totalPrice) {
        // Initialize total price on page load
        totalPrice.value = (parseInt(boxCount.value) || 0) * 100;

        boxCount.addEventListener('input', () => {
            const count = parseInt(boxCount.value) || 0;
            totalPrice.value = count * 100;
        });
    }

    // SweetAlert integration
    <?php if ($message): ?>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '<?php echo $status; ?>',
            title: '<?php echo $status === "success" ? "Success!" : "Oops..."; ?>',
            text: '<?php echo $message; ?>',
            confirmButtonText: 'OK'
        });
    });
    <?php endif; ?>
</script>
<script>
  const pincodeInput = document.getElementById('pincode');
  const districtInput = document.getElementById('district');
  const talukaInput = document.getElementById('taluka');

  pincodeInput?.addEventListener('input', function () {
    const pin = this.value.trim();
    if (pin.length === 6 && /^[1-9][0-9]{5}$/.test(pin)) {
      fetch(`https://api.postalpincode.in/pincode/${pin}`)
        .then(res => res.json())
        .then(data => {
          if (data[0].Status === "Success" && data[0].PostOffice.length > 0) {
            const office = data[0].PostOffice[0];
            districtInput.value = office.District || '';
            talukaInput.value = office.Block || office.Taluk || '';
          } else {
            districtInput.value = '';
            talukaInput.value = '';
            console.warn("Pincode found but no post office data.");
          }
        })
        .catch(() => {
          districtInput.value = '';
          talukaInput.value = '';
          alert("Unable to fetch location info. Please check your internet or try again.");
        });
    } else {
      districtInput.value = '';
      talukaInput.value = '';
    }
  });
</script>
<script>
function populateTimeDropdowns() {
  const startTime = document.getElementById("start-time");
  const endTime = document.getElementById("end-time");

  const formatAMPM = (h, m) => {
    const hour = h % 12 === 0 ? 12 : h % 12;
    const ampm = h < 12 ? "AM" : "PM";
    return `${String(hour).padStart(2, '0')}:${String(m).padStart(2, '0')} ${ampm}`;
  };

  for (let h = 0; h < 24; h++) {
    for (let m of [0, 30]) {
      const value = `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}`;
      const label = formatAMPM(h, m);
      startTime.add(new Option(label, value));
      endTime.add(new Option(label, value));
    }
  }

  startTime.addEventListener('change', () => {
    const selected = startTime.value;
    Array.from(endTime.options).forEach(opt => {
      opt.disabled = opt.value === selected;
    });
  });
}

populateTimeDropdowns();
</script>



<script src="js/main.js" defer></script>
</body>
</html>
