<?php
session_start();
if(isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logins.css">
    <title>My Portfolio | Login</title>
</head>
<body>
    <div class="container">
        <form action="auth.php" method="POST">
            <h1>Login</h1>
            <div class="form">
                <input type="text" id="username" name="username" placeholder="Username..."required>
                <i class='bxr  bx-user'></i> 
            </div>
            <div class="form">
                <input type="password" id="password" name="password" placeholder="Password..."required>
            </div>
            <div class="forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <?php
                if (isset($_GET['error'])): ?>
                <p class="error">Username atau password salah!</p>
            <?php endif; ?>
            <button type="submit" class="button">Log in</button>
            <div class="regist">
                <p>Don't have an account?
                    <a href="#">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>