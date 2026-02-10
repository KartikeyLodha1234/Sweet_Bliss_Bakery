<?php
include '../includes/config.php';

$cartTotal = 0;
$cartItems = [];

foreach ($_SESSION['cart'] as $productId => $quantity) {
    $product = getProductById($productId);
    if ($product) {
        $itemTotal = $product['price'] * $quantity;
        $cartTotal += $itemTotal;
        $cartItems[] = [
            'id' => $productId,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity,
            'total' => $itemTotal
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Sweet Bliss Bakery</title>
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
        <h2>Shopping Cart</h2>

        <?php if (empty($cartItems)): ?>
            <div style="text-align: center; padding: 3rem; background: white; border-radius: 15px; margin: 2rem 0;">
                <p style="font-size: 1.3rem; color: #666; margin-bottom: 1.5rem;">🛒 Your cart is empty</p>
                <a href="products.php" class="cta-button">Continue Shopping</a>
            </div>
        <?php else: ?>
            <div class="cart-container">
                <!-- Cart Items -->
                <div class="cart-items">
                    <?php foreach ($cartItems as $item): ?>
                        <div class="cart-item">
                            <div style="font-size: 2rem; width: 80px;">
                                <?php
                                $emojis = ['🥐', '🍰', '🧁', '🥖', '🍪', '🫓', '🎂', '🥐', '🍮', '🥯'];
                                echo $emojis[$item['id'] % count($emojis)];
                                ?>
                            </div>
                            <div class="cart-item-info">
                                <div class="cart-item-name"><?php echo htmlspecialchars($item['name']); ?></div>
                                <div style="color: #666; font-size: 0.9rem;">
                                    Price: <?php echo '$' . number_format($item['price'], 2); ?>
                                </div>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <input type="number" id="quantity-<?php echo $item['id']; ?>" 
                                       value="<?php echo $item['quantity']; ?>" min="1" max="99"
                                       class="quantity-input" onchange="updateQuantity(<?php echo $item['id']; ?>)">
                                <span style="min-width: 80px; text-align: right; font-weight: bold;">
                                    <?php echo '$' . number_format($item['total'], 2); ?>
                                </span>
                                <button class="remove-btn" onclick="removeFromCart(<?php echo $item['id']; ?>)">Remove</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h3 style="color: #d4a574; margin-bottom: 1.5rem;">Order Summary</h3>
                    <div class="summary-item">
                        <span>Subtotal:</span>
                        <span><?php echo '$' . number_format($cartTotal, 2); ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Shipping:</span>
                        <span>FREE</span>
                    </div>
                    <div class="summary-item">
                        <span>Tax (10%):</span>
                        <span><?php echo '$' . number_format($cartTotal * 0.1, 2); ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Total:</span>
                        <span><?php echo '$' . number_format($cartTotal * 1.1, 2); ?></span>
                    </div>
                    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
                    <a href="products.php" style="display: block; text-align: center; margin-top: 1rem; color: #d4a574; text-decoration: none; font-weight: 500;">Continue Shopping</a>
                </div>
            </div>
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
