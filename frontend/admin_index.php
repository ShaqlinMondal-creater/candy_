<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md flex flex-col">
      <div class="p-6 text-xl font-bold text-blue-600">
        Admin Panel
      </div>
      <nav class="flex-1 px-4">
        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200">Dashboard</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200">Users</a>
        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200">Settings</a>
        <a href="#" class="block py-2 px-3 mt-4 text-red-500 hover:bg-red-100 rounded">Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
      <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded shadow">
          <h2 class="text-lg font-semibold mb-2">Total Users</h2>
          <p class="text-3xl font-bold">124</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded shadow">
          <h2 class="text-lg font-semibold mb-2">Active Sessions</h2>
          <p class="text-3xl font-bold">34</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-4 rounded shadow">
          <h2 class="text-lg font-semibold mb-2">Server Status</h2>
          <p class="text-green-600 font-bold">Online</p>
        </div>
      </div>
    </main>
  </div>

</body>
</html>
