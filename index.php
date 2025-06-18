<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>facebook_clone</h1>
            <p class="subtitle">Connect with friends and the world around you.</p>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Email or Phone" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
                <a href="#" class="forgot">Forgot Password?</a>
                <hr>
                <a href="Signup.php" class="create">Create New Account</a> 
            </form>
        </div>
    </div>
</body>
</html>
