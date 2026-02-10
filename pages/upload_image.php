<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';

// Admin only
$user = currentUser();
if (!$user || !isAdmin()) {
    header('Location: login.php');
    exit;
}

// Simple upload page to attach image to a product (with resizing)
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id'] ?? 0);
    if ($productId && !empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $check = getimagesize($fileTmp);
        if ($check !== false) {
            list($origW, $origH, $imgType) = $check;
            $ext = '';
            switch ($imgType) {
                case IMAGETYPE_JPEG: $ext = 'jpg'; break;
                case IMAGETYPE_PNG: $ext = 'png'; break;
                case IMAGETYPE_GIF: $ext = 'gif'; break;
                default: $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            }

            $safeName = 'prod_' . $productId . '_' . time() . '.' . $ext;
            $destDir = __DIR__ . '/../uploads/';
            if (!is_dir($destDir)) {
                mkdir($destDir, 0755, true);
            }
            $destPath = $destDir . $safeName;

            // Resize settings
            $maxW = 1200;
            $maxH = 800;
            $ratio = min($maxW / $origW, $maxH / $origH, 1);
            $newW = (int)($origW * $ratio);
            $newH = (int)($origH * $ratio);

            // Create image resource from upload
            switch ($imgType) {
                case IMAGETYPE_JPEG:
                    $srcImg = imagecreatefromjpeg($fileTmp);
                    break;
                case IMAGETYPE_PNG:
                    $srcImg = imagecreatefrompng($fileTmp);
                    break;
                case IMAGETYPE_GIF:
                    $srcImg = imagecreatefromgif($fileTmp);
                    break;
                default:
                    $srcImg = null;
            }

            if ($srcImg) {
                $dstImg = imagecreatetruecolor($newW, $newH);
                // Preserve transparency for PNG/GIF
                if ($imgType == IMAGETYPE_PNG || $imgType == IMAGETYPE_GIF) {
                    imagecolortransparent($dstImg, imagecolorallocatealpha($dstImg, 0, 0, 0, 127));
                    imagealphablending($dstImg, false);
                    imagesavealpha($dstImg, true);
                }

                imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

                // Save resized image
                $saved = false;
                switch ($imgType) {
                    case IMAGETYPE_JPEG:
                        $saved = imagejpeg($dstImg, $destPath, 85);
                        break;
                    case IMAGETYPE_PNG:
                        $saved = imagepng($dstImg, $destPath);
                        break;
                    case IMAGETYPE_GIF:
                        $saved = imagegif($dstImg, $destPath);
                        break;
                }

                imagedestroy($srcImg);
                imagedestroy($dstImg);

                if ($saved) {
                    $dbPath = 'uploads/' . $safeName;
                    $stmt = $conn->prepare("UPDATE products SET image_url = ? WHERE id = ?");
                    $stmt->bind_param('si', $dbPath, $productId);
                    if ($stmt->execute()) {
                        $message = 'Image uploaded, resized, and product updated successfully.';
                    } else {
                        $message = 'Database update failed.';
                    }
                } else {
                    $message = 'Failed to save resized image.';
                }
            } else {
                $message = 'Failed to process the uploaded image.';
            }
        } else {
            $message = 'Uploaded file is not a valid image.';
        }
    } else {
        $message = 'Please select a product and an image file.';
    }
}

$products = getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Product Image - Sweet Bliss</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a href="../index.php" class="logo">Sweet Bliss</a>
            <nav>
                <a href="products.php">Products</a>
                <a href="upload_image.php">Upload Image</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <h2>Upload Product Image</h2>
        <?php if ($message): ?>
            <div class="alert" style="margin-bottom:1rem;"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form action="upload_image.php" method="post" enctype="multipart/form-data" style="background:white; padding:1.5rem; border-radius:10px;">
            <label for="product_id">Select Product</label>
            <select name="product_id" id="product_id" required style="display:block; padding:0.6rem; margin:0.5rem 0 1rem; width:100%; max-width:400px;">
                <option value="">-- Choose a product --</option>
                <?php foreach ($products as $p): ?>
                    <option value="<?php echo $p['id']; ?>"><?php echo htmlspecialchars($p['name']); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="image">Choose Image (jpg, png, gif)</label>
            <input type="file" name="image" id="image" accept="image/*" required style="display:block; margin:0.5rem 0 1rem;">

            <button type="submit" class="cta-button">Upload Image</button>
        </form>

        <p style="margin-top:1rem; color:#666;">After upload the product pages will display the image. Images are stored in <strong>/uploads/</strong>.</p>
    </main>

    <footer>
        <div class="footer-bottom">
            <p>&copy; 2026 Sweet Bliss Bakery</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
