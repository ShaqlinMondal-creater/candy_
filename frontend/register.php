<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-400 to-blue-500 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Create an Account</h2>
    <form id="registerForm" class="space-y-4">
      <input type="text" name="name" id="name" placeholder="Name" required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input type="email" name="email" id="email" placeholder="Email" required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <input type="password" name="password" id="password" placeholder="Password" required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Register</button>
      <p class="text-center text-sm mt-2">Already have an account? <a href="login.php"
          class="text-blue-500 hover:underline">Login</a></p>
    </form>
    <p id="message" class="mt-4 text-center text-red-500"></p>
  </div>

  <script>
    const form = document.getElementById('registerForm');
    const message = document.getElementById('message');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const name = form.name.value.trim();
      const email = form.email.value.trim();
      const mobile = form.mobile.value.trim();
      const password = form.password.value;

      message.textContent = '';

      try {
        const response = await fetch('../api/auth_register.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ name, email, mobile, password })
        });

        const data = await response.json();

        if (data.status === 'success') {
          message.style.color = 'green';
          message.textContent = 'Registration successful! Redirecting to login...';
          setTimeout(() => {
            window.location.href = 'login.php';
          }, 2000);
        } else {
          message.style.color = 'red';
          message.textContent = data.message || 'Registration failed';
        }
      } catch (error) {
        message.style.color = 'red';
        message.textContent = 'An error occurred. Please try again.';
      }
    });
  </script>
</body>

</html>
