<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account - Sweet Bliss Bakery</title>
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
                <a href="logout.php">Logout (<?php echo htmlspecialchars($user['name']); ?>)</a>
                <a href="cart.php" class="cart-icon">🛒<span class="cart-count" style="display: <?php echo count($_SESSION['cart'])>0 ? 'flex' : 'none'; ?>"><?php echo count($_SESSION['cart']); ?></span></a>
            </nav>
        </div>
    </header>

    <main class="container">
        <h2>Your Account</h2>
        <p style="color:#666; margin-bottom:1.5rem;">Welcome back, <strong><?php echo htmlspecialchars($user['name']); ?></strong></p>

        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:1rem;">
            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Your Orders</h3>
                <p style="color:#666;">Track, return, or buy things again</p>
            </a>

            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Login &amp; Security</h3>
                <p style="color:#666;">Edit login, name, and mobile number</p>
            </a>

            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Your Addresses</h3>
                <p style="color:#666;">Edit addresses for orders and gifts</p>
            </a>

            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Payment Options</h3>
                <p style="color:#666;">Add or manage payment methods</p>
            </a>

            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Business Account</h3>
                <p style="color:#666;">Sign up for business features</p>
            </a>

            <a href="#" class="product-card" style="text-decoration:none; color:inherit; padding:1.2rem; display:block;">
                <h3>Contact Us</h3>
                <p style="color:#666;">Contact customer service via phone or chat</p>
            </a>
        </div>

    </main>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2026 Sweet Bliss Bakery. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
