<?php include 'include/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Mahakumbh 2027</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/mahakumbh-login.css?v=6">
</head>
<body class="d-flex flex-column min-vh-100">

  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="auth-wrapper d-flex align-items-center justify-content-center w-100">
      <div class="auth-box d-flex rounded shadow overflow-hidden">

        <!-- Left Image -->
        <div class="auth-img d-none d-md-block">
          <img src="assets/images/kumbh-login-bg.png" alt="Login" class="img-fluid">
        </div>

        <!-- Right Form -->
        <div class="auth-form p-5 bg-white w-100">
          <h3 class="text-dark fw-bold mb-2">Login</h3>
          <p class="text-muted mb-4">Please login to continue</p>

          <form id="loginForm">
            <div class="mb-3">
              <input type="text" class="form-control" name="username" placeholder="Email or Username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember">
                <label class="form-check-label" for="remember">Keep Me Logged In</label>
              </div>
              <a href="#" class="text-primary text-decoration-none">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold">LOGIN</button>
          </form>

          <div class="text-center mt-4">
            Don't have an account? 
            <a href="register.php" class="text-saffron fw-semibold">Register here</a>
          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include 'include/footer.php'; ?>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();

      Swal.fire({
        icon: 'success',
        title: 'Login Successful',
        text: 'You have successfully logged in!',
        confirmButtonColor: '#e68a2e',
        confirmButtonText: 'Go to Home'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'index.php';
        }
      });
    });
  </script>
</body>
</html>
