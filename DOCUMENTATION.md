# 🥐 Sweet Bliss Bakery Website - Complete Documentation

## 📖 Table of Contents

1. [Overview](#overview)
2. [Project Structure](#project-structure)
3. [Features](#features)
4. [Database Schema](#database-schema)
5. [File Descriptions](#file-descriptions)
6. [PHP Functions](#php-functions)
7. [CSS Classes](#css-classes)
8. [JavaScript Functions](#javascript-functions)
9. [Customization Guide](#customization-guide)
10. [Deployment Guide](#deployment-guide)

---

## Overview

Sweet Bliss Bakery Website is a modern, fully functional e-commerce platform designed specifically for bakeries. Built with PHP, MySQL, HTML5, CSS3, and Vanilla JavaScript, it provides a complete solution for selling baked goods online.

### Technology Stack
- **Backend**: PHP 7.0+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla, no frameworks)
- **Server**: Apache (with mod_rewrite)
- **Session Management**: PHP Native Sessions

### Key Characteristics
- ✅ Fully Responsive Design
- ✅ Session-Based Shopping Cart
- ✅ Real-time AJAX Updates
- ✅ Product Management Ready
- ✅ Order Processing System
- ✅ Professional UI/UX
- ✅ Mobile-First Design
- ✅ Fast Loading Speed

---

## Project Structure

```
bakery/
│
├── 📄 index.php                    # Homepage
├── 📄 README.md                    # Main documentation
├── 📄 QUICK_START.md              # Quick start guide
├── 📄 DOCUMENTATION.md            # This file
├── 📄 .htaccess                   # Apache configuration
├── 📄 .env.example                # Environment config template
│
├── 📁 css/
│   └── style.css                  # Complete stylesheet (1000+ lines)
│
├── 📁 js/
│   └── script.js                  # Frontend JavaScript
│
├── 📁 includes/
│   ├── config.php                 # Database config & functions
│   ├── add_to_cart.php           # Add to cart endpoint
│   ├── remove_from_cart.php      # Remove from cart endpoint
│   ├── update_cart.php           # Update cart endpoint
│   └── get_cart_count.php        # Get cart count endpoint
│
├── 📁 pages/
│   ├── products.php               # Product listing
│   ├── cart.php                   # Shopping cart
│   ├── checkout.php              # Order checkout
│   ├── about.php                 # About us page
│   └── contact.php               # Contact page
│
├── 📁 data/
│   └── database.sql              # Database schema & sample data
│
└── 📁 assets/
    └── (placeholder for images)
```

---

## Features

### 1. **Homepage (index.php)**
- Hero section with call-to-action
- 4 feature highlights section
- Featured products grid (6 items)
- Professional footer with contact info

### 2. **Products Page (pages/products.php)**
- Complete product catalog
- Quantity selector for each product
- Stock information display
- Category organization
- Responsive grid layout
- Add to cart with quantity control

### 3. **Shopping Cart (pages/cart.php)**
- View all cart items
- Modify quantities with real-time updates
- Remove items from cart
- Order summary with calculations
- Subtotal, tax, and total display
- Continue shopping link

### 4. **Checkout (pages/checkout.php)**
- Customer information form
- Address and contact details
- Order summary display
- Payment method selection
- Order confirmation page
- Order details in confirmation

### 5. **About Page (pages/about.php)**
- Company history section
- Core values (4 items)
- Team member profiles
- Statistics showcase
- Call-to-action section

### 6. **Contact Page (pages/contact.php)**
- Contact form with validation
- Business information display
- Business hours listing
- FAQ section (5 questions)
- Map placeholder
- Email and phone links

### 7. **Navigation**
- Sticky header with logo
- Navigation menu
- Real-time cart counter
- Mobile-responsive menu

### 8. **Shopping Cart System**
- Session-based (no login required)
- AJAX add/remove/update
- Real-time cart count updates
- Local storage ready

---

## Database Schema

### Products Table
```sql
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Included Products** (20 sample products):
- Croissants & Pastries
- Cakes (Chocolate, Carrot, Cheesecake, etc.)
- Cupcakes
- Breads (Sourdough, Focaccia, Rye, etc.)
- Cookies & Muffins
- Tarts

### Orders Table (Optional)
```sql
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address VARCHAR(255),
    city VARCHAR(100),
    total DECIMAL(10, 2),
    status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Order Items Table (Optional)
```sql
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
```

---

## File Descriptions

### index.php
The main landing page featuring:
- Full-screen hero section with background
- 4-column feature highlights
- 6 featured products
- Professional footer

### css/style.css
Comprehensive stylesheet including:
- CSS variables for colors
- Responsive grid layouts
- Hover effects and animations
- Form styling
- Mobile-first approach
- Utility classes

### js/script.js
JavaScript functionality for:
- AJAX cart operations
- Real-time notifications
- Cart count updates
- Button animations
- Form validations

### includes/config.php
Database configuration and PHP helper functions:
- Database connection setup
- `getProducts()` - Fetch all products
- `getProductById($id)` - Fetch single product
- `addToCart($productId, $quantity)` - Add to cart
- `formatPrice($price)` - Format prices

### includes/add_to_cart.php
AJAX endpoint for adding items:
- Validates product exists
- Checks stock availability
- Updates session cart
- Returns JSON response

### includes/remove_from_cart.php
AJAX endpoint for removing items:
- Removes from session
- Returns JSON response

### includes/update_cart.php
AJAX endpoint for updating quantities:
- Updates session quantities
- Handles zero quantity (removes item)
- Returns JSON response

### includes/get_cart_count.php
AJAX endpoint for cart count:
- Returns JSON with count
- Used for header counter

---

## PHP Functions

### Database Functions (in config.php)

#### getProducts()
```php
function getProducts()
// Returns all products ordered by ID descending
// Returns: Array of product arrays
```

#### getProductById($id)
```php
function getProductById($id)
// Gets a single product by ID
// Parameters: $id (int)
// Returns: Product associative array
```

#### addToCart($productId, $quantity)
```php
function addToCart($productId, $quantity)
// Adds or updates item in cart
// Parameters: $productId (int), $quantity (int)
// Returns: true on success, false on failure
```

#### formatPrice($price)
```php
function formatPrice($price)
// Formats price with dollar sign
// Parameters: $price (float)
// Returns: Formatted string (e.g., "$3.99")
```

---

## CSS Classes

### Layout Classes
- `.container` - Main content wrapper (max-width: 1200px)
- `.navbar` - Navigation bar flex container
- `.hero` - Hero section with gradient
- `.products-grid` - Responsive product grid
- `.cart-container` - Cart layout grid (2 columns)

### Component Classes
- `.product-card` - Individual product wrapper
- `.product-image` - Product image area
- `.product-info` - Product details section
- `.product-name` - Product name heading
- `.product-desc` - Product description
- `.price` - Price display
- `.add-to-cart` - Add to cart button

### Cart Classes
- `.cart-items` - Cart items list container
- `.cart-item` - Individual cart item
- `.cart-summary` - Order summary panel
- `.quantity-input` - Quantity input field
- `.remove-btn` - Remove item button
- `.checkout-btn` - Checkout button

### Form Classes
- `.form-group` - Form input wrapper
- `.submit-btn` - Form submission button
- `.alert` - Alert message container
- `.alert-success` - Success alert
- `.alert-error` - Error alert
- `.alert-info` - Info alert

### Feature Classes
- `.features` - Features grid container
- `.feature-item` - Individual feature
- `.feature-icon` - Feature emoji/icon
- `.feature-item h3` - Feature heading

### Utility Classes
- `.navbar` - Flex navbar
- `.footer-content` - Footer grid layout
- `.footer-section` - Footer column
- `.logo` - Logo with emoji
- `.cart-icon` - Cart icon in header
- `.cart-count` - Cart counter badge

---

## JavaScript Functions

### addToCart(productId, productName)
Adds a product to the cart via AJAX
```javascript
// Parameters:
// - productId: Product ID
// - productName: Product name for notification
// - Uses quantity-{id} input for quantity
// - Shows success notification with animation
// - Updates cart count in header
```

### removeFromCart(productId)
Removes a product from cart
```javascript
// Parameters:
// - productId: Product ID to remove
// - Reloads page to refresh cart display
```

### updateQuantity(productId)
Updates quantity of cart item
```javascript
// Parameters:
// - productId: Product ID
// - Reads value from quantity-{id} input
// - Sends AJAX request to server
// - Reloads page on success
```

### updateCartCount()
Fetches and updates cart count in header
```javascript
// Called on page load and after cart changes
// Makes AJAX request to get_cart_count.php
// Updates .cart-count element
// Shows/hides badge based on count
```

### showNotification(message, type)
Displays a toast notification
```javascript
// Parameters:
// - message: Notification text
// - type: 'success', 'error', 'info'
// - Auto-hides after 3 seconds
// - Animated slide-in/out effects
```

---

## Customization Guide

### 1. Change Business Information

**In all PHP pages**, find and replace:
- `Sweet Bliss` → Your bakery name
- `123 Bakery Lane, Food City` → Your address
- `(555) 123-4567` → Your phone
- `hello@sweetbliss.com` → Your email

### 2. Modify Colors

**In css/style.css**, update CSS variables:
```css
:root {
    --primary-color: #d4a574;      /* Main brand color */
    --secondary-color: #8b6f47;    /* Darker shade */
    --accent-color: #e8d4c4;       /* Light highlight */
    --dark-color: #3d3d3d;         /* Text color */
    --light-color: #faf8f3;        /* Background color */
    --success-color: #6ba587;      /* Buttons/success */
}
```

### 3. Add New Products

**Via phpMyAdmin:**
1. Go to bakery_db database
2. Select products table
3. Click Insert
4. Fill in: name, description, category, price, stock
5. Click Go

**Via SQL Query:**
```sql
INSERT INTO products (name, description, category, price, stock) 
VALUES ('Your Product', 'Description', 'Category', 9.99, 50);
```

### 4. Change Logo/Header

Edit `.logo` in navbar:
```php
<a href="index.php" class="logo">Sweet Bliss</a>
```

Change emoji before text in CSS or modify text directly.

### 5. Modify Homepage

**Index.php sections:**
- Hero section: Lines ~35-37
- Features section: Lines ~50-65
- Featured products: Lines ~67-98
- CTA section: Lines ~100-105

### 6. Add Custom Pages

1. Create new file in pages/ folder
2. Include config.php: `<?php include '../includes/config.php'; ?>`
3. Copy header/footer from existing page
4. Add your content in the middle
5. Update navigation links in all pages

### 7. Customize Styling

**Common customizations:**
- `h2` - Main heading styling (line ~100)
- `.product-card` - Product box styling (line ~176)
- `.hero` - Hero section (line ~84)
- `footer` - Footer styling (line ~580)

---

## Deployment Guide

### Prerequisites for Production
- Web hosting with PHP 7.0+ support
- MySQL database access
- SSH/FTP access
- SSH certificate for HTTPS
- Domain name registered

### Step 1: Prepare Files

1. Edit `includes/config.php`:
```php
$servername = "your_host";
$username = "your_db_user";
$password = "your_db_password";
$dbname = "your_db_name";
```

2. Update all pages with your business info
3. Update `.htaccess` with your domain name

### Step 2: Upload Files

1. Connect via FTP/SFTP
2. Upload all files to public_html/bakery/ folder
3. Ensure permissions are correct (755 for folders, 644 for files)

### Step 3: Create Database

1. Access hosting control panel (cPanel/Plesk)
2. Create new MySQL database
3. Create database user with password
4. Grant all permissions
5. Import database.sql file

### Step 4: Enable SSL/HTTPS

1. Install SSL certificate (Let's Encrypt is free)
2. Update .htaccess to force HTTPS:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

### Step 5: Test Everything

- [ ] Homepage loads correctly
- [ ] Products display
- [ ] Add to cart works
- [ ] Checkout completes
- [ ] Forms submit
- [ ] Mobile view responsive
- [ ] HTTPS connection works
- [ ] No console errors

### Step 6: Security Checklist

- [ ] Hide real database errors (set DEBUG to false)
- [ ] Use prepared statements for queries
- [ ] Implement input validation
- [ ] Add CSRF protection tokens
- [ ] Use HTTPS only
- [ ] Keep PHP updated
- [ ] Disable directory listing
- [ ] Backup database regularly

---

## Maintenance

### Regular Tasks
- Daily: Monitor orders, respond to inquiries
- Weekly: Update product inventory
- Monthly: Review analytics, customer feedback
- Quarterly: Update packages, security patches
- Annually: Renew SSL certificate, review strategy

### Monitoring
- Check error logs regularly
- Monitor database size
- Track website speed
- Review visitor statistics
- Check for broken links

### Backups
- Back up database daily
- Back up files weekly
- Store backups in multiple locations
- Test restore procedures monthly

---

## Troubleshooting

### Database Issues
**Problem**: "Connection failed"
**Solution**: 
- Check MySQL is running
- Verify credentials in config.php
- Ensure database exists

### Cart Issues
**Problem**: "Cart not working"
**Solution**:
- Check browser JavaScript console
- Verify sessions enabled in PHP
- Clear browser cache
- Check endpoint URLs in script.js

### Display Issues
**Problem**: "Layout broken on mobile"
**Solution**:
- Clear cache
- Check CSS file loads
- Test in different browsers
- Check media queries in CSS

### Product Issues
**Problem**: "Products not showing"
**Solution**:
- Check database has products
- Verify SQL import completed
- Check getProducts() function
- Review browser console

---

## Performance Tips

1. **Optimize Images**
   - Use appropriate file sizes
   - Use WebP format where possible
   - Implement lazy loading

2. **Cache Management**
   - Browser caching headers enabled
   - Database query optimization
   - Static content caching

3. **Code Optimization**
   - Minify CSS and JavaScript
   - Remove unused code
   - Optimize database queries

4. **Server Configuration**
   - Enable gzip compression
   - Use CDN for assets
   - Optimize PHP settings
   - Consider Redis caching

---

## SEO Optimization

### Meta Tags
Add to each page:
```html
<meta name="description" content="Your bakery description">
<meta name="keywords" content="bakery, cakes, bread, pastries">
<meta name="author" content="Your Name">
```

### Schema Markup
Add structured data for Google:
```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Sweet Bliss Bakery"
}
</script>
```

### Robots.txt
```
User-agent: *
Allow: /
Disallow: /includes/
Disallow: /data/
```

---

## Future Enhancements

### Short-term (1-3 months)
- [ ] Product images implementation
- [ ] Email notifications
- [ ] Order tracking system
- [ ] Customer reviews
- [ ] Search functionality

### Medium-term (3-6 months)
- [ ] User accounts system
- [ ] Wishlist feature
- [ ] Payment gateway integration
- [ ] Admin dashboard
- [ ] Discount codes

### Long-term (6-12 months)
- [ ] Mobile app
- [ ] Subscription service
- [ ] API for third-party integrations
- [ ] Advanced analytics
- [ ] AI-powered recommendations

---

## Support & Resources

### Documentation
- [PHP Manual](https://www.php.net/docs.php)
- [MySQL Reference](https://dev.mysql.com/doc/)
- [HTML/CSS Guide](https://developer.mozilla.org/)
- [JavaScript Reference](https://developer.mozilla.org/docs/Web/JavaScript)

### Tools
- [XAMPP](https://www.apachefriends.org/) - Local development
- [Laragon](https://laragon.org/) - Local development
- [phpMyAdmin](https://www.phpmyadmin.net/) - Database management
- [VS Code](https://code.visualstudio.com/) - Code editor

---

## License & Usage

This project is provided for educational and commercial use. Feel free to modify and use it for your bakery business.

---

**Version**: 1.0.0  
**Last Updated**: February 2026  
**Support**: See README.md for contact information

---

Created with ❤️ for bakery businesses 🥐🍰
