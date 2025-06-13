<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: home.php");
    exit();
}

// Create order record
$pdo->prepare("INSERT INTO orders (user_id) VALUES (?)")->execute([$user_id]);
$order_id = $pdo->lastInsertId();

// Insert order items
$stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
foreach ($cart as $product_id => $qty) {
    $stmt->execute([$order_id, $product_id, $qty]);
}

unset($_SESSION['cart']);
echo "<h2>✅ Order Placed Successfully!</h2>";
echo "<p>Your order ID is <strong>#$order_id</strong>.</p>";
echo '<a href="home.php">🏠 Return to Home</a> | <a href="logout.php">Logout</a>';
?>