<?php
session_start();
include "database.php"; // Ensure database connection is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["roll_number"]) && isset($_POST["password"])) {
        $roll_number = $_POST["roll_number"];
        $password = $_POST["password"];

        // Query to fetch password based on roll_number
        $stmt = $conn->prepare("SELECT password FROM users WHERE roll_number = ?");
        $stmt->bind_param("s", $roll_number);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_password);
            $stmt->fetch();
            
            // Since passwords are stored as plain text, compare directly
            if ($password === $db_password) { 
                $_SESSION["user"] = $roll_number;
                header("Location: homesection.html");
                exit();
            } else {
                echo "<script>alert('Invalid credentials'); window.location.href='loginform.html';</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials'); window.location.href='loginform.html';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter all details'); window.location.href='loginform.html';</script>";
    }

    $conn->close();
} else {
    header("Location: loginform.html");
    exit();
}
?>