# Sweet Bliss - Creative Bakery Website

A modern, responsive, and feature-rich bakery e-commerce website built with PHP, HTML5, CSS3, and JavaScript.

## Features

✨ **Modern Design**
- Beautiful gradient-based color scheme with professional aesthetics
- Fully responsive design that works on all devices
- Smooth animations and transitions for better UX
- Emoji-based product icons for visual appeal

🛍️ **E-Commerce Functionality**
- Complete product catalog with detailed information
- Shopping cart with add/remove/update functionality
- Real-time cart count updates
- Responsive product grid with hover effects
- Quantity selection for bulk orders

📄 **Pages Included**
1. **Home** - Landing page with hero section and featured products
2. **Products** - Complete product catalog with filtering
3. **Shopping Cart** - View and manage cart items
4. **Checkout** - Secure order placement
5. **About** - Company story, values, and team information
6. **Contact** - Contact form, business information, and FAQ

🎨 **Design Features**
- Bakery-themed color palette (warm browns, creams, golds)
- Professional footer with all business information
- Feature highlights section
- Customer testimonial ready
- Mobile-first responsive design

💻 **Technical Stack**
- **Backend**: PHP 7.0+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Session Management**: PHP Sessions for cart functionality

## Directory Structure

```
bakery/
├── index.php                 # Homepage
├── css/
│   └── style.css            # Main stylesheet (complete styling)
├── js/
│   └── script.js            # Interactive features and animations
├── includes/
│   ├── config.php           # Database configuration and helpers
│   ├── add_to_cart.php      # Add items to cart endpoint
│   ├── remove_from_cart.php # Remove items from cart endpoint
│   ├── update_cart.php      # Update cart quantities endpoint
│   └── get_cart_count.php   # Get cart count endpoint
├── pages/
│   ├── products.php         # Product listing page
│   ├── cart.php             # Shopping cart page
│   ├── checkout.php         # Order checkout page
│   ├── about.php            # About us page
│   └── contact.php          # Contact page
├── data/
│   └── database.sql         # Database schema and sample data
└── assets/                  # Placeholder for images and uploads
```

## Setup Instructions

### 1. Prerequisites
- Laragon, XAMPP, or similar PHP development environment
- MySQL database server
- Web browser with JavaScript enabled

### 2. Installation

1. **Place files in web root**
   ```
   Copy the bakery folder to: C:\laragon\www\bakery\
   ```

2. **Create Database**
   - Open phpMyAdmin at http://localhost/phpmyadmin
   - Create a new database named `bakery_db`
   - Import the SQL file from `data/database.sql`
   
   OR run these commands in MySQL:
   ```sql
   CREATE DATABASE bakery_db;
   USE bakery_db;
   -- Then import the content of data/database.sql
   ```

3. **Verify Database Connection**
   - Edit `includes/config.php` if needed
   - Default settings:
     - Host: localhost
     - User: root
     - Password: (empty)
     - Database: bakery_db

4. **Start Your Server**
   - Start Apache and MySQL in Laragon/XAMPP
   - Visit: http://localhost/bakery/

## Configuration

### Database Settings
Edit `includes/config.php` to configure:
- Database host
- Database username
- Database password
- Database name

### Customization

**Change Business Info**
- Update all pages to reflect your bakery name, address, and phone
- Current placeholder: "Sweet Bliss Bakery"

**Styling**
- Main stylesheet: `css/style.css`
- Colors defined as CSS variables at the top:
  - Primary color: #d4a574 (gold)
  - Secondary color: #8b6f47 (brown)
  - Light color: #faf8f3 (cream)

**Products**
- Add/edit products in phpMyAdmin
- Update product emojis in PHP code if desired

## Features Explained

### Shopping Cart
- **AJAX Integration**: Cart updates without page reload
- **Session Management**: Cart data persists during session
- **Real-time Updates**: cart count updates on navigation

### Product Management
- Complete CRUD operations ready for implementation
- Stock tracking to prevent overselling
- Category organization support

### Order Processing
- Customer information collection
- Order summary calculation
- Confirmation page with order details
- Ready for email notification integration

### Responsive Design
- Mobile-first approach
- Breakpoints optimized for:
  - Desktop (1200px+)
  - Tablet (768px - 1199px)
  - Mobile (< 768px)

## How to Use

### For Customers
1. Browse products on home or products page
2. Add items to cart with desired quantity
3. View cart for review and modifications
4. Proceed to checkout
5. Enter shipping information
6. Confirm order

### For Admin (Future Enhancement)
1. Login system ready for implementation
2. Add/edit/delete products
3. View orders and manage status
4. View customer information
5. Analytics dashboard ready for integration

## JavaScript Functions

- `addToCart(productId, productName)` - Add item to cart
- `removeFromCart(productId)` - Remove item from cart
- `updateQuantity(productId)` - Update item quantity
- `updateCartCount()` - Refresh cart count in header
- `showNotification(message, type)` - Display notification message

## Security Notes

### Current Implementation
- Basic input sanitization with htmlspecialchars()
- Session-based cart management
- POST method for sensitive operations

### Recommendations for Production
1. Add prepared statements for all database queries
2. Implement user authentication system
3. Add CSRF token protection
4. Use HTTPS for checkout process
5. Implement password hashing for admin panel
6. Add rate limiting for API endpoints
7. Validate and sanitize all user inputs
8. Store payment information securely (use payment gateway)

## Future Enhancements

- [ ] User registration and login
- [ ] Order history and tracking
- [ ] Product reviews and ratings
- [ ] Wishlist functionality
- [ ] Email notifications
- [ ] Payment gateway integration (Stripe, PayPal)
- [ ] Admin dashboard
- [ ] Product search and filters
- [ ] Customer account management
- [ ] Newsletter subscription
- [ ] Social media integration
- [ ] Google Analytics integration

## Troubleshooting

**Database Connection Error**
- Check MySQL is running
- Verify database credentials in `includes/config.php`
- Ensure `bakery_db` database exists

**Cart Not Working**
- Verify sessions are enabled in PHP
- Check JavaScript console for errors
- Ensure AJAX endpoints are accessible

**Styling Issues**
- Clear browser cache (Ctrl+Shift+Delete)
- Check CSS file path is correct
- Verify all image paths are accessible

**Products Not Showing**
- Check database has products table
- Verify products have been inserted
- Check query syntax in config.php

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

This project is created for educational and commercial use.

## Support

For issues or questions:
1. Check database connection
2. Review browser console for JavaScript errors
3. Check server error logs
4. Verify all files are in correct locations
5. Test with sample data from database.sql

## Credits

Built with ❤️ for bakery businesses looking for a modern online presence.

---

**Version**: 1.0.0  
**Last Updated**: February 2026  
**PHP Version**: 7.0+
