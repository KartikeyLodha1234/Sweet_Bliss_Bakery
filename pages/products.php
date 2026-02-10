<?php
include '../includes/config.php';

$perPage = 5;
$page = intval($_GET['page'] ?? 1);
$totalProducts = getProductsCount();
$totalPages = (int) ceil($totalProducts / $perPage);
$products = getProductsPaged($page, $perPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Sweet Bliss Bakery</title>
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
        <h2>Our Products</h2>
        <p style="text-align: center; color: #666; margin-bottom: 2rem; font-size: 1.1rem;">
            Explore our complete collection of fresh, delicious baked goods
        </p>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <a href="product.php?id=<?php echo $product['id']; ?>" style="text-decoration: none; color: inherit; display: block;">
                        <div class="product-image">
                            <?php if (!empty($product['image_url'])):
                                $imgSrc = (strpos($product['image_url'], 'http') === 0 || strpos($product['image_url'], '/') === 0) ? $product['image_url'] : '../' . ltrim($product['image_url'], '/');
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
                            <div style="margin: 1rem 0; font-size: 0.9rem; color: #666;">
                                <strong>Category:</strong> <?php echo htmlspecialchars($product['category'] ?? 'Baked Good'); ?> |
                                <strong>Stock:</strong> <?php echo $product['stock']; ?> available
                            </div>
                        </div>
                    </a>
                    <div class="product-footer">
                        <span class="price"><?php echo '$' . number_format($product['price'], 2); ?></span>
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="number" id="quantity-<?php echo $product['id']; ?>" min="1" max="<?php echo $product['stock']; ?>" value="1" style="width: 70px; padding: 0.5rem; border: 1px solid #ddd; border-radius: 5px;">
                            <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>')">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($products)): ?>
            <div style="text-align: center; padding: 3rem;">
                <p style="font-size: 1.2rem; color: #666;">No products available yet. Please check back soon!</p>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div style="display:flex; justify-content:center; gap:0.5rem; margin:2rem 0;">
                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <?php if ($p == $page): ?>
                        <span style="padding:0.5rem 0.75rem; background:#8b6f47; color:#fff; border-radius:6px;"><?php echo $p; ?></span>
                    <?php else: ?>
                        <a href="products.php?page=<?php echo $p; ?>" style="padding:0.5rem 0.75rem; background:#fff; color:#8b6f47; border-radius:6px; text-decoration:none; border:1px solid #eae1db;"><?php echo $p; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
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
