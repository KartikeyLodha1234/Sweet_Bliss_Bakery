<?php
include '../includes/config.php';

$messageSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    if ($name && $email && $subject && $message) {
        // Here you would save the message to database or send email
        // For now, we'll just set the flag
        $messageSent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sweet Bliss Bakery</title>
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
        <h2>Get In Touch</h2>

        <?php if ($messageSent): ?>
            <div class="alert alert-success" style="max-width: 500px; margin: 2rem auto;">
                <strong>✓ Message Received!</strong> Thank you for contacting us. We'll get back to you soon!
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 3rem 0; align-items: start;">
            <!-- Contact Form -->
            <form method="POST" style="margin: 0;">
                <h3 style="color: #d4a574; margin-bottom: 1.5rem;">Send us a Message</h3>
                
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>

            <!-- Contact Information -->
            <div style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); height: fit-content;">
                <h3 style="color: #d4a574; margin-bottom: 2rem;">Contact Information</h3>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #333; margin-bottom: 0.5rem;">📍 Location</h4>
                    <p style="color: #666;">123 Bakery Lane<br>Food City, FC 12345<br>United States</p>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #333; margin-bottom: 0.5rem;">📞 Phone</h4>
                    <p style="color: #666;">
                        <a href="tel:+15551234567" style="color: #d4a574; text-decoration: none;">+1 (555) 123-4567</a>
                    </p>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #333; margin-bottom: 0.5rem;">📧 Email</h4>
                    <p style="color: #666;">
                        <a href="mailto:hello@sweetbliss.com" style="color: #d4a574; text-decoration: none;">hello@sweetbliss.com</a>
                    </p>
                </div>
                
                <div style="margin-bottom: 2rem;">
                    <h4 style="color: #333; margin-bottom: 0.5rem;">⏰ Business Hours</h4>
                    <ul style="color: #666; list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;"><strong>Mon - Fri:</strong> 7:00 AM - 7:00 PM</li>
                        <li style="margin-bottom: 0.5rem;"><strong>Saturday:</strong> 8:00 AM - 6:00 PM</li>
                        <li><strong>Sunday:</strong> 9:00 AM - 5:00 PM</li>
                    </ul>
                </div>

                <div style="background: #faf8f3; padding: 1.5rem; border-radius: 10px;">
                    <p style="color: #666; font-size: 0.9rem; margin: 0;">
                        <strong>💡 Pro Tip:</strong> Order ahead for custom cakes and special orders. Contact us to discuss your requirements!
                    </p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section style="background: white; padding: 3rem; border-radius: 15px; margin: 4rem 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #d4a574; font-size: 1.8rem; text-align: center; margin-bottom: 2rem;">Frequently Asked Questions</h3>
            
            <div style="display: grid; gap: 1.5rem;">
                <div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">❓ How far in advance should I order a custom cake?</h4>
                    <p style="color: #666;">We recommend ordering custom cakes at least 3-5 days in advance. For special orders, please contact us as soon as possible.</p>
                </div>
                
                <div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">❓ Do you offer gluten-free or vegan options?</h4>
                    <p style="color: #666;">Yes! We have a selection of gluten-free and vegan products. Please contact us to discuss your dietary requirements.</p>
                </div>
                
                <div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">❓ What is your delivery radius?</h4>
                    <p style="color: #666;">We offer FREE delivery within a 10-mile radius of our location. For orders outside this area, please contact us for a quote.</p>
                </div>
                
                <div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">❓ Can I return or exchange products?</h4>
                    <p style="color: #666;">We guarantee fresh, quality products. If you're not satisfied, please contact us within 24 hours for a replacement or refund.</p>
                </div>
                
                <div>
                    <h4 style="color: #333; margin-bottom: 0.5rem;">❓ Do you offer wholesale options?</h4>
                    <p style="color: #666;">Absolutely! We work with local businesses and events. Contact us to discuss wholesale pricing and options.</p>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section style="background: white; padding: 2rem; border-radius: 15px; margin: 3rem 0; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #d4a574; margin-bottom: 1.5rem;">📍 Visit Us</h3>
            <div style="height: 400px; background: linear-gradient(135deg, #d4a574, #c9916c); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                <div style="text-align: center; color: white;">
                    <p style="font-size: 3rem;">🗺️</p>
                    <p>123 Bakery Lane, Food City, FC 12345</p>
                    <p style="margin-top: 1rem; font-size: 0.9rem;">Map placeholder - Integration with Google Maps available</p>
                </div>
            </div>
            <p style="margin-top: 1rem; color: #666;">
                <strong>Coming Soon:</strong> Interactive map showing our location, parking, and nearest public transport.
            </p>
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
