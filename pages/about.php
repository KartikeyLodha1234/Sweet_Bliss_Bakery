<?php
include '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Sweet Bliss Bakery</title>
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
        <h2>About Sweet Bliss</h2>

        <!-- Story Section -->
        <section style="background: white; padding: 3rem; border-radius: 15px; margin: 2rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
                <div>
                    <h3 style="color: #d4a574; font-size: 1.8rem; margin-bottom: 1rem;">Our Journey</h3>
                    <p style="line-height: 1.8; color: #666; margin-bottom: 1rem;">
                        Sweet Bliss was founded in 2020 with a simple dream: to bring the joy of authentic, artisan-baked goods to our community. What started as a small bakery with a passion for traditional recipes has grown into a beloved destination for freshly baked treats.
                    </p>
                    <p style="line-height: 1.8; color: #666; margin-bottom: 1rem;">
                        Every loaf of bread, pastry, and cake is handcrafted by our skilled bakers using only the finest ingredients. We believe that great baking is both an art and a science, requiring patience, precision, and passion.
                    </p>
                    <p style="line-height: 1.8; color: #666;">
                        Today, we're proud to serve thousands of happy customers who trust us to make their special moments even sweeter.
                    </p>
                </div>
                <div style="font-size: 6rem; text-align: center;">🧑‍🍳</div>
            </div>
        </section>

        <!-- Values Section -->
        <h3 style="color: #d4a574; font-size: 2rem; text-align: center; margin: 3rem 0 2rem;">Our Core Values</h3>
        <div class="features" style="margin: 0;">
            <div class="feature-item">
                <div class="feature-icon">🌱</div>
                <h3>Quality</h3>
                <p>We never compromise on the quality of our ingredients or our craftsmanship. Each product is made with love.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🤝</div>
                <h3>Community</h3>
                <p>We're committed to being an integral part of our community, supporting local suppliers and giving back.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">♻️</div>
                <h3>Sustainability</h3>
                <p>We practice environmentally responsible baking and use eco-friendly packaging whenever possible.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">❤️</div>
                <h3>Passion</h3>
                <p>Our love for baking shines through in every bite. We bake with heart and soul every single day.</p>
            </div>
        </div>

        <!-- Team Section -->
        <section style="background: white; padding: 3rem; border-radius: 15px; margin: 3rem 0; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #d4a574; font-size: 1.8rem; margin-bottom: 2rem;">Meet Our Bakers</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                <div style="padding: 1.5rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">👨‍🍳</div>
                    <h4 style="margin-bottom: 0.5rem;">Chef Marco</h4>
                    <p style="color: #666; font-size: 0.9rem;">Head Baker & Founder<br>20+ years of baking expertise</p>
                </div>
                <div style="padding: 1.5rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">👩‍🍳</div>
                    <h4 style="margin-bottom: 0.5rem;">Chef Elena</h4>
                    <p style="color: #666; font-size: 0.9rem;">Pastry Specialist<br>French patisserie trained</p>
                </div>
                <div style="padding: 1.5rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">👨‍🍳</div>
                    <h4 style="margin-bottom: 0.5rem;">Chef David</h4>
                    <p style="color: #666; font-size: 0.9rem;">Artisan Bread Baker<br>Sourdough master</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section style="background: linear-gradient(135deg, #d4a574, #8b6f47); color: white; padding: 3rem 2rem; border-radius: 15px; margin: 3rem 0;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; text-align: center;">
                <div>
                    <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">5000+</div>
                    <p>Happy Customers</p>
                </div>
                <div>
                    <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">50+</div>
                    <p>Products Available</p>
                </div>
                <div>
                    <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">6 Years</div>
                    <p>In the Business</p>
                </div>
                <div>
                    <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">100%</div>
                    <p>Fresh & Organic</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section style="text-align: center; padding: 2rem;">
            <h3 style="color: #d4a574; font-size: 1.8rem; margin-bottom: 1rem;">Ready to Taste the Difference?</h3>
            <p style="font-size: 1.1rem; color: #666; margin-bottom: 2rem;">Experience the finest artisan baked goods crafted with love and premium ingredients.</p>
            <a href="products.php" class="cta-button">Explore Our Products</a>
        </section>
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
