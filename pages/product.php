<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

$productId = intval($_GET['id'] ?? 0);
if (!$productId) {
    header('Location: products.php');
    exit;
}

$product = getProductById($productId);
if (!$product) {
    header('Location: products.php');
    exit;
}

$user = currentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Sweet Bliss Bakery</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a href="../index.php" class="logo">Sweet Bliss</a>
            <nav>
                <a href="../index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <?php if (!empty($user)): ?>
                    <a href="account.php">Account</a>
                    <a href="logout.php">Logout (<?php echo htmlspecialchars($user['name']); ?>)</a>
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

    <main class="container">
        <a href="products.php" style="color: #d4a574; text-decoration: none; margin-bottom: 1rem; display: inline-block;">← Back to Products</a>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 2rem 0; align-items: start;">
            <!-- Product Image -->
            <div style="background: linear-gradient(135deg, #e8d4c4, #d4b5a0); border-radius: 15px; padding: 2rem; display: flex; align-items: center; justify-content: center; min-height: 400px;">
                <?php if (!empty($product['image_url'])):
                    $imgSrc = (strpos($product['image_url'], 'http') === 0 || strpos($product['image_url'], '/') === 0) ? $product['image_url'] : '../' . ltrim($product['image_url'], '/');
                ?>
                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="max-width:100%; max-height:420px; object-fit:contain; border-radius:12px;">
                <?php else: ?>
                <div style="font-size: 8rem; text-align: center;">
                    <?php
                    $emojis = ['🥐', '🍰', '🧁', '🥖', '🍪', '🫓', '🎂', '🥐', '🍮', '🥯'];
                    echo $emojis[$product['id'] % count($emojis)];
                    ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div>
                <h1 style="color: #3d3d3d; font-size: 2.5rem; margin-bottom: 0.5rem;"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p style="color: #d4a574; font-size: 1.3rem; font-weight: bold; margin-bottom: 1rem;">$<?php echo number_format($product['price'], 2); ?></p>
                
                <div style="background: #f9f9f9; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem;">
                    <p style="color: #666; margin: 0.5rem 0;"><strong>Category:</strong> <?php echo htmlspecialchars($product['category'] ?? 'Baked Good'); ?></p>
                    <p style="color: <?php echo $product['stock'] > 0 ? '#6ba587' : '#e74c3c'; ?>; margin: 0.5rem 0; font-weight: bold;">
                        <strong>Stock:</strong> <?php echo $product['stock']; ?> available
                    </p>
                </div>

                <div style="margin: 2rem 0;">
                    <h3 style="color: #333; margin-bottom: 1rem;">Description</h3>
                    <p style="color: #666; line-height: 1.8; font-size: 1.05rem;">
                        <?php echo htmlspecialchars($product['description']); ?>
                    </p>
                </div>

                <?php if ($product['stock'] > 0): ?>
                    <div style="display: flex; gap: 1rem; margin-top: 2rem; align-items: center;">
                        <div style="display: flex; gap: 0.75rem; align-items: center;">
                            <label for="quantity" style="font-weight: 500; font-size: 1.1rem;">Quantity:</label>
                            <input type="number" id="quantity" min="1" max="<?php echo $product['stock']; ?>" value="1" style="width: 120px; padding: 1rem; border: 2px solid #d4a574; border-radius: 8px; font-size: 1.3rem; text-align: center; font-weight: bold;">
                        </div>
                        <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>')" style="padding: 0.9rem 2.5rem; font-size: 1.1rem; font-weight: bold;">
                            🛒 Add to Cart
                        </button>
                    </div>
                <?php else: ?>
                    <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-top: 2rem; text-align: center;">
                        <strong>Out of Stock</strong> - Check back soon!
                    </div>
                <?php endif; ?>

                <div style="background: #f0f0f0; padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                    <h4 style="color: #d4a574; margin-bottom: 1rem;">🍞 About This Product</h4>
                    <ul style="color: #666; margin: 0; padding-left: 1.5rem;">
                        <li>Freshly baked daily</li>
                        <li>Made with premium ingredients</li>
                        <li>No artificial preservatives</li>
                        <li>Delivered fresh to your door</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <section style="margin-top: 4rem;">
            <h2>More Bakery Items</h2>
            <div class="products-grid">
                <?php 
                $allProducts = getProducts();
                $relatedCount = 0;
                foreach ($allProducts as $p):
                    if ($p['id'] !== $productId && $relatedCount < 4):
                        $relatedCount++;
                        ?>
                        <div class="product-card" onclick="window.location.href='product.php?id=<?php echo $p['id']; ?>';" style="cursor: pointer;">
                            <div class="product-image">
                                <?php if (!empty($p['image_url'])):
                                    $imgSrc = (strpos($p['image_url'], 'http') === 0 || strpos($p['image_url'], '/') === 0) ? $p['image_url'] : '../' . ltrim($p['image_url'], '/');
                                ?>
                                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" style="width:100%; height:140px; object-fit:cover; border-radius:8px;">
                                <?php else:
                                    $emojis = ['🥐', '🍰', '🧁', '🥖', '🍪', '🫓', '🎂', '🥐', '🍮', '🥯'];
                                    echo $emojis[$p['id'] % count($emojis)];
                                endif; ?>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><?php echo htmlspecialchars($p['name']); ?></h3>
                                <p class="product-desc"><?php echo htmlspecialchars($p['description']); ?></p>
                                <div class="product-footer">
                                    <span class="price">$<?php echo number_format($p['price'], 2); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php 
                    endif;
                endforeach;
                ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2026 Sweet Bliss Bakery. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
