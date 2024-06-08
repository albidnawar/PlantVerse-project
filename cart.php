<?php
session_start();
include 'components/connect.php';

// Check if the form is submitted and product_id and qty are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['qty'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['qty']);

    // Fetch product details from the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Initialize cart if not already done
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if product already in cart, then update the quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['qty'] += $quantity;
        } else {
            // Add new product to cart
            $_SESSION['cart'][$product_id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image_url' => $product['image'],
                'qty' => $quantity
            ];
        }
    }
    // Redirect to the cart page
    header("Location: cart.php");
    exit();
}

// Handle item removal
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_product_id'])) {
    $product_id = intval($_POST['remove_product_id']);
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantVerse</title>
    <link rel="icon" href="images/tab-logo.png" type="image/x-icon">
    <!-- tailwind & daisyui cdn -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- tailwind custom classes -->
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
    <!--custom styles-->
    <style>
        .font-pop {
            font-family: 'Poppins', sans-serif;
        }

        .custom-hr {
            width: 1288px;
            height: 1px;
            background: #1E1E1E;
            border: none;
            margin: 0;
        }
    </style>
</head>

<body class="w-[1519px] h-[1000px] bg-no-repeat bg-cover bg-left" style="background-image: url(images/backdrop-green-leaves.jpg)">
    <!-- Header -->
    <header class="md:container md:mx-auto">
        <!-- Nav bar -->
        <nav>
            <div class="navbar bg-base-100 justify-between">
                <div class="flex">
                    <a class="btn btn-ghost text-xl" href="landing-page.php">PlantVerse</a>
                </div>
                <div class="flex w-20">
                    <img src="images/Plantverse-logo-01.png" alt="">
                </div>
                <div class="flex items-center">
                    <!-- others button -->
                    <div class="dropdown dropdown-hover">
                        <div tabindex="0" role="button" class="btn m-1">Others</div>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="fertilizer.html">Fertilizer</a></li>
                            <li><a href="tools.html">Tools</a></li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="dropdown dropdown-end px-2">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                <div class="indicator">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                                <div class="card-body">
                                    <span class="font-bold text-lg">
                                        <?php
                                            $item_count = 0;
                                            $subtotal = 0;
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $item) {
                                                    $item_count += $item['qty'];
                                                    $subtotal += $item['price'] * $item['qty'];
                                                }
                                                $_SESSION['cart_total'] = $subtotal;
                                            }
                                            echo $item_count;
                                        ?> Items
                                    </span>
                                    <span class="text-info">Subtotal: $<?= $subtotal ?></span>
                                    <div class="card-actions">
                                        <a href="cart.php"><button class="btn btn-primary btn-block">View cart</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Profile" src="images/Formal pic-01.png" />
                                </div>
                            </div>
                            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                                <li><a class="justify-between" href="profile.html">Profile</a></li>
                                <li><a href="admin-login.html">Admin</a></li>
                                <li><a href="sign-in.html">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- variety options -->
        <div class="join flex justify-center mb-20 mt-5 gap-5">
            <a href="landing-page.php"><button class="btn btn-outline btn-info">Popular</button></a>
            <a href="Indoor.html"><button class="btn btn-outline btn-success">Indoor</button></a>
            <a href="outdoor.html"><button class="btn btn-outline btn-warning">Outdoor</button></a>
        </div>
    </header>

    <main class="h-screen flex items-center justify-center">
        <div class="w-[1365px] h-[806px] bg-base-200 flex-col justify-between px-20 py-10 shadow-lg">
            <div class="flex justify-between">
                <div><p>Description</p></div>
                <div><p>Quantity</p></div>
                <div><p>Remove</p></div>
                <div><p>Price</p></div>
            </div>

            <!-- Cart items -->
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="pt-8 flex items-center justify-between">
                        <!-- image and description -->
                        <div class="flex gap-4">
                            <div class="avatar">
                                <div class="w-20 mask mask-squircle">
                                    <img src="<?= $item['image'] ?>" />
                                </div>
                            </div>
                            <div>
                                <p class="text-2xl"><?= $item['name'] ?></p>
                                <p>product code <?= $item['id'] ?></p>
                            </div>
                        </div>
                        <!-- qty -->
                        <div><p class="text-2xl"><?$item['qty'] ?></p></div>
                        <!-- Remove Button -->
                        <div class="ml-[170px]">
                            <form method="POST" action="remove_from_cart.php">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-square btn-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <!-- Price -->
                        <div class="ml-[325px]">
                            <p class="text-2xl">$<?= $item['price'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>

            <!-- Cart discount and total amount section -->
            <div class="flex items-center justify-between mt-10">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title text-2xl pb-3">Input Discount Coupon</div>
                        <div class="flex">
                            <div><input type="text" placeholder="Type here" class="input input-bordered input-secondary w-full max-w-xs" /></div>
                            <div class="ml-[5px]"><input type="submit" value="Submit" class="btn" /></div>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="stat-title text-2xl">Discount Amount</div>
                        <div class="stat-value text-primary">$50</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title text-2xl">Delivery Charge</div>
                        <div class="stat-value text-secondary">$5</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title text-2xl">Total</div>
                        <div class="stat-value text-secondary">$<?= $subtotal - 50 + 5 ?></div>
                    </div>
                </div>
                <div class="ml-10">
                    <a href="checkout.html"><button class="btn btn-wide btn-primary h-20 mt-8 text-3xl">Checkout</button></a>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>
