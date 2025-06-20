<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Sweet Dreams</title>
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
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f9fafb;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Main Content -->
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Empty Cart State -->
            <div id="empty-cart" class="text-center py-16 hidden">
                <svg class="h-24 w-24 text-gray-300 mx-auto mb-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                </svg>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
                <p class="text-gray-600 mb-8">Discover our sweet collection and add some treats to your cart!</p>
                <a href="index.html" class="inline-flex items-center btn-gradient text-white px-8 py-4 rounded-full font-semibold">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <!-- Cart with Items -->
            <div id="cart-with-items">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
                            <p id="cart-summary" class="text-gray-600 mt-2">0 items in your cart</p>
                        </div>
                        <a href="index.html" class="inline-flex items-center text-pink-600 hover:text-pink-700 font-medium">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-xl font-semibold text-gray-900">Cart Items</h2>
                                    <button id="clear-cart" class="text-red-600 hover:text-red-700 font-medium text-sm">
                                        Clear Cart
                                    </button>
                                </div>
                            </div>
                            
                            <div id="cart-items" class="divide-y divide-gray-200">
                                <!-- Cart items will be dynamically inserted here -->
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Order Summary</h2>
                            
                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span id="subtotal" class="font-semibold">$0.00</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Shipping</span>
                                    <span id="shipping" class="font-semibold">Free</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tax</span>
                                    <span id="tax" class="font-semibold">$0.00</span>
                                </div>
                                
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex justify-between">
                                        <span class="text-lg font-semibold text-gray-900">Total</span>
                                        <span id="total" class="text-lg font-bold text-pink-600">$0.00</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="shipping-notice" class="mb-6 p-4 bg-blue-50 rounded-lg hidden">
                                <p class="text-sm text-blue-800">
                                    Add <span id="free-shipping-amount">$0.00</span> more to get free shipping!
                                </p>
                            </div>
                            
                            <button id="checkout-btn" class="w-full btn-gradient text-white py-4 rounded-full font-semibold mb-4">
                                Proceed to Checkout
                            </button>
                            
                            <div class="space-y-3 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span>Free shipping on orders over $25</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <span>Secure checkout with SSL encryption</span>
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
        document.getElementById('checkout-btn').addEventListener('click', function () {
            window.location.href = 'checkout.php';
        });
    </script>

    <script>
        let cart = [];
        const token = localStorage.getItem('token') || '';

        document.addEventListener('DOMContentLoaded', () => {
            fetchCartFromAPI();

            // Handle mobile menu safely
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    menuIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });
            }

            // Clear cart handler
            document.getElementById('clear-cart').addEventListener('click', clearCart);
        });

        function fetchCartFromAPI() {
            if (!token) {
                document.getElementById('empty-cart').classList.remove('hidden');
                document.getElementById('cart-with-items').classList.add('hidden');
                return;
            }

            fetch('../api/get_user_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ token })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    cart = data.cart || [];
                    updateCartCount();
                    updateCartSummary();
                    renderCartItems();
                    calculateTotals();
                } else {
                    cart = [];
                    document.getElementById('empty-cart').classList.remove('hidden');
                    document.getElementById('cart-with-items').classList.add('hidden');
                }
            })
            .catch(err => {
                console.error('Error fetching cart:', err);
                document.getElementById('empty-cart').classList.remove('hidden');
                document.getElementById('cart-with-items').classList.add('hidden');
            });
        }

        function updateCartCount() {
            const count = cart.reduce((total, item) => total + item.quantity, 0);
            const cartCount = document.getElementById('cart-count');
            const cartCountMobile = document.getElementById('cart-count-mobile');

            if (cartCount) cartCount.textContent = count;
            if (cartCountMobile) cartCountMobile.textContent = count;
        }

        function updateCartSummary() {
            const itemCount = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cart-summary').textContent = `${itemCount} item${itemCount !== 1 ? 's' : ''} in your cart`;
        }

        function calculateTotals() {
            const subtotal = cart.reduce((total, item) => total + item.total_price, 0);
            const shippingCost = subtotal >= 25 ? 0 : 5.99;
            const tax = subtotal * 0.08;
            const total = subtotal + shippingCost + tax;

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('shipping').textContent = shippingCost === 0 ? 'Free' : `$${shippingCost.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `$${total.toFixed(2)}`;

            const shippingNotice = document.getElementById('shipping-notice');
            if (subtotal < 25 && subtotal > 0) {
                const remaining = 25 - subtotal;
                document.getElementById('free-shipping-amount').textContent = `$${remaining.toFixed(2)}`;
                shippingNotice.classList.remove('hidden');
            } else {
                shippingNotice.classList.add('hidden');
            }
        }

        function renderCartItems() {
            const cartItemsContainer = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');
            const cartWithItems = document.getElementById('cart-with-items');

            if (cart.length === 0) {
                emptyCart.classList.remove('hidden');
                cartWithItems.classList.add('hidden');
                return;
            }

            emptyCart.classList.add('hidden');
            cartWithItems.classList.remove('hidden');

            cartItemsContainer.innerHTML = cart.map(item => `
                <div class="p-6 cart-item">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img src="${item.image}" alt="${item.product_name}" class="w-20 h-20 object-cover rounded-lg">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="product_detail.php?id=${item.product_id}" class="text-lg font-semibold text-gray-900 hover:text-pink-600 transition-colors">
                                ${item.product_name}
                            </a>
                            <p class="text-pink-600 font-semibold mt-2">$${item.price}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button onclick="updateQuantity(${item.cart_id}, ${item.quantity - 1})" class="p-2 hover:bg-gray-50 transition-colors">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                </button>
                                <span class="px-4 py-2 min-w-[60px] text-center">${item.quantity}</span>
                                <button onclick="updateQuantity(${item.cart_id}, ${item.quantity + 1})" class="p-2 hover:bg-gray-50 transition-colors">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path></svg>
                                </button>
                            </div>
                            <button onclick="removeItem(${item.cart_id})" class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-full transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="font-semibold text-gray-900">$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                </div>
            `).join('');
        }

        function updateQuantity(cartId, newQuantity) {
            if (newQuantity <= 0) {
                removeItem(cartId);
                return;
            }

            fetch('../api/update_cart_quantity.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ cart_id: cartId, quantity: newQuantity })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const item = cart.find(i => i.cart_id === cartId);
                    if (item) {
                        item.quantity = newQuantity;
                        item.total_price = item.quantity * parseFloat(item.price);
                        renderCartItems();
                        updateCartCount();
                        updateCartSummary();
                        calculateTotals();
                    }
                } else {
                    alert("Failed to update quantity.");
                }
            })
            .catch(err => {
                console.error('Quantity update failed:', err);
            });
        }

        function removeItem(cartId) {
            fetch('../api/delete_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ cart_id: cartId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    cart = cart.filter(item => item.cart_id !== cartId);
                    renderCartItems();
                    updateCartCount();
                    updateCartSummary();
                    calculateTotals();
                } else {
                    alert("Failed to remove item.");
                }
            })
            .catch(err => {
                console.error('Remove item failed:', err);
            });
        }

        function clearCart() {
            if (confirm('Are you sure you want to clear your cart?')) {
                // Clear cart one by one via API if needed
                const cartIds = cart.map(i => i.cart_id);
                Promise.all(cartIds.map(id =>
                    fetch('../api/delete_cart.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ cart_id: id })
                    })
                )).then(() => {
                    cart = [];
                    renderCartItems();
                    updateCartCount();
                    updateCartSummary();
                    calculateTotals();
                });
            }
        }
    </script>
</body>
</html>