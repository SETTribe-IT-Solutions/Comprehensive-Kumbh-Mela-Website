document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('loginForm');

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch('login_process.php', {
        method: 'POST',
        body: formData
      });

      const text = await response.text();
      console.log("Login Response:", text);

      const result = JSON.parse(text);

      Swal.fire({
        icon: result.status === 'success' ? 'success' : 'error',
        title: result.status === 'success' ? 'Login Successful' : 'Login Failed',
        text: result.message,
        confirmButtonColor: '#e68a2e',
        confirmButtonText: result.status === 'success' ? 'Go to Home' : 'Register'
      }).then(() => {
        if (result.status === 'success') {
          window.location.href = 'index.php';
        } else {
          window.location.href = 'register.php';
        }
      });

    } catch (err) {
      console.error("JSON parsing error", err);
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: 'Server returned invalid response.',
        confirmButtonColor: '#e68a2e'
      });
    }
  });
});
