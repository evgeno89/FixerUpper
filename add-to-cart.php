<?php
require 'config.php';

$id = (int) $_POST['product_id'];
$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

header("Location: home.php");
?>