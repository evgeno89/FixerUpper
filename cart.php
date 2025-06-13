
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #d7befb;
    color: black;
    margin: 0;
}

.footer {
    background-color: #0b3555;
    color: white;
    padding: 20px;
    text-align: center;
    margin-top: 40px;
}

.footer i {
    margin: 0 10px;
    font-size: 24px;
    color: white;
    text-decoration: none;
}
</style>



<style>
    font-family: Arial, sans-serif;
    background-color: #d7befb;
    color: black;
    margin: 0;
}

.footer {
    background-color: #0b3555;
    color: white;
    padding: 20px;
    text-align: center;
    margin-top: 40px;
}

.footer i {
    margin: 0 10px;
    font-size: 24px;
    color: white;
    text-decoration: none;
}
</style>

<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantities'] as $id => $qty) {
        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = $qty;
        }
    }
    header("Location: cart.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];
?>

<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <form method="post">
    <ul>
    <?php
    $total = 0;
    foreach ($cart as $id => $qty):
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();
        $lineTotal = $product['price'] * $qty;
        $total += $lineTotal;
    ?>
        <li>
            <?= htmlspecialchars($product['name']) ?> - <strong>$<?= number_format($product['price'], 2) ?></strong>
            × <input type="number" name="quantities[<?= $id ?>]" value="<?= $qty ?>" min="0">
            = $<?= number_format($lineTotal, 2) ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <button type="submit" style='background-color:#ff6600;color:white;border:none;padding:10px 15px;font-size:16px;border-radius:4px;'>Update Cart</button>
    </form>
    <br>
    <form action="checkout.php" method="get">
        <button style='background-color:#ff6600;color:white;border:none;padding:10px 15px;font-size:16px;border-radius:4px;'>Proceed to Checkout</button>
    </form>
<?php endif; ?>
<br>
<a href="javascript:history.back()">🔙 Back</a> | <a href="home.php">🏠 Home</a> | <a href="logout.php">Logout</a>


<style>
.footer {
    background-color: #2f363c;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
}
.footer a {
    color: white;
    margin-right: 15px;
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}
.footer .left,
.footer .right {
    display: flex;
    align-items: center;
}
.footer .right a {
    margin-left: 10px;
    font-size: 20px;
}
</style>


<style>
.footer {
    background-color: #2f363c;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
}
.footer a {
    color: white;
    margin-right: 15px;
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}
.footer .left,
.footer .right {
    display: flex;
    align-items: center;
}
.footer .right a {
    margin-left: 15px;
    font-size: 20px;
}
</style>


<style>
.footer {
    background-color: #2f363c;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
}
.footer a {
    color: white;
    margin-right: 15px;
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}
.footer .left {
    display: flex;
    align-items: center;
}
.footer .right {
    display: flex;
    align-items: center;
}
.footer .right img {
    height: 30px;
    margin-left: 15px;
    border-radius: 6px;
}
</style>

<div class="footer">
    <div class="left">
        &copy; 2025
        <a href="#">Terms & conditions</a> |
        <a href="#">Privacy policy</a> |
        <a href="#">Contact us</a> |
        <a href="#">Cookie Preferences</a> |
        <a href="#">Change country</a>
    </div>
    <div class="right">
        <a href="#"><img src="images/whatsapp.png" alt="WhatsApp"></a>
        <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
        
        <a href="#"><img src="images/tiktok.png" alt="TikTok"></a>
    </div>
</div>
