<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Under Construction - Kumbh Mela 2027</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css?v=25">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
      color: #333;
    }

    .construction-content {
      max-width: 600px;
      margin: auto;
      animation: fadeIn 1s ease-in-out;
    }

    .construction-icon {
      font-size: 4rem;
      color: #0d6efd;
      display: inline-block;
      animation: rotate 3s linear infinite;
    }

    .section-title {
      font-size: 2.5rem;
      margin-top: 20px;
    }

    @keyframes rotate {
      0%   { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes fadeIn {
      0%   { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    footer {
      font-size: 0.9rem;
    }

    @media (max-width: 576px) {
      .section-title {
        font-size: 2rem;
      }

      .construction-icon {
        font-size: 3rem;
      }
    }
  </style>
</head>
<body>

  <main>
    <!-- UNDER CONSTRUCTION SECTION -->
    <section class="container text-center py-5 my-5">
      <div class="construction-content">
        <i class="bi bi-gear-fill construction-icon"></i>
        <h1 id="page-title" class="section-title mt-4">Page Under Construction</h1>
        <p class="lead text-muted" id="coming-soon-message">
          The details for this section are being finalized and will be available soon. We appreciate your patience.
        </p>
        <a href="index.php" class="btn btn-primary mt-3" id="go-back-button">
          <i class="bi bi-house-door-fill"></i> Go Back to Home
        </a>
      </div>
    </section>
  </main>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS (optional if needed for translations or other logic) -->
  <script src="js/main.js" defer></script>
</body>
</html>
