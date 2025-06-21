<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Sweet Dreams</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'fade-in': 'fadeIn 0.5s ease-in',
                        'slide-up': 'slideUp 0.6s ease-out',
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #ec4899, #8b5cf6, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .btn-gradient {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            transition: all 0.2s ease;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(45deg, #db2777, #7c3aed);
            transform: scale(1.02);
        }
        
        .nav-link {
            transition: color 0.2s ease;
        }
        
        .nav-link:hover {
            color: #ec4899;
        }
        
        .form-input {
            transition: all 0.2s ease;
        }
        
        .form-input:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        .tab-active {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            color: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        .profile-avatar {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
        }
        
        .order-status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .order-status-processing {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .order-status-shipped {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .order-status-delivered {
            background-color: #dcfce7;
            color: #166534;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Profile Header -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 fade-in">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                    <div class="relative">
                        <div class="profile-avatar w-32 h-32 rounded-full flex items-center justify-center text-white text-4xl font-bold">
                            <span id="user-initials">JD</span>
                        </div>
                        <button class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow-lg hover:shadow-xl transition-shadow">
                            <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2" id="user-name">John Doe</h1>
                        <p class="text-gray-600 mb-4" id="user-email">john.doe@example.com</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                            <div class="bg-pink-50 px-4 py-2 rounded-full">
                                <span class="text-pink-600 font-medium">Sweet Points: </span>
                                <span class="text-pink-700 font-bold" id="sweet-points">1,250</span>
                            </div>
                            <div class="bg-purple-50 px-4 py-2 rounded-full">
                                <span class="text-purple-600 font-medium">Member Since: </span>
                                <span class="text-purple-700 font-bold" id="member-since">Jan 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <button class="btn-gradient text-white px-6 py-2 rounded-full font-medium">
                            Edit Profile
                        </button>
                        <button class="border-2 border-gray-300 text-gray-700 px-6 py-2 rounded-full font-medium hover:border-pink-500 hover:text-pink-500 transition-all">
                            Settings
                        </button>
                    </div>
                </div>
            </div>

            <!-- Profile Tabs -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden slide-up">
                <div class="border-b border-gray-200">
                    <nav class="flex flex-wrap">
                        <button class="tab-btn px-6 py-4 font-medium tab-active" data-tab="overview">
                            Overview
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="orders">
                            Order History
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="addresses">
                            Addresses
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="wishlist">
                            Wishlist
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="account">
                            Account Settings
                        </button>
                    </nav>
                </div>

                <div class="p-8">
                    <!-- Overview Tab -->
                    <div id="overview-tab" class="tab-content active">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Account Overview</h2>
                        
                        <!-- Quick Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                            <div class="bg-gradient-to-r from-pink-50 to-pink-100 p-6 rounded-xl">
                                <div class="flex items-center">
                                    <div class="bg-pink-500 p-3 rounded-full">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-pink-600 text-sm font-medium">Total Orders</p>
                                        <p class="text-2xl font-bold text-pink-700">24</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-6 rounded-xl">
                                <div class="flex items-center">
                                    <div class="bg-purple-500 p-3 rounded-full">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-purple-600 text-sm font-medium">Total Spent</p>
                                        <p class="text-2xl font-bold text-purple-700">$486.50</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl">
                                <div class="flex items-center">
                                    <div class="bg-blue-500 p-3 rounded-full">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-blue-600 text-sm font-medium">Wishlist Items</p>
                                        <p class="text-2xl font-bold text-blue-700">8</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl">
                                <div class="flex items-center">
                                    <div class="bg-green-500 p-3 rounded-full">
                                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-green-600 text-sm font-medium">Sweet Points</p>
                                        <p class="text-2xl font-bold text-green-700">1,250</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Orders</h3>
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-900">#SD1234567890</p>
                                            <p class="text-gray-600 text-sm">January 15, 2025</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-900">$45.99</p>
                                            <span class="order-status-delivered px-3 py-1 rounded-full text-xs font-medium">Delivered</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-900">#SD1234567889</p>
                                            <p class="text-gray-600 text-sm">January 10, 2025</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-900">$32.50</p>
                                            <span class="order-status-shipped px-3 py-1 rounded-full text-xs font-medium">Shipped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Favorite Products -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Your Favorite Treats</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <img src="https://images.pexels.com/photos/5946965/pexels-photo-5946965.jpeg?auto=compress&cs=tinysrgb&w=300" alt="Rainbow Gummy Bears" class="w-full h-32 object-cover rounded-lg mb-3">
                                    <h4 class="font-semibold text-gray-900">Rainbow Gummy Bears</h4>
                                    <p class="text-pink-600 font-bold">$12.99</p>
                                </div>
                                
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <img src="https://images.pexels.com/photos/918327/pexels-photo-918327.jpeg?auto=compress&cs=tinysrgb&w=300" alt="Chocolate Truffles" class="w-full h-32 object-cover rounded-lg mb-3">
                                    <h4 class="font-semibold text-gray-900">Chocolate Truffles Box</h4>
                                    <p class="text-pink-600 font-bold">$24.99</p>
                                </div>
                                
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <img src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&w=300" alt="Cotton Candy" class="w-full h-32 object-cover rounded-lg mb-3">
                                    <h4 class="font-semibold text-gray-900">Cotton Candy Clouds</h4>
                                    <p class="text-pink-600 font-bold">$8.99</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order History Tab -->
                    <div id="orders-tab" class="tab-content">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Order History</h2>
                        
                        <!-- Filter Options -->
                        <div class="flex flex-wrap gap-4 mb-6">
                            <select class="form-input px-4 py-2 border border-gray-300 rounded-lg focus:outline-none">
                                <option>All Orders</option>
                                <option>Pending</option>
                                <option>Processing</option>
                                <option>Shipped</option>
                                <option>Delivered</option>
                            </select>
                            <select class="form-input px-4 py-2 border border-gray-300 rounded-lg focus:outline-none">
                                <option>Last 30 days</option>
                                <option>Last 3 months</option>
                                <option>Last 6 months</option>
                                <option>Last year</option>
                            </select>
                        </div>

                        <!-- Orders List -->
                        <div class="space-y-6">
                            <div class="border border-gray-200 rounded-lg p-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">#SD1234567890</h3>
                                        <p class="text-gray-600">Placed on January 15, 2025</p>
                                    </div>
                                    <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                                        <span class="order-status-delivered px-3 py-1 rounded-full text-sm font-medium">Delivered</span>
                                        <span class="text-lg font-bold text-gray-900">$45.99</span>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.pexels.com/photos/5946965/pexels-photo-5946965.jpeg?auto=compress&cs=tinysrgb&w=100" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Rainbow Gummy Bears</p>
                                            <p class="text-gray-600 text-sm">Qty: 2</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.pexels.com/photos/918327/pexels-photo-918327.jpeg?auto=compress&cs=tinysrgb&w=100" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Chocolate Truffles</p>
                                            <p class="text-gray-600 text-sm">Qty: 1</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex flex-wrap gap-3">
                                    <button class="btn-gradient text-white px-4 py-2 rounded-lg text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-pink-500 hover:text-pink-500 transition-all">
                                        Track Order
                                    </button>
                                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-pink-500 hover:text-pink-500 transition-all">
                                        Reorder
                                    </button>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-6">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">#SD1234567889</h3>
                                        <p class="text-gray-600">Placed on January 10, 2025</p>
                                    </div>
                                    <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                                        <span class="order-status-shipped px-3 py-1 rounded-full text-sm font-medium">Shipped</span>
                                        <span class="text-lg font-bold text-gray-900">$32.50</span>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&w=100" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Cotton Candy Clouds</p>
                                            <p class="text-gray-600 text-sm">Qty: 3</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex flex-wrap gap-3">
                                    <button class="btn-gradient text-white px-4 py-2 rounded-lg text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-pink-500 hover:text-pink-500 transition-all">
                                        Track Order
                                    </button>
                                    <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-pink-500 hover:text-pink-500 transition-all">
                                        Reorder
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div id="addresses-tab" class="tab-content">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Saved Addresses</h2>
                            <button class="btn-gradient text-white px-6 py-2 rounded-lg font-medium">
                                Add New Address
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="border-2 border-pink-200 bg-pink-50 rounded-lg p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm font-medium">Default</span>
                                    <div class="flex space-x-2">
                                        <button class="text-gray-600 hover:text-pink-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-600 hover:text-red-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">John Doe</p>
                                    <p class="text-gray-600">123 Sweet Street</p>
                                    <p class="text-gray-600">Candy City, CC 12345</p>
                                    <p class="text-gray-600">(555) 123-4567</p>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">Work</span>
                                    <div class="flex space-x-2">
                                        <button class="text-gray-600 hover:text-pink-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                        <button class="text-gray-600 hover:text-red-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">John Doe</p>
                                    <p class="text-gray-600">456 Business Ave</p>
                                    <p class="text-gray-600">Corporate City, CC 54321</p>
                                    <p class="text-gray-600">(555) 987-6543</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Tab -->
                    <div id="wishlist-tab" class="tab-content">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">My Wishlist</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="https://images.pexels.com/photos/3737579/pexels-photo-3737579.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Artisan Lollipops" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Artisan Lollipops</h3>
                                    <p class="text-gray-600 text-sm mb-3">Handmade swirl lollipops with natural flavors</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-pink-600">$15.99</span>
                                        <div class="flex space-x-2">
                                            <button class="btn-gradient text-white px-4 py-2 rounded-lg text-sm font-medium">
                                                Add to Cart
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="https://images.pexels.com/photos/3737581/pexels-photo-3737581.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Sour Patch Mix" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Sour Patch Mix</h3>
                                    <p class="text-gray-600 text-sm mb-3">Perfect balance of sour and sweet candies</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-pink-600">$10.99</span>
                                        <div class="flex space-x-2">
                                            <button class="btn-gradient text-white px-4 py-2 rounded-lg text-sm font-medium">
                                                Add to Cart
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="https://images.pexels.com/photos/4110256/pexels-photo-4110256.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Caramel Delights" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Caramel Delights</h3>
                                    <p class="text-gray-600 text-sm mb-3">Rich, buttery caramels with sea salt</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-pink-600">$18.99</span>
                                        <div class="flex space-x-2">
                                            <button class="btn-gradient text-white px-4 py-2 rounded-lg text-sm font-medium">
                                                Add to Cart
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Settings Tab -->
                    <div id="account-tab" class="tab-content">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Account Settings</h2>
                        
                        <div class="space-y-8">
                            <!-- Personal Information -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Personal Information</h3>
                                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                        <input type="text" value="John" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                        <input type="text" value="Doe" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                        <input type="email" value="john.doe@example.com" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input type="tel" value="(555) 123-4567" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="submit" class="btn-gradient text-white px-6 py-3 rounded-lg font-medium">
                                            Update Information
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Change Password -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h3>
                                <form class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                        <input type="password" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                        <input type="password" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                        <input type="password" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <button type="submit" class="btn-gradient text-white px-6 py-3 rounded-lg font-medium">
                                        Update Password
                                    </button>
                                </form>
                            </div>

                            <!-- Notification Preferences -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Notification Preferences</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium text-gray-900">Email Notifications</p>
                                            <p class="text-gray-600 text-sm">Receive updates about your orders and new products</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" checked class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium text-gray-900">SMS Notifications</p>
                                            <p class="text-gray-600 text-sm">Get text updates about order status</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                        </label>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-medium text-gray-900">Marketing Emails</p>
                                            <p class="text-gray-600 text-sm">Receive special offers and promotions</p>
                                        </div>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" checked class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Danger Zone -->
                            <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                                <h3 class="text-lg font-semibold text-red-900 mb-4">Danger Zone</h3>
                                <div class="space-y-4">
                                    <div>
                                        <p class="text-red-800 mb-2">Delete Account</p>
                                        <p class="text-red-600 text-sm mb-4">Once you delete your account, there is no going back. Please be certain.</p>
                                        <button class="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-colors">
                                            Delete Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("inc_files/footer.php"); ?>

<script>
// ---------- PROFILE PAGE SCRIPT (Orders + Account tabs only) ----------
// Runs once DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  /* ------------------------------------------------------------------
     1. Build the tab navigation so that ONLY two tabs remain
        – Order History
        – Account Settings
  ------------------------------------------------------------------*/
  const tabNav = document.querySelector(".flex.flex-wrap");
  if (tabNav) {
    tabNav.innerHTML = `
      <button class="tab-btn px-6 py-4 font-medium tab-active" data-tab="orders">Order History</button>
      <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="account">Account Settings</button>
    `;
  }

  /* ------------------------------------------------------------------
     2. Remove any tab‑content sections we no longer need (overview, wishlist,
        addresses, etc.) so only #orders-tab and #account-tab stay.
  ------------------------------------------------------------------*/
  document.querySelectorAll(".tab-content").forEach(c => {
    if (!["orders-tab", "account-tab"].includes(c.id)) {
      c.remove();
    }
  });

  /* ------------------------------------------------------------------
     3. Tab‑switching logic
  ------------------------------------------------------------------*/
  const activateTab = tabName => {
    // toggle button classes
    document.querySelectorAll(".tab-btn").forEach(btn => {
      if (btn.dataset.tab === tabName) {
        btn.classList.add("tab-active");
        btn.classList.remove("text-gray-500");
      } else {
        btn.classList.remove("tab-active");
        btn.classList.add("text-gray-500");
      }
    });

    // toggle content visibility
    document.querySelectorAll(".tab-content").forEach(tc => {
      tc.classList.toggle("active", tc.id === `${tabName}-tab`);
    });
  };

  document.addEventListener("click", e => {
    if (e.target.closest(".tab-btn")) {
      activateTab(e.target.closest(".tab-btn").dataset.tab);
    }
  });

  /* ------------------------------------------------------------------
     4. ACCOUNT INFO  – pull name / email / mobile from localStorage and
        populate both the header + the account form.
  ------------------------------------------------------------------*/
  const loadAccountInfo = () => {
    const name   = localStorage.getItem("name")   || "";
    const email  = localStorage.getItem("email")  || "";
    const mobile = localStorage.getItem("mobile") || "";

    // header
    if (name) {
      const initials = name.split(" ").map(p => p[0]).join("" ).substring(0, 2).toUpperCase();
      document.getElementById("user-initials").textContent = initials;
      document.getElementById("user-name").textContent     = name;
    }
    if (email)  document.getElementById("user-email").textContent = email;

    // account form – first text input is first name, second is last name
    const accountTab = document.getElementById("account-tab");
    if (!accountTab) return;
    const inputs = accountTab.querySelectorAll("input");
    const [firstInput, lastInput, emailInput, phoneInput] = inputs;

    const nameParts = name.trim().split(" ");
    if (firstInput) firstInput.value = nameParts.shift() || "";
    if (lastInput)  lastInput.value  = nameParts.join(" ");
    if (emailInput) emailInput.value = email;
    if (phoneInput) phoneInput.value = mobile;
  };

  /* ------------------------------------------------------------------
     5. ORDERS  – fetch from ../api/get_user_orders.php passing token from
        localStorage and render nicely.
  ------------------------------------------------------------------*/
  const loadUserOrders = async () => {
    const token = localStorage.getItem("token");
    const ordersTab = document.getElementById("orders-tab");
    if (!ordersTab) return;

    ordersTab.innerHTML = `<h2 class="text-2xl font-bold text-gray-900 mb-6">Order History</h2>`;

    if (!token) {
      ordersTab.innerHTML += `<p class="text-gray-500">Please log in to view your orders.</p>`;
      return;
    }

    try {
      const res   = await fetch("../api/get_user_orders.php", {
        method : "POST",
        headers: { "Content-Type": "application/json" },
        body   : JSON.stringify({ token })
      });
      const data  = await res.json();

      if (data.status !== "success") {
        ordersTab.innerHTML += `<p class="text-gray-500">${data.message || "Could not load orders."}</p>`;
        return;
      }

      if (!data.orders || !data.orders.length) {
        ordersTab.innerHTML += `<p class="text-gray-500">No orders found.</p>`;
        return;
      }

      data.orders.forEach(order => {
        const items = order.items || order.cart_items || [];
        const itemsHTML = items.map(it => `
          <div class="flex items-center space-x-3">
            <div>
              <p class="font-medium text-gray-900">${it.name}</p>
              <p class="text-gray-600 text-sm">Qty: ${it.quantity}</p>
            </div>
          </div>
        `).join("");

        ordersTab.innerHTML += `
          <div class="border border-gray-200 rounded-lg p-6 mb-6 bg-white">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4">
              <div>
                <h3 class="text-lg font-semibold text-gray-900">#SD${String(order.order_id).padStart(10, "0")}</h3>
                <p class="text-gray-600">Placed on ${new Date(order.created_at).toLocaleDateString()}</p>
                <p class="text-gray-500 text-sm">Status: <strong>${order.order_status}</strong></p>
              </div>
              <span class="text-lg font-bold text-gray-900 mt-2 lg:mt-0">₹${parseFloat(order.total).toFixed(2)}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
              ${itemsHTML}
            </div>

            <div class="text-sm text-gray-600">
              <p><strong>Payment:</strong> ${order.payment_method}</p>
              <p><strong>Shipping Charge:</strong> ₹${parseFloat(order.shipping_charge).toFixed(2)}</p>
              <p><strong>Address:</strong> ${order.shipping_address}</p>
            </div>
          </div>`;
      });
    } catch (err) {
      console.error("Order fetch error", err);
      ordersTab.innerHTML += `<p class="text-gray-500">Error retrieving orders.</p>`;
    }
  };

  // ---- RUN EVERYTHING ----
  loadAccountInfo();
  loadUserOrders();
});
</script>


</body>
</html>