<?php 
require_once 'include/connect.php';
include 'include/navbar.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Mahakumbh 2027</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/mahakumbh-login.css?v=10">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column min-vh-100">

  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="auth-wrapper d-flex align-items-center justify-content-center w-100">
      <div class="auth-box d-flex rounded shadow overflow-hidden">

        <!-- Left Image -->
        <div class="auth-img d-none d-md-block">
          <img src="assets/images/kumbh-login-bg.png" alt="Register" class="img-fluid">
        </div>

        <!-- Right Form -->
        <div class="auth-form p-5 bg-white w-100">
          <h3 class="text-dark fw-bold mb-2">Register</h3>
          <p class="text-muted mb-4">Create your account</p>

          <form id="registerForm" novalidate>
            <div class="mb-3">
              <input type="text" class="form-control" name="fullname" placeholder="Full Name">
              <div class="form-text text-danger" id="fullnameError"></div>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <div class="form-text text-danger" id="emailError"></div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="username" placeholder="Username">
              <div class="form-text text-danger" id="usernameError"></div>
            </div>
            <div class="mb-3 position-relative">
  <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Password" required>
  <button type="button" class="btn position-absolute top-0 end-0 mt-1 me-2" id="togglePassword" tabindex="-1" style="border: none; background: none;">
    <i class="bi bi-eye" id="togglePasswordIcon"></i>
  </button>
</div>

<div class="mb-3 position-relative">
  <input type="password" class="form-control" name="confirm_password" id="confirmPasswordInput" placeholder="Confirm Password" required>
  <button type="button" class="btn position-absolute top-0 end-0 mt-1 me-2" id="toggleConfirmPassword" tabindex="-1" style="border: none; background: none;">
    <i class="bi bi-eye" id="toggleConfirmPasswordIcon"></i>
  </button>
</div>

            <button type="submit" class="btn btn-primary w-100 fw-bold">REGISTER</button>
          </form>

          <div class="text-center mt-4">
            Already have an account? 
            <a href="login.php" class="text-saffron fw-semibold">Login here</a>
          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include 'include/footer.php'; ?>

  <script src="js/register.js?v=2"></script>

</body>
</html>
