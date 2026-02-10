<?php
include 'includes/config.php';
$products = getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Bliss - Artisan Bakery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <a href="index.php" class="logo">Sweet Bliss</a>
            <nav>
                <a href="index.php">Home</a>
                <a href="pages/products.php">Products</a>
                <a href="pages/about.php">About</a>
                <a href="pages/contact.php">Contact</a>
                <?php if (!empty($_SESSION['user'])): ?>
                    <a href="pages/account.php">Account</a>
                    <a href="pages/logout.php">Logout (<?php echo htmlspecialchars($_SESSION['user']['name']); ?>)</a>
                <?php else: ?>
                    <a href="pages/login.php">Login</a>
                    <a href="pages/signup.php">Sign Up</a>
                <?php endif; ?>
                <a href="pages/cart.php" class="cart-icon">
                    🛒
                    <span class="cart-count" style="display: <?php echo count($_SESSION['cart']) > 0 ? 'flex' : 'none'; ?>">
                        <?php echo count($_SESSION['cart']); ?>
                    </span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Sweet Bliss</h1>
        <p>Fresh, artisan baked goods crafted with love and premium ingredients</p>
        <a href="pages/products.php" class="cta-button">Explore Our Collection</a>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- Features -->
        <section class="features">
            <div class="feature-item">
                <div class="feature-icon">🥖</div>
                <h3>Artisan Quality</h3>
                <p>Handcrafted with time-tested traditional recipes</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🌾</div>
                <h3>Premium Ingredients</h3>
                <p>Fresh, organic, locally-sourced ingredients</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">⚡</div>
                <h3>Fresh Daily</h3>
                <p>Baked fresh every morning for your enjoyment</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🚚</div>
                <h3>Fast Delivery</h3>
                <p>Order ahead and pickup or home delivery available</p>
            </div>
        </section>

        <!-- Featured Products -->
        <h2>Featured Collection</h2>
        <div class="products-grid">
            <?php foreach (array_slice($products, 0, 6) as $product): ?>
                <div class="product-card">
                    <a href="pages/product.php?id=<?php echo $product['id']; ?>" style="text-decoration: none; color: inherit;">
                        <div class="product-image">
                            <?php if (!empty($product['image_url'])):
                                $imgSrc = (strpos($product['image_url'], 'http') === 0 || strpos($product['image_url'], '/') === 0) ? $product['image_url'] : $product['image_url'];
                            ?>
                                <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:100%; height:140px; object-fit:cover; border-radius:8px;">
                            <?php else:
                                $emojis = ['🥐', '🍰', '🧁', '🥖', '🍪', '🫓', '🎂', '🥐', '🍮', '🥯'];
                                echo $emojis[$product['id'] % count($emojis)];
                            endif; ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-desc"><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-footer">
                                <span class="price"><?php echo '$' . number_format($product['price'], 2); ?></span>
                            </div>
                        </div>
                    </a>
                    <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>')">
                        Add to Cart
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Call to Action -->
        <section style="background: linear-gradient(135deg, #d4a574, #8b6f47); color: white; padding: 3rem 2rem; border-radius: 15px; text-align: center; margin: 4rem 0;">
            <h2 style="color: white; margin: 0;">Order Your Favorites Today!</h2>
            <p style="font-size: 1.1rem; margin: 1rem 0;">Experience the taste of freshly baked perfection</p>
            <a href="pages/products.php" class="cta-button">Browse All Products</a>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>🥐 Sweet Bliss</h3>
                <p>Artisan bakery offering the finest handcrafted baked goods since 2020.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="pages/products.php">Products</a>
                <a href="pages/about.php">About Us</a>
                <a href="pages/contact.php">Contact</a>
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

    <script src="js/script.js"></script>
</body>
</html>
