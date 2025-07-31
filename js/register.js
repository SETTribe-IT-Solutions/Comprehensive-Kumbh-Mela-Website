document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('registerForm');

  if (!form) {
    console.error('Form with ID "registerForm" not found.');
    return;
  }

  // 🔒 Password visibility toggles
  const passwordInput = document.getElementById('passwordInput');
  const confirmPasswordInput = document.getElementById('confirmPasswordInput');
  const togglePasswordIcon = document.getElementById('togglePasswordIcon');
  const toggleConfirmPasswordIcon = document.getElementById('toggleConfirmPasswordIcon');

  togglePasswordIcon.addEventListener('click', function () {
    const isText = passwordInput.type === 'text';
    passwordInput.type = isText ? 'password' : 'text';
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
  });

  toggleConfirmPasswordIcon.addEventListener('click', function () {
    const isText = confirmPasswordInput.type === 'text';
    confirmPasswordInput.type = isText ? 'password' : 'text';
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
  });

  // 📝 Form submission
  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    // Clear previous errors
    document.querySelectorAll('.form-text.text-danger').forEach(el => el.textContent = '');

    const fullname = form.fullname.value.trim();
    const email = form.email.value.trim();
    const username = form.username.value.trim();
    const password = passwordInput.value.trim();
    const confirmPassword = confirmPasswordInput.value.trim();

    let valid = true;

    if (fullname.length < 3) {
      document.getElementById('fullnameError').textContent = 'Full Name must be at least 3 characters.';
      valid = false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      document.getElementById('emailError').textContent = 'Enter a valid email address.';
      valid = false;
    }

    const usernamePattern = /^[a-zA-Z0-9]{6,}$/;
    if (!usernamePattern.test(username)) {
      document.getElementById('usernameError').textContent = 'Username must be at least 6 characters and alphanumeric.';
      valid = false;
    }

    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
     if (!passwordPattern.test(password)) {
     document.getElementById('passwordError').textContent = 'Password must be at least 8 characters, include a letter, a number, and a special symbol.';
     valid = false;
       }


    if (confirmPassword !== password) {
      document.getElementById('confirmError').textContent = 'Passwords do not match.';
      valid = false;
    }

    if (!valid) return;

    const formData = new FormData(form);

    try {
      const response = await fetch('register_process.php', {
        method: 'POST',
        body: formData
      });

      const text = await response.text();
      console.log("Raw Response:", text);

      const result = JSON.parse(text);

      Swal.fire({
        icon: result.status === 'success' ? 'success' : 'error',
        title: result.status === 'success' ? 'Success!' : 'Error!',
        text: result.message,
        confirmButtonColor: '#e68a2e',
        confirmButtonText: result.status === 'success' ? 'Go to Login' : 'Try Again'
      }).then(() => {
        if (result.status === 'success') {
          window.location.href = 'login.php';
        }
      });

    } catch (err) {
      console.error("JSON Parse Error:", err);

      Swal.fire({
        icon: 'error',
        title: 'Invalid Server Response',
        text: 'Please check the console for details.',
        confirmButtonColor: '#e68a2e'
      });
    }
  });
});
document.getElementById('registerForm').addEventListener('submit', function (e) {
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('passwordInput').value.trim();

  // Username: only alphanumeric
  if (!/^[a-zA-Z0-9]+$/.test(username)) {
    e.preventDefault();
    document.getElementById('usernameError').textContent = 'Username must be alphanumeric only.';
    return;
  }

  // Password: at least 8 chars, 1 letter, 1 number, 1 special char
  if (!/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/.test(password)) {
    e.preventDefault();
    document.getElementById('passwordError').textContent = 'Password must be at least 8 characters, include a letter, a number, and a special symbol.';
    return;
  }

  // Clear errors if valid
  document.getElementById('usernameError').textContent = '';
  document.getElementById('passwordError').textContent = '';
});
