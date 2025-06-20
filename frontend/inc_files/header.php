<!-- NAVBAR -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold gradient-text">Sweet Dreams</h1>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="index.php" class="text-gray-900 nav-link px-3 py-2 font-medium">Home</a>
                    <a href="shop.php" class="text-gray-700 nav-link px-3 py-2 font-medium">Products</a>
                    <a href="about.php" class="text-gray-700 nav-link px-3 py-2 font-medium">About</a>
                    <a href="contact.php" class="text-gray-700 nav-link px-3 py-2 font-medium">Contact</a>
                </div>
            </div>

            <!-- Auth Icons (desktop) -->
            <div id="auth-icons" class="hidden md:flex items-center space-x-4"></div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-pink-500 p-2">
                    <svg id="menu-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="md:hidden bg-white border-t hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="index.php" class="block px-3 py-2 text-gray-900 font-medium">Home</a>
            <a href="shop.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">Products</a>
            <a href="about.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">About</a>
            <a href="contact.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">Contact</a>
        </div>

        <!-- Auth Icons (mobile) -->
        <div id="mobile-auth-icons" class="border-t px-2 pt-3 pb-4 space-y-2"></div>
    </div>
</nav>

<!-- JS: Token Check + Toggle Logic -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const authIcons = document.getElementById("auth-icons");
    const mobileAuthIcons = document.getElementById("mobile-auth-icons");
    const token = localStorage.getItem("token");

    if (token) {
        const html = `
            <a href="cart.php" class="relative p-2 text-gray-700 hover:text-pink-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4L7 13l-1.5 5h9m-9 0a1 1 0 100 2 1 1 0 000-2zm9 0a1 1 0 100 2 1 1 0 000-2z" />
                </svg>
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
            </a>
            <a href="profile.php" class="p-2 text-gray-700 hover:text-pink-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A9.003 9.003 0 0112 15c2.236 0 4.27.82 5.879 2.176M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>
            <button onclick="logout()" class="p-2 text-gray-700 hover:text-pink-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
            </button>
        `;
        authIcons.innerHTML = html;
        mobileAuthIcons.innerHTML = `
            <a href="cart.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">Cart</a>
            <a href="profile.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">Account</a>
            <button onclick="logout()" class="w-full text-left px-3 py-2 text-red-600 hover:text-red-800">Logout</button>
        `;
    } else {
        const html = `
            <a href="login.php" class="p-2 text-gray-700 hover:text-pink-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A9.003 9.003 0 0112 15c2.236 0 4.27.82 5.879 2.176M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>
        `;
        authIcons.innerHTML = html;
        mobileAuthIcons.innerHTML = `
            <a href="login.php" class="block px-3 py-2 text-gray-700 hover:text-pink-500">Login</a>
        `;
    }
});

// Logout function
async function logout() {
    // localStorage.removeItem("token");
    // window.location.href = "login.php";
    const token = localStorage.getItem("token");
    if (!token) {
        window.location.href = "login.php";
        return;
    }

    try {
        const response = await fetch("../api/auth_logout.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ token })
        });

        const data = await response.json();

        if (data.status === "success") {
            localStorage.removeItem("token");
            window.location.href = "login.php";
        } else {
            alert("Logout failed: " + data.message);
        }
    } catch (error) {
        console.error("Logout error:", error);
        alert("Something went wrong during logout.");
    }
}


// Mobile menu toggle
const btn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');
const openIcon = document.getElementById('menu-icon');
const closeIcon = document.getElementById('close-icon');

btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    openIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
});
</script>
