<?php
session_start();
include 'db.php';

// Get form data safely
$email = $_POST['username']; // input name="username" used for email
$password = $_POST['password'];

// Query to check user
$sql = "SELECT * FROM users2 WHERE email = '$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];

        // ✅ Redirect to Dashboard
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}
?>
