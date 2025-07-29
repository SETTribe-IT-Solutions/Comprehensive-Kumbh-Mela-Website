document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('registerForm');

  if (!form) {
    console.error('Form with ID "registerForm" not found.');
    return;
  }

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch('register_process.php', {
        method: 'POST',
        body: formData
      });

      const text = await response.text();
      console.log("Raw Response:", text); // For debugging

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
