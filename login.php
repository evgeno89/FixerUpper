<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        echo "Login failed";
    }
}
?>
<h2>Login</h2>
<form method="post">
    User ID: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <button>Login</button>
</form>
<a href="register.php">No account? Register</a>
