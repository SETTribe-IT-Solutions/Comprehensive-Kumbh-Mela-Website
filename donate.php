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
  <title>Donate - Sankalp & Donation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/donation.css?v=1">

</head>
<body>

<main class="container section-padding">
 <div > <h1 class="mb-4 text-center">Sankalp & Donation Seva</h1>
   <div class="underline-wrapper">
          <img src="assets/images/underline.png" alt="decorative underline" class="section-underline">
        </div>
 </div>
 
  <!-- AI Budget Suggestion -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h5 class="card-title"> Plan Your Donation</h5>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Days of Stay</label>
          <input type="number" class="form-control" id="stay-days" placeholder="e.g. 3">
        </div>
        <div class="col-md-4">
          <label class="form-label">Pooja Count</label>
          <input type="number" class="form-control" id="pooja-count" placeholder="e.g. 2">
        </div>
        <div class="col-md-4">
          <label class="form-label">Prasad Quantity</label>
          <input type="number" class="form-control" id="prasad-count" placeholder="e.g. 1">
        </div>
      </div>
      <div class="mt-3">
        <button class="btn btn-outline-primary" onclick="suggestDonation()">Suggest Donation</button>
        <span id="suggested-amount" class="ms-3 fw-bold text-success"></span>
      </div>
    </div>
  </div>

  <!-- Donation Form -->
  <form class="row g-3" method="POST">
    <input type="hidden" name="form_type" value="donation">

    <div class="col-md-6">
      <label class="form-label">Devotee Name</label>
      <input type="text" class="form-control" name="devotee_name" id="donor-name" required>
    </div>

    <div class="col-md-6">
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

    <div class="col-md-6">
      <button class="btn btn-primary w-100" type="submit"></i>Donate</button>
    </div>

    <div class="col-md-6 text-center">
      <p class="mb-2 fw-semibold">Scan & Pay via UPI</p>
      <img id="qr-image" class="img-fluid rounded shadow" 
           src="https://api.qrserver.com/v1/create-qr-code/?data=upi://pay?pa=donate@upi&pn=KumbhMelaDonation&am=500&cu=INR&size=150x150" 
           alt="QR Code for Donation" 
           style="max-width: 180px;">
      <p class="mt-2 small text-muted">QR auto-updates with name + amount</p>
    </div>
  </form>
</main>

<?php include 'include/footer.php'; ?>

<!-- SweetAlert -->
<script>
<?php if ($message): ?>
document.addEventListener('DOMContentLoaded', function () {
  Swal.fire({
    icon: '<?php echo $status; ?>',
    title: '<?php echo $status === "success" ? "Thank You!" : "Oops..."; ?>',
    text: '<?php echo $message; ?>',
    confirmButtonText: 'OK'
  });
});
<?php endif; ?>
</script>

<!-- QR Dynamic & AI Planner -->
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

  function suggestDonation() {
    const days = parseInt(document.getElementById('stay-days').value || 0);
    const poojas = parseInt(document.getElementById('pooja-count').value || 0);
    const prasads = parseInt(document.getElementById('prasad-count').value || 0);

    let amount = (days * 100) + (poojas * 150) + (prasads * 100);
    if (amount === 0) {
      document.getElementById('suggested-amount').innerText = 'Please fill valid trip details.';
      return;
    }

    document.getElementById('suggested-amount').innerText = `Suggested: ₹${amount}`;
    document.getElementById('donation-amount').value = amount;
    updateQRCode();
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js" defer></script>
</body>
</html>
