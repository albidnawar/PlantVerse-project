<?php

$servername = "localhost";
$db_username = "root"; // Update this if your DB username is different
$db_password = "";     // Update this if your DB password is different
$dbname = "plantverse";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Escape special characters for SQL
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Check if email exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user data
    $user = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $user['password'])) {
        echo "<script> window.location.href = 'landing-page.html';</script>";
        // Here you can start a session and set session variables if needed
    } else {
        echo "Invalid password. Please try again.";
    }
} else {
    echo "No account found with that email address. Please sign up.";
}

$conn->close();
?>
