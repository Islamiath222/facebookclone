<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
$user = explode("@", $_SESSION['email'])[0]; // simple name from email
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>facebook_clone</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f0f2f5;
    }

    .topbar {
      background-color: #1877f2;
      color: white;
      padding: 12px 20px;
      font-size: 22px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar a {
      color: white;
      text-decoration: none;
      font-size: 14px;
    }

    .sidebar {
      width: 240px;
      height: 100vh;
      background: white;
      padding-top: 20px;
      box-shadow: 1px 0 5px rgba(0,0,0,0.1);
      position: fixed;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
    }

    .sidebar a i {
      margin-right: 10px;
      font-size: 18px;
    }

    .sidebar a:hover {
      background-color: #f0f0f0;
    }

    .main {
      margin-left: 240px;
      padding: 20px;
    }

    .card {
      background: white;
      padding: 16px;
      border-radius: 8px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    textarea {
      width: 100%;
      border: none;
      padding: 12px;
      font-size: 16px;
      resize: none;
      border-radius: 8px;
      background-color: #f0f2f5;
    }

    .post img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="topbar">
  <div>facebook_clone</div>
  <div>Hi, <?= ucfirst($user) ?> | <a href="logout.php">Logout</a></div>
</div>

<div class="sidebar">
  <a href="#"><i class="fa fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-user-friends"></i> Friends</a>
  <a href="#"><i class="fa fa-camera-retro"></i> Photos</a>
  <a href="#"><i class="fa fa-video"></i> Videos</a>
  <a href="#"><i class="fa fa-cog"></i> Settings</a>
</div>

<div class="main">
  <div class="card">
    <h3>What's on your mind, <?= ucfirst($user) ?>?</h3>
    <textarea rows="3" placeholder="Share your thoughts..."></textarea>
  </div>

  <div class="card post">
    <h4>SuperSport Football</h4>
    <p>They don’t call him Ice-Cold Cole for nothing 🧊⚽</p>
    <img src="images/Football.jpg" alt="Post Image">
  </div>
</div>

</body>
</html>
