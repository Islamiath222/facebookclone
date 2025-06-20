<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "facebookclone"; // Make sure this matches your actual DB name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
