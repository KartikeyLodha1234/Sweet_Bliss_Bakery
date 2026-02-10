// Update cart count
function updateCartCount() {
    const basePath = window.location.pathname.includes('/pages/') ? '../' : '';
    fetch(basePath + 'includes/get_cart_count.php')
        .then(response => response.json())
        .then(data => {
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = data.count;
                if (data.count > 0) {
                    cartCount.style.display = 'flex';
                } else {
                    cartCount.style.display = 'none';
                }
            }
        });
}

// Add to cart with animation
function addToCart(productId, productName) {
    const basePath = window.location.pathname.includes('/pages/') ? '../' : '';
    const quantity = document.getElementById(`quantity-${productId}`)?.value || 1;
    
    fetch(basePath + 'includes/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(`${productName} added to cart! 🎉`, 'success');
            updateCartCount();
            
            // Animate button
            const btn = event.target;
            const originalText = btn.textContent;
            btn.textContent = '✓ Added';
            btn.style.backgroundColor = '#6ba587';
            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.backgroundColor = '';
            }, 1500);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Remove from cart
function removeFromCart(productId) {
    const basePath = window.location.pathname.includes('/pages/') ? '../' : '';
    fetch(basePath + 'includes/remove_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

// Update cart quantity
function updateQuantity(productId) {
    const basePath = window.location.pathname.includes('/pages/') ? '../' : '';
    const quantity = document.getElementById(`quantity-${productId}`).value;
    fetch(basePath + 'includes/update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&quantity=${quantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}

// Show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
        max-width: 350px;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Initialize
document.addEventListener('DOMContentLoaded', updateCartCount);
