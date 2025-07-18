<?php
require_once 'include/connect.php';
include 'include/navbar.php';

$message = '';
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_type'] === 'donation') {
    try {
        $name = $_POST['devotee_name'] ?? '';
        $amount = $_POST['amount'] ?? 0;
        $address = $_POST['address'] ?? '';
        $card = $_POST['kumbh_card'] ?? '';

        $stmt = $pdo->prepare("INSERT INTO donation_sankalp (devotee_name, donation_amount, address, kumbh_card) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $amount, $address, $card]);

        $message = 'Thank you for your generous donation! Your Sankalp has been registered.';
        $status = 'success';
    } catch (PDOException $e) {
        $message = 'Database error: ' . $e->getMessage();
        $status = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pilgrimage Budget & Donation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/donation.css?v=216">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<main class="container">
  <h1>Pilgrimage Budget & Donation</h1>
  <div class="underline-wrapper">
    <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
  </div>

  <!-- AI-Based Pilgrimage Budget Planner -->
  <div class="card booking-module">
    <div class="card-body">
      <h3>AI-Based Pilgrimage Budget Planner </h3>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Days of Stay</label>
          <input type="number" class="form-control" id="stay-days" placeholder="e.g. 3">
        </div>
        <div class="col-md-4">
          <label class="form-label">Meals per Day</label>
          <input type="number" class="form-control" id="meals" placeholder="e.g. 3">
        </div>
        <div class="col-md-4">
          <label class="form-label">Travel Cost (₹)</label>
          <input type="number" class="form-control" id="travel-cost" placeholder="e.g. 1000">
        </div>
      </div>
      <div class="mt-3">
        <button class="btn btn-outline-primary" onclick="suggestBudget()">Calculate Budget</button>
        <span id="suggested-amount" class="ms-3 fw-bold text-success"></span>
      </div>
    </div>
  </div>

  <!-- Donation Section -->
  <!-- ...existing PHP code remains same... -->
  <!-- Donation Section -->
  <div class="card booking-module">
    <div class="card-body">
      <h3 >Make a Donation</h3>
      <div class="row">
        <!-- Left Column: Donation Form -->
        <div class="col-md-7">
          <form method="POST" class="row g-3">
            <input type="hidden" name="form_type" value="donation">

            <div class="col-12">
              <label class="form-label">Devotee Name</label>
              <input type="text" class="form-control" name="devotee_name" id="donor-name" required>
            </div>

            <div class="col-12">
              <label class="form-label">Donation Amount (₹)</label>
              <input type="number" class="form-control" name="amount" id="donation-amount" min="1" required>
            </div>

            <div class="col-12">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" name="address" required>
            </div>

            <div class="col-12">
              <label class="form-label">Prepaid Kumbh Card Number <span class="text-muted small">(Optional)</span></label>
              <input type="text" class="form-control" name="kumbh_card" placeholder="XXXX-XXXX-XXXX">
            </div>

            <div class="col-12">
              <button class="btn btn-primary w-100 mt-3" type="submit">Donate</button>
            </div>
          </form>
        </div>

        <!-- Right Column: QR Code (Styled Box) -->
<div class="col-md-5 d-flex align-items-center justify-content-center">
  <div class="scanner-box text-center w-100">
    <p class="fw-semibold mb-2">Scan & Pay via UPI</p>
    <img id="qr-image"
      src="https://api.qrserver.com/v1/create-qr-code/?data=upi://pay?pa=donate@upi&pn=KumbhMelaDonation&am=500&cu=INR&size=150x150"
      alt="QR Code for Donation">
    <p class="small text-muted mt-2">QR auto-updates with name + amount</p>
  </div>
</div>

    </div>
  </div>

</main>

<?php include 'include/footer.php'; ?>

<!-- SweetAlert Message -->
<?php if ($message): ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: '<?php echo $status; ?>',
      title: '<?php echo $status === "success" ? "Thank You!" : "Oops..."; ?>',
      text: '<?php echo $message; ?>',
      confirmButtonText: 'OK'
    });
  });
</script>
<?php endif; ?>

<!-- Budget Planner & QR Update Script -->
<script>
  const amountInput = document.getElementById("donation-amount");
  const qrImage = document.getElementById("qr-image");
  const nameInput = document.getElementById("donor-name");

  function updateQRCode() {
    const amt = amountInput.value || 0;
    const name = encodeURIComponent(nameInput.value || "Donor");
    const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?data=upi://pay?pa=donate@upi&pn=${name}&am=${amt}&cu=INR&size=150x150`;
    qrImage.src = qrUrl;
  }

  amountInput.addEventListener("input", updateQRCode);
  nameInput.addEventListener("input", updateQRCode);

  function suggestBudget() {
    const days = parseInt(document.getElementById('stay-days').value || 0);
    const meals = parseInt(document.getElementById('meals').value || 0);
    const travel = parseInt(document.getElementById('travel-cost').value || 0);

    if (days <= 0 || meals <= 0 || travel < 0) {
      document.getElementById('suggested-amount').innerText = 'Please fill all fields correctly.';
      return;
    }

    const lodgingCost = days * 200;
    const foodCost = days * meals * 50;
    const total = lodgingCost + foodCost + travel;

    document.getElementById('suggested-amount').innerText = `Estimated Trip Budget: ₹${total}`;
    updateQRCode();
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js" defer></script>
</body>
</html>
