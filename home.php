<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Facebook Home</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
    }

    .navbar {
      background-color: #1877f2;
      color: white;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar h1 {
      font-size: 24px;
      margin: 0;
    }

    .navbar .welcome {
      font-size: 16px;
    }

    .sidebar {
      width: 250px;
      background-color: white;
      position: fixed;
      top: 60px;
      left: 0;
      bottom: 0;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .sidebar a {
      display: block;
      margin: 10px 0;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    .content {
      margin-left: 270px;
      padding: 20px;
    }

    .post-box {
      background-color: white;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    .post-box textarea {
      width: 100%;
      height: 80px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      resize: none;
    }
  </style>
</head>
<body>

<div class="navbar">
  <h1>facebook_clone</h1>
  <div class="welcome">Hi, <?php echo htmlspecialchars($_SESSION['first_name']); ?> | <a href="logout.php" style="color:white; text-decoration:underline;">Logout</a></div>
</div>

<div class="sidebar">
  <a href="#">🏠 Home</a>
  <a href="#">👥 Friends</a>
  <a href="#">📸 Photos</a>
  <a href="#">📹 Videos</a>
  <a href="#">⚙ Settings</a>
</div>

<div class="content">
  <div class="post-box">
    <p><strong>What's on your mind, <?php echo htmlspecialchars($_SESSION['first_name']); ?>?</strong></p>
    <textarea placeholder="Share your thoughts..."></textarea>
  </div>

  <!-- Simulated post -->
  <div class="post-box">
    <p><strong>SuperSport Football</strong></p>
    <p>They don’t call him Ice-Cold Cole for nothing 🧊⚽</p>
    <img src="https://via.placeholder.com/600x300" alt="Post Image" style="width:100%; border-radius: 5px;">
  </div>
</div>

</body>
</html>
