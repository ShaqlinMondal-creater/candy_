<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-400 to-indigo-500 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Login to Your Account</h2>
    <form id="loginForm" class="space-y-4">
      <input type="email" name="email" id="email" placeholder="Email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
      <input type="password" name="password" id="password" placeholder="Password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400" />
      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Login</button>
      <p class="text-center text-sm mt-2">Don't have an account? <a href="register.php" class="text-indigo-500 hover:underline">Register</a></p>
    </form>

    <p id="message" class="mt-4 text-center text-red-500"></p>
  </div>



<script>
  const form = document.getElementById('loginForm');
  const message = document.getElementById('message');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = form.email.value.trim();
    const password = form.password.value;
    message.textContent = '';

    try {
      const response = await fetch('../api/auth_login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
      });

      const data = await response.json();

      if (data.status === 'success') {
        const user = data.user;
        const role = user.role || 'customer';

        // Save to localStorage
        localStorage.setItem('token', user.token);
        localStorage.setItem('name', user.name);
        localStorage.setItem('email', user.email);
        localStorage.setItem('mobile', user.mobile);

        // Redirect by role
        if (role === 'admin') {
          window.location.href = 'admin_index.php';
        } else if (role === 'customer') {
          window.location.href = 'index.php';
        } else {
          window.location.href = 'login.php';
        }
      } else {
        message.style.color = 'red';
        message.textContent = data.message || 'Login failed';
      }
    } catch (error) {
      message.style.color = 'red';
      message.textContent = 'An error occurred. Please try again.';
    }
  });
</script>


</body>
</html>
