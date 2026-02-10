<?php
session_start();
// Enable detailed errors for local development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Initialize session variables
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Helper function to get all products
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get products with pagination
function getProductsPaged($page = 1, $perPage = 5) {
    global $conn;
    $page = max(1, intval($page));
    $perPage = max(1, intval($perPage));
    $offset = ($page - 1) * $perPage;
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param('ii', $perPage, $offset);
    $stmt->execute();
    $res = $stmt->get_result();
    $rows = $res->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    // Remove duplicate product ids if database has duplicates
    $unique = [];
    foreach ($rows as $r) {
        $unique[intval($r['id'])] = $r;
    }
    // Preserve original order by id DESC
    $ordered = [];
    foreach ($rows as $r) {
        $id = intval($r['id']);
        if (isset($unique[$id])) {
            $ordered[] = $unique[$id];
            unset($unique[$id]);
        }
    }
    return $ordered;
}

function getProductsCount() {
    global $conn;
    $sql = "SELECT COUNT(DISTINCT id) as cnt FROM products";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return intval($row['cnt'] ?? 0);
}

// Helper function to get product by ID
function getProductById($id) {
    global $conn;
    $id = intval($id);
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Helper function to add to cart
function addToCart($productId, $quantity) {
    $productId = intval($productId);
    $quantity = intval($quantity);
    
    if ($quantity > 0) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
        return true;
    }
    return false;
}

// Helper function to format price
function formatPrice($price) {
    return '$' . number_format($price, 2);
}
?>
