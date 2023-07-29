<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener - Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <main class="login-box">
        <h2>URL<span>Shortener</span></h2>
        <form action="authenticate.php" method="post">
            <?php include('errors.php'); ?>
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="forget">
                <a href="reset-pass.html">Forgot Password?</a>
            </div>
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Login
            </button>
            <div class="signup">
                <p>
                    New to URL Shortener?
                   <a href="register.php">Create Account</a>
                </p>
         </div>
        </form>
    </main>
</body>
</html>