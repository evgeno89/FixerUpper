<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "<h2>Your cart is empty.</h2><a href='home.php'>Back to Products</a>";
    exit();
}

// Prepare order summary
$total = 0;
$orderItems = "";
foreach ($cart as $id => $qty) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    $lineTotal = $product['price'] * $qty;
    $total += $lineTotal;

    $orderItems .= "<div style='display: flex; gap: 15px; margin-bottom: 20px;'>
        <img src='images/{$product['image_path']}' alt='{$product['name']}' width='100'>
        <div>
            <strong>{$product['name']}</strong><br>
            Quantity: $qty<br>
            Price: £" . number_format($lineTotal, 2) . "
        </div>
    </div>";
}
?>

<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    .checkout-wrapper { display: flex; gap: 40px; }
    .checkout-left { background: #fff; padding: 20px; flex: 3; border-radius: 8px; }
    .checkout-right { background: #fff; padding: 20px; flex: 1; border-radius: 8px; }
    .checkout-button {
        display: block;
        width: 100%;
        background-color: #ff6600;
        color: white;
        font-size: 16px;
        padding: 10px;
        text-align: center;
        border: none;
        border-radius: 4px;
        margin-top: 15px;
        cursor: pointer;
    }
</style>

<div class="checkout-wrapper">
    <div class="checkout-left">
        <h3>Sold by verified seller</h3>
        <?= $orderItems ?>
    </div>
    <div class="checkout-right">
        <h3>Order summary</h3>
        <p><strong>Subtotal:</strong> £<?= number_format($total, 2) ?></p>
        <p><strong>Delivery:</strong> Will be calculated at checkout</p>
        <p><strong>Total:</strong> £<?= number_format($total, 2) ?></p>
        <form action="place-order.php" method="post">
            <button type="submit" class="checkout-button">Place Order</button>
        </form>
    </div>
</div>
