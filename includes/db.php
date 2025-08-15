<?php
// Database configuration
$servername = "localhost";    // Usually localhost
$username = "root";           // Your DB username
$password = "";               // Your DB password
$dbname = "tourism_system";   // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set charset to avoid issues with special characters
$conn->set_charset("utf8");
?>