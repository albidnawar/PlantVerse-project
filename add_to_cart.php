<?php
session_start();

// Check if form data is sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve product details from POST request
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $qty = $_POST['qty'];

    // Prepare product array
    $product = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'qty' => $qty
    );

    // Initialize cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add product to cart
    array_push($_SESSION['cart'], $product);

    // Redirect to the cart page
    header('Location: landing-page.php');
    exit();
}

