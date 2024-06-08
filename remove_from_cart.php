<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];

    // Loop through the cart and remove the item with the specified product_id
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Reindex the cart array
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect back to the cart page
    header('Location: cart.php');
    exit();
}

