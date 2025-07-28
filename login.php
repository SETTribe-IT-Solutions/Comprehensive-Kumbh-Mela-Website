<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Mahakumbh 2027</title>
  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/mahakumbh-login.css?v=4">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
    }

    .auth-wrapper {
      min-height: 100vh;
      padding: 2rem;
    }

    .auth-box {
      max-width: 900px;
      width: 100%;
      background-color: #fff;
    }

    .auth-img {
      width: 50%;
      background-color: #eee;
    }

    .auth-img img {
      height: 100%;
      object-fit: cover;
    }

    .auth-form {
      width: 100%;
    }

    .text-saffron {
      color: #FF6F00;
    }

    .btn-primary {
      background-color: #FF6F00;
      border-color: #FF6F00;
    }

    .btn-primary:hover {
      background-color: #e65c00;
      border-color: #e65c00;
    }
  </style>
</head>
<body>

  <div class="auth-wrapper d-flex align-items-center justify-content-center">
    <div class="auth-box d-flex rounded shadow overflow-hidden">

      <!-- Left Image -->
      <div class="auth-img d-none d-md-block">
        <img src="assets/images/kumbh-login-bg.png" alt="Login" class="img-fluid w-100 h-100">
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

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent actual form submission

      Swal.fire({
        icon: 'success',
        title: 'Login Successful',
        text: 'You have successfully logged in!',
        confirmButtonColor: '#FF6F00',
        confirmButtonText: 'Go to Home'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'index.php'; // Redirect to home page
        }
      });
    });
  </script>

</body>
</html>
