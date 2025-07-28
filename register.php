<?php include 'include/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Mahakumbh 2027</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/mahakumbh-login.css?v=4">
  
</head>
<body>

  <div class="auth-wrapper d-flex align-items-center justify-content-center">
    <div class="auth-box d-flex rounded shadow overflow-hidden">

      <!-- Left Image -->
      <div class="auth-img d-none d-md-block">
        <img src="assets/images/kumbh-login-bg.png" alt="Register" class="img-fluid">
      </div>

      <!-- Right Form -->
      <div class="auth-form p-5 bg-white w-100">
        <h3 class="text-dark fw-bold mb-2">Register</h3>
        <p class="text-muted mb-4">Create your account</p>

        <?php if(isset($_GET['error'])): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <form action="register_process.php" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 fw-bold">REGISTER</button>
        </form>

        <div class="text-center mt-4">
          Already have an account? <a href="login.php" class="text-saffron fw-semibold">Login here</a>
        </div>
      </div>
    </div>
  </div>
<?php include 'include/footer.php'; ?>
</body>
</html>
