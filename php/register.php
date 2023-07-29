<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener - Sign Up</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <main class="signup-box">
        <h2>URL<span>Shortener</span></h2>
        <form action="register.php" method="post">
            <?php include('errors.php'); ?>
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password_1" required>
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="password_2" required>
                <label>Confirm Password</label>
            </div>
            <button type="submit" onclick="validateData()">
            Create Account</button>
        </form>
        <script src="../js/index.js"></script>
    </main>
</body>
</html>