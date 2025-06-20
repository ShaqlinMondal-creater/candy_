<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Dreams - Beautiful Candy Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
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
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .image-hover {
            transition: transform 0.5s ease;
        }
        
        .card-hover:hover .image-hover {
            transform: scale(1.1);
        }
        
        .btn-gradient {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            transition: all 0.2s ease;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(45deg, #db2777, #7c3aed);
            transform: scale(1.05);
        }
        
        .heart-btn {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .card-hover:hover .heart-btn {
            opacity: 1;
        }
        
        .nav-link {
            transition: color 0.2s ease;
        }
        
        .nav-link:hover {
            color: #ec4899;
        }
        
        .icon-hover {
            transition: all 0.2s ease;
        }
        
        .icon-hover:hover {
            background-color: rgba(236, 72, 153, 0.1);
            transform: scale(1.1);
        }
    </style>
</head>
<body class="min-h-screen bg-white">
    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Hero Section -->
    <section id="home" class="relative bg-gradient-to-br from-pink-100 via-purple-50 to-blue-100 py-20 overflow-hidden">
        <div class="absolute inset-0 bg-white opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Welcome to 
                <span class="block gradient-text">Sweet Dreams</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                Discover our magical collection of handcrafted candies, artisanal chocolates, 
                and sweet treats that bring joy to every occasion.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="btn-gradient text-white px-8 py-4 rounded-full font-semibold shadow-lg">
                    Shop Now
                </button>
                <button class="border-2 border-pink-500 text-pink-500 px-8 py-4 rounded-full font-semibold hover:bg-pink-500 hover:text-white transition-all duration-200">
                    Learn More
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="products" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Featured <span class="text-pink-500">Treats</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Indulge in our carefully curated selection of premium candies and confections
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/5946965/pexels-photo-5946965.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Rainbow Gummy Bears" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Rainbow Gummy Bears</h3>
                        <p class="text-gray-600 mb-4">Soft, chewy gummy bears in 12 fruity flavors</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$12.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/918327/pexels-photo-918327.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Chocolate Truffles Box" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(5.0)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Chocolate Truffles Box</h3>
                        <p class="text-gray-600 mb-4">Premium handcrafted chocolate truffles</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$24.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/1038914/pexels-photo-1038914.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Cotton Candy Clouds" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-gray-300" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.7)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Cotton Candy Clouds</h3>
                        <p class="text-gray-600 mb-4">Fluffy cotton candy in magical colors</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$8.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/3737579/pexels-photo-3737579.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Artisan Lollipops" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Artisan Lollipops</h3>
                        <p class="text-gray-600 mb-4">Handmade swirl lollipops with natural flavors</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$15.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/3737581/pexels-photo-3737581.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Sour Patch Mix" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-gray-300" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.6)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Sour Patch Mix</h3>
                        <p class="text-gray-600 mb-4">Perfect balance of sour and sweet candies</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$10.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/4110256/pexels-photo-4110256.jpeg?auto=compress&cs=tinysrgb&w=400" 
                             alt="Caramel Delights" class="w-full h-64 object-cover image-hover">
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                <svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Caramel Delights</h3>
                        <p class="text-gray-600 mb-4">Rich, buttery caramels with sea salt</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$18.99</span>
                            <a href="product_detail.html" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-r from-pink-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Our Sweet <span class="text-pink-500">Story</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        For over 25 years, Sweet Dreams has been crafting the finest candies and confections 
                        using traditional methods and the highest quality ingredients. Our passion for creating 
                        moments of joy through sweet treats drives everything we do.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        From our small family kitchen to becoming the city's beloved candy destination, 
                        we've never compromised on quality or the magical experience of discovering 
                        the perfect sweet treat.
                    </p>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-3xl font-bold text-pink-500">25+</div>
                            <div class="text-gray-600">Years</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-purple-500">50k+</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-blue-500">200+</div>
                            <div class="text-gray-600">Products</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.pexels.com/photos/1070945/pexels-photo-1070945.jpeg?auto=compress&cs=tinysrgb&w=600" 
                         alt="Candy making process" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-gradient-to-r from-pink-500 to-purple-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay Sweet with Us!</h2>
            <p class="text-pink-100 mb-8 text-lg">
                Subscribe to get exclusive offers, new product alerts, and sweet surprises
            </p>
            <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                <input type="email" placeholder="Enter your email" 
                       class="flex-1 px-6 py-3 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                <button class="bg-white text-pink-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Visit Our <span class="text-pink-500">Sweet Shop</span>
                </h2>
                <p class="text-lg text-gray-600">Come taste the magic in person or get in touch with us</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 icon-hover">
                        <svg class="h-8 w-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Visit Us</h3>
                    <p class="text-gray-600">123 Sweet Street<br>Candy City, CC 12345</p>
                </div>

                <div class="text-center group">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 icon-hover">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Call Us</h3>
                    <p class="text-gray-600">(555) 123-SWEET<br>Mon-Sat: 9AM-8PM</p>
                </div>

                <div class="text-center group">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 icon-hover">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Email Us</h3>
                    <p class="text-gray-600">hello@sweetdreams.com<br>We reply within 24hrs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("inc_files/footer.php"); ?>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        });

        // Add to cart functionality (placeholder)
        Array.from(document.querySelectorAll('button')).filter(button => button.textContent.includes("Add to Cart")).forEach(button => {
            button.addEventListener('click', function() {
                // Simple animation feedback
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
                
                // You can add actual cart functionality here
                console.log('Added to cart!');
            });
        });

        // Newsletter subscription (placeholder)
        const subscribeBtn = Array.from(document.querySelectorAll('button')).find(button => button.textContent.includes("Subscribe"));
        if (subscribeBtn) {
            subscribeBtn.addEventListener('click', function() {
                const emailInput = document.querySelector('input[type="email"]');
                if (emailInput && emailInput.value) {
                    alert('Thank you for subscribing!');
                    emailInput.value = '';
                } else {
                    alert('Please enter a valid email address.');
                }
            });
        }
    </script>
</body>
</html>