<?php
// connection.php

$host     = 'localhost';
$db_user  = 'root';  // Default for XAMPP
$db_pass  = '';      // Leave empty unless you set a password
$db_name  = 'activities';  // Your database name

// Create connection
$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
?>
