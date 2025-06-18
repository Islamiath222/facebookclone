<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['first_name']; ?>!</h1>
    <p>You have successfully logged in.</p>
    <a href="Logout.php">Log out</a>
</body>
</html>
