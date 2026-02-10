<?php
include '../includes/config.php';

$cartTotal = 0;
$itemCount = 0;

foreach ($_SESSION['cart'] as $productId => $quantity) {
    $product = getProductById($productId);
    if ($product) {
        $cartTotal += $product['price'] * $quantity;
        $itemCount += $quantity;
    }
}

$tax = $cartTotal * 0.1;
$finalTotal = $cartTotal + $tax;

$orderPlaced = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $address = htmlspecialchars($_POST['address'] ?? '');
    $city = htmlspecialchars($_POST['city'] ?? '');
    
    if ($name && $email && $phone && $address && $city && !empty($_SESSION['cart'])) {
        $orderPlaced = true;
        // Here you would save the order to database
        $_SESSION['cart'] = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sweet Bliss Bakery</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <a href="../index.php" class="logo">Sweet Bliss</a>
            <nav>
                <a href="../index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <?php if (!empty($_SESSION['user'])): ?>
                    <a href="account.php">Account</a>
                    <a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['user']['name']); ?>)</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="signup.php">Sign Up</a>
                <?php endif; ?>
                <a href="cart.php" class="cart-icon">
                    🛒
                    <span class="cart-count" style="display: <?php echo count($_SESSION['cart']) > 0 ? 'flex' : 'none'; ?>">
                        <?php echo count($_SESSION['cart']); ?>
                    </span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <?php if ($orderPlaced): ?>
            <div style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">✅</div>
                <h2>Order Confirmed!</h2>
                <p style="font-size: 1.2rem; color: #666; margin: 1.5rem 0;">
                    Thank you for your order. We'll prepare your fresh baked goods and have them ready soon!
                </p>
                <div style="background: white; padding: 2rem; border-radius: 15px; max-width: 500px; margin: 2rem auto; text-align: left;">
                    <h3 style="color: #d4a574; margin-bottom: 1rem;">Order Details</h3>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Delivery Address:</strong> <?php echo $address . ', ' . $city; ?></p>
                    <p><strong>Total:</strong> <?php echo '$' . number_format($finalTotal, 2); ?></p>
                    <p style="color: #666; font-size: 0.9rem; margin-top: 1rem;">A confirmation email has been sent to <?php echo $email; ?></p>
                </div>
                <a href="../index.php" class="cta-button" style="margin-top: 2rem;">Back to Home</a>
            </div>
        <?php else: ?>
            <h2>Checkout</h2>
            
            <?php if (empty($_SESSION['cart'])): ?>
                <div style="text-align: center; padding: 3rem; background: white; border-radius: 15px;">
                    <p style="font-size: 1.2rem; color: #666; margin-bottom: 1rem;">Your cart is empty!</p>
                    <a href="products.php" class="cta-button">Continue Shopping</a>
                </div>
            <?php else: ?>
                <div class="cart-container" style="grid-template-columns: 1fr 1fr; gap: 3rem;">
                    <!-- Checkout Form -->
                    <div>
                        <form method="POST">
                            <h3 style="color: #d4a574; margin-bottom: 1.5rem;">Shipping Information</h3>
                            
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Street Address *</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" required>
                            </div>
                            
                            <h3 style="color: #d4a574; margin-top: 2rem; margin-bottom: 1.5rem;">Payment Method</h3>
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="radio" name="payment" value="card" checked>
                                    <span>Credit/Debit Card</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.5rem;">
                                    <input type="radio" name="payment" value="cash">
                                    <span>Cash on Delivery</span>
                                </label>
                            </div>
                            
                            <button type="submit" class="checkout-btn">Place Order</button>
                            <a href="cart.php" style="display: block; text-align: center; margin-top: 1rem; color: #d4a574; text-decoration: none;">Back to Cart</a>
                        </form>
                    </div>

                    <!-- Order Summary -->
                    <div class="cart-summary">
                        <h3 style="margin-bottom: 1.5rem;">Order Summary</h3>
                        <div style="background: #f9f9f9; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
                            <p style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">Items in cart: <strong><?php echo $itemCount; ?></strong></p>
                        </div>
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span><?php echo '$' . number_format($cartTotal, 2); ?></span>
                        </div>
                        <div class="summary-item">
                            <span>Shipping:</span>
                            <span style="color: var(--success-color);">FREE</span>
                        </div>
                        <div class="summary-item">
                            <span>Tax (10%):</span>
                            <span><?php echo '$' . number_format($tax, 2); ?></span>
                        </div>
                        <div class="summary-item">
                            <span>Total:</span>
                            <span style="font-size: 1.3rem;"><?php echo '$' . number_format($finalTotal, 2); ?></span>
                        </div>
                        
                        <div style="background: #f0f0f0; padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                            <h4 style="color: #d4a574; margin-bottom: 1rem;">📍 Delivery Info</h4>
                            <p style="font-size: 0.9rem; color: #666; line-height: 1.6;">
                                ✓ FREE delivery for all orders<br>
                                ✓ Next-day delivery available<br>
                                ✓ Fresh baked guarantee<br>
                                ✓ 30-day freshness guarantee
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>🥐 Sweet Bliss</h3>
                <p>Artisan bakery offering the finest handcrafted baked goods.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="../index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="footer-section">
                <h3>Hours</h3>
                <p>Monday - Friday: 7:00 AM - 7:00 PM</p>
                <p>Saturday: 8:00 AM - 6:00 PM</p>
                <p>Sunday: 9:00 AM - 5:00 PM</p>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>📍 123 Bakery Lane, Food City</p>
                <p>📞 (555) 123-4567</p>
                <p>📧 hello@sweetbliss.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Sweet Bliss Bakery. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
