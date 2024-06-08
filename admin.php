<?php
include 'components/connect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image_url']) && isset($_POST['product_type'])) {
        $product_id = $_POST['product_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_url = $_POST['image_url'];
        $product_type = $_POST['product_type'];

        $stmt = $conn->prepare("INSERT INTO products (product_id, name, description, price, image_url, product_type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdss", $product_id, $name, $description, $price, $image_url, $product_type);
        $stmt->execute();
        $stmt->close();

        echo "<p class='alert alert-success'>Product added successfully!</p>";
    } elseif (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];

        $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param("s", $delete_id);
        $stmt->execute();
        $stmt->close();

        echo "<p class='alert alert-success'>Product deleted successfully!</p>";
    } elseif (isset($_POST['update_id']) && isset($_POST['update_name']) && isset($_POST['update_description']) && isset($_POST['update_price']) && isset($_POST['update_image_url']) && isset($_POST['update_product_type'])) {
        $update_id = $_POST['update_id'];
        $name = $_POST['update_name'];
        $description = $_POST['update_description'];
        $price = $_POST['update_price'];
        $image_url = $_POST['update_image_url'];
        $product_type = $_POST['update_product_type'];

        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image_url = ?, product_type = ? WHERE product_id = ?");
        $stmt->bind_param("ssdsss", $name, $description, $price, $image_url, $product_type, $update_id);
        $stmt->execute();
        $stmt->close();

        echo "<p class='alert alert-success'>Product updated successfully!</p>";
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM `products` WHERE product_id = ?");
    $stmt->bind_param("s", $delete_id);
    $stmt->execute();
    $stmt->close();
    header('location:admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                    'plant-primary': '#E76F51',
                    'plant-primary-bg': 'rgba(231, 111, 81, 0.10)',
                }
            }
        }
    }
    </script>
</head>
<body style="padding-top: 2px;">

<?php include 'components/admin_header.php'; ?>
<div class="container pl-12 pt-5">
    <div class="flex gap-20">
    <form method="POST" class=" card bg-base-100 shadow-xl h-full p-10">
        <p class="text-4xl pb-10">Add Product</p>
        <div class="flex gap-5">
        <div class="mb-3 ">
            <label for="product_id" class="form-label">Product ID</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="product_id" name="product_id" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="name" name="name" required>
        </div>
        </div>
        <div class="flex gap-9">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control input input-bordered w-full max-w-xs mt-2" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control input input-bordered w-full max-w-xs mt-2" id="price" name="price" required>
        </div>
        </div>
        <div class="flex gap-5">
        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="image_url" name="image_url" required>
        </div>
        <div class="mb-3">
            <label for="product_type" class="form-label">Category</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="product_type" name="product_type" required>
        </div>
        </div>
        <button type="submit" class="btn btn-primary ">Add Product</button>
    </form>
    <!-- Update products -->
    <form method="POST" class=" card bg-base-100 shadow-xl h-full p-10">
        <p class="text-4xl pb-10">Update Product</p>
        <div class="flex gap-5">
        <div class="mb-3 ">
            <label for="update_id" class="form-label">Product ID to Update</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_id" name="update_id" required>
        </div>
        <div class="mb-3">
            <label for="update_name" class="form-label">New Product Name</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_name" name="update_name" required>
        </div>
        </div>
        <div class="flex gap-9">
        <div class="mb-3">
            <label for="update_description" class="form-label">New Description</label>
            <textarea class="form-control input input-bordered w-full max-w-xs mt-2" id="update_description" name="update_description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="update_price" class="form-label">New Price</label>
            <input type="number" step="0.01" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_price" name="update_price" required>
        </div>
        </div>
        <div class="flex gap-5">
        <div class="mb-3">
            <label for="update_image_url" class="form-label">New Image URL</label>
            <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_image_url" name="update_image_url" required>
        </div>
        <div class="mb-3">
            <label for="update_product_type" class="form-label">New Category</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_product_type" name="update_product_type" required>
        </div>
    </div>

        <button type="submit" class="btn btn-warning">Update Product</button>
        
    </form>
     
     
    
    <form method="POST" class=" card bg-base-100 shadow-xl h-full p-10 mr-10">
        <div class="mb-3">
            <label for="delete_id" class="form-label">Product ID to Delete</label>
            <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="delete_id" name="delete_id" required>
        </div>
        <button type="submit" class="btn btn-error mb-5">Delete Product</button>
    </form>
    </div>
</div>
<div class="cards-container grid grid-cols-3  mt-10 ml-[100px] ">
    <?php
    $select_products = $conn->prepare("SELECT * FROM `products`");
    $select_products->execute();
    $result = $select_products->get_result();
    ?>
    <?php if($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card w-96 bg-base-100 shadow-xl mt-10">
                <figure>
                    <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?= $row['name'] ?></h2>
                    <p><?= $row['description'] ?></p>
                    <div class="card-actions flex items-center justify-between">
                        <p class="text-2xl"><strong>$<?= $row['price'] ?></strong></p>
                        <p class="text-2xl"><strong><?= $row['product_id'] ?></strong></p>
                        <a href="admin.php?delete=<?= $row['product_id']; ?>" class="btn btn-error">delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
