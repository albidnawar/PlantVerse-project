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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
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

<body class="w-[1519px] h-[1000px] bg-no-repeat bg-cover bg-left"
    style="background-image: url(images/backdrop-green-leaves.jpg)" ;>
    <!-- Header -->
    <header class="md:container md:mx-auto">
        <!-- Nav bar -->

    <?php include 'components/navbar.php'; ?>

        <!-- variety options -->
        <div class="join flex justify-center  mt-5 gap-5">
            <a href="landing-page.php"><button class="btn btn-outline btn-info">Popular</button></a>
            <a href="Indoor.php"><button class="btn btn-outline btn-success">Indoor</button></a>
            <a href="outdoor.php"><button class="btn btn-outline btn-warning">Outdoor</button></a>
        </div>
    </header>
    <main class="h-screen flex items-center justify-center">
        <!-- cart and payment part -->
        <div class="flex gap-20 mt-10">
            <!-- cart details -->
            <div class="card w-[600px]  bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title ">Cart Summary</h2>
                    <!-- item 01 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-5 mt-5">
                            <div class="avatar">
                                <div class="w-12 mask mask-squircle">
                                    <img src="images/philodendron.jpg" />
                                </div>
                            </div>
                            <div>
                                <p>Philodendron</p>
                                <p>Qty: <span>4</span></p>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$65.00</p>
                        </div>
                    </div>
                    <!-- item 02 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-5 mt-5">
                            <div class="avatar">
                                <div class="w-12 mask mask-squircle">
                                    <img src="images/philodendron.jpg" />
                                </div>
                            </div>
                            <div>
                                <p>Philodendron</p>
                                <p>Qty: <span>4</span></p>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$65.00</p>
                        </div>
                    </div>
                    <!-- item 03 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-5 mt-5">
                            <div class="avatar">
                                <div class="w-12 mask mask-squircle">
                                    <img src="images/philodendron.jpg" />
                                </div>
                            </div>
                            <div>
                                <p>Philodendron</p>
                                <p>Qty: <span>4</span></p>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$65.00</p>
                        </div>
                    </div>
                    <!-- item 04 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-5 mt-5">
                            <div class="avatar">
                                <div class="w-12 mask mask-squircle">
                                    <img src="images/philodendron.jpg" />
                                </div>
                            </div>
                            <div>
                                <p>Philodendron</p>
                                <p>Qty: <span>4</span></p>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$65.00</p>
                        </div>
                    </div>
                    <!-- item 05 -->
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-5 mt-5">
                            <div class="avatar">
                                <div class="w-12 mask mask-squircle">
                                    <img src="images/philodendron.jpg" />
                                </div>
                            </div>
                            <div>
                                <p>Philodendron</p>
                                <p>Qty: <span>4</span></p>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$65.00</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div>
                            <p>Subtotal</p>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$125.00</p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div>
                            <p class="text-gray-400">Shipping <br>Within 3-5 working days</p>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$5.00</p>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <div>
                            <p class="font-bold text-xl">Total Due</p>
                        </div>
                        <div>
                            <p class="font-bold text-xl">$130.00</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- payment system -->
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Shipping Information</h2>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Your Name</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Phone Number</span>
                        </div>
                        <input type="text" placeholder="phone number" class="input input-bordered w-full max-w-xs" />
                    </label>

                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Shipping Address</span>
                        </div>
                        <input type="text" placeholder="Address" class="input input-bordered w-full max-w-xs" />
                    </label>
                    <label class="form-control w-full max-w-xs">
                        <input type="text" placeholder="Country" class="input input-bordered w-full max-w-xs" />
                    </label>
                    <h2 class="card-title mt-5">Payment Details</h2>
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Card Information</span>
                        </div>
                        <input type="text" placeholder="1234 1234 1234 1234"
                            class="input input-bordered w-full max-w-xs" />
                    </label>
                    <div class="flex gap-2">
                        <label class="form-control w-full max-w-xs">
                            <input type="text" placeholder="MM/YY" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <input type="text" placeholder="CVC" class="input input-bordered w-full max-w-xs" />
                        </label>
                    </div>
                    <button class="btn" onclick="my_modal_5.showModal()">Place Order</button>
                    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <h3 class="font-bold text-2xl">Your Order is Placed!</h3>
                            <p class="py-4">Press to see your order progress</p>
                            <a href="profile.html"><button class="btn  btn-primary">Your Orders</button></a>
                            <div class="modal-action">
                                <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>


                </div>
            </div>
        </div>

    </main>
    <?php include 'components/footer.php'; ?>

</body>

</html>