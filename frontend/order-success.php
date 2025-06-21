<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Sweet Dreams</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'fade-in': 'fadeIn 0.8s ease-in',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'confetti': 'confetti 3s ease-in-out infinite',
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
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes confetti {
            0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        .success-checkmark {
            animation: fadeIn 1s ease-in 0.5s both;
        }
        
        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 10px;
            background: linear-gradient(45deg, #ec4899, #8b5cf6, #3b82f6, #10b981, #f59e0b);
            animation: confetti 3s linear infinite;
        }
        
        .order-card {
            animation: slideUp 0.6s ease-out 0.8s both;
        }
        
        .timeline-item {
            animation: slideUp 0.6s ease-out both;
        }
        
        .timeline-item:nth-child(1) { animation-delay: 1.2s; }
        .timeline-item:nth-child(2) { animation-delay: 1.4s; }
        .timeline-item:nth-child(3) { animation-delay: 1.6s; }
        .timeline-item:nth-child(4) { animation-delay: 1.8s; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 relative overflow-x-hidden">
    <!-- Confetti Animation -->
    <div id="confetti-container" class="fixed inset-0 pointer-events-none z-10"></div>

    <!-- Navigation -->
    <?php include("inc_files/header.php"); ?>

    <!-- Main Content -->
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Header -->
            <div class="text-center mb-12 fade-in">
                <div class="success-checkmark mb-8">
                    <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto shadow-lg">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Order <span class="gradient-text">Confirmed!</span>
                </h1>
                <p class="text-xl text-gray-600 mb-2">Thank you for your sweet order!</p>
                <p class="text-lg text-gray-500">We're preparing your delicious treats with love and care.</p>
            </div>

            <!-- Action Buttons -->
            <div class="text-center space-y-4 md:space-y-0 md:space-x-4 md:flex md:justify-center">
                <a href="index.html" class="inline-flex items-center btn-gradient text-white px-8 py-4 rounded-full font-semibold">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 5M7 13l-1.5 5m0 0h9m-9 0a1 1 0 100 2 1 1 0 000-2zm9 0a1 1 0 100 2 1 1 0 000-2z"></path>
                    </svg>
                    Continue Shopping
                </a>
                <button onclick="window.print()" class="inline-flex items-center border-2 border-pink-500 text-pink-500 px-8 py-4 rounded-full font-semibold hover:bg-pink-500 hover:text-white transition-all duration-200">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print Receipt
                </button>
            </div>

            <!-- Thank You Message -->
            <div class="text-center mt-12 fade-in">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Thank You for Choosing Sweet Dreams!</h3>
                <p class="text-lg text-gray-600 mb-6">
                    We're thrilled to be part of your sweet moments. If you have any questions about your order, 
                    please don't hesitate to contact us.
                </p>
                <div class="flex justify-center space-x-8 text-sm text-gray-500">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+91 6297812088</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-pink-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>business@sweetdreams.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("inc_files/footer.php"); ?>

    <!-- <script>
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

        // Create confetti animation
        function createConfetti() {
            const confettiContainer = document.getElementById('confetti-container');
            const colors = ['#ec4899', '#8b5cf6', '#3b82f6', '#10b981', '#f59e0b'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti-piece';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 3 + 's';
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confettiContainer.appendChild(confetti);
            }
            
            // Remove confetti after animation
            setTimeout(() => {
                confettiContainer.innerHTML = '';
            }, 6000);
        }

        // Load order data and populate the page
        function loadOrderData() {
            const orderData = JSON.parse(localStorage.getItem('lastOrder'));
            
            if (!orderData) {
                // If no order data, redirect to home
                window.location.href = 'index.html';
                return;
            }

            // Populate order details
            document.getElementById('order-number').textContent = orderData.orderId;
            
            // Format and display order date
            const orderDate = new Date(orderData.orderDate);
            document.getElementById('order-date').textContent = orderDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // Populate shipping address
            const shippingAddress = document.getElementById('shipping-address');
            shippingAddress.innerHTML = `
                <p class="font-medium text-gray-900">${orderData.customerInfo.firstName} ${orderData.customerInfo.lastName}</p>
                <p>${orderData.customerInfo.address}</p>
                <p>${orderData.customerInfo.city}, ${orderData.customerInfo.state} ${orderData.customerInfo.zipCode}</p>
                <p>${orderData.customerInfo.phone}</p>
            `;

            // Populate order items
            const orderItemsContainer = document.getElementById('order-items');
            orderItemsContainer.innerHTML = orderData.items.map(item => `
                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                    <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded-lg">
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900">${item.name}</h4>
                        <p class="text-gray-600">${item.category}</p>
                        <p class="text-sm text-gray-500">Quantity: ${item.quantity}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-gray-900">$${(item.price * item.quantity).toFixed(2)}</p>
                        <p class="text-sm text-gray-500">$${item.price} each</p>
                    </div>
                </div>
            `).join('');

            // Populate order summary
            document.getElementById('summary-subtotal').textContent = `$${orderData.totals.subtotal.toFixed(2)}`;
            document.getElementById('summary-shipping').textContent = orderData.totals.shippingCost === 0 ? 'Free' : `$${orderData.totals.shippingCost.toFixed(2)}`;
            document.getElementById('summary-tax').textContent = `$${orderData.totals.tax.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `$${orderData.totals.total.toFixed(2)}`;
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadOrderData();
            createConfetti();
            
            // Send confirmation email simulation
            setTimeout(() => {
                console.log('Confirmation email sent!');
            }, 2000);
        });
    </script> -->
</body>
</html>