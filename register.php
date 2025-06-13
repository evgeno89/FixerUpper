<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    $stmt->execute([$username, $password]);
    header("Location: login.php");
}
?>
<h2>Register</h2>
<form method="post">
    User ID: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <button>Register</button>
</form>
<a href="login.php">Already registered? Login</a>
