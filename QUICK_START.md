# Quick Start Guide - Sweet Bliss Bakery Website

## ⚡ Get Your Bakery Website Running in 5 Minutes!

Follow these simple steps to launch your creative bakery website.

## Step 1: Copy Files to Laragon

1. Navigate to `C:\laragon\www\`
2. Create a folder named `bakery`
3. Copy all project files into this folder

**Folder structure should look like:**
```
C:\laragon\www\bakery\
├── index.php
├── css/
├── js/
├── includes/
├── pages/
├── data/
└── assets/
```

## Step 2: Start Laragon Services

1. Open Laragon
2. Click **"Start All"** button (or use the menu: Laragon → All → Start)
3. Ensure Apache and MySQL are running (green dots)

## Step 3: Create Database

### Method A: Using phpMyAdmin (Easiest)

1. Open browser and go to: `http://localhost/phpmyadmin`
2. Click **"New"** on the left sidebar
3. Database name: `bakery_db`
4. Click **"Create"**
5. Select the newly created `bakery_db` database
6. Click the **"Import"** tab
7. Click **"Choose File"** and select: `data/database.sql` from your bakery folder
8. Click **"Import"**

### Method B: Using SQL Command Line

1. Open Laragon terminal (right-click Laragon → Terminal)
2. Run these commands:
```bash
mysql -u root
CREATE DATABASE bakery_db;
USE bakery_db;
SOURCE C:/laragon/www/bakery/data/database.sql;
EXIT;
```

## Step 4: Access Your Website

1. Open your web browser
2. Go to: **`http://localhost/bakery/`**
3. You should see the Sweet Bliss Bakery homepage! 🎉

## ✅ Verification Checklist

- [ ] Homepage displays with beautiful gradient header
- [ ] Products are visible on home page
- [ ] "Add to Cart" buttons work
- [ ] Cart counter updates in header
- [ ] Cart page displays items correctly
- [ ] Navigation links work smoothly
- [ ] Mobile view is responsive (resize browser)

## 🛠️ Configuration (Optional)

### Change Bakery Name
Find and replace "Sweet Bliss" with your bakery name in:
- `index.php`
- `pages/products.php`
- `pages/about.php`
- `pages/contact.php`
- `pages/cart.php`
- `pages/checkout.php`

### Change Contact Information
Look for these placeholders and update them:
- **Address**: "123 Bakery Lane, Food City"
- **Phone**: "(555) 123-4567"
- **Email**: "hello@sweetbliss.com"
- **Hours**: "7:00 AM - 7:00 PM"

## 📝 Add Your Own Products

1. Go to `http://localhost/phpmyadmin`
2. Select `bakery_db` database
3. Click **"products"** table
4. Click **"Insert"** tab
5. Fill in these fields:
   - **name**: Product name (e.g., "Sourdough Bread")
   - **description**: Short description
   - **category**: Product type (e.g., "Breads")
   - **price**: Price in dollars (e.g., 5.99)
   - **stock**: Quantity available (e.g., 50)
6. Click **"Go"** to save

The product will instantly appear on your website!

## 🎨 Customize Colors

Edit `css/style.css` and find these variables (around line 12):

```css
:root {
    --primary-color: #d4a574;      /* Gold/Brown */
    --secondary-color: #8b6f47;    /* Dark Brown */
    --accent-color: #e8d4c4;       /* Light Beige */
    --dark-color: #3d3d3d;         /* Dark Gray */
    --light-color: #faf8f3;        /* Cream */
}
```

Change these values to your preferred colors!

## 📱 Mobile Testing

1. Open browser DevTools (F12)
2. Click the device icon (top-left of DevTools)
3. Select a mobile device from the dropdown
4. Your website will display as it appears on phones/tablets

## 🚀 What's Included

✅ **Homepage** - Beautiful landing page with hero section  
✅ **Product Catalog** - Browse all available products  
✅ **Shopping Cart** - Add, remove, update quantities  
✅ **Checkout** - Complete order form  
✅ **About Page** - Tell your bakery story  
✅ **Contact Page** - Get customer inquiries  
✅ **Responsive Design** - Works on all devices  
✅ **Smooth Animations** - Professional interactions  
✅ **Live Cart Counter** - Real-time updates  

## ❓ Troubleshooting

### "Connection failed" Error
1. Verify MySQL is running in Laragon
2. Check `includes/config.php` has correct credentials
3. Try creating database again in phpMyAdmin

### Cart Not Working
1. Press Ctrl+F5 (hard refresh)
2. Check browser console (F12) for errors
3. Verify PHP sessions are enabled

### Products Not Showing
1. Verify data was imported: `http://localhost/phpmyadmin` → bakery_db → products
2. Check the products table has data
3. Clear browser cache

### 404 Error
1. Verify files are in `C:\laragon\www\bakery\`
2. Check Apache is running in Laragon
3. Make sure database.sql was imported

## 📞 Next Steps

### For Production Deployment
1. Set up proper hosting (shared hosting, VPS, or cloud)
2. Install SSL certificate for HTTPS
3. Set up email notifications for orders
4. Integrate payment gateway (Stripe, PayPal)
5. Add user authentication system
6. Implement admin dashboard

### For Enhancement
1. Add user registration and login
2. Create admin panel for product management
3. Add email notification system
4. Implement payment processing
5. Add product images
6. Create promotional banner section
7. Add newsletter signup
8. Integrate with social media

## 🎓 Learning Resources

- **PHP**: https://www.php.net/docs.php
- **MySQL**: https://dev.mysql.com/doc/
- **HTML/CSS**: https://developer.mozilla.org/en-US/
- **JavaScript**: https://developer.mozilla.org/en-US/docs/Web/JavaScript

---

## Support & Tips

💡 **Tip 1**: Always back up your database before making changes  
💡 **Tip 2**: Test in mobile view regularly  
💡 **Tip 3**: Keep product descriptions short and catchy  
💡 **Tip 4**: Add high-quality product images for better conversion  
💡 **Tip 5**: Update your contact information regularly  

---

**Congratulations!** Your beautiful bakery website is now live! 🥐🍰

Enjoy managing your online bakery business! 😊
