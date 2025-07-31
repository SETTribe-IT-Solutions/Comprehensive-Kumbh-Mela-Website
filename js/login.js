document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('loginForm');
  const usernameInput = form.querySelector('[name="username"]');
  const passwordInput = form.querySelector('[name="password"]');
  const toggleBtn = document.getElementById('togglePassword');
  const toggleIcon = document.getElementById('togglePasswordIcon');

  // Password Toggle
  toggleBtn.addEventListener('click', () => {
    const isHidden = passwordInput.type === 'password';
    passwordInput.type = isHidden ? 'text' : 'password';
    toggleIcon.classList.toggle('bi-eye');
    toggleIcon.classList.toggle('bi-eye-slash');
  });

  // Hover saffron color on icon
  toggleBtn.addEventListener('mouseenter', () => {
    toggleIcon.style.color = '#e68a2e';
  });
  toggleBtn.addEventListener('mouseleave', () => {
    toggleIcon.style.color = '';
  });

  // Login Submit
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

      if (result.status === 'success') {
        Swal.fire({
          icon: 'success',
          title: 'Login Successful',
          text: result.message,
          confirmButtonColor: '#e68a2e',
          confirmButtonText: 'Go to Home'
        }).then(() => {
          window.location.href = 'index.php';
        });

      } else {
        // Login Failed
        Swal.fire({
          icon: 'error',
          title: 'Login Failed',
          text: result.message,
          showCancelButton: true,
          confirmButtonText: 'Try Again',
          cancelButtonText: 'Register',
          confirmButtonColor: '#e68a2e',
          cancelButtonColor: '#6c757d'
        }).then((swalResult) => {
          if (swalResult.isConfirmed) {
            if (result.message.toLowerCase().includes('password')) {
              passwordInput.value = '';
              passwordInput.focus();
              Swal.fire({
                icon: 'warning',
                title: 'Incorrect Password',
                text: 'Please enter the correct password.',
                confirmButtonColor: '#e68a2e'
              });
            } else if (result.message.toLowerCase().includes('username') || result.message.toLowerCase().includes('email')) {
          usernameInput.value = '';
             usernameInput.focus();
               // Just focus back, no second alert
              }

          } else if (swalResult.dismiss === Swal.DismissReason.cancel) {
            window.location.href = 'register.php';
          }
        });
      }

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
