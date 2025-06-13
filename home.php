<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 style="text-align:center;">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<div style="text-align:center; margin-bottom: 10px;">
    <a href="logout.php">Logout</a> |
    <a href="cart.php">🛒 View Cart</a>
</div>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #d7befb;
    color: black;
    margin: 0;
}

.product-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    padding: 30px;
}

.product-card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    padding: 15px;
    width: 220px;
    text-align: center;
}

.product-card img {
    width: 100%;
    height: auto;
    object-fit: contain;
}

.badge {
    display: inline-block;
    background: #ff0;
    color: #000;
    font-weight: bold;
    font-size: 13px;
    padding: 3px 6px;
    margin-bottom: 6px;
}

.purchase-info {
    font-size: 12px;
    color: #3d5;
    margin-bottom: 8px;
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

<div class="product-gallery">
<?php foreach ($products as $product): ?>
    <div class="product-card">
                <img src="images/<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
        <div class="purchase-info"><?= rand(5, 300) ?> people bought this in 48 hours</div>
        <strong><?= htmlspecialchars($product['name']) ?></strong>
        <p>£<?= number_format($product['price'], 2) ?></p>
        <form method="post" action="add-to-cart.php">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <button style='background-color:#ff6600;color:white;border:none;padding:10px 15px;font-size:16px;border-radius:4px;'>Add to Cart</button>
        </form>
    </div>
<?php endforeach; ?>
</div>


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
