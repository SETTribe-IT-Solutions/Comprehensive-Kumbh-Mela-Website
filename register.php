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
  <style>
  .required-label::after {
    content: " *";
    color: red;
    font-weight: bold;
  }
</style>

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

          <form id="registerForm" method="POST">

  <!-- Full Name -->
  <div class="mb-3">
    <label for="fullname" class="required-label">Full Name</label>
    <input type="text" class="form-control" id="fullname" name="fullname" required>
    <div class="form-text text-danger" id="fullnameError"></div>
  </div>

  <!-- Email -->
  <div class="mb-3">
    <label for="email" class="required-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div class="form-text text-danger" id="emailError"></div>
  </div>

  <!-- Username -->
  <div class="mb-3">
    <label for="username" class="required-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
    <div class="form-text text-danger" id="usernameError"></div>
  </div>

  <!-- Password -->
  <div class="mb-3">
    <label for="passwordInput" class="required-label">Password</label>
    <div class="position-relative">
      <input type="password" class="form-control" id="passwordInput" name="password" minlength="8" required>
      <button type="button" class="btn position-absolute top-0 end-0 mt-1 me-2" id="togglePassword" tabindex="-1" style="border: none; background: none;">
        <i class="bi bi-eye" id="togglePasswordIcon"></i>
      </button>
    </div>
    <div class="form-text text-danger" id="passwordError"></div>
  </div>

  <!-- Confirm Password -->
  <div class="mb-3">
    <label for="confirmPasswordInput" class="required-label">Confirm Password</label>
    <div class="position-relative">
      <input type="password" class="form-control" id="confirmPasswordInput" name="confirm_password" minlength="8" required>
      <button type="button" class="btn position-absolute top-0 end-0 mt-1 me-2" id="toggleConfirmPassword" tabindex="-1" style="border: none; background: none;">
        <i class="bi bi-eye" id="toggleConfirmPasswordIcon"></i>
      </button>
    </div>
    <div class="form-text text-danger" id="confirmError"></div>
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
