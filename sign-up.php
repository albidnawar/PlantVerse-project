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
$user = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// Check if passwords match
if ($pass !== $confirm_pass) {
    die("Passwords do not match. Please try again.");
}

// Hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Escape special characters for SQL
$user = $conn->real_escape_string($user);
$email = $conn->real_escape_string($email);
$hashed_pass = $conn->real_escape_string($hashed_pass);

// Check if email already exists
$sql_check = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    die("Email already registered. Please use a different email.");
}

// Construct the SQL query
$sql = "INSERT INTO users (name, email, phone, password) VALUES ('$user', '$email','$phone', '$hashed_pass')";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.href = 'sign-in.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
