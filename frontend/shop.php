<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Sweet Dreams Candy Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
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
        
        .filter-btn {
            transition: all 0.2s ease;
        }
        
        .filter-btn.active {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            color: white;
        }
        
        .price-range {
            background: linear-gradient(to right, #ec4899, #8b5cf6);
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        .product-grid {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #ec4899;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .badge-new {
            background: linear-gradient(45deg, #10b981, #059669);
            color: white;
        }
        
        .badge-sale {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            color: white;
        }
        
        .badge-popular {
            background: linear-gradient(45deg, #f59e0b, #d97706);
            color: white;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-pink-500 to-purple-600 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Sweet Dreams Shop
            </h1>
            <div class="flex justify-center">
                <div class="relative max-w-md w-full">
                    <input 
                        type="text" 
                        id="search-input"
                        placeholder="Search for your favorite treats..."
                        class="w-full px-6 py-3 pl-12 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none search-input"
                    >
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters and Products -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Filters</h3>
                        
                        <!-- Category Filter -->
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Categories</h4>
                            <div class="space-y-2">
                                <button class="filter-btn active w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="all">
                                    All Products
                                </button>
                                <button class="filter-btn w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="chocolate">
                                    Chocolates
                                </button>
                                <button class="filter-btn w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="gummy">
                                    Gummy Candies
                                </button>
                                <button class="filter-btn w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="hard">
                                    Hard Candies
                                </button>
                                <button class="filter-btn w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="sour">
                                    Sour Candies
                                </button>
                                <button class="filter-btn w-full text-left px-4 py-2 rounded-lg border border-gray-200 hover:border-pink-300" data-category="premium">
                                    Premium Collection
                                </button>
                            </div>
                        </div>

                        <!-- Sort Options -->
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Sort By</h4>
                            <select id="sort-select" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-pink-300">
                                <option value="featured">Featured</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                            </select>
                        </div>

                        <!-- Clear Filters -->
                        <button id="clear-filters" class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Clear All Filters
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Our Sweet Collection</h2>
                            <p id="product-count" class="text-gray-600 mt-1">Showing all 24 products</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button id="grid-view" class="p-2 text-gray-600 hover:text-pink-500 border rounded-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </button>
                            <button id="list-view" class="p-2 text-gray-600 hover:text-pink-500 border rounded-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loading-spinner" class="hidden flex justify-center items-center py-12">
                        <div class="loading-spinner"></div>
                    </div>

                    <!-- Products Grid -->
                    <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 product-grid">
                        <!-- Products will be dynamically inserted here -->
                    </div>

                    <!-- No Results -->
                    <div id="no-results" class="hidden text-center py-12">
                        <svg class="mx-auto h-24 w-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No products found</h3>
                        <p class="text-gray-500">Try adjusting your filters or search terms</p>
                    </div>

                    <!-- Pagination -->
                    <div id="pagination" class="flex justify-center mt-12">
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                Previous
                            </button>
                            <button class="px-4 py-2 bg-pink-500 text-white rounded-lg">1</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                    </div>
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
                <button id="subscribe-btn" class="bg-white text-pink-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("inc_files/footer.php"); ?>

  
    <script>
        // Sample product data
        let products = [];
        let filteredProducts = [];
        let currentCategory = 'all';
        let currentSort = 'featured';
        let searchQuery = '';
        let limit = 9;         // Number of products per page
        let offset = 0;         // Starting index
        let totalProducts = 0;  // Fetched from API


        const API_BASE = "../api";
        const token = localStorage.getItem('token') || '';


        // DOM Elements
        const productsGrid = document.getElementById('products-grid');
        const productCount = document.getElementById('product-count');
        const searchInput = document.getElementById('search-input');
        const sortSelect = document.getElementById('sort-select');
        const loadingSpinner = document.getElementById('loading-spinner');
        const noResults = document.getElementById('no-results');
        const clearFiltersBtn = document.getElementById('clear-filters');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupEventListeners();
            filterAndRenderProducts(); // Start fetching from API on page load
        });


        function setupEventListeners() {
            // Search
            searchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase();
                filterAndRenderProducts();
            });

            // Sort
            sortSelect.addEventListener('change', (e) => {
                currentSort = e.target.value;
                filterAndRenderProducts();
            });

            // Category filters
            document.querySelectorAll('[data-category]').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    document.querySelectorAll('[data-category]').forEach(b => b.classList.remove('active'));
                    e.target.classList.add('active');
                    currentCategory = e.target.dataset.category;
                    filterAndRenderProducts();
                });
            });

            // Clear filters
            clearFiltersBtn.addEventListener('click', () => {
                currentCategory = 'all';
                currentSort = 'featured';
                searchQuery = '';
                searchInput.value = '';
                sortSelect.value = 'featured';
                
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelector('[data-category="all"]').classList.add('active');
                
                filterAndRenderProducts();
            });

            // Newsletter subscription
            const subscribeBtn = document.getElementById('subscribe-btn');
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
        }

        function filterAndRenderProducts() {
            showLoading();

            const body = {
                name: searchQuery,
                category: currentCategory === 'all' ? '' : currentCategory,
                sort: currentSort === 'price-low' ? 'asc' : currentSort === 'price-high' ? 'desc' : '',
                limit,
                offset
            };

            fetch(`${API_BASE}/get_products.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(body)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    products = data.products;
                    filteredProducts = [...products];
                    totalProducts = data.total || 0;
                    renderProducts();
                    renderPagination(); // <-- ADD THIS
                } else {
                    products = [];
                    filteredProducts = [];
                    totalProducts = 0;
                    renderProducts();
                    renderPagination(); // <-- Also call this
                }
            })

            .catch(err => {
                console.error("Fetch error:", err);
                products = [];
                filteredProducts = [];
                renderProducts();
            })
            .finally(() => {
                hideLoading();
            });
        }

        function renderProducts() {
            if (filteredProducts.length === 0) {
                productsGrid.innerHTML = '';
                noResults.classList.remove('hidden');
                productCount.textContent = 'No products found';
                return;
            }

            noResults.classList.add('hidden');
            const start = offset + 1;
            const end = Math.min(offset + filteredProducts.length, totalProducts);
            productCount.textContent = `Showing ${start}–${end} of ${totalProducts} product${totalProducts !== 1 ? 's' : ''}`;


            productsGrid.innerHTML = filteredProducts.map(product => `
                <div class="bg-white rounded-2xl shadow-lg card-hover overflow-hidden group" style="cursor:pointer;" onclick="window.location.href='product_detail.php?id=${product.id}'">
                    <div class="relative">
                        <a href="product_detail.php?id=${product.id}">
                            <img src="${product.image}" alt="${product.name}" class="w-full h-64 object-cover image-hover">
                        </a>

                        ${product.badge ? `<div class="badge badge-${product.badge}">${product.badge}</div>` : ''}
                        <button class="heart-btn absolute top-4 right-4 p-2 bg-white rounded-full shadow-md hover:bg-pink-50">
                            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center">
                                ${generateStars(parseFloat(product.rating))}
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(${product.rating})</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">${product.name}</h3>
                        <p class="text-gray-600 mb-4">${product.description}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-pink-500">$${parseFloat(product.price).toFixed(2)}</span>

                            <button onclick="event.stopPropagation(); addToCart(${product.id})" class="btn-gradient text-white px-6 py-2 rounded-full">Add to Cart</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function renderPagination() {
            const paginationContainer = document.getElementById('pagination');
            if (!paginationContainer) return;

            const totalPages = Math.ceil(totalProducts / limit);
            const currentPage = Math.floor(offset / limit) + 1;

            if (totalPages <= 1) {
                paginationContainer.innerHTML = '';
                return;
            }

            let buttons = '';

            // Previous Button
            buttons += `<button ${currentPage === 1 ? 'disabled' : ''} 
                            class="px-4 py-2 border rounded-lg ${currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50'}"
                            onclick="goToPage(${currentPage - 1})">Previous</button>`;

            // Page Numbers
            for (let i = 1; i <= totalPages; i++) {
                buttons += `<button class="px-4 py-2 border rounded-lg ${i === currentPage ? 'bg-pink-500 text-white' : 'hover:bg-gray-50'}"
                                onclick="goToPage(${i})">${i}</button>`;
            }

            // Next Button
            buttons += `<button ${currentPage === totalPages ? 'disabled' : ''} 
                            class="px-4 py-2 border rounded-lg ${currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50'}"
                            onclick="goToPage(${currentPage + 1})">Next</button>`;

            paginationContainer.innerHTML = `<div class="flex space-x-2">${buttons}</div>`;
        }


        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 !== 0;
            let starsHTML = '';

            for (let i = 0; i < fullStars; i++) {
                starsHTML += '<svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
            }

            if (hasHalfStar) {
                starsHTML += '<svg class="h-4 w-4 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
            }

            const emptyStars = 5 - Math.ceil(rating);
            for (let i = 0; i < emptyStars; i++) {
                starsHTML += '<svg class="h-4 w-4 text-gray-300" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
            }

            return starsHTML;
        }

        function addToCart(productId) {
            const quantity = 1; // Default quantity

            fetch(`${API_BASE}/add_to_cart.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    token,
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // cartCount++;
                    alert("Product added to cart!");
                } else {
                    alert("Failed to add product to cart.");
                }
            })
            .catch(err => {
                console.error("Add to cart error:", err);
                alert("Error adding to cart.");
            });
        }

        function showLoading() {
            loadingSpinner.classList.remove('hidden');
            productsGrid.style.opacity = '0.5';
        }

        function hideLoading() {
            loadingSpinner.classList.add('hidden');
            productsGrid.style.opacity = '1';
        }
        function goToPage(page) {
            offset = (page - 1) * limit;
            filterAndRenderProducts();
        }

    </script>
</body>
</html>