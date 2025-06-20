<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rainbow Gummy Bears - Sweet Dreams</title>
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
        
        .btn-gradient {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            transition: all 0.2s ease;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(45deg, #db2777, #7c3aed);
            transform: scale(1.05);
        }
        
        .nav-link {
            transition: color 0.2s ease;
        }
        
        .nav-link:hover {
            color: #ec4899;
        }
        
        .tab-active {
            color: #ec4899;
            border-bottom: 2px solid #ec4899;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .image-zoom {
            transition: transform 0.3s ease;
        }
        
        .image-zoom:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <a href="index.html" class="inline-flex items-center text-pink-600 hover:text-pink-700 font-medium">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Products
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                    <!-- Product Image -->
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                        <img id="product-image" src="https://images.pexels.com/photos/5946965/pexels-photo-5946965.jpeg?auto=compress&cs=tinysrgb&w=800" 
                             alt="Rainbow Gummy Bears" class="w-full h-full object-cover image-zoom">
                    </div>

                    <!-- Product Info -->
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <span id="product-category" class="inline-block bg-pink-100 text-pink-800 text-sm font-medium px-3 py-1 rounded-full">
                                Gummy Candies
                            </span>
                        </div>
                        
                        <h1 id="product-name" class="text-3xl font-bold text-gray-900 mb-4">Rainbow Gummy Bears</h1>
                        
                        <div class="mb-4">
                            <div class="flex items-center">
                                <div class="flex items-center" id="product-rating">
                                    <svg class="h-5 w-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="h-5 w-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="h-5 w-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="h-5 w-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    <svg class="h-5 w-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                                <span class="ml-2 text-gray-600">(4.9)</span>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <span id="product-price" class="text-3xl font-bold text-pink-600">$12.99</span>
                            <span class="text-gray-500 ml-2">per 12oz</span>
                        </div>
                        
                        <p id="product-description" class="text-gray-600 mb-6 leading-relaxed">
                            Soft, chewy gummy bears in 12 delicious fruity flavors. Made with natural fruit juices and colors, these classic treats bring joy to every bite.
                        </p>
                        
                        <!-- Stock Status -->
                        <div class="flex items-center mb-6">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-green-600 font-medium">In Stock</span>
                        </div>
                        
                        <!-- Quantity Selector -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <div class="flex items-center">
                                <button id="decrease-qty" class="w-10 h-10 rounded-l-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                    -
                                </button>
                                <span id="quantity" class="w-16 h-10 border-t border-b border-gray-300 flex items-center justify-center">
                                    1
                                </span>
                                <button id="increase-qty" class="w-10 h-10 rounded-r-lg border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                    +
                                </button>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <button id="add-to-cart" class="flex-1 btn-gradient text-white px-8 py-4 rounded-full font-semibold flex items-center justify-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 5M7 13l-1.5 5m0 0h9m-9 0a1 1 0 100 2 1 1 0 000-2zm9 0a1 1 0 100 2 1 1 0 000-2z"></path>
                                </svg>
                                Add to Cart
                            </button>
                            <button id="wishlist-btn" class="px-6 py-4 rounded-full border-2 border-gray-300 text-gray-700 hover:border-pink-500 hover:text-pink-500 transition-all duration-200">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Features -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-8 border-t border-gray-200">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <div>
                                    <div class="font-medium text-gray-900">Free Shipping</div>
                                    <div class="text-sm text-gray-500">On orders over $25</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <div>
                                    <div class="font-medium text-gray-900">Quality Guarantee</div>
                                    <div class="text-sm text-gray-500">Fresh & delicious</div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-pink-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <div>
                                    <div class="font-medium text-gray-900">30-Day Returns</div>
                                    <div class="text-sm text-gray-500">Not satisfied?</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Tabs -->
            <div class="bg-white rounded-2xl shadow-lg mt-8 overflow-hidden">
                <div class="border-b border-gray-200">
                    <nav class="flex">
                        <button class="tab-btn px-6 py-4 font-medium tab-active" data-tab="description">
                            Description
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="ingredients">
                            Ingredients
                        </button>
                        <button class="tab-btn px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="nutrition">
                            Nutrition
                        </button>
                    </nav>
                </div>
                
                <div class="p-8">
                    <div id="description-tab" class="tab-content active">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Description</h3>
                        <p class="text-gray-600 leading-relaxed">Soft, chewy gummy bears in 12 delicious fruity flavors. Made with natural fruit juices and colors, these classic treats bring joy to every bite.</p>
                        <div class="mt-6">
                            <h4 class="font-medium text-gray-900 mb-2">Weight</h4>
                            <p class="text-gray-600">12oz</p>
                        </div>
                    </div>
                    
                    <div id="ingredients-tab" class="tab-content">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Ingredients</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Corn Syrup
                            </li>
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Sugar
                            </li>
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Gelatin
                            </li>
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Natural Flavors
                            </li>
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Citric Acid
                            </li>
                            <li class="flex items-center text-gray-600">
                                <span class="w-2 h-2 bg-pink-500 rounded-full mr-3"></span>
                                Natural Colors
                            </li>
                        </ul>
                        <div class="mt-6 p-4 bg-yellow-50 rounded-lg">
                            <h4 class="font-medium text-yellow-800 mb-2">Allergen Information</h4>
                            <p class="text-yellow-700">Contains: Gelatin</p>
                        </div>
                    </div>
                    
                    <div id="nutrition-tab" class="tab-content">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Nutrition Facts</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-2xl font-bold text-pink-600">140</div>
                                <div class="text-sm text-gray-600">Calories</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-lg font-semibold text-gray-900">0g</div>
                                <div class="text-sm text-gray-600">Total Fat</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-lg font-semibold text-gray-900">10mg</div>
                                <div class="text-sm text-gray-600">Sodium</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-lg font-semibold text-gray-900">32g</div>
                                <div class="text-sm text-gray-600">Total Carbs</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-lg font-semibold text-gray-900">22g</div>
                                <div class="text-sm text-gray-600">Sugar</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-lg font-semibold text-gray-900">3g</div>
                                <div class="text-sm text-gray-600">Protein</div>
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

        // Quantity controls
        let quantity = 1;
        const quantityDisplay = document.getElementById('quantity');
        const decreaseBtn = document.getElementById('decrease-qty');
        const increaseBtn = document.getElementById('increase-qty');

        decreaseBtn.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                quantityDisplay.textContent = quantity;
            }
        });

        increaseBtn.addEventListener('click', () => {
            quantity++;
            quantityDisplay.textContent = quantity;
        });

        // Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabName = btn.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabBtns.forEach(b => {
                    b.classList.remove('tab-active');
                    b.classList.add('text-gray-500', 'hover:text-gray-700');
                });
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                btn.classList.add('tab-active');
                btn.classList.remove('text-gray-500', 'hover:text-gray-700');
                document.getElementById(tabName + '-tab').classList.add('active');
            });
        });

        // Wishlist functionality
        let isWishlisted = false;
        const wishlistBtn = document.getElementById('wishlist-btn');
        const wishlistIcon = wishlistBtn.querySelector('svg');

        wishlistBtn.addEventListener('click', () => {
            isWishlisted = !isWishlisted;
            if (isWishlisted) {
                wishlistBtn.classList.remove('border-gray-300', 'text-gray-700');
                wishlistBtn.classList.add('border-pink-500', 'text-pink-500', 'bg-pink-50');
                wishlistIcon.classList.add('fill-current');
            } else {
                wishlistBtn.classList.add('border-gray-300', 'text-gray-700');
                wishlistBtn.classList.remove('border-pink-500', 'text-pink-500', 'bg-pink-50');
                wishlistIcon.classList.remove('fill-current');
            }
        });

        // Cart functionality
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        function updateCartCount() {
            const count = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cart-count').textContent = count;
            document.getElementById('cart-count-mobile').textContent = count;
        }

        // Add to cart
        document.getElementById('add-to-cart').addEventListener('click', () => {
            const product = {
                id: '1',
                name: 'Rainbow Gummy Bears',
                price: 12.99,
                image: 'https://images.pexels.com/photos/5946965/pexels-photo-5946965.jpeg?auto=compress&cs=tinysrgb&w=800',
                category: 'Gummy Candies'
            };

            const existingItem = cart.find(item => item.id === product.id);
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({ ...product, quantity: quantity });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();

            // Show feedback
            const btn = document.getElementById('add-to-cart');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Added to Cart!';
            btn.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.transform = 'scale(1)';
            }, 1000);
        });

        // Initialize cart count
        updateCartCount();
    </script>
</body>
</html>