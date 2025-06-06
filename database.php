<?php
$servername = "localhost";  // XAMPP runs MySQL on localhost
$username = "root";         // Default MySQL username in XAMPP
$password = "";             // Default MySQL password in XAMPP (leave empty)
$database = "user_db";      // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>