<?php
$host = 'localhost';
$db = 'product';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image_url'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_url = $_POST['image_url'];

        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $description, $price, $image_url);
        $stmt->execute();
        $stmt->close();

        echo "<p class='alert alert-success'>Product added successfully!</p>";
    } elseif (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];

        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        $stmt->close();

        echo "<p class='alert alert-success'>Product deleted successfully!</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.13.0/dist/full.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body style="padding-top: 56px;">
<div class="container">
    <h2>Admin</h2>
    <form method="POST" class="mb-5">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="url" class="form-control" id="image_url" name="image_url" required>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Add Product</button>
    </form>
    <form method="POST" class="mb-5">
        <div class="mb-3">
            <label for="delete_id" class="form-label">Product ID to Delete</label>
            <input type="number" class="form-control" id="delete_id" name="delete_id" required>
        </div>
        <button type="submit" class="btn btn-danger mb-5">Delete Product</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
