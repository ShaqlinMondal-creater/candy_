<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sweet Dreams</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'fade-in': 'fadeIn 0.5s ease-in',
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
        
        .step-indicator {
            transition: all 0.3s ease;
        }
        
        .step-active {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            color: white;
        }
        
        .step-completed {
            background: #10b981;
            color: white;
        }
        
        .payment-tab {
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .payment-tab.active {
            background: linear-gradient(45deg, #ec4899, #8b5cf6);
            color: white;
            border-color: transparent;
        }
        
        .payment-tab:hover:not(.active) {
            border-color: #ec4899;
            background-color: #fdf2f8;
        }
        
        .payment-content {
            display: none;
            animation: fadeIn 0.3s ease-in;
        }
        
        .payment-content.active {
            display: block;
        }
        
        .upi-option {
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .upi-option:hover {
            background-color: #f3f4f6;
            transform: translateY(-1px);
        }
        
        .upi-option.selected {
            border-color: #ec4899;
            background-color: #fdf2f8;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
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
                <a href="cart.html" class="inline-flex items-center text-pink-600 hover:text-pink-700 font-medium">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Cart
                </a>
            </div>

            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div class="step-indicator step-completed w-10 h-10 rounded-full flex items-center justify-center font-semibold">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-900">Cart</span>
                        </div>
                        <div class="w-16 h-1 bg-green-500"></div>
                        <div class="flex items-center">
                            <div class="step-indicator step-active w-10 h-10 rounded-full flex items-center justify-center font-semibold">
                                2
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-900">Checkout</span>
                        </div>
                        <div class="w-16 h-1 bg-gray-300"></div>
                        <div class="flex items-center">
                            <div class="step-indicator w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center font-semibold text-gray-600">
                                3
                            </div>
                            <span class="ml-2 text-sm font-medium text-gray-600">Complete</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Checkout Details -->
                <div class="lg:col-span-2">
                    <form id="checkout-form" class="space-y-8">
                        <!-- Contact Information -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 fade-in">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Contact Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="firstName" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="lastName" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 fade-in">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Shipping Address</h2>
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                                    <input type="text" id="address" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                        <input type="text" id="city" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                                        <select id="state" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                            <option value="">Select State</option>
                                            <option value="CA">California</option>
                                            <option value="NY">New York</option>
                                            <option value="TX">Texas</option>
                                            <option value="FL">Florida</option>
                                            <!-- Add more states as needed -->
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">ZIP Code</label>
                                        <input type="text" id="zipCode" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 fade-in">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Payment Information</h2>
                            
                            <!-- Payment Method Tabs -->
                            <div class="flex space-x-1 mb-6 bg-gray-100 p-1 rounded-lg">
                                <button type="button" class="payment-tab active flex-1 py-3 px-4 text-sm font-medium rounded-md border border-gray-300" data-payment="card">
                                    <svg class="h-5 w-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    Card
                                </button>
                                <button type="button" class="payment-tab flex-1 py-3 px-4 text-sm font-medium rounded-md border border-gray-300" data-payment="upi">
                                    <svg class="h-5 w-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    UPI
                                </button>
                                <button type="button" class="payment-tab flex-1 py-3 px-4 text-sm font-medium rounded-md border border-gray-300" data-payment="cod">
                                    <svg class="h-5 w-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    COD
                                </button>
                            </div>

                            <!-- Card Payment Content -->
                            <div id="card-payment" class="payment-content active">
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                                        <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Month</label>
                                            <select id="expiryMonth" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                                <option value="">Month</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Year</label>
                                            <select id="expiryYear" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                                <option value="">Year</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                            <input type="text" id="cvv" placeholder="123" maxlength="4" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label>
                                        <input type="text" id="cardholderName" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- UPI Payment Content -->
                            <div id="upi-payment" class="payment-content">
                                <div class="space-y-6">
                                    <p class="text-sm text-gray-600 mb-4">Choose your preferred UPI payment method:</p>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="upi-option border-2 border-gray-200 rounded-lg p-4 text-center" data-upi="gpay">
                                            <div class="w-16 h-16 mx-auto mb-3 bg-blue-100 rounded-full flex items-center justify-center">
                                                <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                            </div>
                                            <h3 class="font-semibold text-gray-900">Google Pay</h3>
                                            <p class="text-sm text-gray-600">Pay with GPay</p>
                                        </div>
                                        
                                        <div class="upi-option border-2 border-gray-200 rounded-lg p-4 text-center" data-upi="phonepe">
                                            <div class="w-16 h-16 mx-auto mb-3 bg-purple-100 rounded-full flex items-center justify-center">
                                                <svg class="h-8 w-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                            </div>
                                            <h3 class="font-semibold text-gray-900">PhonePe</h3>
                                            <p class="text-sm text-gray-600">Pay with PhonePe</p>
                                        </div>
                                        
                                        <div class="upi-option border-2 border-gray-200 rounded-lg p-4 text-center" data-upi="paytm">
                                            <div class="w-16 h-16 mx-auto mb-3 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <svg class="h-8 w-8 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                                </svg>
                                            </div>
                                            <h3 class="font-semibold text-gray-900">Paytm</h3>
                                            <p class="text-sm text-gray-600">Pay with Paytm</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">UPI ID (Optional)</label>
                                        <input type="text" id="upiId" placeholder="yourname@upi" class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                                        <p class="text-xs text-gray-500 mt-1">Enter your UPI ID or use the options above</p>
                                    </div>
                                </div>
                            </div>

                            <!-- COD Payment Content -->
                            <div id="cod-payment" class="payment-content">
                                <div class="text-center py-8">
                                    <div class="w-20 h-20 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Cash on Delivery</h3>
                                    <p class="text-gray-600 mb-4">Pay when your order is delivered to your doorstep</p>
                                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-left">
                                        <div class="flex">
                                            <svg class="h-5 w-5 text-yellow-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-yellow-800">Please Note:</p>
                                                <ul class="text-sm text-yellow-700 mt-1 space-y-1">
                                                    <li>• Please keep exact change ready</li>
                                                    <li>• COD available for orders up to ₹5000</li>
                                                    <li>• Additional ₹50 COD charges apply</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Special Instructions -->
                        <div class="bg-white rounded-2xl shadow-lg p-6 fade-in">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">Special Instructions</h2>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Notes (Optional)</label>
                                <textarea id="deliveryNotes" rows="4" placeholder="Any special delivery instructions..." class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none resize-none"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24 fade-in">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Order Summary</h2>
                        
                        <!-- Order Items -->
                        <div id="order-items" class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            <!-- Items will be populated by JavaScript -->
                        </div>
                        
                        <div class="border-t border-gray-200 pt-6 space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span id="checkout-subtotal" class="font-semibold">$0.00</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span id="checkout-shipping" class="font-semibold">Free</span>
                            </div>
                            
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span id="checkout-tax" class="font-semibold">$0.00</span>
                            </div>
                            
                            <div id="cod-charges" class="flex justify-between hidden">
                                <span class="text-gray-600">COD Charges</span>
                                <span class="font-semibold">$4.00</span>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold text-gray-900">Total</span>
                                    <span id="checkout-total" class="text-lg font-bold text-pink-600">$0.00</span>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" form="checkout-form" class="w-full btn-gradient text-white py-4 rounded-full font-semibold mt-6 flex items-center justify-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Complete Order
                        </button>
                        
                        <div class="mt-6 space-y-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>Secure 256-bit SSL encryption</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span>Free shipping on orders over $25</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span>30-day money-back guarantee</span>
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
    let cart = []; // Global cart

    let selectedPaymentMethod = 'card';
    let selectedUpiMethod = '';

    function updateCartCount() {
        const count = cart.reduce((total, item) => total + item.quantity, 0);
        document.getElementById('cart-count').textContent = count;
        document.getElementById('cart-count-mobile').textContent = count;
    }

    function renderOrderItems() {
        const orderItemsContainer = document.getElementById('order-items');

        if (cart.length === 0) {
            orderItemsContainer.innerHTML = '<p class="text-gray-500 text-center">No items in cart</p>';
            return;
        }

        orderItemsContainer.innerHTML = cart.map(item => `
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <img src="${item.image}" alt="${item.name}" class="w-12 h-12 object-cover rounded-lg">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">${item.name}</p>
                    <p class="text-xs text-gray-500">Qty: ${item.quantity}</p>
                </div>
                <p class="text-sm font-semibold text-gray-900">$${(item.price * item.quantity).toFixed(2)}</p>
            </div>
        `).join('');
    }

    function calculateTotals() {
        const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
        const shippingCost = subtotal >= 25 ? 0 : 5.99;
        const tax = +(subtotal * 0.08).toFixed(2);
        const codCharges = selectedPaymentMethod === 'cod' ? 4.00 : 0;
        const total = subtotal + shippingCost + tax + codCharges;

        document.getElementById('checkout-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.getElementById('checkout-shipping').textContent = shippingCost === 0 ? 'Free' : `$${shippingCost.toFixed(2)}`;
        document.getElementById('checkout-tax').textContent = `$${tax.toFixed(2)}`;
        document.getElementById('checkout-total').textContent = `$${total.toFixed(2)}`;

        document.getElementById('cod-charges').classList.toggle('hidden', selectedPaymentMethod !== 'cod');

        return { subtotal, shippingCost, tax, codCharges, total };
    }

    async function loadOrderSummary() {
        const token = localStorage.getItem('token');
        if (!token) return;

        try {
            const response = await fetch('../api/get_user_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ token })
            });

            const data = await response.json();
            if (data.status === "success") {
                console.log("Cart API sample:", data.cart[0]);

                cart = data.cart.map(item => ({
                    cart_row_id: item.cart_id || item.id || item.row_id || '', // 👈 choose based on console log result
                    product_id: item.product_id,
                    name: item.product_name,
                    quantity: parseInt(item.quantity),
                    price: parseFloat(item.price || item.unit_price || item.total_price / item.quantity),
                    image: item.image
                }));

                renderOrderItems();
                calculateTotals();
                updateCartCount();
            } else {
                console.error("Cart API error:", data.message);
            }
        } catch (err) {
            console.error("Fetch error:", err);
        }
    }

    document.querySelectorAll('.payment-tab').forEach(tab => {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.payment-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            document.querySelectorAll('.payment-content').forEach(content => content.classList.remove('active'));

            selectedPaymentMethod = this.dataset.payment;
            document.getElementById(`${selectedPaymentMethod}-payment`).classList.add('active');
            calculateTotals();
        });
    });

    document.querySelectorAll('.upi-option').forEach(option => {
        option.addEventListener('click', function () {
            document.querySelectorAll('.upi-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            selectedUpiMethod = this.dataset.upi;
        });
    });

    document.getElementById('checkout-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const submitBtn = document.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = `<svg class="animate-spin h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg> Processing...`;
        submitBtn.disabled = true;

        if (cart.length === 0) {
            Swal.fire('Cart is empty', 'Please add some items before placing your order.', 'warning');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
        }

        const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'address', 'city', 'state', 'zipCode'];
        if (selectedPaymentMethod === 'card') {
            requiredFields.push('cardNumber', 'expiryMonth', 'expiryYear', 'cvv', 'cardholderName');
        } else if (selectedPaymentMethod === 'upi' && !selectedUpiMethod && !document.getElementById('upiId').value.trim()) {
            Swal.fire('UPI Required', 'Please select or enter a UPI ID.', 'warning');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
        }

        let isValid = true;
        requiredFields.forEach(id => {
            const field = document.getElementById(id);
            if (!field.value.trim()) {
                field.style.borderColor = '#ef4444';
                isValid = false;
            } else {
                field.style.borderColor = '#d1d5db';
            }
        });

        if (!isValid) {
            Swal.fire('Missing Fields', 'Please fill in all required fields.', 'error');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
        }

        const email = document.getElementById('email').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            Swal.fire('Invalid Email', 'Please enter a valid email address.', 'error');
            document.getElementById('email').style.borderColor = '#ef4444';
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
        }

        if (selectedPaymentMethod === 'card') {
            const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
            if (cardNumber.length < 13 || cardNumber.length > 19) {
                Swal.fire('Invalid Card Number', 'Card number must be between 13 and 19 digits.', 'error');
                document.getElementById('cardNumber').style.borderColor = '#ef4444';
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                return;
            }
            const cvv = document.getElementById('cvv').value;
            if (cvv.length < 3 || cvv.length > 4) {
                Swal.fire('Invalid CVV', 'CVV must be 3 or 4 digits.', 'error');
                document.getElementById('cvv').style.borderColor = '#ef4444';
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                return;
            }
        }

        const totals = calculateTotals();
        const fullName = `${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
        const address = `${document.getElementById('address').value}, ${document.getElementById('city').value}, ${document.getElementById('state').value} - ${document.getElementById('zipCode').value}`;
        const notes = document.getElementById('deliveryNotes').value;

        let paymentLabel = selectedPaymentMethod.toUpperCase();
        if (selectedPaymentMethod === 'upi') {
            paymentLabel += selectedUpiMethod ? ` (${selectedUpiMethod.toUpperCase()})` : '';
        }

        let itemHtml = cart.map(item => `
            <div class="flex items-center space-x-3 p-2 border-b">
                <img src="${item.image}" alt="${item.name}" class="w-10 h-10 object-cover rounded">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-800">${item.name}</p>
                    <p class="text-xs text-gray-500">Qty: ${item.quantity}</p>
                </div>
                <p class="text-sm font-semibold text-gray-800">$${(item.price * item.quantity).toFixed(2)}</p>
            </div>
        `).join('');

        Swal.fire({
            title: 'Confirm Your Order',
            html: `
                <div class="text-left">
                    <p><strong>Name:</strong> ${fullName}</p>
                    <p><strong>Email:</strong> ${email}</p>
                    <p><strong>Phone:</strong> ${document.getElementById('phone').value}</p>
                    <p><strong>Address:</strong> ${address}</p>
                    <p><strong>Payment Method:</strong> ${paymentLabel}</p>
                    <p><strong>Delivery Notes:</strong> ${notes || '-'}</p>
                    <hr class="my-3" />
                    <div class="max-h-48 overflow-y-auto">${itemHtml}</div>
                    <hr class="my-3" />
                    <p><strong>Subtotal:</strong> ${document.getElementById('checkout-subtotal').textContent}</p>
                    <p><strong>Tax:</strong> ${document.getElementById('checkout-tax').textContent}</p>
                    <p><strong>Shipping:</strong> ${document.getElementById('checkout-shipping').textContent}</p>
                    ${selectedPaymentMethod === 'cod' ? `<p><strong>COD Charges:</strong> $4.00</p>` : ''}
                    <p class="text-lg mt-2"><strong>Total:</strong> ${document.getElementById('checkout-total').textContent}</p>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Confirm Order',
            cancelButtonText: 'Review Again',
            customClass: {
                confirmButton: 'bg-pink-600 text-white px-4 py-2 rounded',
                cancelButton: 'bg-gray-200 text-gray-700 px-4 py-2 rounded'
            }
        }).then(result => {
            if (result.isConfirmed) {
                const token = localStorage.getItem('token') || '';
                const shipping_address = `${document.getElementById('address').value}, ${document.getElementById('city').value}, ${document.getElementById('state').value} - ${document.getElementById('zipCode').value}`;
                const shipping_charge = totals.shippingCost;
                const payment_method = selectedPaymentMethod.toUpperCase();
                const cartIds = cart
                .map(item => item.cart_row_id)
                .filter(id => id !== '' && id !== undefined && id !== null)
                .join(',');



                fetch('../api/create_order.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        token,
                        cart_id: cartIds,
                        shipping_address,
                        shipping_charge,
                        payment_method
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        localStorage.removeItem('cart');
                        localStorage.setItem('order_response', JSON.stringify(data.order));
                        window.location.href = 'order-success.php';
                    } else {
                        Swal.fire('Order Failed', data.message || 'Something went wrong.', 'error');
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire('Error', 'Could not connect to server.', 'error');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });

            }

        });
    });

    document.getElementById('cardNumber').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        e.target.value = formattedValue;
    });

    document.getElementById('cvv').addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('phone').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = value.replace(/(\d{3})(\d{3})(\d{0,4})/, '($1) $2-$3');
    });

    // Prefill contact info if available
    const name = localStorage.getItem('name');
    const email = localStorage.getItem('email');
    const mobile = localStorage.getItem('mobile');

    if (name) {
        const nameParts = name.trim().split(' ');
        document.getElementById('firstName').value = nameParts[0] || '';
        document.getElementById('lastName').value = nameParts.slice(1).join(' ') || '';
    }

    if (email) document.getElementById('email').value = email;
    if (mobile) document.getElementById('phone').value = mobile;

    document.addEventListener('DOMContentLoaded', loadOrderSummary);
</script>

</body>
</html>