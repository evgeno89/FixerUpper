<?php
require 'config.php';

// Only allow if user is an admin (you can implement role-checking if needed)
// For now, this page is public

echo "<h2>📦 All Orders</h2>";

$stmt = $pdo->query("SELECT o.id AS order_id, u.username, o.created_at 
                     FROM orders o JOIN users u ON o.user_id = u.id 
                     ORDER BY o.created_at DESC");

while ($order = $stmt->fetch()) {
    echo "<h4>Order #" . $order['order_id'] . " by " . htmlspecialchars($order['username']) .
         " on " . $order['created_at'] . "</h4>";

    $items = $pdo->prepare("SELECT p.name, oi.quantity 
                            FROM order_items oi 
                            JOIN products p ON oi.product_id = p.id 
                            WHERE oi.order_id = ?");
    $items->execute([$order['order_id']]);

    echo "<ul>";
    foreach ($items as $item) {
        echo "<li>" . htmlspecialchars($item['name']) . " × " . $item['quantity'] . "</li>";
    }
    echo "</ul>";
}
echo '<a href="home.php">🏠 Home</a>';
?>